@php
    $links = App\Models\WebsiteLink::latest()->first();
    $logo = App\Models\Logo::latest()->first();
    $footer = App\Models\Footer::latest()->first();
@endphp

<style>
    :root {
        --footer-primary: #0f172a;
        --footer-secondary: #1e293b;
        --footer-accent: #f59e0b;
        --footer-bg: #0f172a;
        --footer-text: #f5f5f5;
        --footer-text-muted: #cbd5e1;
    }

    .footer-banner-strip {
        background: linear-gradient(180deg, transparent 0%, rgba(15, 23, 42, 0.6) 100%);
        min-height: 40px;
    }

    .site-footer {
        background: linear-gradient(180deg, #0f172a 0%, #1a2842 100%);
        color: var(--footer-text);
        border-top: none;
        padding: 4rem 0 2rem;
    }

    .footer-top {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }

    .footer-brand {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .footer-logo img {
        height: 150px !important;
        width: 150px !important;
    }



    .footer-description {
        color: var(--footer-text-muted);
        font-size: 0.95rem;
        line-height: 1.7;
    }

    .footer-widget {
        margin-bottom: 0;
    }

    .footer-widget-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding-bottom: 0;
        border-bottom: none;
    }

    .footer-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .footer-widget li {
        margin-bottom: 0;
    }

    .footer-widget a {
        color: var(--footer-text-muted);
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .footer-widget a:hover {
        color: var(--footer-accent);
        padding-left: 4px;
    }

    .footer-socials {
        display: flex;
        gap: 0.75rem;
        margin-top: 0;
    }

    .footer-socials li {
        margin: 0 !important;
        list-style: none !important;
    }

    .footer-socials li::before {
        content: none !important;
    }

    .footer-socials a {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(30, 41, 59, 0.8);
        color: var(--footer-text-muted);
        border-radius: 4px;
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        border: 1px solid rgba(148, 163, 184, 0.2);
    }

    .footer-socials a:hover {
        background: var(--footer-accent);
        color: white;
        border-color: var(--footer-accent);
        transform: translateY(-2px);
    }

    .footer-bottom {
        border-top: 1px solid rgba(148, 163, 184, 0.1);
        padding-top: 2rem;
        margin-top: 0;
    }

    .footer-bottom-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .footer-bottom p {
        margin: 0;
        color: var(--footer-text-muted);
        font-size: 0.9rem;
    }

    .footer-bottom-links {
        display: flex;
        gap: 2rem;
    }

    .footer-bottom-links a {
        color: var(--footer-text-muted);
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .footer-bottom-links a:hover {
        color: var(--footer-accent);
    }

    .footer-contact-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    .footer-contact-info a {
        color: var(--footer-text-muted);
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .footer-contact-info a:hover {
        color: var(--footer-accent);
    }

    .footer-contact-info-icon {
        color: var(--footer-accent);
    }

    .footer-icon-box {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--footer-accent) 0%, #fb923c 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        font-weight: 700;
    }

    @media (max-width: 1024px) {
        .footer-top {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
    }

    @media (max-width: 768px) {
        .footer-top {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .footer-bottom-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-widget-title {
            font-size: 0.9rem;
        }
    }
</style>

<section class="footer-banner-strip"></section>
<footer class="site-footer">
    <div class="container">
        <div class="footer-top">
            <!-- Brand Column -->
            <div class="footer-brand">
                <div class="footer-logo">
                    <img src="{{ asset($logo->frontend_logo_image) }}" alt="{{ config('app.name') }}">
                </div>
                <p class="footer-description">{{ $footer->footer_details_eng }}</p>
                <div>
                    <h6 style="color: white; margin-bottom: 1rem; font-size: 0.9rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Follow Us</h6>
                    <ul class="footer-socials">
                        <li><a href="{{ $links->facebook }}" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="{{ $links->instagram }}" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="{{ $links->youtube }}" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a></li>
                        <li><a href="{{ $links->linkedIn }}" target="_blank" title="LinkedIn"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- Properties Column -->
            <div class="footer-widget">
                <h5 class="footer-widget-title">Properties</h5>
                <ul>
                    <li><a href="#">Buy Property</a></li>
                    <li><a href="#">Rent Property</a></li>
                    <li><a href="#">Flat Zone</a></li>
                    <li><a href="#">Land Zone</a></li>
                    <li><a href="#">Commercial</a></li>
                </ul>
            </div>

            <!-- Services Column -->
            <div class="footer-widget">
                <h5 class="footer-widget-title">Services</h5>
                <ul>
                    <li><a href="#">Find Builders</a></li>
                    <li><a href="#">Rent Your Property</a></li>
                    <li><a href="#">ROI Calculator</a></li>
                    <li><a href="#">EMI Calculator</a></li>
                    <li><a href="#">Unit Converter</a></li>
                </ul>
            </div>

            <!-- Company Column -->
            <div class="footer-widget">
                <h5 class="footer-widget-title">Company</h5>
                <ul>
                    <li><a href="{{ route('about.details') }}">About Us</a></li>
                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                    <li><a href="{{ route('frontend.ongoing.project') }}">Best Locations</a></li>
                    <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-row">
                <div class="footer-contact-info">
                    <span class="footer-contact-info-icon"><i class="bi bi-telephone"></i></span>
                    <a href="tel:{{ $links->phone }}">{{ $links->phone }}</a>
                    <span style="color: var(--footer-text-muted);">|</span>
                    <span class="footer-contact-info-icon"><i class="bi bi-envelope"></i></span>
                    <a href="mailto:{{ $links->email }}">{{ $links->email }}</a>
                </div>
                <p style="margin: 0;">© 2026 {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
