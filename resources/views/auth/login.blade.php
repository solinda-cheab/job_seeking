<x-guest-layout>
    <span class="eyebrow-badge mb-3">{{ __('Welcome back') }}</span>
    <h1 class="auth-card-title">{{ __('Sign in to your account') }}</h1>
    <p class="auth-copy mb-4">{{ __('Track applications, manage your profile, and continue exploring the right roles.') }}</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold" for="email">{{ __('Email') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="password">{{ __('Password') }}</label>
            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div class="form-check">
                <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
            @endif
        </div>

        <button class="btn btn-primary w-100" type="submit">{{ __('Sign in') }}</button>
    </form>

    <div class="auth-links">
        <span class="text-muted">{{ __('Need an account?') }}</span>
        <a href="{{ route('register') }}">{{ __('Create one now') }}</a>
    </div>
</x-guest-layout>
