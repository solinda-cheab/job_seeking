<form class="dropdown language-switcher" method="POST" action="{{ route('language.update') }}">
    @csrf

    <button
        class="btn btn-outline-primary btn-sm dropdown-toggle btn-icon"
        type="button"
        id="languageSwitcher"
        data-bs-toggle="dropdown"
        aria-expanded="false"
        aria-label="{{ __('Select language') }}"
    >
        <i class="bi bi-translate"></i>
        <span class="visually-hidden">{{ __('Language') }}</span>
    </button>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageSwitcher">
        @foreach (config('app.supported_locales', []) as $locale => $language)
            <li>
                <button
                    class="dropdown-item {{ app()->getLocale() === $locale ? 'active' : '' }}"
                    type="submit"
                    name="locale"
                    value="{{ $locale }}"
                >
                    {{ $language }}
                </button>
            </li>
        @endforeach
    </ul>
</form>
