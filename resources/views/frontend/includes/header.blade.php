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
<!-- Header styles moved to public/frontend/assets/css/header.css -->

<header class="modern-header" id="siteHeader">
    <div class="header-container">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo-section">
            @if ($logo && $logo->frontend_logo_image)
                <img src="{{ asset($logo->frontend_logo_image) }}" alt="Logo" class="logo-img">
            @else
                <div class="logo-icon">📊</div>
            @endif
            <span class="logo-text">Estate
                <span class="highlight">Brokarage
                </span>
            </span>
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
                        @endforelse
                        <a href="{{ route('all.project.list') }}" class="subcategory-link">All Projects</a>
                    </div>
                </li>

                <li class="dropdown">
                    <button>
                        Sell
                        <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <a href="{{ route('rent.property.request') }}">Sell Your Property</a>
                        {{-- <a href="#">Rental Guide</a> --}}
                    </div>
                </li>

                <li><a href="{{ route('all.builders') }}"> Builders</a></li>
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

                        <a href="{{ route('all.builders') }}"> Builders</a>
                        <a href="{{ route('roi.calculator') }}">ROI Calculator</a>
                        <a href="{{ route('emi.calculator') }}">EMI Calculator</a>
                        <a href="{{ route('unit.converter') }}">Unit Converter</a>

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
            <a href="{{ route('rent.property.request') }}" class="btn-post">
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

            <div class="mobile-collapse-group">
                <button type="button" class="mobile-collapse-toggle" aria-expanded="false">Buy</button>
                <div class="mobile-collapse-content" aria-hidden="true">
                    <a href="{{ route('all.project.list') }}" class="mobile-submenu-item">All Projects</a>
                    @foreach ($projectCategories as $category)
                        <div class="mobile-submenu-group">
                            <button type="button" class="mobile-category-toggle" aria-expanded="false">
                                {{ $category->name }}
                            </button>
                            <div class="mobile-category-content" aria-hidden="true">
                                <a href="{{ route('all.project.list', ['category' => $category->slug]) }}"
                                    class="mobile-submenu-item">{{ $category->name }}</a>
                                @foreach ($category->subcategories as $subcategory)
                                    <a href="{{ route('all.project.list', ['category' => $category->slug, 'subcategory' => $subcategory->slug]) }}"
                                        class="mobile-submenu-item">{{ $subcategory->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('rent.property.request') }}">Sell</a>
            <a href="{{ route('all.builders') }}">Builders</a>
            <a href="{{ route('all.project.list') }}">Best Locations</a>
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

    // Mobile menu collapse groups
    document.querySelectorAll('.mobile-collapse-toggle').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const open = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!open));
            const content = toggle.nextElementSibling;
            if (content) {
                content.classList.toggle('open', !open);
                content.setAttribute('aria-hidden', String(open));
            }
        });
    });

    document.querySelectorAll('.mobile-category-toggle').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const open = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!open));
            const content = toggle.nextElementSibling;
            if (content) {
                content.classList.toggle('open', !open);
                content.setAttribute('aria-hidden', String(open));
            }
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

        let lockedOpen = false;

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
            lockedOpen = false;
            syncAriaState();
        };

        buyBtn?.addEventListener('click', function(e) {
            e.preventDefault();
            lockedOpen = !lockedOpen;
            if (lockedOpen) {
                openDropdown();
            } else {
                closeDropdown();
            }
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
                if (buyDropdown.classList.contains('open')) {
                    closeDropdown();
                } else {
                    openDropdown();
                }
            }

            if (e.key === 'Escape') {
                e.preventDefault();
                closeDropdown();
                buyBtn.focus();
            }
        });

        buyDropdown.addEventListener('mouseenter', () => {
            if (!lockedOpen) {
                openDropdown();
            }
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
                    if (!dropdownMenu?.matches(':hover') && !lockedOpen) {
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
            if (!lockedOpen) {
                hoverTimeout = setTimeout(() => {
                    closeDropdown();
                }, 360);
            }
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
            if (lockedOpen && !buyDropdown.contains(e.target)) {
                closeDropdown();
            }
        });

        syncAriaState();
    }

    // Desktop dropdown menu functionality (hover + click lock)
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        if (dropdown.id === 'buyDropdown') return;

        const button = dropdown.querySelector('button');
        const menu = dropdown.querySelector('.dropdown-menu');
        let closeDelayTimer;
        let lockedOpen = false;

        const openMenu = () => {
            clearTimeout(closeDelayTimer);
            dropdown.classList.add('open');
            button?.setAttribute('aria-expanded', 'true');
            menu.style.opacity = '1';
            menu.style.visibility = 'visible';
            menu.style.transform = 'translateY(0) scale(1)';
            menu.style.pointerEvents = 'auto';
        };

        const closeMenu = () => {
            dropdown.classList.remove('open');
            lockedOpen = false;
            button?.setAttribute('aria-expanded', 'false');
            menu.style.opacity = '0';
            menu.style.visibility = 'hidden';
            menu.style.transform = 'translateY(-8px) scale(0.98)';
            menu.style.pointerEvents = 'none';
        };

        if (button && menu) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                lockedOpen = !lockedOpen;
                if (lockedOpen) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            dropdown.addEventListener('mouseenter', function() {
                if (!lockedOpen) {
                    openMenu();
                }
            });

            dropdown.addEventListener('mouseleave', function() {
                if (!lockedOpen) {
                    closeDelayTimer = setTimeout(closeMenu, 280);
                }
            });

            menu.addEventListener('mouseenter', function() {
                clearTimeout(closeDelayTimer);
            });

            menu.addEventListener('mouseleave', function() {
                if (!lockedOpen) {
                    closeDelayTimer = setTimeout(closeMenu, 280);
                }
            });

            document.addEventListener('click', event => {
                if (lockedOpen && !dropdown.contains(event.target)) {
                    closeMenu();
                }
            });
        }
    });
</script>
