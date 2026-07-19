<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <p class="mb-2 text-uppercase fw-bold">{{ __('Account settings') }}</p>
                <h2 class="mb-1">{{ __('Profile, preferences, and workspace details') }}</h2>
                <p class="mb-0">{{ __('Keep your identity, theme mode, language preference, and career setup sharp and current.') }}</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-warning" href="{{ route('resume.edit') }}">{{ __('Open CV builder') }}</a>
                <a class="btn btn-outline-light" href="{{ route('jobs.index') }}">{{ __('Explore jobs') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="row profile-grid">
        <div class="col-lg-8">
            <div class="app-panel mb-4">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="app-panel">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="col-lg-4">
            <div class="app-panel mb-4">
                <div class="profile-summary-icon" aria-hidden="true">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="section-kicker">{{ __('Workspace summary') }}</div>
                <h3 class="mt-2 mb-3 fw-bold">{{ __('Current setup') }}</h3>
                <div class="info-list">
                    <div>
                        <span class="info-list__label">{{ __('Theme mode') }}</span>
                        <strong>{{ __(ucfirst($user->theme_preference)) }}</strong>
                    </div>
                    <div>
                        <span class="info-list__label">{{ __('Preferred language') }}</span>
                        <strong>{{ __($user->preferred_language) }}</strong>
                    </div>
                    <div>
                        <span class="info-list__label">{{ __('Account role') }}</span>
                        <strong>{{ __(ucfirst($user->role)) }}</strong>
                    </div>
                    <div>
                        <span class="info-list__label">{{ __('CV builder') }}</span>
                        <strong>{{ $user->resume ? __('Started') : __('Ready to start') }}</strong>
                    </div>
                </div>
            </div>

            <div class="app-panel">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
