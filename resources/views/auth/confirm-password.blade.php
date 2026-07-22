<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-4">
        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
            <i class="bi bi-shield-lock fs-3"></i>
        </div>
        <div>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 text-uppercase mb-2 d-inline-block fw-semibold small">
                {{ __('Secure confirmation') }}
            </span>
        </div>
        <h1 class="h3 fw-bold text-dark mb-2">{{ __('Confirm your password') }}</h1>
        <p class="text-secondary small mb-0">
            {{ __('This protected action needs one more password check before we continue.') }}
        </p>
    </div>

    <!-- Password Confirmation Form -->
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-4">
            <label class="form-label fw-semibold text-secondary small uppercase" for="password">{{ __('Password') }}</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                <input class="form-control bg-light border-start-0 @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="••••••••" required autofocus autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button class="btn btn-primary w-100 fw-semibold py-2.5 shadow-sm d-flex align-items-center justify-content-center gap-2" type="submit">
            <i class="bi bi-check-lg"></i>
            <span>{{ __('Confirm password') }}</span>
        </button>
    </form>
</x-guest-layout>