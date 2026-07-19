<section class="profile-form">
    <div class="section-kicker">{{ __('Profile information') }}</div>
    <h3 class="mt-2 mb-2 fw-bold">{{ __('Shape a cleaner professional identity') }}</h3>
    <p class="muted-copy mb-4">{{ __('Update your contact details, account role, preferred language, and light or dark workspace mode.') }}</p>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">{{ __('Profile details saved successfully.') }}</div>
    @endif

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold" for="name">{{ __('Full name') }}</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold" for="headline">{{ __('Headline') }}</label>
                <input class="form-control @error('headline') is-invalid @enderror" id="headline" name="headline" type="text" value="{{ old('headline', $user->headline) }}" autocomplete="organization-title" placeholder="{{ __('Junior Laravel Developer') }}">
                @error('headline')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label class="form-label fw-semibold" for="email">{{ __('Email') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold" for="phone">{{ __('Phone') }}</label>
                <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" value="{{ old('phone', $user->phone) }}" autocomplete="tel">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold" for="location">{{ __('Location') }}</label>
                <input class="form-control @error('location') is-invalid @enderror" id="location" name="location" type="text" value="{{ old('location', $user->location) }}" autocomplete="address-level2" placeholder="{{ __('Phnom Penh') }}">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col-md-6">
                <label class="form-label fw-semibold" for="role">{{ __('Account role') }}</label>
                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                    @foreach (['user' => 'User', 'employee' => 'Employee', 'admin' => 'Admin'] as $value => $label)
                        <option value="{{ $value }}" @selected(old('role', $user->role) === $value)>{{ __($label) }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold" for="preferred_language">{{ __('Preferred language') }}</label>
                <select class="form-select @error('preferred_language') is-invalid @enderror" id="preferred_language" name="preferred_language">
                    @foreach (array_values(config('app.supported_locales', [])) as $language)
                        <option value="{{ $language }}" @selected(old('preferred_language', $user->preferred_language) === $language)>{{ __($language) }}</option>
                    @endforeach
                </select>
                @error('preferred_language')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-4">
            <label class="form-label fw-semibold d-block">{{ __('Workspace theme') }}</label>
            <div class="appearance-grid">
                @foreach (['light' => 'Light mode', 'dark' => 'Dark mode'] as $value => $label)
                    <label class="appearance-card">
                        <input class="form-check-input visually-hidden" type="radio" name="theme_preference" value="{{ $value }}" @checked(old('theme_preference', $user->theme_preference) === $value)>
                        <span class="appearance-card__inner">
                            <strong>{{ __($label) }}</strong>
                            <span>{{ $value === 'light' ? __('Bright, airy workspace surfaces.') : __('Deeper contrast for long sessions.') }}</span>
                        </span>
                    </label>
                @endforeach
            </div>
            @error('theme_preference')
                <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <strong>{{ __('Your email address is not verified yet.') }}</strong>
                    <div class="small mt-1">{{ __('Resend the verification email to keep your account fully active.') }}</div>
                </div>
                <button class="btn btn-outline-primary btn-sm" form="send-verification" type="submit">{{ __('Resend verification') }}</button>
            </div>

            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success">{{ __('A new verification link has been sent to your email address.') }}</div>
            @endif
        @endif

        <div class="d-flex flex-wrap gap-2 mt-4">
            <button class="btn btn-primary" type="submit">{{ __('Save changes') }}</button>
            <a class="btn btn-outline-primary" href="{{ route('resume.edit') }}">{{ __('Open CV builder') }}</a>
        </div>
    </form>
</section>
