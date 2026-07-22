@extends('layouts.marketing')

@section('page_title', __('Career Resources'))
@section('page_description', __('Practical career guidance, application tools, and interview strategies for job seekers.'))

@php
    $resources = [
        [
            'id' => 'resume', 
            'icon' => 'bi bi-file-earmark-person', 
            'title' => __('Resume and profile polish'), 
            'copy' => __('Write sharper summaries, cleaner experience bullets, and role-specific value statements.'), 
            'cta' => route('jobs.index'),
            'cta_text' => __('Explore Open Roles'),
            'tips' => [
                __('Keep information concise enough for a recruiter to scan in under 30 seconds.'),
                __('Quantify achievements with concrete numbers and measurable results.'),
                __('Align your key skill keywords with the job description terms.')
            ]
        ],
        [
            'id' => 'interview', 
            'icon' => 'bi bi-chat-square-quote', 
            'title' => __('Interview preparation'), 
            'copy' => __('Turn scattered experiences into calm, structured answers with examples that land well.'), 
            'cta' => route('contact'),
            'cta_text' => __('Get Interview Coaching'),
            'tips' => [
                __('Structure answers using the STAR method (Situation, Task, Action, Result).'),
                __('Prepare 2-3 thoughtful questions about the team culture and immediate challenges.'),
                __('Practice your concise 60-second "Tell me about yourself" elevator pitch.')
            ]
        ],
        [
            'id' => 'salary', 
            'icon' => 'bi bi-cash-coin', 
            'title' => __('Compensation and negotiation'), 
            'copy' => __('Approach salary conversations with better framing, evidence, and confidence.'), 
            'cta' => route('about'),
            'cta_text' => __('View Compensation Trends'),
            'tips' => [
                __('Research market averages for your role, location, and experience tier beforehand.'),
                __('Evaluate the complete offer package including equity, PTO, and benefits.'),
                __('Frame counter-offers around industry benchmarks and specific value added.')
            ]
        ],
    ];
@endphp

@section('content')
    {{-- Hero Section --}}
    <section class="py-5 bg-body-tertiary border-bottom">
        <div class="container py-lg-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-bold text-uppercase mb-3">
                        <i class="bi bi-compass-fill me-1"></i> {{ __('Career support') }}
                    </span>
                    <h1 class="display-5 fw-bold text-dark lh-sm mb-3">
                        {{ __('Guides that help users move from browsing to better outcomes.') }}
                    </h1>
                    <p class="lead text-secondary mb-0">
                        {{ __('A professional job portal feels friendlier when it gives actionable advice on what to do next at every stage of the job search.') }}
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-body">
                        <h3 class="h5 fw-bold text-dark mb-3">{{ __('What’s inside') }}</h3>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-3 py-2 fw-semibold">{{ __('Resume advice') }}</span>
                            <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-3 py-2 fw-semibold">{{ __('Interview prep') }}</span>
                            <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-3 py-2 fw-semibold">{{ __('Salary strategy') }}</span>
                            <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill px-3 py-2 fw-semibold">{{ __('Application planning') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Quick Jumper Grid --}}
    <section class="py-5">
        <div class="container py-lg-3">
            <div class="row g-4">
                @foreach ($resources as $resource)
                    <div class="col-lg-4">
                        <a class="card h-100 border-0 shadow-sm rounded-4 p-4 text-decoration-none transition-hover group" href="#{{ $resource['id'] }}">
                            <div class="card-body p-0">
                                <div class="d-inline-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 p-3 mb-3 fs-4">
                                    <i class="{{ $resource['icon'] }}"></i>
                                </div>
                                <h3 class="h5 fw-bold text-dark mb-2 group-hover-primary">{{ $resource['title'] }}</h3>
                                <p class="text-secondary small mb-0">{{ $resource['copy'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Detailed Content Sections --}}
    <section class="py-5 bg-body-tertiary">
        <div class="container">
            <div class="row g-4">
                @foreach ($resources as $resource)
                    <div class="col-12" id="{{ $resource['id'] }}">
                        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-body">
                            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center gap-3 mb-4 pb-3 border-bottom">
                                <div>
                                    <span class="text-primary text-uppercase fw-bold small d-block mb-1">{{ __('Practical guide') }}</span>
                                    <h2 class="h3 fw-bold text-dark mb-1">{{ $resource['title'] }}</h2>
                                    <p class="text-secondary mb-0">{{ $resource['copy'] }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <a class="btn btn-primary px-4 shadow-sm" href="{{ $resource['cta'] }}">
                                        {{ $resource['cta_text'] }} <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <h4 class="h6 text-uppercase fw-bold text-secondary mb-3">{{ __('Key Takeaways') }}</h4>
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                                @foreach ($resource['tips'] as $tip)
                                    <li class="d-flex align-items-start gap-2 text-secondary">
                                        <i class="bi bi-check2-circle text-primary fs-5 flex-shrink-0 mt-n1"></i>
                                        <span>{{ $tip }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Call To Action Footer Strip --}}
    <section class="py-5">
        <div class="container">
            <div class="card border-0 bg-dark text-white rounded-4 shadow p-4 p-md-5 text-center">
                <div class="max-w-2xl mx-auto py-2">
                    <h2 class="display-6 fw-bold mb-3">{{ __('Need tailored career advice?') }}</h2>
                    <p class="text-light-emphasis mb-4">{{ __('Connect with our team to explore options, optimize your profile, or get hiring support.') }}</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a class="btn btn-primary px-4 py-2" href="{{ route('jobs.index') }}">{{ __('Browse Openings') }}</a>
                        <a class="btn btn-outline-light px-4 py-2" href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection