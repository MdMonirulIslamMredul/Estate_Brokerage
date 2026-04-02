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
        --primary-dark: #7f0000;
        --header-ink: #111827;
        --header-ink-soft: rgba(17, 24, 39, 0.66);
        --header-surface: rgba(8, 12, 20, 0.88);
        --header-surface-scrolled: rgba(255, 255, 255, 0.92);
        --header-border: rgba(255, 255, 255, 0.12);
        --header-border-scrolled: rgba(15, 23, 42, 0.08);
        --header-accent: #f7b267;
        --text-white: #ffffff;
    }

    header.modern-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 1000;
        background: transparent;
        border-bottom: 1px solid transparent;
        transition: background 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease, transform 0.28s ease;
        overflow: visible;
    }

    header.modern-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 12% 18%, rgba(247, 178, 103, 0.2), transparent 34%),
            radial-gradient(circle at 84% 10%, rgba(178, 1, 1, 0.24), transparent 28%);
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.28s ease;
    }

    header.modern-header.scrolled {
        background: var(--header-surface-scrolled);
        border-bottom-color: var(--header-border-scrolled);
        box-shadow: 0 12px 34px rgba(15, 23, 42, 0.08);
    }

    header.modern-header.scrolled::before {
        opacity: 0.85;
    }

    header.modern-header.scrolled .logo-section,
    header.modern-header.scrolled .nav-menu a,
    header.modern-header.scrolled .nav-menu button,
    header.modern-header.scrolled .btn-post,
    header.modern-header.scrolled .text-links a {
        color: var(--header-ink);
    }

    header.modern-header.scrolled .logo-text {
        color: var(--header-ink);
    }

    header.modern-header.scrolled .nav-menu a:hover {
        color: var(--primary-color) !important;
    }

    header.modern-header.scrolled .text-links a:hover {
        color: var(--primary-color) !important;
    }

    .header-container {
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1.25rem;
        min-height: 92px;
        position: relative;
        z-index: 1;
        overflow: visible;
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 0.15rem;
        text-decoration: none;
        flex-shrink: 0;
        color: var(--text-white);
        transition: all 0.3s ease;
        min-width: 0;
    }

    .logo-icon {
        width: 72px !important;
        height: 72px !important;
        border-radius: 20px;
        background: linear-gradient(135deg, var(--primary-color), #f26b3a);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        font-weight: 700;
        font-size: 1.4rem;
        box-shadow: 0 18px 28px rgba(178, 1, 1, 0.22);
        overflow: hidden;
    }

    .logo-section:hover .logo-icon {
        transform: translateY(-1px) scale(1.03);
        box-shadow: 0 22px 34px rgba(178, 1, 1, 0.26);
    }

    .logo-text {
        display: flex;
        flex-direction: row;
        align-items: baseline;
        gap: 0;
        font-weight: 800;
        font-size: 1.08rem;
        letter-spacing: 0;
        text-transform: uppercase;
        line-height: 1;
        color: var(--text-white);
        white-space: nowrap;
    }

    .logo-text .highlight {
        display: inline;
        margin-top: 0;
        letter-spacing: 0;
        font-size: inherit;
        font-weight: inherit;
        color: var(--primary-color);
    }

    .logo-img {
        width: 72px !important;
        height: 72px !important;
        object-fit: contain;
        object-position: center;
        display: block;
        border-radius: 20px;
        background: transparent;
        padding: 0;
        box-shadow: none;
    }

    /* Desktop Navigation */
    .nav-wrapper.desktop {
        display: none;
        flex: 1;
        min-width: 0;
    }

    @media (min-width: 1024px) {
        .nav-wrapper.desktop {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: visible;
        }
    }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: clamp(1rem, 1.7vw, 2rem);
        list-style: none;
        margin: 0;
        padding: 0;
        flex: 1;
        overflow: visible;
    }

    .nav-menu a,
    .nav-menu button {
        position: relative;
        font-weight: 600;
        font-size: 0.94rem;
        letter-spacing: 0.01em;
        transition: color 0.25s ease, transform 0.25s ease;
        color: var(--text-white);
        background: none;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.95rem 0;
        text-decoration: none;
    }

    .nav-menu a:hover,
    .nav-menu button:hover {
        color: #ffffff;
        transform: translateY(-1px);
    }

    .nav-menu a::after,
    .nav-menu button::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0.55rem;
        width: 100%;
        height: 2px;
        border-radius: 999px;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.22s ease;
        background: linear-gradient(90deg, var(--primary-color), var(--header-accent));
    }

    .nav-menu a:hover::after,
    .nav-menu button:hover::after {
        transform: scaleX(1);
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.98) 0%, rgba(250, 252, 255, 0.98) 100%);
        border-radius: 1.05rem;
        box-shadow: 0 24px 48px rgba(15, 23, 42, 0.16);
        min-width: 200px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-8px) scale(0.98);
        transition: opacity 0.28s ease, visibility 0.28s ease, transform 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        margin-top: 0.75rem;
        padding: 0.6rem;
        border: 1px solid rgba(226, 232, 240, 0.92);
        z-index: 9999;
        display: block;
        pointer-events: none;
        backdrop-filter: blur(14px);
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        pointer-events: auto;
        animation: buyDropdownIn 0.28s ease;
    }

    .dropdown-menu a:not(.subcategory-link):not(.category-direct-link) {
        color: #111827;
        padding: 0.7rem 0.9rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s ease;
        border-radius: 0.75rem;
        background: #ffffff;
        border: 1px solid #edf2f7;
        margin-bottom: 0.38rem;
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
        background: #fff7f4;
        color: #111827;
        border-color: #ffd9cd;
        transform: translateX(2px);
        box-shadow: 0 8px 18px rgba(240, 74, 35, 0.1);
    }

    .dropdown-menu a:not(.subcategory-link):not(.category-direct-link):hover::after {
        opacity: 1;
        transform: translateX(0);
    }

    /* Header Right Section */
    .header-actions {
        display: none;
        align-items: center;
        gap: 0.9rem;
        margin-left: auto;
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
        padding: 0.82rem 1.15rem;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--text-white);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.08);
        transition: all 0.25s ease;
        cursor: pointer;
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-post:hover {
        background: rgba(255, 255, 255, 0.16);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.28);
        transform: translateY(-1px);
    }

    header.modern-header.scrolled .btn-post {
        color: var(--header-ink);
        border-color: rgba(17, 24, 39, 0.08);
        background: #ffffff;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
    }

    .text-links {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .text-links a {
        font-size: 0.92rem;
        font-weight: 600;
        color: var(--text-white);
        text-decoration: none;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .text-links a:hover {
        color: var(--header-accent);
    }

    .btn-primary {
        padding: 0.84rem 1.35rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, var(--primary-color), #f26b3a);
        color: white;
        font-size: 0.88rem;
        font-weight: 600;
        border: none;
        box-shadow: 0 16px 26px rgba(178, 1, 1, 0.24);
        transition: transform 0.25s ease, box-shadow 0.25s ease, filter 0.25s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }

    .btn-primary:hover {
        box-shadow: 0 20px 34px rgba(178, 1, 1, 0.28);
        transform: translateY(-1px);
        filter: brightness(1.02);
    }

    header.modern-header.scrolled .btn-primary {
        box-shadow: 0 14px 24px rgba(178, 1, 1, 0.22);
    }

    /* Mobile Menu Button */
    .mobile-menu-btn {
        display: flex;
        width: 46px;
        height: 46px;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.14);
        color: var(--text-white);
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .mobile-menu-btn:hover {
        background: rgba(255, 255, 255, 0.14);
        transform: translateY(-1px);
    }

    header.modern-header.scrolled .mobile-menu-btn {
        color: var(--header-ink);
        background: rgba(17, 24, 39, 0.04);
        border-color: rgba(17, 24, 39, 0.08);
    }

    header.modern-header.scrolled .mobile-menu-btn:hover {
        background: rgba(17, 24, 39, 0.06);
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
        padding: 0.6rem !important;
        overflow: visible;
        border-radius: 1.05rem;
        border: 1px solid rgba(226, 232, 240, 0.92);
        box-shadow: 0 24px 48px rgba(15, 23, 42, 0.16);
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.98) 0%, rgba(250, 252, 255, 0.98) 100%);
        backdrop-filter: blur(14px);
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
        padding: 0.7rem 0.8rem;
        color: #111827;
        font-weight: 600;
        font-size: 0.86rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 0.75rem;
        margin: 0.08rem 0.12rem 0.24rem;
        min-height: 46px;
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
        color: #111827 !important;
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
        color: #111827;
        border-color: #e5e7eb;
        transform: none;
        box-shadow: none;
    }

    .category-label:hover {
        background: #fff7f4;
        color: var(--primary-color);
        border-color: #ffd9cd;
        transform: translateX(2px);
        box-shadow: 0 8px 18px rgba(240, 74, 35, 0.1);
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
        padding: 0.6rem 0.72rem;
        color: #111827;
        text-decoration: none;
        font-size: 0.87rem;
        font-weight: 600;
        border-radius: 0.7rem;
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
        background: #fff7f4;
        color: #111827;
        transform: translateX(2px);
        border-color: #ffd9cd;
        box-shadow: 0 8px 18px rgba(240, 74, 35, 0.1);
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
        background: rgba(8, 12, 20, 0.96);
        backdrop-filter: blur(16px);
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 20px 38px rgba(15, 23, 42, 0.18);
        padding: 1rem;
    }

    .mobile-menu.active {
        display: block;
    }

    .mobile-cta-row {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .mobile-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.92rem 1rem;
        border-radius: 16px;
        text-decoration: none;
        font-size: 0.92rem;
        font-weight: 700;
        transition: all 0.25s ease;
        white-space: nowrap;
    }

    .mobile-cta.primary {
        background: linear-gradient(135deg, var(--primary-color), #f26b3a);
        color: #ffffff;
        box-shadow: 0 16px 24px rgba(178, 1, 1, 0.24);
    }

    .mobile-cta.secondary {
        background: rgba(255, 255, 255, 0.06);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .mobile-cta:hover {
        transform: translateY(-1px);
    }

    .mobile-nav {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .mobile-nav a {
        padding: 0.85rem 1rem;
        color: var(--text-white);
        text-decoration: none;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid transparent;
        transition: all 0.25s ease;
    }

    .mobile-nav a:hover {
        background: rgba(255, 255, 255, 0.08);
        color: var(--header-accent);
        border-color: rgba(255, 255, 255, 0.08);
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
            gap: 0.85rem;
            min-height: 84px;
        }

        .logo-text {
            font-size: 1rem;
        }

        .logo-icon {
            width: 58px;
            height: 58px;
            font-size: 1.22rem;
        }

        .logo-img {
            width: 58px !important;
            height: 58px !important;
        }
    }

    @media (max-width: 640px) {
        .header-container {
            padding: 0 1rem;
        }

        .logo-text {
            font-size: 0.92rem;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            font-size: 1rem;
        }

        .logo-img {
            width: 50px !important;
            height: 50px !important;
        }

        body {
            padding-top: 76px;
        }

        header.modern-header {
            background: transparent;
        }

        .mobile-cta-row {
            grid-template-columns: 1fr;
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
                    <button class="buy-btn" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="buyDropdownMenu">
                        Buy
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu buy-dropdown-menu" id="buyDropdownMenu">
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
                    <button type="button" aria-haspopup="true" aria-expanded="false">
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
                    <button type="button" aria-haspopup="true" aria-expanded="false">
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
                    <button type="button" aria-haspopup="true" aria-expanded="false">
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
            </ul>
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
        <div class="mobile-cta-row">
            <a href="{{ route('contact.us') }}" class="mobile-cta secondary">Post Requirement</a>
            <a href="{{ url('/register') }}" class="mobile-cta primary">Join as Broker</a>
        </div>
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
            <a href="{{ url('/login') }}">Login</a>
        </nav>
    </div>
</header>

<script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn?.addEventListener('click', function() {
        mobileMenu?.classList.toggle('active');
    });

    // Header scroll effect - transparent to white
    const siteHeader = document.getElementById('siteHeader');

    const updateHeaderState = () => {
        if (!siteHeader) {
            return;
        }

        if (window.scrollY > 20) {
            siteHeader.classList.add('scrolled');
        } else {
            siteHeader.classList.remove('scrolled');
        }
    };

    window.addEventListener('scroll', function() {
        updateHeaderState();
    });

    updateHeaderState();

    // Close mobile menu on link click
    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', function() {
            mobileMenu?.classList.remove('active');
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

        buyBtn?.setAttribute('type', 'button');

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
