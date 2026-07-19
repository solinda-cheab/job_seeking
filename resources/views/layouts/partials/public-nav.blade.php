<nav class="navbar navbar-expand-lg public-navbar sticky-top">
    <div class="container py-2">
        @include('layouts.partials.brand', ['href' => route('home')])

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar" aria-controls="publicNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="publicNavbar">
            <ul class="navbar-nav mx-auto mb-3 mb-lg-0 gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('jobs.index') ? 'active' : '' }}" href="{{ route('jobs.index') }}">{{ __('Jobs') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('companies.index') ? 'active' : '' }}" href="{{ route('companies.index') }}">{{ __('Companies') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('resources.index') ? 'active' : '' }}" href="{{ route('resources.index') }}">{{ __('Resources') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ __('About') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">{{ __('Contact') }}</a>
                </li>
            </ul>

            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2">
                @include('layouts.partials.language-switcher')

                @auth
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('resume.edit') }}">{{ __('CV Builder') }}</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-circle me-1"></i>{{ __('My Profile') }}
                    </a>
                @else
                    <a class="btn btn-link nav-action-link btn-sm" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('register') }}">{{ __('Create account') }}</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
