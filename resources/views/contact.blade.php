@extends('layouts.marketing')

@section('page_title', __('Contact Us'))
@section('page_description', __('Get in touch with the job portal team for support, employer onboarding, or partnership inquiries.'))

@section('content')
    {{-- Hero Section --}}
    <section class="py-5 bg-body-tertiary border-bottom">
        <div class="container py-lg-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-7">
                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-bold text-uppercase mb-3">
                        <i class="bi bi-chat-dots-fill me-1"></i> {{ __('Contact Options') }}
                    </span>
                    <h1 class="display-5 fw-bold text-dark lh-sm mb-3">
                        {{ __('Every main action stays reachable, including the human side.') }}
                    </h1>
                    <p class="lead text-secondary mb-0">
                        {{ __('Use direct contact links or the form below for support, employer onboarding, partnership questions, or candidate guidance.') }}
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-body">
                        <h5 class="fw-bold text-dark mb-2">{{ __('Reach us quickly') }}</h5>
                        <p class="text-muted small mb-3">{{ __('Choose your preferred channel to get fast assistance from our support team.') }}</p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-body-secondary text-secondary rounded-pill px-3 py-2"><i class="bi bi-envelope me-1"></i> {{ __('Email') }}</span>
                            <span class="badge bg-body-secondary text-secondary rounded-pill px-3 py-2"><i class="bi bi-telephone me-1"></i> {{ __('Phone') }}</span>
                            <span class="badge bg-body-secondary text-secondary rounded-pill px-3 py-2"><i class="bi bi-geo-alt me-1"></i> {{ __('Map') }}</span>
                            <span class="badge bg-body-secondary text-secondary rounded-pill px-3 py-2"><i class="bi bi-headset me-1"></i> {{ __('Support') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Cards Grid --}}
    <section class="py-5">
        <div class="container py-lg-3">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <a class="card h-100 border-0 shadow-sm text-decoration-none transition-hover p-3 rounded-4" href="mailto:hello@jobportal.local">
                        <div class="card-body text-center text-sm-start">
                            <div class="p-3 bg-primary-subtle text-primary rounded-3 d-inline-block mb-3">
                                <i class="bi bi-envelope-paper fs-4"></i>
                            </div>
                            <h5 class="card-title text-dark fw-bold mb-1">{{ __('Email Support') }}</h5>
                            <p class="card-text text-muted small mb-0">hello@jobportal.local</p>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a class="card h-100 border-0 shadow-sm text-decoration-none transition-hover p-3 rounded-4" href="tel:+18005551234">
                        <div class="card-body text-center text-sm-start">
                            <div class="p-3 bg-success-subtle text-success rounded-3 d-inline-block mb-3">
                                <i class="bi bi-telephone fs-4"></i>
                            </div>
                            <h5 class="card-title text-dark fw-bold mb-1">{{ __('Call the Team') }}</h5>
                            <p class="card-text text-muted small mb-0">+1 (800) 555-1234</p>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a class="card h-100 border-0 shadow-sm text-decoration-none transition-hover p-3 rounded-4" href="https://maps.google.com/?q=Downtown+Business+District" target="_blank" rel="noreferrer">
                        <div class="card-body text-center text-sm-start">
                            <div class="p-3 bg-warning-subtle text-warning-emphasis rounded-3 d-inline-block mb-3">
                                <i class="bi bi-geo-alt fs-4"></i>
                            </div>
                            <h5 class="card-title text-dark fw-bold mb-1">{{ __('Visit Office') }}</h5>
                            <p class="card-text text-muted small mb-0">Downtown Business District</p>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a class="card h-100 border-0 shadow-sm text-decoration-none transition-hover p-3 rounded-4" href="{{ route('register') }}">
                        <div class="card-body text-center text-sm-start">
                            <div class="p-3 bg-info-subtle text-info-emphasis rounded-3 d-inline-block mb-3">
                                <i class="bi bi-person-plus fs-4"></i>
                            </div>
                            <h5 class="card-title text-dark fw-bold mb-1">{{ __('Create Account') }}</h5>
                            <p class="card-text text-muted small mb-0">{{ __('Start applying in minutes') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Form & Direct Message Section --}}
    <section class="py-5 bg-body-tertiary border-top border-bottom">
        <div class="container py-lg-3">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <span class="text-primary text-uppercase fw-bold small">{{ __('Get In Touch') }}</span>
                    <h2 class="fw-bold mb-3">{{ __('Send us a direct message') }}</h2>
                    <p class="text-secondary mb-4">
                        {{ __('Whether you have a question about job listings, recruiting tools, or account settings, our team is here to help.') }}
                    </p>

                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="p-2 bg-primary-subtle text-primary rounded-circle"><i class="bi bi-clock-history fs-5"></i></div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">{{ __('Fast Response Times') }}</h6>
                            <small class="text-muted">{{ __('We typically reply within 24 business hours.') }}</small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3">
                        <div class="p-2 bg-primary-subtle text-primary rounded-circle"><i class="bi bi-shield-check fs-5"></i></div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">{{ __('Privacy Protected') }}</h6>
                            <small class="text-muted">{{ __('Your details are never shared with third parties.') }}</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form class="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-body" action="#" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted" for="name">{{ __('Full Name') }}</label>
                                <input class="form-control form-control-lg fs-6" id="name" name="name" type="text" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-uppercase text-muted" for="email">{{ __('Email Address') }}</label>
                                <input class="form-control form-control-lg fs-6" id="email" name="email" type="email" placeholder="john@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase text-muted" for="subject">{{ __('Subject') }}</label>
                                <input class="form-control form-control-lg fs-6" id="subject" name="subject" type="text" placeholder="{{ __('How can we help?') }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-uppercase text-muted" for="message">{{ __('Message') }}</label>
                                <textarea class="form-control fs-6" id="message" name="message" rows="4" placeholder="{{ __('Write your message here...') }}" required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button class="btn btn-primary btn-lg w-100 shadow-sm" type="submit">
                                    <i class="bi bi-send me-1"></i> {{ __('Send Message') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Accordion Section --}}
    <section class="py-5">
        <div class="container py-lg-3">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <span class="text-primary text-uppercase fw-bold small">{{ __('Common Questions') }}</span>
                    <h2 class="fw-bold mb-2">{{ __('A few quick answers.') }}</h2>
                    <p class="text-muted mb-0">
                        {{ __('Find answers to frequent queries regarding onboarding, support, and responsiveness.') }}
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="accordion shadow-sm rounded-4 overflow-hidden" id="contactFaq">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">
                                    {{ __('How do candidates get started?') }}
                                </button>
                            </h2>
                            <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#contactFaq">
                                <div class="accordion-body text-secondary">
                                    {{ __('Create an account, explore roles, then complete your profile so employers can evaluate fit faster.') }}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                                    {{ __('Can employers request support?') }}
                                </button>
                            </h2>
                            <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                                <div class="accordion-body text-secondary">
                                    {{ __('Yes. Use the contact links above and the team can help with employer branding, hiring setup, and portal onboarding.') }}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold py-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                                    {{ __('Is the site mobile-friendly?') }}
                                </button>
                            </h2>
                            <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                                <div class="accordion-body text-secondary">
                                    {{ __('Yes. The layout uses responsive Bootstrap utilities so all main actions remain clear and intuitive on smaller screens.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection