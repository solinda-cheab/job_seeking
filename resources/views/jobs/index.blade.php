@extends('layouts.marketing')

@section('page_title', __('Browse Jobs'))
@section('page_description', __('Search job opportunities by keyword, location, type, and category.'))

@php
    $allJobs = collect([
        ['id' => 'northstar-laravel', 'title' => 'Senior Laravel Engineer', 'company' => 'Northstar Labs', 'location' => 'Remote', 'type' => 'Full-time', 'category' => 'Engineering', 'salary' => '$4.2k - $5.4k / month', 'summary' => 'Own backend architecture, APIs, and mentoring for a growing SaaS team.', 'skills' => ['Laravel', 'MySQL', 'REST APIs'], 'experience' => '5+ years'],
        ['id' => 'bright-designer', 'title' => 'Product Designer', 'company' => 'Bright Studio', 'location' => 'Singapore', 'type' => 'Hybrid', 'category' => 'Design', 'salary' => '$3.6k - $4.4k / month', 'summary' => 'Shape product flows, high-fidelity UI, and research-backed improvements.', 'skills' => ['Figma', 'Design Systems', 'UX Research'], 'experience' => '4+ years'],
        ['id' => 'blue-growth', 'title' => 'Growth Marketing Lead', 'company' => 'Blue Orbit', 'location' => 'Bangkok', 'type' => 'Full-time', 'category' => 'Marketing', 'salary' => '$3.8k - $4.8k / month', 'summary' => 'Run acquisition strategy, campaign experiments, and lifecycle messaging.', 'skills' => ['Performance Marketing', 'Analytics', 'CRM'], 'experience' => '5+ years'],
        ['id' => 'scale-support', 'title' => 'Customer Success Manager', 'company' => 'Scale Works', 'location' => 'Phnom Penh', 'type' => 'Hybrid', 'category' => 'Customer Success', 'salary' => '$2.7k - $3.5k / month', 'summary' => 'Guide customers through onboarding and renewal with strong product fluency.', 'skills' => ['Account Management', 'SaaS', 'Enablement'], 'experience' => '3+ years'],
        ['id' => 'futuregrid-data', 'title' => 'Data Analyst', 'company' => 'FutureGrid', 'location' => 'Remote', 'type' => 'Contract', 'category' => 'Analytics', 'salary' => '$3.1k - $3.9k / month', 'summary' => 'Translate customer and product data into smart reporting and decisions.', 'skills' => ['SQL', 'Power BI', 'Forecasting'], 'experience' => '3+ years'],
        ['id' => 'launchpeak-recruiter', 'title' => 'Technical Recruiter', 'company' => 'LaunchPeak', 'location' => 'Bangkok', 'type' => 'Full-time', 'category' => 'Talent', 'salary' => '$2.9k - $3.7k / month', 'summary' => 'Partner with hiring managers and keep candidate experience warm and sharp.', 'skills' => ['Sourcing', 'Interviewing', 'Stakeholder Management'], 'experience' => '4+ years'],
    ]);

    $keyword = strtolower(trim((string) request('keyword', '')));
    $location = trim((string) request('location', ''));
    $type = trim((string) request('type', ''));
    $category = trim((string) request('category', ''));

    $jobs = $allJobs->filter(function ($job) use ($keyword, $location, $type, $category) {
        $haystack = strtolower(implode(' ', [$job['title'], $job['company'], $job['category'], implode(' ', $job['skills'])]));

        return ($keyword === '' || str_contains($haystack, $keyword))
            && ($location === '' || $job['location'] === $location)
            && ($type === '' || $job['type'] === $type)
            && ($category === '' || $job['category'] === $category);
    })->values();

    $categories = $allJobs->pluck('category')->unique()->sort()->values();
    $types = $allJobs->pluck('type')->unique()->sort()->values();
    $locations = $allJobs->pluck('location')->unique()->sort()->values();
    $applyRoute = auth()->check() ? route('resume.edit') : route('register');
