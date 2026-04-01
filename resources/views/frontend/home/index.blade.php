<!doctype html>
<html lang="en">

<!-- Mirrored from shreethemes.in/towntor/layouts/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 05:10:05 GMT -->

<head>

    @include('frontend.includes.headlink')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #b20101;
            --secondary-color: #3f3f3b;
            --accent-color: #F8F9FA;
            --dark-color: #1A1A1B;
            --light-gray: #F8F9FA;
            --text-muted: #6c757d;
            --text-dark: #2c3e50;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 12px 32px rgba(0, 0, 0, 0.15);
            --border-color: #e8e8e8;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            padding: 0;
            margin: 0;
        }

        /* ===== HERO SECTION ===== */
        .swiper-slider-hero {
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
        }

        .swiper-slider-hero .swiper-container,
        .swiper-slider-hero .swiper-wrapper,
        .swiper-slider-hero .swiper-slide {
            height: 100%;
            min-height: 100vh;
        }

        .swiper-slider-hero .slide-inner {
            background-size: cover !important;
            background-position: center !important;
            min-height: 100vh;
            width: 100%;
        }

        .swiper-slider-hero .bg-overlay {
            background: linear-gradient(180deg, rgba(7, 17, 39, 0.73) 0%, rgba(7, 17, 39, 0.62) 100%);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .hero-foreground {
            position: absolute;
            inset: 0;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 110px 20px 36px;
            pointer-events: none;
        }

        .hero-content-wrap {
            width: min(980px, 100%);
            text-align: center;
            pointer-events: auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(205, 204, 202, 0.747);
            border: 1px solid rgba(255, 40, 7, 0.45);
            border-radius: 999px;
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
        }

        .title-heading {
            margin-bottom: 1.5rem;
        }

        .title-heading h1 {
            color: #ffffff;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.03em;
            font-size: clamp(5.2rem, 10vw, 9rem);
            margin-bottom: 1rem;
        }

        .title-heading .accent-line {
            display: block;
            color: var(--primary-color);
            margin-top: 0.1rem;
        }

        .title-heading p {
            color: rgba(226, 232, 240, 0.78);
            font-size: clamp(1rem, 1.5vw, 1.2rem);
            font-weight: 400;
            letter-spacing: 0.01em;
            line-height: 1.45;
            max-width: 720px;
            margin: 0 auto;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            width: min(920px, 100%);
            margin: 36px auto 0;
        }

        .hero-stat {
            text-align: center;
            color: #ffffff;
        }

        .hero-stat-value {
            display: inline-flex;
            align-items: baseline;
            justify-content: center;
            gap: 0.1rem;
            color: var(--primary-color);
            font-size: clamp(1.7rem, 3.2vw, 2.7rem);
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.4rem;
        }

        .hero-stat-value .hero-stat-plus {
            font-size: 1em;
            line-height: 1;
        }

        .hero-stat-label {
            display: block;
            color: rgba(226, 232, 240, 0.8);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.01em;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background: var(--primary-color) !important;
            transition: all 0.3s ease !important;
            border: none !important;
            width: 48px !important;
            height: 48px !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .swiper-button-next i,
        .swiper-button-prev i {
            color: #ffffff;
            font-size: 18px;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(240, 129, 33, 1) !important;
            transform: scale(1.08);
        }

        /* ===== SEARCH FORM ===== */
        #costom {
            width: min(920px, 94vw) !important;
            margin: 0 auto;
            border-radius: 20px;
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            transform: none !important;
            position: relative !important;
            top: auto !important;
            left: auto !important;
            z-index: 2;
        }

        .searchform {
            background: rgba(255, 255, 255, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.55) !important;
            box-shadow: 0 20px 52px rgba(10, 23, 56, 0.24) !important;
            border-radius: 20px !important;
            overflow: hidden;
            backdrop-filter: blur(7px);
        }

        .searchform .card-body {
            padding: 14px;
        }

        .hero-search-tabs {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
            padding: 8px;
            border-radius: 14px;
            background: #eef1f5;
            margin-bottom: 12px;
        }

        .hero-tab {
            border: 0;
            border-radius: 12px;
            background: transparent;
            color: #334155;
            font-weight: 700;
            padding: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .hero-tab.active {
            background: #ffffff;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.12);
        }

        .hero-search-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 180px 180px;
            gap: 10px;
            align-items: center;
        }

        .hero-search-field .input-group-text {
            border: 1px solid #d9dee7;
            border-right: 0;
            border-radius: 12px 0 0 12px;
            background: #ffffff;
            color: #94a3b8;
            padding-inline: 16px;
        }

        .hero-search-field .form-control {
            border-radius: 0 12px 12px 0 !important;
            border-left: 0;
        }

        .hero-type-select {
            height: 56px;
            border-radius: 12px !important;
        }

        .searchform .form-control,
        .searchform .form-select {
            border: 1px solid #d9dee7;
            border-radius: 12px;
            padding: 12px 14px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #ffffff;
            color: #1f2937;
            height: 56px;
        }

        .searchform .form-label {
            color: var(--secondary-color) !important;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .searchform .form-control:focus,
        .searchform .form-select:focus {
            border-color: var(--primary-color);
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(240, 129, 33, 0.1);
            outline: none;
        }

        .searchform .form-control::placeholder {
            color: var(--text-muted);
        }

        #search {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
            border: none !important;
            color: white !important;
            font-weight: 700;
            transition: all 0.3s ease;
            height: 56px;
            border-radius: 12px !important;
            font-size: 1.15rem;
        }

        #search:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 34px rgba(245, 124, 0, 0.4) !important;
        }

        /* ===== SECTION STYLING ===== */
        .section {
            padding: 80px 0;
        }

        .py-100 {
            padding: 100px 0;
        }

        .section-title {
            margin-bottom: 60px;
        }

        .section-title span {
            font-size: 12px;
            letter-spacing: 2px;
            color: var(--secondary-color);
            text-transform: uppercase;
            font-weight: 600;
        }

        .section-title h1 {
            color: var(--dark-color);
            font-size: 2.8rem;
            font-weight: 700;
            margin-top: 15px;
            line-height: 1.3;
        }

        .section-title h3 {
            color: var(--dark-color);
            font-weight: 700;
        }

        .section-title .divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            margin: 20px auto;
            border-radius: 2px;
        }

        .section-title p {
            color: var(--text-muted);
            font-size: 15px;
            line-height: 1.8;
            margin-top: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ===== ABOUT SECTION ===== */
        .ms-lg-5 {
            margin-left: 3rem !important;
        }

        .section-title {
            text-align: center;
        }

        /* ===== BUTTON STYLES ===== */
        .btn-modern {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white !important;
            border: none;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(240, 129, 33, 0.3);
            color: white;
        }

        .btn-secondary {
            background: white;
            color: var(--primary-color) !important;
            border: 2px solid var(--primary-color);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: #f0f7ff;
            color: var(--secondary-color);
        }

        /* ===== PROJECT CARDS ===== */
        .property {
            border-radius: 12px !important;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
            border: 1px solid var(--border-color) !important;
        }

        .property:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 48px rgba(0, 0, 0, 0.12) !important;
        }

        .property-image {
            height: 280px;
            overflow: hidden;
            background: #f0f0f0;
        }

        .property-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .property:hover .property-image img {
            transform: scale(1.05);
        }

        .card-body {
            padding: 24px;
        }

        .card-body h4 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 12px;
            font-size: 18px;
        }

        .card-body p {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 12px;
        }

        /* ===== COUNTER SECTION ===== */
        .counter-section {
            background: linear-gradient(135deg, var(--dark-color) 0%, var(--primary-color) 100%);
            padding: 60px 40px;
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
        }

        .counter-box h2 {
            color: var(--accent-color);
            font-size: 2.5rem;
            font-weight: 700;
        }

        .counter-box p {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            margin-top: 12px;
            font-size: 16px;
        }

        /* ===== TAB STYLING ===== */
        .nav-pills {
            gap: 12px;
        }

        .nav-link {
            border: 2px solid var(--primary-color);
            color: var(--primary-color) !important;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 10px 20px;
        }

        .nav-link:hover {
            background: #f0f7ff;
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white !important;
            border: none;
        }

        /* ===== ACCORDION STYLING ===== */
        .accordion {
            color: var(--text-dark);
            cursor: pointer;
            padding: 18px 24px;
            width: 100%;
            border: none;
            border-bottom: 1px solid var(--border-color);
            text-align: left;
            outline: none;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .accordion:hover {
            background-color: #f8f9fa;
            padding-left: 28px;
        }

        .accordion.active {
            background: linear-gradient(135deg, rgba(240, 129, 33, 0.1) 0%, rgba(63, 63, 59, 0.08) 100%);
            color: var(--primary-color);
        }

        .accordion:after {
            content: '+';
            color: var(--primary-color);
            font-weight: bold;
            float: right;
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .accordion.active:after {
            content: "−";
        }

        .panel {
            padding: 24px;
            background-color: #fafbfc;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-muted);
            line-height: 1.8;
        }

        /* ===== BOOTSTRAP ACCORDION STYLING ===== */
        .accordion-button::after {
            content: "+" !important;
            font-weight: bold !important;
            font-size: 1.4rem !important;
            color: var(--primary-color) !important;
            background-image: none !important;
            width: auto !important;
            height: auto !important;
            transform: none !important;
            position: static !important;
        }

        .accordion-button:not(.collapsed)::after {
            content: "−" !important;
        }

        /* ===== TESTIMONIALS ===== */
        .client-testi {
            padding: 0;
        }

        .client-testi .card-body {
            position: relative;
            padding: 32px;
            background: white;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .client-testi .card-body:hover {
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
            transform: translateY(-4px);
        }

        .client-testi .avatar {
            object-fit: cover;
        }

        .client-testi h6 {
            color: var(--dark-color);
            font-weight: 700;
            margin-bottom: 4px;
        }

        .client-testi small {
            color: var(--text-muted);
            font-size: 13px;
        }

        .client-testi p {
            color: var(--text-muted);
            font-style: italic;
            line-height: 1.8;
            margin-top: 16px;
        }

        .star-rating {
            color: #ffc107;
            display: flex;
            gap: 4px;
            margin-top: 12px;
        }

        /* ===== SPONSOR SECTION ===== */
        .sponsor-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            padding: 32px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .sponsor-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .sponsor-card img {
            max-width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 12px;
        }

        /* ===== CONTACT BUTTONS ===== */
        .phone-button {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            bottom: 100px;
            right: 30px;
            z-index: 99;
            border-radius: 50%;
            transition: all 0.3s ease;
            background: rgba(161, 161, 161, 0.476);
            box-shadow: var(--shadow-lg);
            border: 2px solid rgba(255, 255, 255, 0.2);
            width: 56px;
            height: 56px;
        }

        .phone-button:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(240, 129, 33, 0.35);
        }

        .whatsapp_float {
            position: fixed;
            width: 56px;
            height: 56px;
            bottom: 25px;
            left: 40px;
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 28px;
            box-shadow: var(--shadow-lg);
            z-index: 100;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .whatsapp_float:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(37, 211, 102, 0.35);
        }

        .bounce {
            animation: float 2s infinite ease-in-out;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .bounce_w {
            animation: float 2s infinite ease-in-out;
        }

        .phone-button i,
        .whatsapp-icon {
            color: #fff;
            font-size: 24px;
            margin: 0;
        }

        .theme-switcher {
            display: none !important;
        }

        .back-to-top.open {
            bottom: 100px;
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media only screen and (max-width: 768px) {
            .mbst {
                width: 95%;
                max-width: 100%;
                margin-top: 0;
            }

            .hero-foreground {
                padding-top: 92px;
                padding-bottom: 24px;
            }

            .hero-badge {
                font-size: 0.82rem;
                margin-bottom: 1rem;
            }

            .hero-search-tabs {
                gap: 8px;
                padding: 7px;
            }

            .hero-tab {
                font-size: 0.88rem;
                padding: 9px 6px;
            }

            .hero-search-row {
                grid-template-columns: 1fr;
            }

            .hero-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
                margin-top: 28px;
            }

            .searchform .form-control,
            .searchform .form-select,
            #search {
                height: 52px;
            }

            .d-show {
                display: block !important;
            }

            .d-off {
                display: none !important;
            }

            #costom {
                width: 95% !important;
                max-width: 100%;
            }

            .section-title h1 {
                font-size: 2rem;
            }

            .whatsapp_float {
                width: 48px;
                height: 48px;
                bottom: 70px;
                right: 25px;
                font-size: 20px;
            }

            .phone-button {
                width: 48px;
                height: 48px;
                bottom: 70px;
                right: 25px;
                font-size: 20px;
            }

            .phone-button i,
            .whatsapp-icon {
                font-size: 20px;
            }

            .section {
                padding: 60px 0;
            }

            .py-100 {
                padding: 60px 0;
            }
        }

        @media only screen and (max-width: 426px) {
            .mbst {
                width: 95%;
                max-width: 100%;
                margin-top: 0;
            }

            .section-title h1 {
                font-size: 1.7rem;
            }

            .title-heading h1 {
                font-size: 3rem !important;
            }

            .title-heading p {
                font-size: 1rem;
            }

            .hero-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
                margin-top: 24px;
            }

            .hero-stat-label {
                font-size: 0.82rem;
            }

            .whatsapp_float,
            .phone-button {
                width: 48px;
                height: 48px;
                bottom: 25px;
                right: 15px;
                font-size: 20px;
            }
        }
    </style>

