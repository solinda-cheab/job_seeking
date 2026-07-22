<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-4">
        <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 56px; height: 56px;">
            <i class="bi bi-envelope-check fs-3"></i>
        </div>
        <div>
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1 text-uppercase mb-2 d-inline-block fw-semibold small">
                {{ __('Verify your email') }}
            </span>
        </div>
        <h1 class="h3 fw-bold text-dark mb-2">{{ __('Confirm your inbox') }}</h1>
        <p class="text-secondary small mb-0">
            {{ __('Before you continue, click the verification link sent to your email address. If it never arrived, you can resend it below.') }}
        </p>
    </div>

    <!-- Status Alert -->
    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success bg-success-subtle border-success-subtle text-success small rounded-3 d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill flex-shrink-0 fs-5"></i>
            <div>
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        </div>
    @endif

    <!-- Actions -->
    <div class="d-grid gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="btn btn-primary w-100 fw-semibold py-2.5 shadow-sm d-flex align-items-center justify-content-center gap-2" type="submit">
                <i class="bi bi-arrow-repeat"></i>
                <span>{{ __('Resend verification email') }}</span>
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-secondary border-0 w-100 fw-semibold py-2 text-muted d-flex align-items-center justify-content-center gap-2" type="submit">
                <i class="bi bi-box-arrow-right"></i>
                <span>{{ __('Log out') }}</span>
            </button>
        </form>
    </div>
</x-guest-layout>