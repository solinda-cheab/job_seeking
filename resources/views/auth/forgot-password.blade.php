<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-4">
        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
            <i class="bi bi-key fs-3"></i>
        </div>
        <div>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 text-uppercase mb-2 d-inline-block fw-semibold small">
                {{ __('Password help') }}
            </span>
        </div>
        <h1 class="h3 fw-bold text-dark mb-2">{{ __('Reset your password') }}</h1>
        <p class="text-secondary small mb-0">
            {{ __('Enter your email address and we will send a reset link so you can get back in quickly.') }}
        </p>
    </div>

    <!-- Status Alert -->
    @if (session('status'))
        <div class="alert alert-success bg-success-subtle border-success-subtle text-success small rounded-3 d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill flex-shrink-0 fs-5"></i>
            <div>{{ session('status') }}</div>
        </div>
    @endif

    <!-- Forgot Password Form -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label class="form-label fw-semibold text-secondary small uppercase" for="email">{{ __('Email address') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                <input class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('name@example.com') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary w-100 fw-semibold py-2.5 shadow-sm d-flex align-items-center justify-content-center gap-2 mb-4" type="submit">
            <i class="bi bi-send"></i>
            <span>{{ __('Email reset link') }}</span>
        </button>
    </form>

    <!-- Footer Switcher -->
    <div class="text-center pt-3 border-top border-slate-100">
        <span class="text-muted small">{{ __('Remembered it?') }}</span>
        <a class="text-primary text-decoration-none fw-semibold small ms-1" href="{{ route('login') }}">{{ __('Back to sign in') }}</a>
    </div>
</x-guest-layout>