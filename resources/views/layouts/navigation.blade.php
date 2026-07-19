<nav class="navbar navbar-expand-lg app-navbar sticky-top">
    <div class="container py-2">
        @include('layouts.partials.brand', ['href' => route('resume.edit')])

        <button class="border-0 shadow-none navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appNavbar" aria-controls="appNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="appNavbar">
            <ul class="mb-3 navbar-nav me-auto mb-lg-0 gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}" href="{{ route('jobs.index') }}">{{ __('Explore Jobs') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('companies.index') ? 'active' : '' }}" href="{{ route('companies.index') }}">{{ __('Companies') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('resources.index') ? 'active' : '' }}" href="{{ route('resources.index') }}">{{ __('Resources') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('resume.*') ? 'active' : '' }}" href="{{ route('resume.edit') }}">{{ __('CV Builder') }}</a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">{{ __('Admin') }}</a>
                    </li>
                @endif
            </ul>

            <div class="gap-2 d-flex flex-column flex-lg-row align-items-lg-center gap-lg-3">
                @include('layouts.partials.language-switcher')

                <form method="POST" action="{{ route('profile.theme') }}">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="theme_preference" value="{{ Auth::user()->theme_preference === 'dark' ? 'light' : 'dark' }}">
                    <button type="submit" class="btn btn-outline-primary btn-sm btn-icon" aria-label="{{ Auth::user()->theme_preference === 'dark' ? __('Switch to light mode') : __('Switch to dark mode') }}">
                        <i class="bi {{ Auth::user()->theme_preference === 'dark' ? 'bi-sun' : 'bi-moon-stars' }}"></i>
                        <span class="visually-hidden">{{ Auth::user()->theme_preference === 'dark' ? __('Light mode') : __('Dark mode') }}</span>
                    </button>
                </form>

                <a class="btn btn-outline-primary btn-sm btn-icon" href="{{ route('home') }}" aria-label="{{ __('Visit public site') }}">
                    <i class="bi bi-globe"></i>
                    <span class="visually-hidden">{{ __('Public Site') }}</span>
                </a>

                <div class="user-chip">
                    <span class="user-chip__avatar" aria-hidden="true">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <div>
                        <strong>{{ Auth::user()->name }}</strong>
                        <span>{{ __(ucfirst(Auth::user()->role)) }} / {{ __(Auth::user()->preferred_language) }}</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm btn-icon" aria-label="{{ __('Log out') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="visually-hidden">{{ __('Log out') }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
