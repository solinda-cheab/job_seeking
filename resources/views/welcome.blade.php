@extends('layouts.marketing')

@section('page_title', __('Modern Job Portal'))
@section('page_description', __('Professional and friendly job portal homepage inspired by modern hiring platforms.'))

@php
    $brandName = config('app.name') === 'Laravel' ? 'JobPortal' : config('app.name');
    $profileRoute = auth()->check() ? route('profile.edit') : route('register');
    
    $categories = [
        ['icon' => 'bi bi-code-slash', 'title' => 'Engineering', 'openings' => '148 openings', 'query' => 'Engineering'],
        ['icon' => 'bi bi-palette2', 'title' => 'Design', 'openings' => '64 openings', 'query' => 'Design'],
        ['icon' => 'bi bi-megaphone', 'title' => 'Marketing', 'openings' => '71 openings', 'query' => 'Marketing'],
        ['icon' => 'bi bi-headset', 'title' => 'Customer Success', 'openings' => '39 openings', 'query' => 'Customer Success'],
    ];

    $featuredJobs = [
        ['title' => 'Senior Laravel Engineer', 'company' => 'Northstar Labs', 'location' => 'Remote', 'type' => 'Full-time', 'salary' => '$4.2k - $5.4k / month'],
        ['title' => 'Product Designer', 'company' => 'Bright Studio', 'location' => 'Singapore', 'type' => 'Hybrid', 'salary' => '$3.6k - $4.4k / month'],
        ['title' => 'Growth Marketing Lead', 'company' => 'Blue Orbit', 'location' => 'Bangkok', 'type' => 'Full-time', 'salary' => '$3.8k - $4.8k / month'],
    ];

    $insights = [
        ['icon' => 'bi bi-file-earmark-text', 'title' => 'Resume polish in 20 minutes', 'copy' => 'Structure your profile so hiring managers can scan strengths, impact, and stack fast.', 'target' => route('resources.index').'#resume'],
        ['icon' => 'bi bi-camera-video', 'title' => 'Interview prep that feels calm', 'copy' => 'Use scorecards, story prompts, and mock questions to walk in prepared.', 'target' => route('resources.index').'#interview'],
        ['icon' => 'bi bi-bar-chart-line', 'title' => 'Salary conversations with confidence', 'copy' => 'Learn how to anchor your range and explain value without sounding stiff.', 'target' => route('resources.index').'#salary'],
    ];

    $testimonials = [
        ['quote' => 'The application flow felt simple, and I had recruiter feedback within two days.', 'name' => 'Rina Sok', 'role' => 'Frontend Engineer'],
        ['quote' => 'Clean job details helped our team attract better candidates without endless screening.', 'name' => 'Marcus Lee', 'role' => 'Talent Partner'],
        ['quote' => 'I found a hybrid product role that actually matched the level and scope I wanted.', 'name' => 'Anika Tan', 'role' => 'Product Designer'],
    ];

    $companies = ['Northstar', 'Blue Orbit', 'Bright Studio', 'Scale Works', 'FutureGrid', 'LaunchPeak'];
