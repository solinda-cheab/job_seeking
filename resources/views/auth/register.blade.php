<x-guest-layout>
    <span class="eyebrow-badge mb-3">{{ __('Create your profile') }}</span>
    <h1 class="auth-card-title">{{ __('Join the portal') }}</h1>
    <p class="auth-copy mb-4">{{ __('Set up a clean candidate profile and start applying through a friendlier hiring flow.') }}</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold" for="name">{{ __('Full name') }}</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="email">{{ __('Email') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="password">{{ __('Password') }}</label>
            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" for="password_confirmation">{{ __('Confirm password') }}</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100" type="submit">{{ __('Create account') }}</button>
    </form>

    <div class="auth-links">
        <span class="text-muted">{{ __('Already registered?') }}</span>
        <a href="{{ route('login') }}">{{ __('Sign in') }}</a>
    </div>
</x-guest-layout>
