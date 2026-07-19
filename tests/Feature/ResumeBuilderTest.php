<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResumeBuilderTest extends TestCase
{
    use RefreshDatabase;

    public function test_resume_builder_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/resume-builder');

        $response->assertOk();
    }

    public function test_resume_builder_information_can_be_saved(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/resume-builder', [
                'professional_title' => 'Junior Laravel Developer',
                'target_role' => 'Backend Developer',
                'experience_level' => 'junior',
                'years_of_experience' => 2,
                'availability' => 'Immediate',
                'preferred_work_mode' => 'hybrid',
                'email' => 'resume@example.com',
                'phone' => '+85512345678',
                'location' => 'Phnom Penh',
                'portfolio_url' => 'https://portfolio.example.com',
                'linkedin_url' => 'https://linkedin.com/in/test-user',
                'github_url' => 'https://github.com/test-user',
                'tone' => 'balanced',
                'summary' => 'Clean summary for employers.',
                'core_skills' => "Laravel\nBootstrap\nSQL",
                'languages' => "English - Fluent\nKhmer - Native",
                'work_experiences' => 'Built internal hiring tools.',
                'internships' => 'Completed a product internship.',
                'education' => 'BSc in Computer Science',
                'projects' => 'Created a CV dashboard.',
                'certifications' => 'Laravel Certification',
                'achievements' => 'Top capstone project award',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/resume-builder');

        $resume = $user->fresh()->resume;

        $this->assertNotNull($resume);
        $this->assertSame('Junior Laravel Developer', $resume->professional_title);
        $this->assertSame('balanced', $resume->tone);
        $this->assertStringContainsString('Khmer - Native', $resume->languages);
    }
}
