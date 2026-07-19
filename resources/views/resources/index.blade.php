@extends('layouts.marketing')

@section('page_title', 'Career Resources')
@section('page_description', 'Practical career guidance for job seekers and hiring teams.')

@php
    $resources = [
        ['id' => 'resume', 'icon' => 'bi bi-file-earmark-person', 'title' => 'Resume and profile polish', 'copy' => 'Write sharper summaries, cleaner experience bullets, and role-specific value statements.', 'cta' => route('jobs.index')],
        ['id' => 'interview', 'icon' => 'bi bi-chat-square-quote', 'title' => 'Interview preparation', 'copy' => 'Turn scattered experiences into calm, structured answers with examples that land well.', 'cta' => route('contact')],
        ['id' => 'salary', 'icon' => 'bi bi-cash-coin', 'title' => 'Compensation and negotiation', 'copy' => 'Approach salary conversations with better framing, evidence, and confidence.', 'cta' => route('about')],
    ];
@endphp

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-white text-primary px-3 py-2 fw-bold text-uppercase">Career support</span>
                    <h1 class="mt-3">Guides that help users move from browsing to better outcomes.</h1>
                    <p class="mb-0">A professional portal still feels friendlier when it teaches people what to do next.</p>
                </div>
                <div class="col-lg-5">
                    <div class="info-panel">
                        <h3 class="fw-bold mb-2">What’s inside</h3>
                        <div class="meta-row mt-0">
                            <span class="meta-pill">Resume advice</span>
                            <span class="meta-pill">Interview prep</span>
                            <span class="meta-pill">Salary strategy</span>
                            <span class="meta-pill">Application planning</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row resource-grid">
                @foreach ($resources as $resource)
                    <div class="col-lg-4">
                        <a class="resource-card d-block" href="#{{ $resource['id'] }}">
                            <span class="resource-icon"><i class="{{ $resource['icon'] }}"></i></span>
                            <h3>{{ $resource['title'] }}</h3>
                            <p class="mb-0">{{ $resource['copy'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row g-4">
                @foreach ($resources as $resource)
                    <div class="col-12" id="{{ $resource['id'] }}">
                        <div class="app-panel">
                            <div class="d-flex flex-column flex-lg-row justify-content-between gap-3">
                                <div>
                                    <div class="section-kicker">Practical guide</div>
                                    <h2 class="section-heading mb-2">{{ $resource['title'] }}</h2>
                                    <p class="section-intro mb-0">{{ $resource['copy'] }}</p>
                                </div>
                                <div class="section-actions">
                                    <a class="btn btn-primary" href="{{ $resource['cta'] }}">Take the next step</a>
                                </div>
                            </div>
                            <ul class="list-check">
                                <li><i class="bi bi-check2-circle"></i> Keep information concise enough for a recruiter to scan in under a minute.</li>
                                <li><i class="bi bi-check2-circle"></i> Make role fit obvious through language, evidence, and recent outcomes.</li>
                                <li><i class="bi bi-check2-circle"></i> Use the portal’s clean navigation to keep actions simple and low-friction.</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