</head>


<body>

    <a href="https://api.WhatsApp.com/send?phone=+8801715175856&text=Hello! " style="padding-top: 1px;margin-top: 9px;"
        class="phone-button bounce"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="70"
            viewBox="0 0 48 48">
            <path fill="#fff"
                d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
            </path>
            <path fill="#fff"
                d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
            </path>
            <path fill="#cfd8dc"
                d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
            </path>
            <path fill="#40c351"
                d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
            </path>
            <path fill="#fff" fill-rule="evenodd"
                d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                clip-rule="evenodd"></path>
        </svg></a>
    <!-- Navbar STart -->
    @include('frontend.includes.header')
    <!-- Navbar End -->

    <!-- Hero Start -->

    <section class="swiper-slider-hero position-relative d-block" id="home">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($slider as $item)
                    <div class="swiper-slide d-flex align-items-center overflow-hidden">
                        <div class="slide-inner slide-bg-image d-flex align-items-center"
                            style="background: center center;" data-background="{{ asset($item->image) }}">
                            <div class="bg-overlay"></div>
                        </div>
                        <!-- end slide-inner -->
                    </div>
                    <!-- end swiper-slide -->
                @endforeach
            </div>
            <!-- end swiper-wrapper -->
            <!-- swipper controls -->
            <div class="swiper-button-next rounded-circle text-center">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="swiper-button-prev rounded-circle text-center">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
        </div>
        <!--end container-->

        <div class="hero-foreground">
            <div class="hero-content-wrap">
                <div class="hero-badge">
                    <i class="fa-regular fa-circle-check"></i>
                    Bangladesh's #1 Real Estate Platform
                </div>

                <div class="title-heading text-center">
                    <h1 class="heading fw-bold title-dark mb-3"
                        style="font-size: 72px !important; line-height: 1; margin-bottom: 1rem;">
                        Build Your Dream
                        <span class="accent-line">With Trust</span>
                    </h1>
                    <p class="mb-0 text-center"
                        style="font-size: 18px; color: rgba(226, 232, 240, 0.78); line-height: 1.5; max-width: 760px; margin: 0 auto;">
                        Premium properties, verified brokers, trusted builders - your complete real estate solution in
                        Bangladesh.
                    </p>
                </div>

                <div class="rounded-3 sm-rounded-0 mbst" id="costom">
                    <div class="searchform card border-0" id="buy">
                        <form class="card-body text-start" method="get"
                            action="{{ url('/serch-property/type/location') }}">
                            @csrf
                            <div class="hero-search-tabs">
                                <button type="button" class="hero-tab active">Buy</button>
                                <button type="button" class="hero-tab">Dream</button>
                                <button type="button" class="hero-tab">Property</button>
                            </div>

                            <div class="hero-search-row">
                                <div class="input-group hero-search-field">
                                    <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                    <input name="location" type="text" class="form-control"
                                        placeholder="Search by location, area...">
                                </div>

                                <select class="form-select hero-type-select" name="property_type">
                                    <option value="">Select Category</option>
                                    @foreach ($projectCategories as $cat)
                                        <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>

                                <input type="submit" id="search" name="search" class="btn" value="Search">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="hero-stats">
                    @php
                        $heroCounters = [
                            [
                                'value' => $counter_icon->value_1 ?? null,
                                'label' => $counter_icon->title_english_1 ?? null,
                            ],
                            [
                                'value' => $counter_icon->value_2 ?? null,
                                'label' => $counter_icon->title_english_2 ?? null,
                            ],
                            [
                                'value' => $counter_icon->value_3 ?? null,
                                'label' => $counter_icon->title_english_3 ?? null,
                            ],
                            [
                                'value' => $counter_icon->value_4 ?? null,
                                'label' => $counter_icon->title_english_4 ?? null,
                            ],
                        ];
                    @endphp

                    @foreach ($heroCounters as $heroCounter)
                        @if (!empty($heroCounter['value']) || !empty($heroCounter['label']))
                            <div class="hero-stat">
                                <span class="hero-stat-value">
                                    <span class="counter-value"
                                        data-target="{{ (int) ($heroCounter['value'] ?? 0) }}">0</span><span
                                        class="hero-stat-plus">+</span>
                                </span>
                                <span class="hero-stat-label">{{ $heroCounter['label'] }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--end section-->
    {{-- Heros end  --}}


    <!-- main body section Start -->
    {{-- <section class="section py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mt-sm-0 pt-sm-0">
                    <div class="section-title">
                        <span>{{ $about->title_english }}</span>
                        <h1>{{ $about->short_title_english }}</h1>
                        <div class="divider"></div>
                        <div class="py-4" style="color: var(--text-muted); line-height: 1.8; font-size: 15px;">
                            {!! $about->details_1_eng !!}
                        </div>
                        <div class="mt-5">
                            <a href="{{ route('about.details') }}" class="btn-modern">Explore About Us
                                <i class="mdi mdi-arrow-right align-middle ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="project-zones-section">
        <div class="container">
            <div class="section-title text-center">
                <h1>Explore Property Zones</h1>
                <p>Choose your preferred category and browse thousands of verified listings</p>
            </div>

            @php
                $zoneIcons = [
                    'mdi mdi-home-city-outline',
                    'mdi mdi-map-marker-radius-outline',
                    'mdi mdi-office-building-outline',
                    'mdi mdi-domain',
                    'mdi mdi-storefront-outline',
                ];
            @endphp

            <div class="project-zones-grid">
                @foreach ($projectCategories as $index => $categoryItem)
                    @php
                        $iconClass = $zoneIcons[$index % count($zoneIcons)];
                        $categoryImage = !empty($categoryItem->image) ? asset($categoryItem->image) : null;
                        $categoryCount = $projects->where('project_category_id', $categoryItem->id)->count();
                    @endphp

                    <a class="zone-card"
                        href="{{ route('all.project.list', ['category' => $categoryItem->slug]) }}"
                        @if ($categoryImage) style="background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.407), rgba(15, 23, 42, 0.197)), url('{{ $categoryImage }}');" @endif>
                        <span class="zone-icon"><i class="{{ $iconClass }}"></i></span>
                        <h4>{{ $categoryItem->name }}</h4>
                        <p>{{ $categoryItem->description ?: 'Premium projects in this category' }}</p>
                        <div class="zone-meta">
                            <span>{{ number_format($categoryCount) }}+ listings</span>
                            <span>Browse <i class="mdi mdi-arrow-right"></i></span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <div class="container-fluid py-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);">
        <div class="row justify-content-center">
            <div class="col">
                <div class="container section-title">
                    <span>Explore Your Dream Homes</span>
                    <h1>Unveiling Our Premier Projects</h1>
                    <div class="divider"></div>
                    <p class="my-4">Step into the realm of luxury living and unparalleled convenience as we showcase
                        our exceptional apartment and land projects in and around Dhaka. From stunning urban residences
                        to expansive plots of land ripe for development.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <!-- Projects Carousel -->
        <div class="container-lg mt-5" style="max-width: 1240px; margin-left: auto; margin-right: auto;">
            <div class="row">
                <div class="col-12">
                    <div class="projects-carousel-wrapper">
                        <div class="projects-carousel-shell">
                            <div class="projects-carousel-track" id="carouselContainer">
                                <div id="projectsCarousel">
                                    @php
                                        $hotlinePhone = optional(App\Models\WebsiteLink::latest()->first())->phone;
                                        $toNumber = static function ($value): float {
                                            if (is_int($value) || is_float($value)) {
                                                return (float) $value;
                                            }

                                            $normalized = preg_replace('/[^0-9.\-]/', '', (string) $value);

                                            return is_numeric($normalized) ? (float) $normalized : 0.0;
                                        };
                                    @endphp
                                    @foreach ($projects as $item)
                                        @php
                                            $unit = $item->property_mood == 'sqr feet' ? 'sqft' : 'katha';
                                            $sizeValue = $toNumber($item->property_size);
                                            $offerValue = $toNumber($item->discount ?? $item->price);
                                            $regularValue = $toNumber($item->price);
                                        @endphp
                                        <div class="carousel-slide">
                                            <article class="project-card">
                                                <a href="{{ route('completed.project.details', $item->id) }}"
                                                    class="project-link project-image-link">
                                                    <div class="project-media">
                                                        <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                                            alt="{{ $item->property_name }}">
                                                        <div class="project-overlay"></div>
                                                        <div class="project-badge">
                                                            @if ($item->property_status == 1)
                                                                <span class="badge badge-ongoing">Ongoing</span>
                                                            @elseif($item->property_status == 2)
                                                                <span class="badge badge-upcoming">Upcoming</span>
                                                            @else
                                                                <span class="badge badge-completed">Completed</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>

                                                <div class="project-content">
                                                    <div>
                                                        <h5 class="project-title">
                                                            <a href="{{ route('completed.project.details', $item->id) }}"
                                                                class="project-title-link">{{ $item->property_name }}</a>
                                                        </h5>

                                                        <p class="project-location">
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            <span>{{ $item->location_eng }}</span>
                                                        </p>

                                                        <div class="project-metrics">
                                                            <div class="metric-box">
                                                                <i class="mdi mdi-arrow-expand-all"></i>
                                                                <span
                                                                    class="metric-value">{{ number_format($sizeValue) }}</span>
                                                                <span class="metric-unit">{{ $unit }}</span>
                                                            </div>
                                                            <div class="metric-box">
                                                                <i class="mdi mdi-bed"></i>
                                                                <span
                                                                    class="metric-value">{{ $item->rooms ?? 0 }}</span>
                                                                <span class="metric-unit">Beds</span>
                                                            </div>
                                                            <div class="metric-box">
                                                                <i class="mdi mdi-shower"></i>
                                                                <span
                                                                    class="metric-value">{{ $item->bathrooms ?? 0 }}</span>
                                                                <span class="metric-unit">Baths</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="project-footer">
                                                        <div class="project-price-wrap">
                                                            <span class="project-price-label">Offer Price</span>
                                                            <div class="project-price">&#2547;
                                                                {{ number_format($offerValue) }} <span
                                                                    class="project-price-unit">/ per
                                                                    {{ $unit }}</span>
                                                            </div>
                                                            <div class="project-regular-price">Regular: &#2547;
                                                                <del>{{ number_format($regularValue) }}</del>
                                                            </div>
                                                        </div>

                                                        <div class="project-actions">
                                                            <a href="{{ $hotlinePhone ? 'tel:' . $hotlinePhone : route('contact.us') }}"
                                                                class="project-action-btn project-call-btn">
                                                                <i class="mdi mdi-phone"></i> Call Now
                                                            </a>
                                                            <a href="{{ route('contact.us') }}"
                                                                class="project-action-btn project-contact-btn">
                                                                <i class="mdi mdi-email"></i> Contact Us
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button onclick="prevSlide()" class="carousel-nav-btn carousel-nav-left"
                            aria-label="Previous projects">
                            <i class="mdi mdi-chevron-left"></i>
                        </button>
                        <button onclick="nextSlide()" class="carousel-nav-btn carousel-nav-right"
                            aria-label="Next projects">
                            <i class="mdi mdi-chevron-right"></i>
                        </button>
                    </div>

                    <div id="projectsEmptyState" class="projects-empty-state">
                        No projects available right now.
                    </div>

                    <div class="carousel-indicators" id="indicatorsContainer"></div>
                </div>
            </div>
        </div>

        <!-- View More Link -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{ route('all.project.list') }}"
                        style="color: var(--primary-color); font-weight: 600; font-size: 1.1rem; text-decoration: none; transition: all 0.3s ease; display: inline-block;"
                        onmouseover="this.style.letterSpacing='1px'" onmouseout="this.style.letterSpacing='0'">
                        View All Properties
                        <i class="mdi mdi-arrow-right align-middle ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div><!--end container-->

    <script>
        let currentGroup = 0;
        let slidesPerView = 3;
        let totalSlides = 0;
        let totalGroups = 1;
        let autoPlayTimer = null;

        function getSlidesPerView() {
            if (window.innerWidth <= 768) {
                return 1;
            }

            if (window.innerWidth <= 1024) {
                return 2;
            }

            return 3;
        }

        function getVisibleSlides() {
            return Array.from(document.querySelectorAll('.carousel-slide'));
        }

        function refreshCarouselState() {
            const preferredSlidesPerView = getSlidesPerView();
            totalSlides = getVisibleSlides().length;

            // Keep carousel movement for small filtered sets (2-3 slides)
            // by falling back to single-slide view instead of locking at one group.
            if (totalSlides > 1 && totalSlides <= preferredSlidesPerView) {
                slidesPerView = 1;
            } else {
                slidesPerView = preferredSlidesPerView;
            }

            totalGroups = Math.max(1, Math.ceil(totalSlides / slidesPerView));
        }

        function toggleEmptyState() {
            const emptyState = document.getElementById('projectsEmptyState');

            if (!emptyState) {
                return;
            }

            emptyState.classList.toggle('is-visible', totalSlides === 0);
        }

        function createIndicators() {
            const container = document.getElementById('indicatorsContainer');

            if (!container) {
                return;
            }

            container.innerHTML = '';

            if (totalSlides === 0 || totalGroups <= 1) {
                return;
            }

            for (let i = 0; i < totalGroups; i++) {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'carousel-dot';
                dot.setAttribute('aria-label', `Go to projects group ${i + 1}`);
                dot.onclick = () => {
                    clearTimeout(autoPlayTimer);
                    currentGroup = i;
                    showSlide(currentGroup);
                    startAutoPlay();
                };
                container.appendChild(dot);
            }
        }

        function rebuildCarouselUi() {
            refreshCarouselState();
            currentGroup = Math.min(currentGroup, totalGroups - 1);
            toggleEmptyState();
            createIndicators();
        }

        function showSlide(groupIndex) {
            const carousel = document.getElementById('projectsCarousel');

            if (!carousel) {
                return;
            }

            refreshCarouselState();

            if (totalSlides === 0) {
                carousel.style.transform = 'translateX(0%)';
                updateIndicators();
                return;
            }

            if (groupIndex >= totalGroups) {
                currentGroup = 0;
            } else if (groupIndex < 0) {
                currentGroup = totalGroups - 1;
            } else {
                currentGroup = groupIndex;
            }

            const offset = -currentGroup * 100;
            carousel.style.transform = `translateX(${offset}%)`;

            updateIndicators();
        }

        function nextSlide() {
            if (totalSlides === 0) {
                return;
            }

            clearTimeout(autoPlayTimer);
            currentGroup++;
            showSlide(currentGroup);
            startAutoPlay();
        }

        function prevSlide() {
            if (totalSlides === 0) {
                return;
            }

            clearTimeout(autoPlayTimer);
            currentGroup--;
            showSlide(currentGroup);
            startAutoPlay();
        }

        function updateIndicators() {
            const dots = document.querySelectorAll('#indicatorsContainer .carousel-dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('is-active', index === currentGroup);
            });
        }

        function startAutoPlay() {
            clearTimeout(autoPlayTimer);

            if (totalSlides === 0 || totalGroups <= 1) {
                return;
            }

            autoPlayTimer = setTimeout(() => {
                currentGroup++;
                showSlide(currentGroup);
                startAutoPlay();
            }, 5000);
        }

        // Initialize carousel
        document.addEventListener('DOMContentLoaded', () => {
            rebuildCarouselUi();
            showSlide(0);
            startAutoPlay();

            // Stop autoplay on hover
            const container = document.getElementById('carouselContainer');
            if (container) {
                container.addEventListener('mouseenter', () => {
                    clearTimeout(autoPlayTimer);
                });
                container.addEventListener('mouseleave', () => {
                    startAutoPlay();
                });
            }

            const slides = document.querySelectorAll('.carousel-slide');
            slides.forEach(slide => {
                const img = slide.querySelector('img');
                const overlay = slide.querySelector('.project-overlay');

                slide.addEventListener('mouseenter', () => {
                    if (img) img.style.transform = 'scale(1.05)';
                    if (overlay) overlay.style.opacity = '0.5';
                });

                slide.addEventListener('mouseleave', () => {
                    if (img) img.style.transform = 'scale(1)';
                    if (overlay) overlay.style.opacity = '0';
                });
            });

            const btns = document.querySelectorAll('.carousel-nav-btn');
            btns.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-50%) scale(1.1)';
                    this.style.boxShadow = '0 8px 24px rgba(0,0,0,0.3)';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(-50%) scale(1)';
                    this.style.boxShadow = '0 4px 12px rgba(0,0,0,0.2)';
                });
            });

            window.addEventListener('resize', () => {
                rebuildCarouselUi();
                showSlide(currentGroup);
                startAutoPlay();
            });
        });
    </script>

    <style>
        .project-zones-section {
            background: #f3f5f8;
            padding: 90px 0 40px;
        }

        .project-zones-section .section-title h1 {
            margin-bottom: 0.7rem;
        }

        .project-zones-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            margin-top: 2.5rem;
        }

        .zone-card {
            position: relative;
            display: block;
            border: none;
            text-align: left;
            min-height: 290px;
            border-radius: 22px;
            padding: 28px 28px 24px;
            color: #ffffff;
            overflow: hidden;
            cursor: pointer;
            background-color: #334155;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            box-shadow: 0 18px 30px rgba(15, 23, 42, 0.15);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            text-decoration: none;
        }

        .zone-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.45);
        }

        .zone-card>* {
            position: relative;
            z-index: 2;
        }

        .zone-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 38px rgba(15, 23, 42, 0.2);
        }

        .zone-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(2px);
            margin-bottom: 1rem;
            font-size: 1.45rem;
        }

        .zone-card h4 {
            color: #ffffff;
            margin: 0;
            font-size: 2rem;
            font-weight: 800;
            line-height: 1.1;
        }

        .zone-card p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0.55rem 0 1.5rem;
            font-size: 1rem;
            line-height: 1.45;
        }

        .zone-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .zone-meta i {
            vertical-align: middle;
        }

        .projects-carousel-wrapper {
            position: relative;
            padding: 0 60px;
        }

        .projects-carousel-shell {
            position: relative;
        }

        .projects-carousel-track {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 24px;
            background: linear-gradient(180deg, #ffffff 0%, #fbfbfc 100%);
            box-shadow: 0 24px 60px rgba(16, 24, 40, 0.12);
            border: 1px solid rgba(178, 1, 1, 0.08);
        }

        #projectsCarousel {
            width: 100%;
            display: flex;
            gap: 18px;
            padding: 18px;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }

        .carousel-slide {
            flex-shrink: 0;
            width: calc(100% / 3 - 12px);
            min-height: 560px;
        }

        .projects-empty-state {
            display: none;
            margin-top: 1.5rem;
            text-align: center;
            color: #64748b;
            font-weight: 600;
        }

        .projects-empty-state.is-visible {
            display: block;
        }

        .project-link {
            display: block;
            width: 100%;
            text-decoration: none;
            color: inherit;
        }

        .project-image-link {
            border-bottom: 1px solid #e4e7ec;
        }

        .project-card {
            height: 100%;
            min-height: 560px;
            display: flex;
            flex-direction: column;
            background: #f7f8fa;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #d4dbe4;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        }

        .project-media {
            position: relative;
            height: 300px;
            overflow: hidden;
            background: #f1f5f9;
        }

        .project-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.45s ease;
        }

        .project-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.0) 0%, rgba(15, 23, 42, 0.45) 100%);
            opacity: 0.65;
            transition: opacity 0.3s ease;
        }

        .project-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            z-index: 2;
        }

        .badge-ongoing,
        .badge-upcoming,
        .badge-completed {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.45rem 0.8rem;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            border-radius: 999px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18);
        }

        .badge-ongoing {
            background: linear-gradient(135deg, #ff7a45 0%, #f04444 100%);
            color: #ffffff;
        }

        .badge-upcoming {
            background: linear-gradient(135deg, #2563eb 0%, #0ea5e9 100%);
            color: #ffffff;
        }

        .badge-completed {
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
            color: #ffffff;
        }

        .project-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.1rem 1.2rem 1.25rem;
        }

        .project-title {
            font-size: 2rem;
            line-height: 1.35;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 0.45rem;
            min-height: auto;
            text-align: center;
        }

        .project-title-link {
            color: #0f172a;
            text-decoration: none;
        }

        .project-title-link:hover {
            color: var(--primary-color);
        }

        .project-location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--text-muted);
            font-size: 0.8rem;
            margin-bottom: 0.9rem;
            min-height: 1.2rem;
        }

        .project-location i {
            color: var(--primary-color);
            margin-top: 0;
        }

        .project-metrics {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 8px;
            padding: 1rem 0;
            border-top: 1px solid #e4e7ec;
            border-bottom: 1px solid #e4e7ec;
            margin-bottom: 1.05rem;
        }

        .metric-box {
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 0.2rem;
            text-align: center;
        }

        .metric-box i {
            display: block;
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 0.25rem;
        }

        .metric-value {
            display: block;
            color: var(--dark-color);
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.1;
        }

        .metric-unit {
            display: block;
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 500;
            margin-top: 0.2rem;
        }

        .project-footer {
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
            margin-top: auto;
        }

        .project-price-wrap {
            text-align: center;
            border-bottom: 1px solid #e4e7ec;
            padding-bottom: 0.85rem;
        }

        .project-price-label {
            display: block;
            font-size: 1rem;
            color: var(--text-muted);
            font-weight: 500;
            margin-bottom: 0.35rem;
        }

        .project-price {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: -0.02em;
            text-shadow: 0 2px 4px rgba(178, 1, 1, 0.2);
        }

        .project-price-unit {
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 600;
        }

        .project-regular-price {
            margin-top: 0.35rem;
            color: var(--text-muted);
            font-size: 0.95rem;
            font-weight: 500;
        }

        .project-actions {
            display: grid;
            gap: 0.55rem;
            margin-top: 0.15rem;
        }

        .project-action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            width: 100%;
            padding: 0.64rem 1rem;
            border-radius: 12px;
            color: #ffffff;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            border: 1px solid transparent;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .project-call-btn {
            background: #d9efcc;
            color: #1e293b;
            border-color: #7aa27d;
        }

        .project-contact-btn {
            background: linear-gradient(135deg, #c70000 0%, #4a4a4a 100%);
            color: #ffffff;
        }

        .project-action-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.12);
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.14);
            border-color: var(--primary-color);
        }

        .project-card:hover .project-media img {
            transform: scale(1.08);
        }

        .project-card:hover .project-overlay {
            opacity: 0.85;
        }

        .carousel-nav-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            transition: all 0.25s ease;
            box-shadow: 0 10px 22px rgba(178, 1, 1, 0.25);
            z-index: 10;
        }

        .carousel-nav-btn:hover {
            transform: translateY(-50%) scale(1.08);
            box-shadow: 0 14px 28px rgba(178, 1, 1, 0.3);
        }

        .carousel-nav-left {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-nav-right {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 999px;
            border: none;
            background: #d7dce4;
            padding: 0;
            transition: all 0.25s ease;
            box-shadow: none;
        }

        .carousel-dot:hover,
        .carousel-dot:focus {
            transform: scale(1.2);
            outline: none;
        }

        .carousel-dot.is-active {
            background: var(--primary-color);
            transform: scale(1.35);
            box-shadow: 0 0 0 6px rgba(178, 1, 1, 0.15);
        }

        @media (max-width: 1024px) {
            .project-zones-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .carousel-slide {
                width: calc(100% / 2 - 12px);
                min-height: 540px;
            }

            .project-card {
                min-height: 540px;
            }
        }

        @media (max-width: 768px) {
            .project-zones-section {
                padding: 70px 0 30px;
            }

            .project-zones-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .zone-card {
                min-height: 240px;
                border-radius: 18px;
                padding: 20px;
            }

            .zone-card h4 {
                font-size: 1.7rem;
            }

            .zone-card p {
                margin-bottom: 1.1rem;
                font-size: 0.92rem;
            }

            .projects-carousel-wrapper {
                padding: 0 46px;
            }

            .project-media {
                height: 240px;
            }

            .carousel-slide {
                width: 100%;
                min-height: 0;
            }

            .project-card {
                min-height: 0;
            }

            .project-title {
                min-height: auto;
                font-size: 1.6rem;
            }

            .carousel-nav-btn {
                width: 44px;
                height: 44px;
                font-size: 1.15rem;
            }
        }
    </style>






    {{-- various projects start --}}


    {{-- <div class="container-fluid py-100">
        <div class="row justify-content-center mb-5">
            <div class="col">
                <div class="section-title">
                    <span>Our Portfolio</span>
                    <h1>Ongoing, Upcoming & Completed</h1>
                    <div class="divider"></div>
                    <p>We offer a wide variety of residential and commercial properties in Dhaka. Find your dream home
                        or
                        commercial space from our pull of nicely built properties.</p>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills d-flex justify-content-center flex-wrap mb-5" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#ongoing" data-bs-toggle="tab" aria-expanded="true" class="nav-link px-4 py-2"
                                aria-selected="false" role="tab" tabindex="-1">
                                <i class="mdi mdi-play-circle me-2"></i>Ongoing
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="#upcomming" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link px-4 py-2" aria-selected="true" role="tab">
                                <i class="mdi mdi-rocket-launch me-2"></i>Upcoming
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a href="#completed" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active px-4 py-2" aria-selected="false" role="tab"
                                tabindex="-1">
                                <i class="mdi mdi-check-circle me-2"></i>Completed
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="completed" role="tabpanel">
                            <div class="row g-4 mt-4">
                                @foreach ($completed_project as $key => $item)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card property border-0 position-relative overflow-hidden">

                                            <div class="property-image position-relative overflow-hidden">
                                                <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                                    class="img-fluid" alt="{{ $item->property_name }}_Image">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="text-center fw-bold text-success">
                                                    {{ $item->property_name }}</h4>
                                                <p class="text-center"><i
                                                        class="fa-solid fa-location-dot text-success"></i>
                                                    {{ $item->location_eng }}</p>
                                                @if ($item->property_mood == 'sqr feet')
                                                    <ul
                                                        class="list-unstyled mb-0 py-3 border-top border-bottom d-flex align-items-center justify-content-between small">
                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-arrow-expand-all me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->property_size }}
                                                                SQFT</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-bed me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->rooms }}
                                                                Beds</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-shower me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->bathrooms }}
                                                                Baths</span>
                                                        </li>
                                                    </ul>
                                                @endif
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="list-inline-item mb-0 d-flex justify-content-center">
                                                        <div class="text-center">
                                                            <span class="fw-medium text-muted">Offer Price:
                                                                &#2547; {{ $item->discount }} / per
                                                                Sqft</span>
                                                            <p class="fw-medium mb-0 small">
                                                                Regular Price:
                                                                &#2547; <del>{{ $item->price }} / per
                                                                    Sqft</del></p>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-inline-item mb-0 mt-3 d-flex justify-content-center gap-2">
                                                        <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                            class="btn btn-sm btn-primary">Call</a>
                                                        <a href="{{ route('contact.us') }}"
                                                            class="btn btn-sm btn-success">Email</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                <div class="col-12 mt-4 pt-2">
                                    <div class="text-center">
                                        <a href="{{ route('all.project.list') }}" class="mt-3">View
                                            More <i class="mdi mdi-arrow-right align-middle"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="ongoing" role="tabpanel">
                            <div class="row g-4 mt-0">
                                @foreach ($ongoing_project as $key => $item)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card property border-0 position-relative overflow-hidden">

                                            <div class="property-image position-relative overflow-hidden">
                                                <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                                    class="img-fluid" alt="{{ $item->property_name }}_Image">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="text-center fw-bold text-success">
                                                    {{ $item->property_name }}</h4>
                                                <p class="text-center"><i
                                                        class="fa-solid fa-location-dot text-success"></i>
                                                    {{ $item->location_eng }}</p>

                                                @if ($item->property_mood == 'sqr feet')
                                                    <ul
                                                        class="list-unstyled py-3 border-top border-bottom d-flex align-items-center justify-content-between small">
                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-arrow-expand-all me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->property_size }}
                                                                SQFT</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-bed me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->rooms }}
                                                                Beds</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-shower me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->bathrooms }}
                                                                Baths</span>
                                                        </li>
                                                    </ul>
                                                @endif
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="list-inline-item mb-0 d-flex justify-content-center">

                                                        <div class="text-center">
                                                            <span class="fw-medium text-muted">Offer Price:
                                                                &#2547; {{ $item->discount }} / per
                                                                Sqft</span>
                                                            <p class="fw-medium mb-0 small">
                                                                Regular Price:
                                                                &#2547; <del>{{ $item->price }} / per
                                                                    Sqft</del></p>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-inline-item mb-0 mt-3 d-flex justify-content-center gap-2">
                                                        <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                            class="btn btn-sm btn-primary">Call</a>
                                                        <a href="{{ route('contact.us') }}"
                                                            class="btn btn-sm btn-success">Email</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="tab-pane" id="upcomming" role="tabpanel">
                            <div class="row g-4 mt-0">
                                @foreach ($upcomming_project as $key => $item)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card property border-0 position-relative overflow-hidden">

                                            <div class="property-image position-relative overflow-hidden">
                                                <img src="{{ asset($item->property_thumbnail ?? null) }}"
                                                    class="img-fluid" alt="{{ $item->property_name }}_Image">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="text-center fw-bold text-success">
                                                    {{ $item->property_name }}</h4>
                                                <p class="text-center"><i
                                                        class="fa-solid fa-location-dot text-success"></i>
                                                    {{ $item->location_eng }}</p>
                                                @if ($item->property_mood == 'sqr feet')
                                                    <ul
                                                        class="list-unstyled py-3 border-top border-bottom d-flex align-items-center justify-content-between small">
                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-arrow-expand-all me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->property_size }}
                                                                SQFT</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-bed me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->rooms }}
                                                                Beds</span>
                                                        </li>

                                                        <li class="d-flex align-items-center">
                                                            <i class="mdi mdi-shower me-2 text-primary"></i>
                                                            <span class="text-muted">{{ $item->bathrooms }}
                                                                Baths</span>
                                                        </li>
                                                    </ul>
                                                @endif
                                                <ul class="list-unstyled mt-2 mb-0">
                                                    <li class="list-inline-item mb-0 d-flex justify-content-center">

                                                        <div class="text-center">
                                                            <span class="fw-medium text-muted">Offer Price:
                                                                &#2547; {{ $item->discount }}</span>
                                                            <p class="fw-medium mb-0 small">
                                                                Regular Price:
                                                                &#2547;<del>{{ $item->price }}</del></p>
                                                        </div>
                                                    </li>
                                                    <li
                                                        class="list-inline-item mb-0 mt-3 d-flex justify-content-center gap-2">
                                                        <a href="tel:{{ App\Models\WebsiteLink::latest()->first()->phone }}"
                                                            class="btn btn-sm btn-primary">Call</a>
                                                        <a href="{{ route('contact.us') }}"
                                                            class="btn btn-sm btn-success">Email</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div> --}




    <!--end container-->
    {{-- various projects end --}}


    <section class="section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <div class="section-title text-center">
                        <span class="text-uppercase fw-semibold"
                            style="font-size: 12px; letter-spacing: 2px; color: var(--secondary-color);">Media</span>
                        <h1>Video Gallery</h1>
                        <div class="divider"></div>
                        <p class="my-4 mx-auto" style="text-align:center; max-width:700px; color: var(--text-muted);">
                            Explore our curated collection of property walkthroughs, project updates, and client
                            testimonials.</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($video_gallery as $item)
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card border-0 shadow-sm overflow-hidden">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/{{ $item->video_link }}"
                                    title="{{ $item->title_english ?? ($item->title ?? 'Video') }}"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen loading="lazy"></iframe>
                            </div>
                            <div class="card-body">
                                <h5 class="mb-0">{{ $item->title_english ?? ($item->title ?? 'Video') }}</h5>
                                @if (!empty($item->short_text_eng))
                                    <p class="mb-0 text-muted small">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->short_text_eng), 120) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->



    <div class="container-fluid py-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);">
        <div class="row justify-content-center mb-5">
            <div class="col">
                <div class="section-title">
                    <h3>Our Partners</h3>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="container">
            <div class="row g-4 mt-0">
                @foreach ($sponsors as $item)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="sponsor-card">
                            <img src="{{ asset($item->image ?? null) }}" class="img-fluid" alt="partner_logo">
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end container-fluid-->

    {{-- Faq start --}}
    <div class="container-fluid py-100">
        <div class="row justify-content-center mb-5">
            <div class="col">
                <div class="section-title text-center">
                    <span class="text-uppercase fw-semibold"
                        style="font-size: 12px; letter-spacing: 2px; color: var(--secondary-color);">Help &
                        Support</span>
                    <h1 style="color: var(--dark-color); font-size: 2.5rem; font-weight: 700; margin-top: 10px;">
                        Frequently Asked Questions</h1>
                    <div
                        style="width: 60px; height: 4px; background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); margin: 20px auto; border-radius: 2px;">
                    </div>
                    <p class="my-4 mx-auto"
                        style="text-align: center; max-width: 600px; color: var(--text-muted); line-height: 1.8;">Dive
                        into our FAQ section to find answers to common inquiries about AJ Group, our projects, and
                        services.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="container">
            <div class="col-12 col-lg-10 mx-auto">
                <div id="faqAccordion" class="accordion"
                    style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item" style="border: none; border-bottom: 1px solid rgba(0,0,0,0.05);">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                    aria-controls="collapse{{ $index }}"
                                    style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); color: var(--dark-color); font-weight: 600; border: none; padding: 20px 30px; font-size: 1.1rem;">
                                    <i class="mdi mdi-help-circle-outline me-3"
                                        style="color: var(--primary-color); font-size: 1.3rem;"></i>
                                    {{ $faq->faq_question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body"
                                    style="padding: 20px 30px; background: #fff; color: var(--text-muted); line-height: 1.7; font-size: 1rem;">
                                    {!! $faq->faq_ans !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    {{-- Faq end --}}


    {{-- testimonial start --}}
    <div class="container-fluid mt-100 mt-60 py-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title text-primary mb-3">Client's Testmonial</h4>
                    <p class="para-desc mb-0 mx-auto">Discover the unparalleled quality and dedication through the
                        experiences of our satisfied clients at AJ Group</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row" style="width: 90%;margin:auto">
            <div class="col-12 mt-4">
                <div class="tiny-three-item">
                    @foreach ($testimonials as $key => $item)
                        <div class="tiny-slider client-testi">
                            <div class="card border-0 bg-white">
                                <div class="card-body p-4 rounded-3 shadow m-2">
                                    <i
                                        class="mdi mdi-format-quote-open display-1 text-primary opacity-25 position-absolute end-0 top-0"></i>

                                    <div class="d-flex">
                                        <img src="{{ asset($item->image ?? null) }}"
                                            class="avatar avatar-md-sm rounded-circle shadow-md" alt="">
                                        <div class="flex-1 ms-3">
                                            <h6 class="mb-0">{{ $item->name_english }}</h6>
                                            <small class="text-muted">{{ $item->desig_eng }}</small>
                                        </div>
                                    </div>

                                    <p class="text-muted fst-italic mb-0 mt-4"> {!! $item->review_eng !!} </p>

                                    <ul class="list-unstyled mb-0 mt-3 text-warning h5">
                                        @for ($i = 0; $i < $item->star; $i++)
                                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                        @endfor
                                    </ul>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    {{-- testimonial end --}}








    <div class="container mt-100 mt-60 py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center">
                    <h4 class="title text-primary mb-3">Have a question, inquiry, or simply want to get in touch?
                    </h4>
                    <p class="para-desc mb-0 mx-auto" style="text-align: justify;">We're here to assist you every
                        step of the way. Whether you're looking for more information about our projects, have
                        queries about our services, or want to explore partnership opportunities, our dedicated team
                        is ready to help. Simply fill out the form below, and we'll get back to you promptly. Your
                        satisfaction is our priority, and we look forward to hearing from you soon!</p>
                    <div class="mt-4 pt-2">
                        <a href="{{ route('contact.us') }}" class="btn btn-pills btn-primary"><span
                                class="h5 mb-0 me-1"><i data-feather="mail" class="fea icon-sm"></i></span>
                            Contact us</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <!-- Footer Start -->
    @include('frontend.includes.footer')
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i
            data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
    <!-- Back to top -->

    <script>
        (function() {
            const counters = document.querySelectorAll('.hero-stat .counter-value');
            if (!counters.length) {
                return;
            }

            const animateCounter = (element) => {
                if (element.dataset.animated === 'true') {
                    return;
                }

                element.dataset.animated = 'true';
                const target = Number(element.dataset.target || 0);
                const duration = 1400;
                const startTime = performance.now();

                const tick = (currentTime) => {
                    const progress = Math.min((currentTime - startTime) / duration, 1);
                    element.textContent = Math.floor(target * progress).toLocaleString();

                    if (progress < 1) {
                        requestAnimationFrame(tick);
                    } else {
                        element.textContent = target.toLocaleString();
                    }
                };

                requestAnimationFrame(tick);
            };

            const heroSection = document.querySelector('.swiper-slider-hero');

            if ('IntersectionObserver' in window && heroSection) {
                const observer = new IntersectionObserver((entries, observerInstance) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            counters.forEach(animateCounter);
                            observerInstance.disconnect();
                        }
                    });
                }, {
                    threshold: 0.35
                });

                observer.observe(heroSection);
            } else {
                counters.forEach(animateCounter);
            }
        })();
    </script>

    <!-- JAVASCRIPTS -->
    @include('frontend.includes.script')
</body>

<!-- Mirrored from shreethemes.in/towntor/layouts/index-three.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 05:10:06 GMT -->

</html>
