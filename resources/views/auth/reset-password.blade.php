<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-4">
        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
            <i class="bi bi-shield-check fs-3"></i>
        </div>
        <div>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 text-uppercase mb-2 d-inline-block fw-semibold small">
                {{ __('Choose a new password') }}
            </span>
        </div>
        <h1 class="h3 fw-bold text-dark mb-2">{{ __('Finish your reset') }}</h1>
        <p class="text-secondary small mb-0">
            {{ __('Set a fresh password, then head back into your profile and applications.') }}
        </p>
    </div>

    <!-- Reset Password Form -->
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small uppercase" for="email">{{ __('Email address') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                <input class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="{{ __('name@example.com') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small uppercase" for="password">{{ __('New password') }}</label>
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
        <button class="btn btn-primary w-100 fw-semibold py-2.5 shadow-sm d-flex align-items-center justify-content-center gap-2" type="submit">
            <i class="bi bi-arrow-right-circle"></i>
            <span>{{ __('Reset password') }}</span>
        </button>
    </form>
</x-guest-layout>