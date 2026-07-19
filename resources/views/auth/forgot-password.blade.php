<x-guest-layout>
    <span class="eyebrow-badge mb-3">{{ __('Password help') }}</span>
    <h1 class="auth-card-title">{{ __('Reset your password') }}</h1>
    <p class="auth-copy mb-4">{{ __('Enter your email address and we will send a reset link so you can get back in quickly.') }}</p>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label class="form-label fw-semibold" for="email">{{ __('Email') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100" type="submit">{{ __('Email reset link') }}</button>
    </form>

    <div class="auth-links">
        <span class="text-muted">{{ __('Remembered it?') }}</span>
        <a href="{{ route('login') }}">{{ __('Back to sign in') }}</a>
    </div>
</x-guest-layout>
