@extends('layouts.marketing')

@section('page_title', 'Companies')
@section('page_description', 'Meet the employers hiring through the job portal.')

@php
    $companies = [
        ['name' => 'Northstar Labs', 'roles' => '18 open roles', 'focus' => 'SaaS Engineering', 'location' => 'Remote-first', 'copy' => 'A product engineering team focused on dependable infrastructure and steady mentorship.', 'tags' => ['Laravel', 'Platform', 'Async team']],
        ['name' => 'Bright Studio', 'roles' => '9 open roles', 'focus' => 'Product Design', 'location' => 'Singapore', 'copy' => 'Design-led company shipping thoughtful digital experiences across mobile and web.', 'tags' => ['Design System', 'Research', 'Product']],
        ['name' => 'Blue Orbit', 'roles' => '14 open roles', 'focus' => 'Growth Marketing', 'location' => 'Bangkok', 'copy' => 'A performance-minded team balancing experimentation with strong brand clarity.', 'tags' => ['Growth', 'CRM', 'Lifecycle']],
        ['name' => 'Scale Works', 'roles' => '11 open roles', 'focus' => 'Customer Success', 'location' => 'Phnom Penh', 'copy' => 'Customer education, onboarding, and renewal programs built around strong relationships.', 'tags' => ['Success', 'Onboarding', 'Accounts']],
        ['name' => 'FutureGrid', 'roles' => '7 open roles', 'focus' => 'Analytics', 'location' => 'Remote', 'copy' => 'Data-informed product and operations team with a calm, highly collaborative culture.', 'tags' => ['SQL', 'BI', 'Forecasting']],
        ['name' => 'LaunchPeak', 'roles' => '12 open roles', 'focus' => 'Talent Acquisition', 'location' => 'Bangkok', 'copy' => 'Recruiting specialists helping modern teams scale thoughtfully and communicate well.', 'tags' => ['Sourcing', 'Hiring Ops', 'Employer Brand']],
    ];
@endphp

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-white text-primary px-3 py-2 fw-bold text-uppercase">Employer directory</span>
                    <h1 class="mt-3">Companies that care about clear roles, good process, and solid candidate experience.</h1>
                    <p class="mb-0">Browse hiring teams with a more polished presentation and faster pathways into the right conversations.</p>
                </div>
                <div class="col-lg-5">
                    <div class="info-panel">
                        <div class="stats-strip">
                            <div class="stat-item">
                                <strong>380</strong>
                                <span>trusted employers</span>
                            </div>
                            <div class="stat-item">
                                <strong>74%</strong>
                                <span>mid-size growth teams</span>
                            </div>
                            <div class="stat-item">
                                <strong>48</strong>
                                <span>new companies this quarter</span>
                            </div>
                            <div class="stat-item">
                                <strong>4.8/5</strong>
                                <span>candidate rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-4">
                <div>
                    <div class="section-kicker">Featured employers</div>
                    <h2 class="section-heading">A cleaner place for company stories and open roles.</h2>
                    <p class="section-intro mb-0">Each employer card below links into live opportunities and preserves a professional feel.</p>
                </div>
                <a class="btn btn-outline-primary" href="{{ route('jobs.index') }}">Go to open jobs</a>
            </div>

            <div class="row company-grid">
                @foreach ($companies as $company)
                    <div class="col-lg-6">
                        <a class="company-card d-block" id="{{ \Illuminate\Support\Str::slug($company['name']) }}" href="{{ route('jobs.index', ['keyword' => $company['name']]) }}">
                            <div class="d-flex justify-content-between align-items-start gap-3">
                                <div class="job-company-mark">{{ strtoupper(substr($company['name'], 0, 2)) }}</div>
                                <span class="meta-pill">{{ $company['roles'] }}</span>
                            </div>
                            <h3>{{ $company['name'] }}</h3>
                            <p class="mb-2">{{ $company['focus'] }} | {{ $company['location'] }}</p>
                            <p class="mb-0">{{ $company['copy'] }}</p>
                            <div class="company-meta">
                                @foreach ($company['tags'] as $tag)
                                    <span class="company-tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="timeline-card">
                        <div class="section-kicker">For employers</div>
                        <h3>Professional presentation</h3>
                        <p class="mb-0">Brand and role pages feel polished enough for ambitious teams without becoming marketing-heavy.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="timeline-card">
                        <div class="section-kicker">For candidates</div>
                        <h3>Less guesswork</h3>
                        <p class="mb-0">Role cards stay information-rich so candidates can understand fit before they spend time applying.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="timeline-card">
                        <div class="section-kicker">For teams</div>
                        <h3>Better momentum</h3>
                        <p class="mb-0">The site keeps navigation and calls to action obvious, which helps users continue moving.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
