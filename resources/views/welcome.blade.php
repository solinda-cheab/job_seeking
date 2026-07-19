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
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <div class="hero-copy reveal-up">
                        <span class="eyebrow-badge">{{ __('Friendly hiring, serious results') }}</span>
                        <h1>{{ __('Find work that fits your talent, your timing, and your ambition.') }}</h1>
                        <p>
                            {{ __(':brand brings together thoughtful employers, clean job details, and a smoother candidate journey so every click feels intentional.', ['brand' => $brandName]) }}
                        </p>

                        <div class="hero-actions">
                            <a class="btn btn-primary" href="{{ route('jobs.index') }}">{{ __('Browse jobs') }}</a>
                            <a class="btn btn-outline-primary" href="{{ $profileRoute }}">{{ __('Create profile') }}</a>
                        </div>

                        <div class="hero-trust">
                            <span><i class="bi bi-check-circle-fill"></i> {{ __('Verified employers') }}</span>
                            <span><i class="bi bi-lightning-charge-fill"></i> {{ __('Fast application flow') }}</span>
                            <span><i class="bi bi-stars"></i> {{ __('Friendly experience') }}</span>
                        </div>

                        <form class="search-panel" action="{{ route('jobs.index') }}" method="GET">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold" for="keyword">{{ __('Keyword') }}</label>
                                    <input class="form-control" id="keyword" name="keyword" type="text" placeholder="{{ __('Laravel, Designer, Recruiter') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold" for="location">{{ __('Location') }}</label>
                                    <select class="form-select" id="location" name="location">
                                        <option value="">{{ __('Anywhere') }}</option>
                                        <option value="Remote">{{ __('Remote') }}</option>
                                        <option value="Singapore">{{ __('Singapore') }}</option>
                                        <option value="Phnom Penh">{{ __('Phnom Penh') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold" for="type">{{ __('Type') }}</label>
                                    <select class="form-select" id="type" name="type">
                                        <option value="">{{ __('Any type') }}</option>
                                        <option value="Full-time">{{ __('Full-time') }}</option>
                                        <option value="Hybrid">{{ __('Hybrid') }}</option>
                                        <option value="Remote">{{ __('Remote') }}</option>
                                        <option value="Contract">{{ __('Contract') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary w-100" type="submit">{{ __('Search') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-visual reveal-up" style="animation-delay: 0.15s;">
                        <div class="hero-visual__card ratio ratio-4x3">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80" alt="Recruiters reviewing job applications">
                        </div>
                        <div class="floating-note floating-note--top">
                            <strong>1,240</strong>
                            <span>{{ __('active roles this week') }}</span>
                        </div>
                        <div class="floating-note floating-note--bottom">
                            <strong>36 hrs</strong>
                            <span>{{ __('average recruiter response') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 logo-cloud reveal-up" style="animation-delay: 0.25s;">
                <div class="row align-items-center g-3">
                    <div class="col-lg-3">
                        <h6 class="mb-1 fw-bold">Trusted by growing teams</h6>
                        <p class="mb-0 muted-copy">Product, engineering, operations, and creative employers.</p>
                    </div>
                    <div class="col-lg-9">
                        <div class="logo-cloud__items">
                            @foreach ($companies as $company)
                                <a class="logo-pill" href="{{ route('companies.index') }}#{{ \Illuminate\Support\Str::slug($company) }}">{{ $company }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="stats-strip reveal-up">
                <div class="stat-item">
                    <strong>4.2k+</strong>
                    <span>monthly applications</span>
                </div>
                <div class="stat-item">
                    <strong>380</strong>
                    <span>trusted companies</span>
                </div>
                <div class="stat-item">
                    <strong>92%</strong>
                    <span>candidate satisfaction</span>
                </div>
                <div class="stat-item">
                    <strong>48</strong>
                    <span>new roles added daily</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block" id="categories">
        <div class="container">
            <div class="gap-3 mb-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-end">
                <div>
                    <div class="section-kicker">Popular categories</div>
                    <h2 class="section-heading">Browse opportunities by skill direction.</h2>
                    <p class="mb-0 section-intro">Clear pathways for candidates who already know the lane they want to grow in.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('jobs.index') }}">See all jobs</a>
            </div>

            <div class="row category-grid">
                @foreach ($categories as $category)
                    <div class="col-md-6 col-xl-3">
                        <a class="category-card d-block" href="{{ route('jobs.index', ['category' => $category['query']]) }}">
                            <span class="category-icon"><i class="{{ $category['icon'] }}"></i></span>
                            <h3>{{ $category['title'] }}</h3>
                            <p class="mb-0">{{ $category['openings'] }} from teams hiring now.</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-block" id="jobs">
        <div class="container">
            <div class="gap-3 mb-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-end">
                <div>
                    <div class="section-kicker">Featured jobs</div>
                    <h2 class="section-heading">Roles with strong teams and clear growth paths.</h2>
                    <p class="mb-0 section-intro">Each listing is designed to feel useful before a candidate even clicks apply.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('jobs.index') }}">Find your match</a>
            </div>

            <div class="row jobs-grid">
                @foreach ($featuredJobs as $job)
                    <div class="col-lg-4">
                        <a class="job-card d-block" href="{{ route('jobs.index', ['keyword' => $job['title']]) }}">
                            <div class="gap-3 d-flex justify-content-between align-items-start">
                                <div class="job-company-mark">{{ strtoupper(substr($job['company'], 0, 2)) }}</div>
                                <span class="meta-pill">{{ $job['salary'] }}</span>
                            </div>
                            <h3>{{ $job['title'] }}</h3>
                            <p class="mb-0">{{ $job['company'] }}</p>
                            <div class="job-meta">
                                <span class="job-tag"><i class="bi bi-geo-alt"></i> {{ $job['location'] }}</span>
                                <span class="job-tag"><i class="bi bi-briefcase"></i> {{ $job['type'] }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-block" id="companies">
        <div class="container">
            <div class="feature-band reveal-up">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="overflow-hidden feature-image rounded-4">
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80" alt="Hiring team planning recruitment">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-kicker text-warning">Built for both sides</div>
                        <h2 class="section-heading">Candidates feel supported. Employers stay in motion.</h2>
                        <p class="mb-0">The interface stays friendly for job seekers while still giving recruiting teams professional presentation and better-qualified inbound interest.</p>
                        <ul class="list-check">
                            <li><i class="bi bi-check2-circle"></i> Searchable roles with crisp metadata and fast filtering</li>
                            <li><i class="bi bi-check2-circle"></i> Employer branding that feels polished without being loud</li>
                            <li><i class="bi bi-check2-circle"></i> Clear next-step calls to action on every primary surface</li>
                        </ul>
                        <div class="hero-actions">
                            <a class="btn btn-warning" href="{{ route('companies.index') }}">Meet top employers</a>
                            <a class="btn btn-outline-light" href="{{ route('contact') }}">Contact our team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block" id="resources">
        <div class="container">
            <div class="gap-3 mb-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-end">
                <div>
                    <div class="section-kicker">Career resources</div>
                    <h2 class="section-heading">Useful guidance that helps candidates move with more confidence.</h2>
                    <p class="mb-0 section-intro">Not filler content. Just practical help around resumes, interviews, and salary conversations.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('resources.index') }}">Open resource hub</a>
            </div>

            <div class="row resource-grid">
                @foreach ($insights as $insight)
                    <div class="col-lg-4">
                        <a class="resource-card d-block" href="{{ $insight['target'] }}">
                            <span class="resource-icon"><i class="{{ $insight['icon'] }}"></i></span>
                            <h3>{{ $insight['title'] }}</h3>
                            <p class="mb-0">{{ $insight['copy'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="gap-3 mb-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-end">
                <div>
                    <div class="section-kicker">Community voice</div>
                    <h2 class="section-heading">People notice when the hiring experience feels humane.</h2>
                    <p class="mb-0 section-intro">That friendliness is part of the product, not a bonus layer added later.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('contact') }}">Talk to our team</a>
            </div>

            <div class="row g-4">
                @foreach ($testimonials as $testimonial)
                    <div class="col-lg-4">
                        <a class="testimonial-card d-block" href="{{ route('contact') }}">
                            <p class="mb-3">"{{ $testimonial['quote'] }}"</p>
                            <h3 class="mb-1">{{ $testimonial['name'] }}</h3>
                            <p class="mb-0">{{ $testimonial['role'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-block" id="contact">
        <div class="container">
            <div class="newsletter-band reveal-up">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-8">
                        <div class="section-kicker">Ready to move</div>
                        <h2 class="mb-2 section-heading">Open the portal, explore roles, and keep every next step easy to reach.</h2>
                        <p class="mb-0 section-intro">The redesigned experience is Bootstrap-based, professional in tone, and full of working navigation so users can keep clicking forward.</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="section-actions justify-content-lg-end">
                            <a class="btn btn-primary" href="{{ route('jobs.index') }}">Start exploring</a>
                            <a class="btn btn-outline-primary" href="{{ route('contact') }}">Get in touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
