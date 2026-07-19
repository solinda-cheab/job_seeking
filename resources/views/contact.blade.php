@extends('layouts.marketing')

@section('page_title', 'Contact')
@section('page_description', 'Contact the job portal team through email, phone, or location links.')

@section('content')
    <section class="page-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-white text-primary px-3 py-2 fw-bold text-uppercase">Contact options</span>
                    <h1 class="mt-3">Every main action stays reachable, including the human side.</h1>
                    <p class="mb-0">Use direct contact links for support, employer onboarding, partnership questions, or candidate guidance.</p>
                </div>
                <div class="col-lg-5">
                    <div class="info-panel">
                        <h3 class="fw-bold mb-3">Reach us quickly</h3>
                        <div class="meta-row mt-0">
                            <span class="meta-pill">Email</span>
                            <span class="meta-pill">Phone</span>
                            <span class="meta-pill">Map</span>
                            <span class="meta-pill">Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="row contact-grid">
                <div class="col-lg-6 col-xl-3">
                    <a class="contact-card d-block" href="mailto:hello@jobportal.local">
                        <span class="contact-icon"><i class="bi bi-envelope-paper"></i></span>
                        <h3>Email support</h3>
                        <p class="mb-0">hello@jobportal.local</p>
                    </a>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <a class="contact-card d-block" href="tel:+18005551234">
                        <span class="contact-icon"><i class="bi bi-telephone"></i></span>
                        <h3>Call the team</h3>
                        <p class="mb-0">+1 (800) 555-1234</p>
                    </a>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <a class="contact-card d-block" href="https://maps.google.com/?q=Downtown+Business+District" target="_blank" rel="noreferrer">
                        <span class="contact-icon"><i class="bi bi-geo-alt"></i></span>
                        <h3>Visit office</h3>
                        <p class="mb-0">Downtown Business District</p>
                    </a>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <a class="contact-card d-block" href="{{ route('register') }}">
                        <span class="contact-icon"><i class="bi bi-person-plus"></i></span>
                        <h3>Create account</h3>
                        <p class="mb-0">Start applying in minutes</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-block">
        <div class="container">
            <div class="app-panel">
                <div class="row g-4 align-items-start">
                    <div class="col-lg-5">
                        <div class="section-kicker">Common questions</div>
                        <h2 class="section-heading mb-2">A few quick answers.</h2>
                        <p class="section-intro mb-0">The accordion keeps extra information clickable without turning the page into clutter.</p>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="contactFaq">
                            <div class="accordion-item border-0 mb-3 rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">
                                        How do candidates get started?
                                    </button>
                                </h2>
                                <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#contactFaq">
                                    <div class="accordion-body">
                                        Create an account, explore roles, then complete your profile so employers can evaluate fit faster.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 mb-3 rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                                        Can employers request support?
                                    </button>
                                </h2>
                                <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                                    <div class="accordion-body">
                                        Yes. Use the contact links above and the team can help with employer branding, hiring setup, and portal onboarding.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-0 rounded-4 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                                        Is the site mobile-friendly?
                                    </button>
                                </h2>
                                <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                                    <div class="accordion-body">
                                        Yes. The redesign uses responsive Bootstrap layout and custom spacing so the main actions remain clear on smaller screens too.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
