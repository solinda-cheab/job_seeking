@extends('layouts.marketing')

@section('page_title', __('Employer Directory'))
@section('page_description', __('Meet the top hiring teams and companies listing active opportunities on our portal.'))

@php
    $companies = [
        ['name' => 'Northstar Labs', 'roles' => '18 open roles', 'focus' => 'SaaS Engineering', 'location' => 'Remote-first', 'copy' => __('A product engineering team focused on dependable infrastructure and steady mentorship.'), 'tags' => ['Laravel', 'Platform', 'Async team']],
        ['name' => 'Bright Studio', 'roles' => '9 open roles', 'focus' => 'Product Design', 'location' => 'Singapore', 'copy' => __('Design-led company shipping thoughtful digital experiences across mobile and web.'), 'tags' => ['Design System', 'Research', 'Product']],
        ['name' => 'Blue Orbit', 'roles' => '14 open roles', 'focus' => 'Growth Marketing', 'location' => 'Bangkok', 'copy' => __('A performance-minded team balancing experimentation with strong brand clarity.'), 'tags' => ['Growth', 'CRM', 'Lifecycle']],
        ['name' => 'Scale Works', 'roles' => '11 open roles', 'focus' => 'Customer Success', 'location' => 'Phnom Penh', 'copy' => __('Customer education, onboarding, and renewal programs built around strong relationships.'), 'tags' => ['Success', 'Onboarding', 'Accounts']],
        ['name' => 'FutureGrid', 'roles' => '7 open roles', 'focus' => 'Analytics', 'location' => 'Remote', 'copy' => __('Data-informed product and operations team with a calm, highly collaborative culture.'), 'tags' => ['SQL', 'BI', 'Forecasting']],
        ['name' => 'LaunchPeak', 'roles' => '12 open roles', 'focus' => 'Talent Acquisition', 'location' => 'Bangkok', 'copy' => __('Recruiting specialists helping modern teams scale thoughtfully and communicate well.'), 'tags' => ['Sourcing', 'Hiring Ops', 'Employer Brand']],
    ];
@endphp

@section('content')
    {{-- Hero Section --}}
    <section class="py-5 bg-body-tertiary border-bottom">
        <div class="container py-lg-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-bold text-uppercase mb-3">
                        <i class="bi bi-building-fill me-1"></i> {{ __('Employer Directory') }}
                    </span>
                    <h1 class="display-5 fw-bold text-dark lh-sm mb-3">
                        {{ __('Companies that care about clear roles, good process, and solid candidate experience.') }}
                    </h1>
                    <p class="lead text-secondary mb-0">
                        {{ __('Browse hiring teams with a polished presentation and faster pathways into meaningful career conversations.') }}
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-body">
                        <div class="row g-3 text-center">
                            <div class="col-6 border-end border-bottom pb-3">
                                <span class="d-block display-6 fw-bold text-primary">380+</span>
                                <span class="small text-secondary fw-semibold">{{ __('Trusted Employers') }}</span>
                            </div>
                            <div class="col-6 border-bottom pb-3">
                                <span class="d-block display-6 fw-bold text-primary">74%</span>
                                <span class="small text-secondary fw-semibold">{{ __('Mid-size Growth Teams') }}</span>
                            </div>
                            <div class="col-6 pt-2">
                                <span class="d-block display-6 fw-bold text-primary">48</span>
                                <span class="small text-secondary fw-semibold">{{ __('New This Quarter') }}</span>
                            </div>
                            <div class="col-6 border-start pt-2">
                                <span class="d-block display-6 fw-bold text-primary">4.8<small class="fs-6 text-muted">/5</small></span>
                                <span class="small text-secondary fw-semibold">{{ __('Candidate Rating') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Employer Grid Section --}}
    <section class="py-5">
        <div class="container py-lg-3">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-end gap-3 mb-4">
                <div>
                    <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('Featured Employers') }}</span>
                    <h2 class="h3 fw-bold text-dark mb-1">{{ __('A cleaner place for company stories and open roles.') }}</h2>
                    <p class="text-secondary mb-0">{{ __('Each employer card below links directly into live job opportunities.') }}</p>
                </div>
                <a class="btn btn-outline-primary px-4 shadow-sm" href="{{ route('jobs.index') }}">
                    <i class="bi bi-briefcase me-1"></i> {{ __('View All Open Jobs') }}
                </a>
            </div>

            <div class="row g-4">
                @foreach ($companies as $company)
                    <div class="col-lg-6">
                        <a class="card h-100 border-0 shadow-sm rounded-4 p-4 text-decoration-none transition-hover group" 
                           id="{{ \Illuminate\Support\Str::slug($company['name']) }}" 
                           href="{{ route('jobs.index', ['keyword' => $company['name']]) }}">
                            <div class="card-body p-0 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-3 fw-bold fs-5" style="width: 48px; height: 48px;">
                                                {{ strtoupper(substr($company['name'], 0, 2)) }}
                                            </div>
                                            <div>
                                                <h3 class="h5 fw-bold text-dark mb-0 group-hover-primary">{{ $company['name'] }}</h3>
                                                <small class="text-secondary">
                                                    <i class="bi bi-tag me-1"></i>{{ $company['focus'] }} &bull; <i class="bi bi-geo-alt me-1"></i>{{ $company['location'] }}
                                                </small>
                                            </div>
                                        </div>
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2 fw-semibold">
                                            {{ $company['roles'] }}
                                        </span>
                                    </div>
                                    <p class="text-secondary mb-3">{{ $company['copy'] }}</p>
                                </div>

                                <div class="d-flex flex-wrap gap-2 pt-2 border-top">
                                    @foreach ($company['tags'] as $tag)
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis fw-normal rounded-2 px-2.5 py-1.5">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Value Proposition Cards --}}
    <section class="py-5 bg-body-tertiary border-top">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-body">
                        <div class="card-body p-0">
                            <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('For Employers') }}</span>
                            <h4 class="fw-bold text-dark mb-2">{{ __('Professional Presentation') }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ __('Brand and role pages feel polished enough for ambitious teams without becoming overly marketing-heavy.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-body">
                        <div class="card-body p-0">
                            <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('For Candidates') }}</span>
                            <h4 class="fw-bold text-dark mb-2">{{ __('Less Guesswork') }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ __('Role cards stay information-rich so candidates can understand culture and fit before spending time applying.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 bg-body">
                        <div class="card-body p-0">
                            <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('For Teams') }}</span>
                            <h4 class="fw-bold text-dark mb-2">{{ __('Better Momentum') }}</h4>
                            <p class="text-secondary small mb-0">
                                {{ __('The platform keeps navigation intuitive and calls to action clear, helping talent move smoothly through the pipeline.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Call To Action Footer Strip --}}
    <section class="py-5">
        <div class="container">
            <div class="card border-0 bg-dark text-white rounded-4 shadow p-4 p-md-5 text-center">
                <div class="max-w-2xl mx-auto py-2">
                    <h2 class="display-6 fw-bold mb-3">{{ __('Are you hiring for your team?') }}</h2>
                    <p class="text-light-emphasis mb-4">{{ __('Showcase your company culture, post open roles, and connect with top talent in your field.') }}</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a class="btn btn-primary px-4 py-2" href="{{ route('register') }}">{{ __('Post a Job') }}</a>
                        <a class="btn btn-outline-light px-4 py-2" href="{{ route('contact') }}">{{ __('Talk to Sales') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection