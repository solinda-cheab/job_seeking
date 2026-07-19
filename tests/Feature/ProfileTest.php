<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'headline' => 'Junior Laravel Developer',
                'phone' => '+85512345678',
                'location' => 'Phnom Penh',
                'role' => 'user',
                'preferred_language' => 'English',
                'theme_preference' => 'dark',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $user->refresh();

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
        $this->assertSame('Junior Laravel Developer', $user->headline);
        $this->assertSame('Phnom Penh', $user->location);
        $this->assertSame('dark', $user->theme_preference);
        $this->assertNull($user->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => $user->email,
                'headline' => $user->headline,
                'phone' => $user->phone,
                'location' => $user->location,
                'role' => $user->role,
                'preferred_language' => $user->preferred_language,
                'theme_preference' => $user->theme_preference,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_theme_preference_can_be_toggled_quickly(): void
    {
        $user = User::factory()->create([
            'theme_preference' => 'light',
        ]);

        $response = $this
            ->actingAs($user)
            ->patch('/profile/theme', [
                'theme_preference' => 'dark',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame('dark', $user->fresh()->theme_preference);
    }

    public function test_language_preference_can_be_changed_from_the_language_switcher(): void
    {
        $user = User::factory()->create([
            'preferred_language' => 'English',
        ]);

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->post('/language', [
                'locale' => 'km',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertSame('Khmer', $user->fresh()->preferred_language);
        $this->assertSame('km', session('locale'));
    }

    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($user->fresh());
    }
}
