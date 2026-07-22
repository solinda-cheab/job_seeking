<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-4">
        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
            <i class="bi bi-box-arrow-in-right fs-3"></i>
        </div>
        <div>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 text-uppercase mb-2 d-inline-block fw-semibold small">
                {{ __('Welcome back') }}
            </span>
        </div>
        <h1 class="h3 fw-bold text-dark mb-2">{{ __('Sign in to your account') }}</h1>
        <p class="text-secondary small mb-0">
            {{ __('Track applications, manage your profile, and continue exploring the right roles.') }}
        </p>
    </div>

    <!-- Status Alert -->
    @if (session('status'))
        <div class="alert alert-success bg-success-subtle border-success-subtle text-success small rounded-3 d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill flex-shrink-0 fs-5"></i>
            <div>{{ session('status') }}</div>
        </div>
    @endif

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small uppercase" for="email">{{ __('Email address') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                <input class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('name@example.com') }}" required autofocus autocomplete="username">
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
                <input class="form-control bg-light border-start-0 @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4 small">
            <div class="form-check">
                <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                <label class="form-check-label text-secondary" for="remember_me">{{ __('Remember me') }}</label>
            </div>
            @if (Route::has('password.request'))
                <a class="text-primary text-decoration-none fw-semibold" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
            @endif
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary w-100 fw-semibold py-2.5 shadow-sm d-flex align-items-center justify-content-center gap-2 mb-4" type="submit">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>{{ __('Sign in') }}</span>
        </button>
    </form>

    <!-- Footer Switcher -->
    <div class="text-center pt-3 border-top border-slate-100">
        <span class="text-muted small">{{ __('Need an account?') }}</span>
        <a class="text-primary text-decoration-none fw-semibold small ms-1" href="{{ route('register') }}">{{ __('Create one now') }}</a>
    </div>
</x-guest-layout>