@endphp

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section py-5 bg-body-tertiary border-bottom">
        <div class="container py-lg-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="hero-copy reveal-up">
                        <span class="badge rounded-pill bg-primary-subtle text-primary mb-3 px-3 py-2 border border-primary-subtle">
                            <i class="bi bi-stars me-1"></i> {{ __('Friendly hiring, serious results') }}
                        </span>
                        
                        <h1 class="display-5 fw-bold text-dark lh-sm mb-3">
                            {{ __('Find work that fits your talent, your timing, and your ambition.') }}
                        </h1>
                        
                        <p class="lead text-secondary mb-4">
                            {{ __(':brand brings together thoughtful employers, clean job details, and a smoother candidate journey so every click feels intentional.', ['brand' => $brandName]) }}
                        </p>

                        <div class="d-flex flex-wrap gap-2 mb-4">
                            <a class="btn btn-primary btn-lg px-4 shadow-sm" href="{{ route('jobs.index') }}">
                                <i class="bi bi-search me-1"></i> {{ __('Browse jobs') }}
                            </a>
                            <a class="btn btn-outline-secondary btn-lg px-4" href="{{ $profileRoute }}">
                                {{ __('Create profile') }}
                            </a>
                        </div>

                        <div class="d-flex flex-wrap gap-3 text-secondary small fw-medium mb-4 border-top pt-3">
                            <span><i class="bi bi-patch-check-fill text-success me-1"></i> {{ __('Verified employers') }}</span>
                            <span><i class="bi bi-lightning-charge-fill text-warning me-1"></i> {{ __('Fast application flow') }}</span>
                            <span><i class="bi bi-heart-fill text-danger me-1"></i> {{ __('Friendly experience') }}</span>
                        </div>

                        {{-- Search Filter Card --}}
                        <form class="card border-0 shadow-sm p-3 p-md-4 rounded-4 bg-body" action="{{ route('jobs.index') }}" method="GET">
                            <div class="row g-2 align-items-end">
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold text-uppercase text-muted" for="keyword">{{ __('Keyword') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                        <input class="form-control border-start-0 ps-0" id="keyword" name="keyword" type="text" placeholder="{{ __('Laravel, Designer...') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold text-uppercase text-muted" for="location">{{ __('Location') }}</label>
                                    <select class="form-select" id="location" name="location">
                                        <option value="">{{ __('Anywhere') }}</option>
                                        <option value="Remote">{{ __('Remote') }}</option>
                                        <option value="Singapore">{{ __('Singapore') }}</option>
                                        <option value="Phnom Penh">{{ __('Phnom Penh') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold text-uppercase text-muted" for="type">{{ __('Type') }}</label>
                                    <select class="form-select" id="type" name="type">
                                        <option value="">{{ __('Any type') }}</option>
                                        <option value="Full-time">{{ __('Full-time') }}</option>
                                        <option value="Hybrid">{{ __('Hybrid') }}</option>
                                        <option value="Remote">{{ __('Remote') }}</option>
                                        <option value="Contract">{{ __('Contract') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100 py-2" type="submit">
                                        <span class="d-none d-md-inline"><i class="bi bi-search"></i></span>
                                        <span class="d-md-none">{{ __('Search') }}</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="position-relative hero-visual reveal-up ms-lg-4">
                        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                            <img class="img-fluid object-fit-cover" style="min-height: 380px;" src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80" alt="Recruiters reviewing job applications">
                        </div>
                        
                        {{-- Floating Badges --}}
                        <div class="card position-absolute top-0 start-0 translate-middle-y shadow-sm border-0 rounded-3 p-3 bg-body d-none d-sm-flex flex-row align-items-center gap-3 ms-4 mt-4">
                            <div class="p-2 bg-primary-subtle text-primary rounded-circle"><i class="bi bi-briefcase fs-4"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold">1,240</h6>
                                <small class="text-muted">{{ __('active roles this week') }}</small>
                            </div>
                        </div>

                        <div class="card position-absolute bottom-0 end-0 translate-middle-y shadow-sm border-0 rounded-3 p-3 bg-body d-none d-sm-flex flex-row align-items-center gap-3 me-4 mb-2">
                            <div class="p-2 bg-success-subtle text-success rounded-circle"><i class="bi bi-clock-history fs-4"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold">36 hrs</h6>
                                <small class="text-muted">{{ __('avg. response time') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Trusted Companies Strip --}}
            <div class="mt-5 pt-4 border-top">
                <div class="row align-items-center g-3">
                    <div class="col-lg-3">
                        <h6 class="mb-0 fw-bold text-dark">Trusted by growing teams</h6>
                        <small class="text-muted">Product, engineering, and creative teams.</small>
                    </div>
                    <div class="col-lg-9">
                        <div class="d-flex flex-wrap gap-2 align-items-center justify-content-lg-end">
                            @foreach ($companies as $company)
                                <a class="btn btn-light btn-sm text-secondary rounded-pill border px-3" href="{{ route('companies.index') }}#{{ \Illuminate\Support\Str::slug($company) }}">
                                    {{ $company }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Platform Metrics Strip --}}
    <section class="py-4 bg-body border-bottom">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3 border-end border-sm-0">
                    <p class="h3 fw-bold text-primary mb-0">4.2k+</p>
                    <small class="text-muted text-uppercase fw-semibold">Monthly Apps</small>
                </div>
                <div class="col-6 col-md-3 border-end border-sm-0">
                    <p class="h3 fw-bold text-primary mb-0">380</p>
                    <small class="text-muted text-uppercase fw-semibold">Trusted Companies</small>
                </div>
                <div class="col-6 col-md-3 border-end border-sm-0">
                    <p class="h3 fw-bold text-primary mb-0">92%</p>
                    <small class="text-muted text-uppercase fw-semibold">Satisfaction Rate</small>
                </div>
                <div class="col-6 col-md-3">
                    <p class="h3 fw-bold text-primary mb-0">48</p>
                    <small class="text-muted text-uppercase fw-semibold">New Roles Daily</small>
                </div>
            </div>
        </div>
    </section>

    {{-- Popular Categories --}}
    <section class="py-5" id="categories">
        <div class="container py-lg-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
                <div>
                    <span class="text-primary text-uppercase fw-bold small">Popular Categories</span>
                    <h2 class="fw-bold mb-1">Browse by skill direction</h2>
                    <p class="text-muted mb-0">Clear pathways for candidates who know where they want to grow.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('jobs.index') }}">See all categories <i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="row g-4">
                @foreach ($categories as $category)
                    <div class="col-sm-6 col-lg-3">
                        <a class="card h-100 border-0 shadow-sm text-decoration-none transition-hover p-3 rounded-4" href="{{ route('jobs.index', ['category' => $category['query']]) }}">
                            <div class="card-body">
                                <div class="p-3 bg-primary-subtle text-primary rounded-3 d-inline-block mb-3">
                                    <i class="{{ $category['icon'] }} fs-4"></i>
                                </div>
                                <h5 class="card-title text-dark fw-bold mb-2">{{ $category['title'] }}</h5>
                                <p class="card-text text-muted small mb-0">{{ $category['openings'] }} available now.</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Featured Jobs --}}
    <section class="py-5 bg-body-tertiary" id="jobs">
        <div class="container py-lg-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
                <div>
                    <span class="text-primary text-uppercase fw-bold small">Featured Jobs</span>
                    <h2 class="fw-bold mb-1">Roles with strong teams</h2>
                    <p class="text-muted mb-0">Listings designed to give you clarity before you hit apply.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('jobs.index') }}">Find your match <i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="row g-4">
                @foreach ($featuredJobs as $job)
                    <div class="col-lg-4">
                        <a class="card h-100 border-0 shadow-sm text-decoration-none transition-hover rounded-4" href="{{ route('jobs.index', ['keyword' => $job['title']]) }}">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="bg-dark text-white fw-bold rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                        {{ strtoupper(substr($job['company'], 0, 2)) }}
                                    </div>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2">
                                        {{ $job['salary'] }}
                                    </span>
                                </div>
                                <h5 class="card-title text-dark fw-bold mb-1">{{ $job['title'] }}</h5>
                                <p class="text-muted small mb-3">{{ $job['company'] }}</p>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-body-secondary text-secondary"><i class="bi bi-geo-alt me-1"></i> {{ $job['location'] }}</span>
                                    <span class="badge bg-body-secondary text-secondary"><i class="bi bi-briefcase me-1"></i> {{ $job['type'] }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Feature Banner --}}
    <section class="py-5" id="companies">
        <div class="container py-lg-3">
            <div class="card border-0 bg-dark text-white rounded-4 overflow-hidden shadow-lg p-4 p-md-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <img class="img-fluid rounded-4 object-fit-cover shadow" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80" alt="Hiring team planning recruitment">
                    </div>
                    <div class="col-lg-6">
                        <span class="badge bg-warning text-dark mb-3 px-3 py-2">Built for both sides</span>
                        <h2 class="display-6 fw-bold mb-3">Candidates feel supported. Employers stay in motion.</h2>
                        <p class="text-light-emphasis mb-4">
                            Our intuitive workflow gives job seekers clarity while empowering recruitment teams to attract and evaluate top-tier talent effortlessly.
                        </p>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i> Searchable roles with crisp metadata and fast filtering</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i> Employer branding that feels polished without being loud</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-warning me-2"></i> Clear next-step calls to action on every primary surface</li>
                        </ul>
                        <div class="d-flex flex-wrap gap-2">
                            <a class="btn btn-warning fw-semibold px-4" href="{{ route('companies.index') }}">Meet top employers</a>
                            <a class="btn btn-outline-light px-4" href="{{ route('contact') }}">Contact our team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Career Resources --}}
    <section class="py-5 bg-body-tertiary" id="resources">
        <div class="container py-lg-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3">
                <div>
                    <span class="text-primary text-uppercase fw-bold small">Career Guidance</span>
                    <h2 class="fw-bold mb-1">Move forward with confidence</h2>
                    <p class="text-muted mb-0">Practical help for resumes, interviews, and salary conversations.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('resources.index') }}">Open resource hub <i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="row g-4">
                @foreach ($insights as $insight)
                    <div class="col-lg-4">
                        <a class="card h-100 border-0 shadow-sm text-decoration-none transition-hover rounded-4 p-3" href="{{ $insight['target'] }}">
                            <div class="card-body">
                                <div class="p-3 bg-primary-subtle text-primary rounded-3 d-inline-block mb-3">
                                    <i class="{{ $insight['icon'] }} fs-4"></i>
                                </div>
                                <h5 class="card-title text-dark fw-bold mb-2">{{ $insight['title'] }}</h5>
                                <p class="card-text text-muted small mb-0">{{ $insight['copy'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="py-5">
        <div class="container py-lg-3">
            <div class="text-center max-w-xl mx-auto mb-5">
                <span class="text-primary text-uppercase fw-bold small">Community Voice</span>
                <h2 class="fw-bold mb-2">Designed around real human experiences</h2>
                <p class="text-muted mb-0">Friendliness is at the core of our platform experience.</p>
            </div>

            <div class="row g-4">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <p class="card-text text-secondary fst-italic mb-4">"{{ $testimonial['quote'] }}"</p>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">{{ $testimonial['name'] }}</h6>
                                    <small class="text-muted">{{ $testimonial['role'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Call to Action / Footer Banner --}}
    <section class="py-5 bg-body-tertiary" id="contact">
        <div class="container">
            <div class="card border-0 bg-primary text-white rounded-4 shadow p-4 p-md-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-8">
                        <span class="badge bg-white text-primary mb-2">Ready to move?</span>
                        <h2 class="display-6 fw-bold mb-2">Start exploring opportunities today.</h2>
                        <p class="text-white-50 mb-0">Discover thousands of active roles from modern and verified tech companies.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                            <a class="btn btn-light text-primary fw-semibold px-4" href="{{ route('jobs.index') }}">Explore Roles</a>
                            <a class="btn btn-outline-light px-4" href="{{ route('contact') }}">Get in Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection