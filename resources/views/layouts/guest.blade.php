<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="guest-body">
        @include('layouts.partials.public-nav')

        <main class="auth-shell">
            <div class="container">
                <div class="auth-stage row g-0 overflow-hidden">
                    <div class="col-lg-6 d-none d-lg-flex">
                        <div class="auth-showcase">
                            <span class="eyebrow-badge">{{ __('Smart hiring platform') }}</span>
                            <h1>{{ __('Build your next career move with clarity.') }}</h1>
                            <p>
                                {{ __('Track opportunities, shape a strong profile, and stay close to employers that care about skill, culture, and momentum.') }}
                            </p>

                            <div class="auth-benefits">
                                <div class="auth-benefit">
                                    <i class="bi bi-check2-circle"></i>
                                    <span>{{ __('Curated openings with clean application flows') }}</span>
                                </div>
                                <div class="auth-benefit">
                                    <i class="bi bi-briefcase"></i>
                                    <span>{{ __('Employer-ready profiles and faster follow-up') }}</span>
                                </div>
                                <div class="auth-benefit">
                                    <i class="bi bi-graph-up-arrow"></i>
                                    <span>{{ __('Helpful tools for growth, interviews, and visibility') }}</span>
                                </div>
                            </div>

                            <div class="showcase-stats">
                                <div>
                                    <strong>4.2k+</strong>
                                    <span>{{ __('live opportunities') }}</span>
                                </div>
                                <div>
                                    <strong>380</strong>
                                    <span>{{ __('trusted employers') }}</span>
                                </div>
                                <div>
                                    <strong>92%</strong>
                                    <span>{{ __('candidate satisfaction') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="auth-panel">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
