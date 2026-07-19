<section class="profile-form">
    <div class="section-kicker">{{ __('Danger zone') }}</div>
    <h3 class="mt-2 mb-2 fw-bold">{{ __('Delete account') }}</h3>
    <p class="muted-copy mb-4">{{ __('Deleting your account removes your profile and stored data permanently. Make sure you truly want to continue.') }}</p>

    <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Delete account') }}
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h2 class="modal-title fs-4 fw-bold" id="confirmUserDeletionLabel">{{ __('Delete your account?') }}</h2>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                </div>
                <div class="modal-body">
                    <p class="muted-copy mb-4">
                        {{ __('This action is permanent. Enter your password to confirm that you want to delete your account.') }}
                    </p>

                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="mb-4">
                            <label class="form-label fw-semibold" for="delete_account_password">{{ __('Password') }}</label>
                            <input class="form-control @error('password', 'userDeletion') is-invalid @enderror" id="delete_account_password" name="password" type="password" placeholder="{{ __('Enter your password') }}">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Delete account') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@if ($errors->userDeletion->isNotEmpty())
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deletionModal = document.getElementById('confirmUserDeletionModal');

                if (deletionModal) {
                    bootstrap.Modal.getOrCreateInstance(deletionModal).show();
                }
            });
        </script>
    @endpush
@endif