@endphp

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="px-3 py-2 bg-white badge rounded-pill text-primary fw-bold text-uppercase">{{ __('Job search made practical') }}</span>
                    <h1 class="mt-3">{{ __('Find roles with clear scope, strong teams, and smoother hiring paths.') }}</h1>
                    <p class="mb-0">{{ __('Use simple filters, inspect the details quickly, and keep moving toward the roles that actually match your strengths.') }}</p>
                </div>
                <div class="col-lg-5">
                    <div class="overflow-hidden shadow-lg page-hero__image rounded-4">
                        <img src="https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?auto=format&fit=crop&w=1200&q=80" alt="Candidate reviewing career opportunities">
                    </div>
                </div>
            </div>

            <div class="mt-4 info-panel filter-bar">
                <form action="{{ route('jobs.index') }}" method="GET">
                    <div class="row g-3 align-items-end">
                        <div class="col-lg-4">
                            <label class="form-label fw-semibold" for="search-keyword">{{ __('Keyword') }}</label>
                            <input class="form-control" id="search-keyword" name="keyword" type="text" value="{{ request('keyword') }}" placeholder="{{ __('Search title, company, or skill') }}">
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label fw-semibold" for="search-location">{{ __('Location') }}</label>
                            <select class="form-select" id="search-location" name="location">
                                <option value="">{{ __('Anywhere') }}</option>
                                @foreach ($locations as $option)
                                    <option value="{{ $option }}" @selected($location === $option)>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label fw-semibold" for="search-type">{{ __('Type') }}</label>
                            <select class="form-select" id="search-type" name="type">
                                <option value="">{{ __('Any type') }}</option>
                                @foreach ($types as $option)
                                    <option value="{{ $option }}" @selected($type === $option)>{{ __($option) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label class="form-label fw-semibold" for="search-category">{{ __('Category') }}</label>
                            <select class="form-select" id="search-category" name="category">
                                <option value="">{{ __('All categories') }}</option>
                                @foreach ($categories as $option)
                                    <option value="{{ $option }}" @selected($category === $option)>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <button class="btn btn-primary w-100" type="submit">{{ __('Apply filters') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="gap-3 mb-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center">
                        <div>
                            <div class="section-kicker">Search results</div>
                            <h2 class="mb-1 section-heading">{{ $jobs->count() }} roles ready to explore</h2>
                            <p class="mb-0 section-intro">Every card below links to a meaningful next step.</p>
                        </div>
                        <a class="btn btn-outline-primary" href="{{ route('jobs.index') }}">Clear filters</a>
                    </div>

                    @if ($jobs->isEmpty())
                        <div class="alert alert-warning">
                            No roles matched that combination yet. Try a broader keyword or clear the filters to see everything available.
                        </div>
                    @endif

                    <div class="row jobs-grid">
                        @foreach ($jobs as $job)
                            <div class="col-12" id="{{ $job['id'] }}">
                                <div class="job-card">
                                    <div class="gap-3 d-flex flex-column flex-lg-row justify-content-between">
                                        <div class="gap-3 d-flex">
                                            <div class="job-company-mark">{{ strtoupper(substr($job['company'], 0, 2)) }}</div>
                                            <div>
                                                <h3 class="mt-0">{{ $job['title'] }}</h3>
                                                <p class="mb-2">{{ $job['company'] }}</p>
                                                <div class="mt-0 job-meta">
                                                    <span class="job-tag"><i class="bi bi-geo-alt"></i> {{ $job['location'] }}</span>
                                                    <span class="job-tag"><i class="bi bi-briefcase"></i> {{ $job['type'] }}</span>
                                                    <span class="job-tag"><i class="bi bi-layers"></i> {{ $job['category'] }}</span>
                                                    <span class="job-tag"><i class="bi bi-award"></i> {{ $job['experience'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-lg-end">
                                            <span class="mb-3 meta-pill d-inline-flex">{{ $job['salary'] }}</span>
                                            <div class="flex-wrap gap-2 d-flex justify-content-lg-end">
                                                <a class="btn btn-primary btn-sm" href="{{ $applyRoute }}">Apply now</a>
                                                <a class="btn btn-outline-primary btn-sm" href="{{ route('companies.index') }}#{{ \Illuminate\Support\Str::slug($job['company']) }}">View company</a>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="mt-3 mb-0">{{ $job['summary'] }}</p>

                                    <div class="meta-row">
                                        @foreach ($job['skills'] as $skill)
                                            <span class="meta-pill">{{ $skill }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-4 app-panel">
                        <div class="section-kicker">Quick tips</div>
                        <h3 class="mt-2 mb-3 fw-bold">How to get more replies</h3>
                        <ul class="mb-0 list-check">
                            <li><i class="bi bi-check2-circle"></i> Match your headline and profile summary to the role title.</li>
                            <li><i class="bi bi-check2-circle"></i> Keep portfolio links and recent outcomes easy to find.</li>
                            <li><i class="bi bi-check2-circle"></i> Apply quickly while the role is still fresh in market.</li>
                        </ul>
                    </div>

                    <div class="app-panel">
                        <div class="section-kicker">Popular filters</div>
                        <h3 class="mt-2 mb-3 fw-bold">Jump into common searches</h3>
                        <div class="mt-0 meta-row">
                            <a class="meta-pill" href="{{ route('jobs.index', ['location' => 'Remote']) }}">Remote</a>
                            <a class="meta-pill" href="{{ route('jobs.index', ['category' => 'Engineering']) }}">Engineering</a>
                            <a class="meta-pill" href="{{ route('jobs.index', ['type' => 'Hybrid']) }}">Hybrid</a>
                            <a class="meta-pill" href="{{ route('jobs.index', ['category' => 'Design']) }}">Design</a>
                            <a class="meta-pill" href="{{ route('jobs.index', ['location' => 'Bangkok']) }}">Bangkok</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
