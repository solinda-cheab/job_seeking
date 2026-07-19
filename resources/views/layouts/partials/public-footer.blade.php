<footer class="site-footer">
    <div class="container py-5">
        <div class="row gy-4 align-items-start">
            <div class="col-lg-4">
                @include('layouts.partials.brand', ['href' => route('home')])
                <p class="footer-copy mb-4">
                    {{ __('Friendly hiring tools for ambitious teams and better career paths for modern candidates.') }}
                </p>
                <div class="d-flex flex-wrap gap-3 footer-socials">
                    <a href="{{ route('contact') }}">{{ __('Support') }}</a>
                    <a href="{{ route('about') }}">{{ __('Our story') }}</a>
                    <a href="{{ route('resources.index') }}">{{ __('Career resources') }}</a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h6 class="footer-heading">{{ __('Explore') }}</h6>
                <ul class="list-unstyled footer-links mb-0">
                    <li><a href="{{ route('jobs.index') }}">{{ __('Browse jobs') }}</a></li>
                    <li><a href="{{ route('companies.index') }}">{{ __('Top companies') }}</a></li>
                    <li><a href="{{ route('resources.index') }}">{{ __('Guides') }}</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <h6 class="footer-heading">{{ __('Account') }}</h6>
                <ul class="list-unstyled footer-links mb-0">
                    @auth
                        <li><a href="{{ route('resume.edit') }}">{{ __('CV Builder') }}</a></li>
                        <li><a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                    @else
                        <li><a href="{{ route('login') }}">{{ __('Sign in') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endauth
                    <li><a href="{{ route('contact') }}">{{ __('Contact us') }}</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h6 class="footer-heading">{{ __('Talk to us') }}</h6>
                <ul class="list-unstyled footer-links mb-0">
                    <li><a href="mailto:hello@jobportal.local">hello@jobportal.local</a></li>
                    <li><a href="tel:+18005551234">+1 (800) 555-1234</a></li>
                    <li><a href="https://maps.google.com/?q=Downtown+Business+District" target="_blank" rel="noreferrer">{{ __('Downtown Business District') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom mt-4 pt-4">
            <span>&copy; {{ now()->year }} {{ config('app.name') === 'Laravel' ? 'JobPortal' : config('app.name') }}. {{ __('Built for confident hiring and calmer job search journeys.') }}</span>
        </div>
    </div>
</footer>
