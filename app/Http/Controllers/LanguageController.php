<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    /**
     * Persist the requested locale for the current visitor.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'locale' => ['required', Rule::in(array_keys(config('app.supported_locales', [])))],
        ]);

        $locale = $validated['locale'];
        $request->session()->put('locale', $locale);

        if ($request->user()) {
            $request->user()->forceFill([
                'preferred_language' => User::languageForLocale($locale),
            ])->save();
        }

        return back();
    }
}
