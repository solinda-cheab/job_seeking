<section class="profile-form">
    <div class="section-kicker">{{ __('Security') }}</div>
    <h3 class="mt-2 mb-2 fw-bold">{{ __('Update your password') }}</h3>
    <p class="muted-copy mb-4">{{ __('Use a strong password that is unique to this portal.') }}</p>

    @if (session('status') === 'password-updated')
        <div class="alert alert-success">{{ __('Password updated successfully.') }}</div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label class="form-label fw-semibold" for="update_password_current_password">{{ __('Current password') }}</label>
            <input class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="update_password_current_password" name="current_password" type="password" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold" for="update_password_password">{{ __('New password') }}</label>
            <input class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="update_password_password" name="password" type="password" autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold" for="update_password_password_confirmation">{{ __('Confirm password') }}</label>
            <input class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">{{ __('Save password') }}</button>
    </form>
</section>
