<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-4">
        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
            <i class="bi bi-person-plus fs-3"></i>
        </div>
        <div>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 text-uppercase mb-2 d-inline-block fw-semibold small">
                {{ __('Create your profile') }}
            </span>
        </div>
        <h1 class="h3 fw-bold text-dark mb-2">{{ __('Join the portal') }}</h1>
        <p class="text-secondary small mb-0">
            {{ __('Set up a clean candidate profile and start applying through a friendlier hiring flow.') }}
        </p>
    </div>

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Full Name -->
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small uppercase" for="name">{{ __('Full name') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-person"></i></span>
                <input class="form-control bg-light border-start-0 @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('e.g. Jane Doe') }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small uppercase" for="email">{{ __('Email address') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                <input class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('name@example.com') }}" required autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small uppercase" for="password">{{ __('Password') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                <input class="form-control bg-light border-start-0 @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="••••••••" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label class="form-label fw-semibold text-secondary small uppercase" for="password_confirmation">{{ __('Confirm password') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-shield-lock"></i></span>
                <input class="form-control bg-light border-start-0 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary w-100 fw-semibold py-2.5 shadow-sm d-flex align-items-center justify-content-center gap-2 mb-4" type="submit">
            <i class="bi bi-check-circle"></i>
            <span>{{ __('Create account') }}</span>
        </button>
    </form>

    <!-- Footer Switcher -->
    <div class="text-center pt-3 border-top border-slate-100">
        <span class="text-muted small">{{ __('Already registered?') }}</span>
        <a class="text-primary text-decoration-none fw-semibold small ms-1" href="{{ route('login') }}">{{ __('Sign in') }}</a>
    </div>
</x-guest-layout>