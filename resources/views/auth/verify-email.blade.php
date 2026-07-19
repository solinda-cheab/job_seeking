<x-guest-layout>
    <span class="eyebrow-badge mb-3">Verify your email</span>
    <h1 class="auth-card-title">Confirm your inbox</h1>
    <p class="auth-copy mb-4">Before you continue, click the verification link sent to your email address. If it never arrived, you can resend it below.</p>

    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">
            A fresh verification link has been sent to your email address.
        </div>
    @endif

    <div class="d-grid gap-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="btn btn-primary w-100" type="submit">Resend verification email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-primary w-100" type="submit">Log out</button>
        </form>
    </div>
</x-guest-layout>
