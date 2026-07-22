<footer class="bg-dark text-slate-300 pt-5 pb-4 position-relative border-top border-secondary border-opacity-25" style="background-color: #0f172a !important;">
    <div class="container">
        <div class="row gy-4 gx-lg-5 align-items-start">
            
            <!-- Brand & Tagline Column -->
            <div class="col-lg-4">
                <div class="mb-3">
                    @include('layouts.partials.brand', ['href' => route('home')])
                </div>
                <p class="text-secondary small mb-4 leading-relaxed" style="max-width: 320px;">
                    {{ __('Friendly hiring tools for ambitious teams and better career paths for modern candidates.') }}
                </p>
                <div class="d-flex flex-wrap gap-3 small">
                    <a class="text-secondary text-decoration-none hover-white transition" href="{{ route('contact') }}">{{ __('Support') }}</a>
                    <span class="text-secondary opacity-50">&bull;</span>
                    <a class="text-secondary text-decoration-none hover-white transition" href="{{ route('about') }}">{{ __('Our story') }}</a>
                    <span class="text-secondary opacity-50">&bull;</span>
                    <a class="text-secondary text-decoration-none hover-white transition" href="{{ route('resources.index') }}">{{ __('Career resources') }}</a>
                </div>
            </div>

            <!-- Explore Links -->
            <div class="col-6 col-lg-2">
                <h6 class="text-uppercase fw-bold text-white small tracking-wider mb-3">{{ __('Explore') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0 small">
                    <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('jobs.index') }}">{{ __('Browse jobs') }}</a></li>
                    <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('companies.index') }}">{{ __('Top companies') }}</a></li>
                    <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('resources.index') }}">{{ __('Guides') }}</a></li>
                </ul>
            </div>

            <!-- Account Links -->
            <div class="col-6 col-lg-2">
                <h6 class="text-uppercase fw-bold text-white small tracking-wider mb-3">{{ __('Account') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0 small">
                    @auth
                        <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('resume.edit') }}">{{ __('CV Builder') }}</a></li>
                        <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                    @else
                        <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('login') }}">{{ __('Sign in') }}</a></li>
                        <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endauth
                    <li><a class="text-secondary text-decoration-none hover-primary transition" href="{{ route('contact') }}">{{ __('Contact us') }}</a></li>
                </ul>
            </div>

            <!-- Contact / Reach Out -->
            <div class="col-lg-4">
                <h6 class="text-uppercase fw-bold text-white small tracking-wider mb-3">{{ __('Talk to us') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-2.5 mb-0 small">
                    <li>
                        <a class="text-secondary text-decoration-none d-flex align-items-center gap-2 hover-white transition" href="mailto:hello@jobportal.local">
                            <i class="bi bi-envelope text-primary"></i>
                            <span>hello@jobportal.local</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-secondary text-decoration-none d-flex align-items-center gap-2 hover-white transition" href="tel:+18005551234">
                            <i class="bi bi-telephone text-primary"></i>
                            <span>+1 (800) 555-1234</span>
                        </a>
                    </li>
                    <li>
                        <a class="text-secondary text-decoration-none d-flex align-items-center gap-2 hover-white transition" href="https://maps.google.com/?q=Downtown+Business+District" target="_blank" rel="noreferrer">
                            <i class="bi bi-geo-alt text-primary"></i>
                            <span>{{ __('Downtown Business District') }}</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom Copyright Row -->
        <div class="mt-5 pt-4 border-top border-secondary border-opacity-25 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 text-secondary small">
            <div>
                &copy; {{ now()->year }} <strong class="text-white">{{ config('app.name') === 'Laravel' ? 'JobPortal' : config('app.name') }}</strong>. {{ __('Built for confident hiring and calmer job search journeys.') }}
            </div>
        </div>
    </div>
</footer>