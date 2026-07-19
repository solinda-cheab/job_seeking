<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeUpdateRequest;
use App\Models\Resume;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResumeController extends Controller
{
    /**
     * Display the resume builder.
     */
    public function edit(Request $request): View
    {
        $resume = $this->resumeFor($request);
        $experienceLevel = $this->normalizeExperienceLevel($resume->experience_level);
        $tone = $this->normalizeTone($resume->tone);

        return view('resume.edit', [
            'user' => $request->user(),
            'resume' => $resume,
            'resumeLists' => [
                'skills' => $this->lineItems($resume->core_skills),
                'languages' => $this->lineItems($resume->languages),
                'experience' => $this->lineItems($resume->work_experiences),
                'internships' => $this->lineItems($resume->internships),
                'education' => $this->lineItems($resume->education),
                'projects' => $this->lineItems($resume->projects),
                'certifications' => $this->lineItems($resume->certifications),
                'achievements' => $this->lineItems($resume->achievements),
            ],
            'resumeCompletion' => $this->completionPercentage([
                $resume->professional_title,
                $resume->target_role,
                $resume->summary,
                $resume->core_skills,
                $resume->languages,
                $resume->work_experiences,
                $resume->education,
                $resume->projects,
            ]),
            'levelLabel' => Str::headline($experienceLevel),
            'toneLabel' => Str::headline($tone),
        ]);
    }

    /**
     * Update the resume builder.
     */
    public function update(ResumeUpdateRequest $request): RedirectResponse
    {
        $resume = $this->resumeFor($request);
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($resume->photo_path && Storage::disk('public')->exists($resume->photo_path)) {
                Storage::disk('public')->delete($resume->photo_path);
            }

            $data['photo_path'] = $request->file('photo')->store('resume_photos', 'public');
        }

        $resume->fill($data);
        $resume->save();

        $user = $request->user();
        $user->forceFill([
            'headline' => $request->input('professional_title') ?: $user->headline,
            'phone' => $request->input('phone') ?: $user->phone,
            'location' => $request->input('location') ?: $user->location,
        ])->save();

        return redirect()->route('resume.edit')->with('status', 'resume-updated');
    }

    private function completionPercentage(array $values): int
    {
        $total = count($values);
        $completed = collect($values)->filter(fn ($value) => filled($value))->count();

        return (int) round(($completed / max($total, 1)) * 100);
    }

    private function lineItems(?string $value): Collection
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $value))
            ->map(fn (string $item) => trim($item))
            ->filter()
            ->values();
    }

    private function resumeFor(Request $request): Resume
    {
        $user = $request->user();

        $resume = $user->resume()->firstOrCreate(
            [],
            [
                'email' => $user->email,
                'phone' => $user->phone,
                'location' => $user->location,
                'professional_title' => $user->headline,
                'experience_level' => 'junior',
                'tone' => 'balanced',
            ],
        );

        $resume->forceFill([
            'email' => $resume->email ?: $user->email,
            'phone' => $resume->phone ?: $user->phone,
            'location' => $resume->location ?: $user->location,
            'professional_title' => $resume->professional_title ?: $user->headline,
            'experience_level' => $this->normalizeExperienceLevel($resume->experience_level),
            'tone' => $this->normalizeTone($resume->tone),
        ]);

        if ($resume->isDirty()) {
            $resume->save();
        }

        return $resume;
    }

    private function normalizeExperienceLevel(?string $experienceLevel): string
    {
        return filled($experienceLevel) ? $experienceLevel : 'junior';
    }

    private function normalizeTone(?string $tone): string
    {
        return filled($tone) ? $tone : 'balanced';
    }
}
