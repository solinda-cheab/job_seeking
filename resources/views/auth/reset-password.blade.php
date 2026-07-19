<x-guest-layout>
    <span class="eyebrow-badge mb-3">{{ __('Choose a new password') }}</span>
    <h1 class="auth-card-title">{{ __('Finish your reset') }}</h1>
    <p class="auth-copy mb-4">{{ __('Set a fresh password, then head back into your profile and applications.') }}</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label class="form-label fw-semibold" for="email">{{ __('Email') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="password">{{ __('New password') }}</label>
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

        <button class="btn btn-primary w-100" type="submit">{{ __('Reset password') }}</button>
    </form>
</x-guest-layout>
