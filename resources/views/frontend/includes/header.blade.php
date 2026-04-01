@php
    $links = App\Models\WebsiteLink::latest()->first();
    $logo = App\Models\Logo::latest()->first();
    $projectCategories = App\Models\ProjectCategory::where('status', 1)
        ->with([
            'subcategories' => function ($query) {
                $query->where('status', 1)->orderBy('name');
            },
        ])
        ->orderBy('name')
        ->get();
@endphp
<style>
    :root {
        --primary-color: #b20101;
        --primary-dark: #8f0000;
        --text-dark: #1a1a1a;
        --text-white: #ffffff;
        --header-bg-scroll: #ffffff;
    }

    header.modern-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 1000;
        background: transparent;
        transition: all 0.3s ease;
        border-bottom: none;
        padding: 1rem 0;
        overflow: visible;
    }

    header.modern-header.scrolled {
        background: var(--header-bg-scroll);
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
        padding: 0.75rem 0;
    }

    header.modern-header.scrolled .logo-section,
    header.modern-header.scrolled .nav-menu a,
    header.modern-header.scrolled .nav-menu button,
    header.modern-header.scrolled .btn-post,
    header.modern-header.scrolled .text-links a {
        color: var(--text-dark);
    }

    header.modern-header.scrolled .logo-text {
        color: var(--text-dark);
    }

    header.modern-header.scrolled .nav-menu a:hover {
        color: var(--primary-color) !important;
    }

    header.modern-header.scrolled .text-links a:hover {
        color: var(--primary-color) !important;
    }

    .header-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 2rem;
        overflow: visible;
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        flex-shrink: 0;
        color: var(--text-white);
        transition: all 0.3s ease;
    }

    .logo-icon {
        width: 100px !important;
        height: auto !important;
        border-radius: 0.1rem;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: transform 0.3s ease;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .logo-section:hover .logo-icon {
        transform: scale(1.05);
    }

    .logo-text {
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        color: var(--text-white);
    }

    .logo-text .highlight {
        color: var(--primary-color);
    }

    .logo-img {
        width: 100px !important;
        height: 100px !important;
        object-fit: contain;
        object-position: center;
        display: block;
        border-radius: 0.1rem;
    }

    /* Desktop Navigation */
    .nav-wrapper.desktop {
        display: none;
        flex: 1;
    }

    @media (min-width: 1024px) {
        .nav-wrapper.desktop {
            display: flex;
            align-items: center;
            overflow: visible;
        }
    }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 2.5rem;
        list-style: none;
        margin: 0;
        padding: 0;
        flex: 1;
        overflow: visible;
    }

    .nav-menu a,
    .nav-menu button {
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        color: var(--text-white);
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0;
        text-decoration: none;
    }

    .nav-menu a:hover,
    .nav-menu button:hover {
        color: var(--primary-color);
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
        border-radius: 1rem;
        box-shadow: 0 18px 42px rgba(15, 23, 42, 0.2);
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px) scale(0.98);
        transition: opacity 0.34s ease, visibility 0.34s ease, transform 0.34s cubic-bezier(0.22, 1, 0.36, 1);
        margin-top: 0.8rem;
        padding: 0.55rem;
        border: 1px solid rgba(226, 232, 240, 0.9);
        z-index: 9999;
        display: block;
        pointer-events: none;
        backdrop-filter: blur(8px);
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        pointer-events: auto;
        animation: buyDropdownIn 0.28s ease;
    }

    .dropdown-menu a:not(.subcategory-link):not(.category-direct-link) {
        color: #000000;
        padding: 0.62rem 0.85rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        border-radius: 0.6rem;
        background: #ffffff;
        border: 1px solid #edf2f7;
        margin-bottom: 0.35rem;
    }

    .dropdown-menu a:not(.subcategory-link):not(.category-direct-link):last-child {
        margin-bottom: 0;
    }

    .dropdown-menu a:not(.subcategory-link):not(.category-direct-link)::after {
        content: '›';
        margin-left: 0.5rem;
        opacity: 0;
        transform: translateX(-3px);
        transition: all 0.16s ease;
    }

    .dropdown-menu a:not(.subcategory-link):not(.category-direct-link):hover {
        background: #fff7f5;
        color: #000000;
        border-color: #ffd7cf;
        transform: translateX(2px);
        box-shadow: 0 4px 12px rgba(240, 74, 35, 0.12);
    }

    .dropdown-menu a:not(.subcategory-link):not(.category-direct-link):hover::after {
        opacity: 1;
        transform: translateX(0);
    }

    /* Header Right Section */
    .header-actions {
        display: none;
        align-items: center;
        gap: 1.5rem;
    }

    @media (min-width: 1024px) {
        .header-actions {
            display: flex;
        }
    }

    .btn-post {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.65rem 1.25rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        border-radius: 9999px;
        background: transparent;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-post:hover {
        background: rgba(245, 158, 11, 0.08);
        color: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    header.modern-header.scrolled .btn-post {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .text-links {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .text-links a {
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--text-white);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .text-links a:hover {
        color: var(--primary-color);
    }

    .btn-primary {
        padding: 0.65rem 1.5rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        font-size: 0.9rem;
        font-weight: 600;
        border: none;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary:hover {
        box-shadow: 0 8px 20px rgba(245, 158, 11, 0.4);
        transform: translateY(-2px);
    }

    header.modern-header.scrolled .btn-primary {
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
    }

    /* Mobile Menu Button */
    .mobile-menu-btn {
        display: flex;
        padding: 0.5rem;
        border-radius: 0.5rem;
        background: transparent;
        border: none;
        color: var(--text-white);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .mobile-menu-btn:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    header.modern-header.scrolled .mobile-menu-btn {
        color: var(--text-dark);
    }

    header.modern-header.scrolled .mobile-menu-btn:hover {
        background: rgba(0, 0, 0, 0.05);
    }

    @media (min-width: 1024px) {
        .mobile-menu-btn {
            display: none;
        }
    }

    /* Chevron Icon */
    .chevron {
        width: 16px;
        height: 16px;
        transition: transform 0.3s ease;
    }

    .dropdown:hover .chevron {
        transform: rotate(180deg);
    }

    .dropdown.open .dropdown-menu {
        opacity: 1 !important;
        visibility: visible !important;
        transform: translateY(0) scale(1) !important;
        pointer-events: auto !important;
        animation: buyDropdownIn 0.28s ease;
    }

    .buy-dropdown-menu {
        --category-col-width: clamp(132px, 15vw, 160px);
        min-width: calc(var(--category-col-width) + clamp(40px, 5vw, 40px)) !important;
        max-width: min(80vw, 540px);
        padding: 0.55rem !important;
        overflow: visible;
        border-radius: 1rem;
        border: 1px solid rgba(226, 232, 240, 0.9);
        box-shadow: 0 18px 42px rgba(15, 23, 42, 0.2);
        background: linear-gradient(180deg, #ffffff 0%, #fbfdff 100%);
        backdrop-filter: blur(8px);
        animation: buyDropdownIn 0.28s ease;
    }

    @keyframes buyDropdownIn {
        from {
            opacity: 0;
            transform: translateY(8px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes subcategoryIn {
        from {
            opacity: 0;
            transform: translateX(8px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .category-item {
        position: static;
        width: var(--category-col-width);
    }

    .category-label {
        padding: 0.5rem 0.72rem;
        color: #000000;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 0.6rem;
        margin: 0.1rem 0.16rem 0.24rem;
        min-height: 42px;
        box-sizing: border-box;
        border: 1px solid #edf2f7;
        transition: all 0.2s ease;
        background: #ffffff;
    }

    .category-direct-link {
        color: inherit;
        text-decoration: none;
        flex: 1;
        display: block;
        padding: 0;
        margin: 0;
        border: none;
        background: transparent;
        box-shadow: none;
    }

    .buy-dropdown-menu .category-direct-link,
    .buy-dropdown-menu .category-direct-link:hover,
    .buy-dropdown-menu .category-direct-link:focus,
    .buy-dropdown-menu .category-label .category-direct-link {
        color: #000000 !important;
    }

    .buy-dropdown-menu .category-label:hover .category-direct-link,
    .buy-dropdown-menu .category-label:hover {
        color: var(--primary-color) !important;
    }

    .category-direct-link:hover,
    .category-direct-link:visited {
        color: inherit;
    }

    .category-item.open .category-label {
        background: #ffffff;
        color: #000000;
        border-color: #e5e7eb;
        transform: none;
        box-shadow: none;
    }

    .category-label:hover {
        background: #fff7f5;
        color: var(--primary-color);
        border-color: #ffd7cf;
        transform: translateX(2px);
        box-shadow: 0 4px 12px rgba(240, 74, 35, 0.12);
    }

    .buy-btn:focus-visible,
    .category-label:focus-visible,
    .subcategory-link:focus-visible {
        outline: 2px solid rgba(176, 1, 1, 0.75);
        outline-offset: 2px;
    }

    .category-item .category-label .chevron {
        width: 11px !important;
        height: 11px !important;
        transition: transform 0.2s ease, opacity 0.2s ease;
        opacity: 0.8;
    }

    .category-item.open .category-label .chevron {
        transform: rotate(90deg);
        opacity: 1;
    }

    .subcategory-menu {
        display: none;
        position: absolute;
        left: var(--category-col-width);
        top: 0;
        width: clamp(180px, 27vw, 280px);
        min-height: auto;
        padding: 0.85rem 0.9rem;
        background: #ffffff;
        border: 1px solid #dde6f0;
        border-radius: 1rem;
        margin: 0.22rem 0.22rem 0.22rem 0;
        max-height: 380px;
        overflow-y: auto;
        grid-template-columns: 1fr;
        gap: 0.3rem;
        align-content: start;
        animation: subcategoryIn 0.2s ease;
    }

    .subcategory-menu::-webkit-scrollbar {
        width: 6px;
    }

    .subcategory-menu::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 999px;
    }

    .category-item.open .subcategory-menu {
        display: grid;
    }

    .subcategory-title {
        grid-column: 1 / -1;
        font-size: 0.9rem;
        font-weight: 700;
        color: #000000;
        margin: 0.05rem 0 0.35rem;
        padding-bottom: 0.45rem;
        border-bottom: 1px solid #e4e7eb;
        letter-spacing: 0.01em;
    }

    .buy-dropdown-menu .subcategory-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.56rem 0.72rem;
        color: #000000;
        text-decoration: none;
        font-size: 0.88rem;
        font-weight: 600;
        border-radius: 0.6rem;
        margin: 0;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        line-height: 1.25;
        transition: all 0.18s ease;
        white-space: normal;
        opacity: 1;
    }

    .buy-dropdown-menu .subcategory-link:visited {
        color: #000000;
    }

    .buy-dropdown-menu .subcategory-link::after {
        content: '›';
        margin-left: 0.5rem;
        opacity: 0;
        transform: translateX(-3px);
        transition: all 0.16s ease;
    }

    .buy-dropdown-menu .subcategory-link:hover {
        background: #fff7f5;
        color: #000000;
        transform: translateX(2px);
        border-color: #ffd7cf;
        box-shadow: 0 4px 12px rgba(240, 74, 35, 0.12);
    }

    .buy-dropdown-menu .subcategory-link:hover::after {
        opacity: 1;
        transform: translateX(0);
    }

    .subcategory-empty {
        grid-column: 1 / -1;
        color: #9ca3af;
        font-size: 0.9rem;
        padding: 0.45rem 0.35rem;
    }

    @media (max-width: 1200px) {
        .buy-dropdown-menu {
            min-width: 320px !important;
            max-width: 430px;
            --category-col-width: clamp(120px, 15vw, 145px);
        }

        .subcategory-menu {
            left: var(--category-col-width);
            width: clamp(160px, 23vw, 220px);
            grid-template-columns: 1fr;
        }

        .subcategory-link {
            font-size: 0.86rem;
        }
    }

    /* Mobile Menu */
    .mobile-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: rgba(26, 26, 26, 0.95);
        backdrop-filter: blur(10px);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 1rem;
    }

    .mobile-menu.active {
        display: block;
    }

    .mobile-nav {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .mobile-nav a {
        padding: 0.75rem 1rem;
        color: var(--text-white);
        text-decoration: none;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .mobile-nav a:hover {
        background: rgba(255, 255, 255, 0.1);
        color: var(--primary-color);
    }

    @media (min-width: 1024px) {
        .mobile-menu {
            display: none !important;
        }
    }

    /* Body padding for fixed header */
    body {
        padding-top: 0;
        margin-top: 0;
    }

    /* Responsive */
    @media (max-width: 1023px) {
        .header-container {
            padding: 0 1rem;
            gap: 1rem;
        }

        .logo-text {
            font-size: 1rem;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            font-size: 1.25rem;
        }

        .logo-img {
            width: 48px !important;
            height: 48px !important;
        }
    }

    @media (max-width: 640px) {
        .header-container {
            padding: 0 1rem;
        }

        .logo-text {
            font-size: 0.9rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }

        .logo-img {
            width: 40px !important;
            height: 40px !important;
        }

        body {
            padding-top: 70px;
        }

        header.modern-header {
            padding: 0.75rem 0;
        }
    }
</style>

<header class="modern-header" id="siteHeader">
    <div class="header-container">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo-section">
            @if ($logo && $logo->frontend_logo_image)
                <img src="{{ asset($logo->frontend_logo_image) }}" alt="Logo" class="logo-img">
            @else
                <div class="logo-icon">📊</div>
            @endif
            <span class="logo-text">ESTATE<span class="highlight">BROKERAGE</span></span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="nav-wrapper desktop">
            <ul class="nav-menu">
                <li><a href="{{ url('/') }}">Home</a></li>

                <li class="dropdown" id="buyDropdown">
                    <button class="buy-btn" aria-haspopup="true" aria-expanded="false">
                        Buy
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu buy-dropdown-menu">
                        @forelse($projectCategories as $category)
                            <div class="category-item" data-category-id="{{ $category->id }}">
                                <div class="category-label" role="button" tabindex="0" aria-haspopup="true">
                                    <a href="{{ route('all.project.list', ['category' => $category->slug]) }}"
                                        class="category-direct-link">{{ $category->name }}</a>
                                    <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2"
                                        style="width: 14px; height: 14px;">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                                <div class="subcategory-menu">
                                    <div class="subcategory-title">{{ $category->name }}</div>
                                    @forelse($category->subcategories as $subcategory)
                                        <a href="{{ route('all.project.list', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}"
                                            class="subcategory-link">{{ $subcategory->name }}</a>
                                    @empty
                                        <div class="subcategory-empty">No subcategories</div>
                                    @endforelse
                                </div>
                            </div>
                        @empty
                            <a href="{{ route('all.project.list') }}" class="subcategory-link">Browse all projects</a>
                        @endforelse
                    </div>
                </li>

                <li class="dropdown">
                    <button>
                        Rent
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a href="#">Rent Your Property</a>
                        {{-- <a href="#">Rental Guide</a> --}}
                    </div>
                </li>

                <li><a href="#">Find Builders</a></li>
                <li><a href="{{ route('about.details') }}">About</a></li>

                <li class="dropdown">
                    <button>
                        Media
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a href="{{ route('all.news.list') }}">News</a>
                        <a href="{{ route('frontend.events') }}">Events</a>
                        <a href="{{ route('front.video.gallery') }}">Coverage</a>
                        <a href="{{ route('front.image.gallery') }}">Image Gallery</a>
                    </div>
                </li>

                <li class="dropdown">
                    <button>
                        Services
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>


                    <div class="dropdown-menu">

                        <a href="#">Find Builders</a>
                        <a href="#">ROI Calculator</a>
                        <a href="#">EMI Calculator</a>
                        <a href="#">Unit Converter</a>

                        {{-- @php
                            $services = App\Models\Service::orderBy('id', 'DESC')->get();
                        @endphp
                        @foreach ($services as $item)
                            <a href="{{ route('service.item.details', $item->id) }}">{{ $item->title_english }}</a>
                        @endforeach --}}
                    </div>
                </li>

                <li><a href="{{ route('contact.us') }}">Contact</a></li>
        </nav>

        <!-- Right Actions -->
        <div class="header-actions">
            <a href="{{ route('contact.us') }}" class="btn-post">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                    <path d="M12 11h4"></path>
                    <path d="M12 16h4"></path>
                    <path d="M8 11h.01"></path>
                    <path d="M8 16h.01"></path>
                </svg>
                Post Requirement
            </a>

            <div class="text-links">
                <a href="{{ url('/login') }}">Login</a>
            </div>

            <a href="{{ url('/register') }}" class="btn-primary">
                Join as Broker
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 5h16"></path>
                <path d="M4 12h16"></path>
                <path d="M4 19h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <nav class="mobile-nav">
            <a href="{{ url('/') }}">Home</a>
            <a href="#">Buy</a>
            <a href="#">Rent</a>
            <a href="#">Find Builders</a>
            <a href="#">Best Locations</a>
            <a href="{{ route('about.details') }}">About</a>
            <a href="{{ route('all.news.list') }}">News</a>
            <a href="{{ route('frontend.events') }}">Events</a>
            <a href="{{ route('front.video.gallery') }}">Coverage</a>
            <a href="{{ route('front.image.gallery') }}">Image Gallery</a>
            <a href="{{ route('contact.us') }}">Contact</a>
            <a href="{{ route('contact.us') }}">Post Requirement</a>
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Join as Broker</a>
        </nav>
    </div>
</header>

<script>
    // Mobile menu toggle
    document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('active');
    });

    // Header scroll effect - transparent to white
    window.addEventListener('scroll', function() {
        const header = document.getElementById('siteHeader');
        if (window.scrollY > 20) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Close mobile menu on link click
    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.remove('active');
        });
    });

    // Buy dropdown - left categories with right detail panel
    const buyDropdown = document.getElementById('buyDropdown');
    let hoverTimeout;
    if (buyDropdown) {
        const buyBtn = buyDropdown.querySelector('.buy-btn');
        const categoryItems = buyDropdown.querySelectorAll('.category-item');
        const dropdownMenu = buyDropdown.querySelector('.buy-dropdown-menu');
        const getCategoryLabels = () => Array.from(buyDropdown.querySelectorAll('.category-label'));
        const getActiveSubcategoryLinks = () =>
            Array.from(buyDropdown.querySelectorAll('.category-item.open .subcategory-link'));

        const syncAriaState = () => {
            buyBtn?.setAttribute('aria-expanded', String(buyDropdown.classList.contains('open')));
            categoryItems.forEach(item => {
                const label = item.querySelector('.category-label');
                label?.setAttribute('aria-expanded', String(item.classList.contains('open')));
            });
        };

        const setActiveCategory = activeItem => {
            categoryItems.forEach(item => item.classList.remove('open'));
            activeItem?.classList.add('open');
            syncAriaState();
        };

        const openDropdown = () => {
            clearTimeout(hoverTimeout);
            buyDropdown.classList.add('open');
            syncAriaState();
        };

        const closeDropdown = () => {
            clearTimeout(hoverTimeout);
            buyDropdown.classList.remove('open');
            categoryItems.forEach(i => i.classList.remove('open'));
            syncAriaState();
        };

        buyBtn?.addEventListener('click', function(e) {
            e.preventDefault();
            buyDropdown.classList.toggle('open');
            syncAriaState();
        });

        buyBtn?.addEventListener('keydown', function(e) {
            const labels = getCategoryLabels();

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                openDropdown();
                labels[0]?.focus();
            }

            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                buyDropdown.classList.contains('open') ? closeDropdown() : openDropdown();
            }

            if (e.key === 'Escape') {
                e.preventDefault();
                closeDropdown();
                buyBtn.focus();
            }
        });

        buyDropdown.addEventListener('mouseenter', () => {
            openDropdown();
        });

        categoryItems.forEach(item => {
            const label = item.querySelector('.category-label');
            const submenu = item.querySelector('.subcategory-menu');

            label?.addEventListener('click', function(e) {
                if (e.target.closest('.category-direct-link')) {
                    return;
                }

                e.preventDefault();
                e.stopPropagation();
                openDropdown();
                setActiveCategory(item);
            });

            label?.addEventListener('keydown', function(e) {
                const labels = getCategoryLabels();
                const currentIndex = labels.indexOf(label);

                if (e.target.closest('.category-direct-link') && e.key === 'Enter') {
                    return;
                }

                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    labels[(currentIndex + 1) % labels.length]?.focus();
                }

                if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    labels[(currentIndex - 1 + labels.length) % labels.length]?.focus();
                }

                if (e.key === 'Home') {
                    e.preventDefault();
                    labels[0]?.focus();
                }

                if (e.key === 'End') {
                    e.preventDefault();
                    labels[labels.length - 1]?.focus();
                }

                if (e.key === 'Enter' || e.key === ' ' || e.key === 'ArrowRight') {
                    e.preventDefault();
                    openDropdown();
                    setActiveCategory(item);
                    const firstLink = submenu?.querySelector('.subcategory-link');
                    firstLink?.focus();
                }

                if (e.key === 'Escape') {
                    e.preventDefault();
                    closeDropdown();
                    buyBtn?.focus();
                }
            });

            item.addEventListener('mouseenter', () => {
                clearTimeout(hoverTimeout);
                setActiveCategory(item);
            });

            item.addEventListener('mouseleave', () => {
                hoverTimeout = setTimeout(() => {
                    if (!dropdownMenu?.matches(':hover')) {
                        setActiveCategory(null);
                    }
                }, 260);
            });

            submenu?.addEventListener('mouseenter', () => {
                clearTimeout(hoverTimeout);
                setActiveCategory(item);
            });

            submenu?.querySelectorAll('.subcategory-link').forEach(link => {
                link.addEventListener('keydown', function(e) {
                    const links = getActiveSubcategoryLinks();
                    const currentIndex = links.indexOf(link);

                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        links[(currentIndex + 1) % links.length]?.focus();
                    }

                    if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        links[(currentIndex - 1 + links.length) % links.length]?.focus();
                    }

                    if (e.key === 'Home') {
                        e.preventDefault();
                        links[0]?.focus();
                    }

                    if (e.key === 'End') {
                        e.preventDefault();
                        links[links.length - 1]?.focus();
                    }

                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        label?.focus();
                    }

                    if (e.key === 'Escape') {
                        e.preventDefault();
                        closeDropdown();
                        buyBtn?.focus();
                    }
                });
            });
        });

        dropdownMenu?.addEventListener('mouseleave', () => {
            hoverTimeout = setTimeout(() => {
                closeDropdown();
            }, 360);
        });

        dropdownMenu?.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
        });

        buyDropdown.addEventListener('focusout', e => {
            if (!buyDropdown.contains(e.relatedTarget)) {
                closeDropdown();
            }
        });

        document.addEventListener('click', e => {
            if (!buyDropdown.contains(e.target)) {
                closeDropdown();
            }
        });

        syncAriaState();
    }

    // Desktop dropdown menu functionality
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        if (dropdown.id === 'buyDropdown') return;

        const button = dropdown.querySelector('button');
        const menu = dropdown.querySelector('.dropdown-menu');
        let closeDelayTimer;

        if (button && menu) {
            dropdown.addEventListener('mouseenter', function() {
                clearTimeout(closeDelayTimer);
                menu.style.opacity = '1';
                menu.style.visibility = 'visible';
                menu.style.transform = 'translateY(0) scale(1)';
                menu.style.pointerEvents = 'auto';
            });

            dropdown.addEventListener('mouseleave', function() {
                closeDelayTimer = setTimeout(() => {
                    menu.style.opacity = '0';
                    menu.style.visibility = 'hidden';
                    menu.style.transform = 'translateY(-8px) scale(0.98)';
                    menu.style.pointerEvents = 'none';
                }, 280);
            });

            menu.addEventListener('mouseenter', function() {
                clearTimeout(closeDelayTimer);
            });
        }
    });
</script>
