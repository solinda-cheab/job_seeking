<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $this->syncRoleRecord($request);
        $request->session()->put('locale', User::localeCodeForLanguage($request->user()->preferred_language));

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's appearance preference quickly.
     */
    public function updateTheme(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'theme_preference' => ['required', Rule::in(['light', 'dark'])],
        ]);

        $request->user()->forceFill($validated)->save();

        return Redirect::back()->with('status', 'appearance-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    private function syncRoleRecord(Request $request): void
    {
        $user = $request->user();

        if ($user->role === 'employee') {
            Employee::firstOrCreate(['user_id' => $user->id]);
        }

        if ($user->role === 'admin') {
            Admin::firstOrCreate(['user_id' => $user->id]);
        }
    }
}
