@extends('frontend.layout')
@section('title')
    Contact
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    @php
        $links = App\Models\WebsiteLink::latest()->first();
    @endphp

    <style>
        :root {
            --brand: #b20101;
            --brand-deep: #8f0000;
            --ink: #16202b;
            --muted: #6c7480;
            --panel-bg: #fff9f3;

        }

        .contact-hero {
            background-position: center;
            background-size: cover;
            position: relative;
        }

        .contact-hero .bg-overlay {
            background: linear-gradient(135deg, rgba(14, 18, 28, 0.82), rgba(240, 129, 33, 0.38));
        }

        .contact-kicker {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 999px;
            background: rgba(240, 129, 33, 0.2);
            color: #fff;
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .contact-hero-title {
            font-size: clamp(2.3rem, 5vw, 4.4rem);
            font-weight: 800;
            letter-spacing: -0.04em;
            color: #fff;
            margin: 0;
        }

        .contact-hero-copy {
            max-width: 700px;
            margin: 18px auto 0;
            color: rgba(255, 255, 255, 0.82);
            font-size: 1.02rem;
            line-height: 1.8;
        }

        .contact-shell {
            position: relative;
            margin-top: -54px;
            z-index: 2;
        }

        .contact-panel {
            background: linear-gradient(180deg, #ffffff 0%, var(--panel-bg) 100%);
            border: 1px solid rgba(240, 129, 33, 0.12);
            border-radius: 30px;
            padding: 34px;
            box-shadow: 0 28px 60px rgba(18, 24, 33, 0.09);
        }

        .contact-intro {
            background: linear-gradient(165deg, #171e28 0%, #222c38 100%);
            color: #fff;
            border-radius: 26px;
            padding: 30px;
            height: 100%;
            box-shadow: 0 18px 44px rgba(15, 18, 24, 0.22);
        }

        .contact-intro h3 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.03em;
            color: var(--brand)
        }

        .contact-intro p {
            color: rgba(255, 255, 255, 0.72);
            line-height: 1.8;
            margin-bottom: 0;
        }

        .contact-badge-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 26px;
        }

        .contact-badge {
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.04);
            border-radius: 18px;
            padding: 16px;
        }

        .contact-badge span {
            display: block;
            color: var(--brand);
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .contact-badge strong {
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
        }

        .contact-info-grid {
            display: grid;
            gap: 16px;
            margin-top: 24px;
        }

        .contact-info-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 18px 18px 16px;
            transition: transform 0.25s ease, border-color 0.25s ease;
        }

        .contact-info-card:hover {
            transform: translateY(-4px);
            border-color: rgba(240, 129, 33, 0.35);
        }

        .contact-icon {
            width: 56px;
            height: 56px;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--brand), var(--brand-deep));
            color: #fff;
            font-size: 1.25rem;
            flex-shrink: 0;
            box-shadow: 0 14px 24px rgba(240, 129, 33, 0.24);
        }

        .contact-info-card h5 {
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .contact-info-card p {
            color: rgba(255, 255, 255, 0.64);
            font-size: 0.92rem;
            margin-bottom: 10px;
        }

        .contact-info-card a {
            display: block;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            word-break: break-word;
        }

        .contact-info-card a:hover {
            color: #ffd9b8;
        }

        .contact-form-card {
            background: #fff;
            border-radius: 26px;
            padding: 32px;
            height: 100%;
            border: 1px solid rgba(24, 32, 43, 0.06);
            box-shadow: 0 18px 46px rgba(17, 22, 30, 0.08);
        }

        .section-eyebrow {
            display: inline-flex;
            align-items: center;
            padding: 7px 14px;
            border-radius: 999px;
            background: rgba(240, 129, 33, 0.1);
            color: var(--brand);
            font-size: 0.76rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .contact-form-card h3,
        .map-header h3 {
            color: var(--ink);
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 10px;
        }

        .contact-form-card .lead-copy,
        .map-header p {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-label {
            color: var(--ink);
            font-size: 0.92rem;
            font-weight: 700;
        }

        .form-control,
        textarea.form-control {
            border-radius: 16px;
            border: 1px solid #e7e3df;
            background: #fcfbfa;
            color: var(--ink);
            padding: 0.95rem 1rem;
            font-size: 0.98rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .form-control::placeholder,
        textarea.form-control::placeholder {
            color: #98a1ab;
        }

        .form-control:focus,
        textarea.form-control:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 0.24rem rgba(240, 129, 33, 0.14);
            background: #fff;
        }

        .contact-submit {
            border: 0;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--brand), var(--brand-deep));
            color: #fff;
            font-weight: 800;
            letter-spacing: 0.01em;
            padding: 1rem 1.4rem;
            box-shadow: 0 18px 28px rgba(240, 129, 33, 0.26);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .contact-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 34px rgba(240, 129, 33, 0.32);
        }

        .contact-submit:focus {
            box-shadow: 0 0 0 0.24rem rgba(240, 129, 33, 0.18);
        }

        .contact-map-card {
            margin-top: 30px;
            background: #fff;
            border-radius: 26px;
            border: 1px solid rgba(24, 32, 43, 0.06);
            overflow: hidden;
            box-shadow: 0 18px 46px rgba(17, 22, 30, 0.08);
        }

        .map-header {
            padding: 30px 30px 22px;
            border-bottom: 1px solid rgba(24, 32, 43, 0.06);
            background: linear-gradient(180deg, #fff 0%, #fff9f4 100%);
        }

        .contact-map-body {
            height: 460px;
        }

        .contact-map-body iframe {
            width: 100%;
            height: 100%;
            border: 0;
            display: block;
        }

        .min-vh-50 {
            min-height: 58vh;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .is-invalid:focus {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 0.22rem rgba(220, 53, 69, 0.14) !important;
        }

        @media (max-width: 991px) {
            .contact-shell {
                margin-top: -22px;
            }

            .contact-panel,
            .contact-intro,
            .contact-form-card {
                padding: 24px;
                border-radius: 24px;
            }
        }

        @media (max-width: 575px) {

            .contact-panel,
            .contact-intro,
            .contact-form-card,
            .map-header {
                padding: 18px;
            }

            .contact-badge-row {
                grid-template-columns: 1fr;
            }

            .contact-map-body {
                height: 320px;
            }
        }
    </style>

    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100 contact-hero"
        style="background: url({{ asset($banner->banner_image ?? null) }}) center/cover; position: relative;">
        <div class="bg-overlay"></div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-50">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <div class="contact-kicker">Start a Conversation</div>
                        <h1 class="contact-hero-title">Get in Touch</h1>
                        <p class="contact-hero-copy">We are ready to answer questions, discuss projects, and help you move
                            forward with the right service or solution.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="section py-5">
        <div class="container contact-shell">
            <div class="contact-panel">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-5">
                        <div class="contact-intro">
                            <div class="section-eyebrow">Contact Details</div>
                            <h3>Let’s build the right conversation.</h3>
                            <p>Reach us directly for project inquiries, partnerships, consultations, or general support. We
                                aim to respond quickly with clear next steps.</p>

                            <div class="contact-badge-row">
                                <div class="contact-badge">
                                    <span>Response</span>
                                    <strong>Fast follow-up</strong>
                                </div>
                                <div class="contact-badge">
                                    <span>Availability</span>
                                    <strong>Business hours support</strong>
                                </div>
                            </div>

                            <div class="contact-info-grid">
                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <div>
                                        <h5>Phone</h5>
                                        <p>Call us directly for immediate assistance.</p>
                                        <a href="tel:{{ $links->phone }}">{{ $links->phone }}</a>
                                        @if (!empty($links->phone_2))
                                            <a href="tel:{{ $links->phone_2 }}">{{ $links->phone_2 }}</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="bi bi-envelope-fill"></i>
                                    </div>
                                    <div>
                                        <h5>Email</h5>
                                        <p>Send project details or general questions anytime.</p>
                                        <a href="mailto:{{ $links->email }}">{{ $links->email }}</a>
                                    </div>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    <div>
                                        <h5>Location</h5>
                                        <p>Visit or locate our office through the map.</p>
                                        <a href="https://maps.app.goo.gl/AY3CarnWAkNERxKi7" target="_blank"
                                            rel="noopener">{{ $links->address_english }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form-card">
                            <div class="section-eyebrow">Send Message</div>
                            <h3>Tell us what you need</h3>
                            <p class="lead-copy mb-4">Fill out the form below and we will reach back with the most relevant
                                information as soon as possible.</p>

                            <form id="myForm" method="POST" action="{{ route('contactdata.store') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label mb-2">Full Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name_english"
                                                placeholder="Your full name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label mb-2">Email Address <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="your@email.com" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label mb-2">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                placeholder="+880 1234 567890" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject" class="form-label mb-2">Subject <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="subject" name="subject_english"
                                                placeholder="How can we help?" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message" class="form-label mb-2">Message <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="message" name="message_english" rows="6"
                                                placeholder="Share your message, service interest, or project details..." required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 pt-2">
                                        <button type="submit" class="btn contact-submit w-100">
                                            <i class="bi bi-send-fill me-2"></i>Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="contact-map-card">
                    <div class="map-header">
                        <div class="section-eyebrow">Find Us</div>
                        <h3>Office Location</h3>
                        <p>Use the map below to locate our office and plan your visit.</p>
                    </div>
                    <div class="contact-map-body">
                        {!! $links->map_link ??
                            '<iframe src="https://maps.google.com/" style="width:100%; height:100%; border:0;" allowfullscreen="" loading="lazy"></iframe>' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section End -->

    <!-- Form Validation Script -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name_english: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    subject_english: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    message_english: {
                        required: true
                    }
                },
                messages: {
                    name_english: {
                        required: 'Please enter your name'
                    },
                    email: {
                        required: 'Please enter your email',
                        email: 'Please enter a valid email address'
                    },
                    subject_english: {
                        required: 'Please enter a subject'
                    },
                    phone: {
                        required: 'Please enter your phone number'
                    },
                    message_english: {
                        required: 'Please enter your message'
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('text-danger small fw-semibold');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

    <style>
        .text-danger.small.fw-semibold {
            display: block;
            margin-top: 8px;
        }
    </style>
@endsection
