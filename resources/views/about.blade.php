@extends('layouts.marketing')

@section('page_title', 'About')
@section('page_description', 'About the job portal experience and design direction.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-white text-primary px-3 py-2 fw-bold text-uppercase">About the platform</span>
                    <h1 class="mt-3">A job portal with a professional tone and a warmer user experience.</h1>
                    <p class="mb-0">The design direction is inspired by modern hiring products while staying practical, Bootstrap-based, and easy to navigate.</p>
                </div>
                <div class="col-lg-5">
                    <div class="page-hero__image rounded-4 overflow-hidden shadow-lg">
                        <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1200&q=80" alt="Team discussing product roadmap">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="metric-card">
                        <div class="section-kicker">Purpose</div>
                        <strong>Clear pathways</strong>
                        <p class="mb-0 mt-2">Candidates should understand where to click, what they gain, and what happens next.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="metric-card">
                        <div class="section-kicker">Personality</div>
                        <strong>Friendly confidence</strong>
                        <p class="mb-0 mt-2">The interface feels approachable without losing credibility for employers and recruiters.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="metric-card">
                        <div class="section-kicker">System</div>
                        <strong>Bootstrap foundation</strong>
                        <p class="mb-0 mt-2">Reusable spacing, responsive layout, and dependable interaction patterns keep the build stable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="feature-band">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h2 class="section-heading">Why this direction works for a job portal.</h2>
                        <p class="mb-0">Hiring products need density, clarity, and trust. This redesign balances all three while making sure users can keep exploring without dead ends.</p>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-check mb-0">
                            <li><i class="bi bi-check2-circle"></i> Clickable navigation across public pages, account screens, and private pages</li>
                            <li><i class="bi bi-check2-circle"></i> Stronger visual hierarchy with warmer color accents and cleaner sections</li>
                            <li><i class="bi bi-check2-circle"></i> Practical layouts that still feel modern and polished</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
