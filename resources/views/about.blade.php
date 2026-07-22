@extends('layouts.marketing')

@section('page_title', __('About Us'))
@section('page_description', __('Learn about our job portal experience, product philosophy, and modern design direction.'))

@section('content')
    {{-- Hero Section --}}
    <section class="py-5 bg-body-tertiary border-bottom">
        <div class="container py-lg-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-bold text-uppercase mb-3">
                        <i class="bi bi-info-circle-fill me-1"></i> {{ __('About the platform') }}
                    </span>
                    <h1 class="display-5 fw-bold text-dark lh-sm mb-3">
                        {{ __('A job portal with a professional tone and a warmer user experience.') }}
                    </h1>
                    <p class="lead text-secondary mb-4">
                        {{ __('Our design direction is inspired by modern hiring platforms while remaining practical, Bootstrap-based, and effortless to navigate for candidates and recruiters alike.') }}
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a class="btn btn-primary btn-lg px-4 shadow-sm" href="{{ route('jobs.index') }}">
                            <i class="bi bi-briefcase me-1"></i> {{ __('Explore Openings') }}
                        </a>
                        <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('contact') }}">
                            {{ __('Talk to Our Team') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <img class="img-fluid object-fit-cover" style="min-height: 320px;" src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1200&q=80" alt="Team discussing product roadmap">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Core Pillars / Value Proposition Grid --}}
    <section class="py-5">
        <div class="container py-lg-3">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 transition-hover">
                        <div class="card-body p-0">
                            <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('Purpose') }}</span>
                            <h4 class="fw-bold text-dark mb-2">{{ __('Clear Pathways') }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ __('Candidates should immediately understand where to click, what value they gain, and what next step to take in their search.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 transition-hover">
                        <div class="card-body p-0">
                            <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('Personality') }}</span>
                            <h4 class="fw-bold text-dark mb-2">{{ __('Friendly Confidence') }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ __('The interface feels warm and approachable without losing executive credibility for hiring managers and recruiters.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 transition-hover">
                        <div class="card-body p-0">
                            <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('System') }}</span>
                            <h4 class="fw-bold text-dark mb-2">{{ __('Bootstrap Foundation') }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ __('Dependable layout structures, responsive grids, and standard spacing keep the application performant and maintainable.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Dark Feature Band --}}
    <section class="py-5 bg-body-tertiary">
        <div class="container py-lg-3">
            <div class="card border-0 bg-dark text-white rounded-4 overflow-hidden shadow-lg p-4 p-md-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <span class="badge bg-primary text-white mb-3 px-3 py-2">{{ __('Product Philosophy') }}</span>
                        <h2 class="display-6 fw-bold mb-3">{{ __('Why this direction works for a job portal.') }}</h2>
                        <p class="text-light-emphasis mb-0">
                            {{ __('Modern hiring platforms demand context density, clarity, and trust. Our interface balances all three so candidates and recruiters never encounter dead ends.') }}
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-outline-light p-4 rounded-4 border border-secondary border-opacity-50 bg-body-dark">
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
                                <li class="d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0"></i>
                                    <div>
                                        <strong class="d-block text-white">{{ __('Seamless Navigation') }}</strong>
                                        <small class="text-light-emphasis">{{ __('Connected flows between public discovery pages and candidate profile portals.') }}</small>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0"></i>
                                    <div>
                                        <strong class="d-block text-white">{{ __('Visual Hierarchy') }}</strong>
                                        <small class="text-light-emphasis">{{ __('Crisp typography paired with inviting accents to highlight key salary and location data.') }}</small>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0"></i>
                                    <div>
                                        <strong class="d-block text-white">{{ __('Practical Utility') }}</strong>
                                        <small class="text-light-emphasis">{{ __('Structured job metadata designed to provide key answers before clicking apply.') }}</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Call To Action Footer Strip --}}
    <section class="py-5" id="cta">
        <div class="container">
            <div class="card border-0 bg-primary text-white rounded-4 shadow p-4 p-md-5 text-center">
                <div class="max-w-2xl mx-auto">
                    <h2 class="display-6 fw-bold mb-3">{{ __('Ready to discover your next opportunity?') }}</h2>
                    <p class="text-white-50 mb-4">{{ __('Join hundreds of growing teams and thousands of qualified professionals hiring today.') }}</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a class="btn btn-light text-primary fw-semibold px-4 py-2" href="{{ route('jobs.index') }}">{{ __('Browse Jobs') }}</a>
                        <a class="btn btn-outline-light px-4 py-2" href="{{ route('register') }}">{{ __('Create Account') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection