<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResumeUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'professional_title' => ['nullable', 'string', 'max:120'],
            'target_role' => ['nullable', 'string', 'max:120'],
            'experience_level' => ['required', Rule::in(['internship', 'junior', 'mid-level', 'senior', 'professional'])],
            'years_of_experience' => ['nullable', 'integer', 'min:0', 'max:40'],
            'availability' => ['nullable', 'string', 'max:80'],
            'preferred_work_mode' => ['nullable', Rule::in(['remote', 'hybrid', 'onsite', 'flexible'])],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'location' => ['nullable', 'string', 'max:120'],
            'portfolio_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'tone' => ['required', Rule::in(['professional', 'friendly', 'balanced'])],
            'summary' => ['nullable', 'string', 'max:2000'],
            'core_skills' => ['nullable', 'string', 'max:2500'],
            'languages' => ['nullable', 'string', 'max:1500'],
            'work_experiences' => ['nullable', 'string', 'max:3500'],
            'internships' => ['nullable', 'string', 'max:2500'],
            'education' => ['nullable', 'string', 'max:2500'],
            'projects' => ['nullable', 'string', 'max:2500'],
            'certifications' => ['nullable', 'string', 'max:2000'],
            'achievements' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
