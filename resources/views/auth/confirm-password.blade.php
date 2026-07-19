<x-guest-layout>
    <span class="eyebrow-badge mb-3">Secure confirmation</span>
    <h1 class="auth-card-title">Confirm your password</h1>
    <p class="auth-copy mb-4">This protected action needs one more password check before we continue.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
            <label class="form-label fw-semibold" for="password">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100" type="submit">Confirm password</button>
    </form>
</x-guest-layout>
