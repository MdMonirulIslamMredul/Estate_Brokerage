@extends('frontend.layout')
@section('title')
    {{ $event_details->title_english }}
@endsection
@section('content')
    <style>
        :root {
            --brand: #f08121;
        }

        /* Hero */
        .event-detail-hero {
            background-size: cover;
            background-position: center;
        }

        .event-detail-hero h5 {
            font-size: clamp(1.6rem, 3.5vw, 2.6rem);
            font-weight: 800;
            color: #fff;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .4);
        }

        /* Section heading */
        .section-title {
            font-weight: 800;
            color: #1a1a2e;
        }

        .section-title span {
            color: var(--brand);
        }

        .brand-divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--brand), #e96b15);
            border-radius: 999px;
            margin: .6rem auto 0;
        }

        /* Featured image */
        .event-main-img {
            width: 100%;
            max-height: 520px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .14);
        }

        /* Content card */
        .content-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .07);
            padding: 2rem 2.5rem;
        }

        /* Share strip */
        .share-strip {
            background: #f9f9f9;
            border-left: 4px solid var(--brand);
            border-radius: 0 12px 12px 0;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .share-strip p {
            margin: 0;
            font-weight: 700;
            font-size: .95rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #1a1a2e;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: #fff;
            font-size: 1rem;
            text-decoration: none;
            transition: transform .25s, box-shadow .25s;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, .2);
        }

        .share-btn.fb {
            background: #1877f2;
        }

        .share-btn.li {
            background: #0a66c2;
        }

        .share-btn.wa {
            background: #25d366;
        }

        /* Back link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .9rem;
            font-weight: 600;
            color: var(--brand);
            text-decoration: none;
            transition: gap .2s;
        }

        .back-link:hover {
            gap: .6rem;
        }
    </style>

    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100 event-detail-hero"
        style="background: url({{ asset($banner->banner_image ?? null) }});">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">
                            {{ $event_details->title_english }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Event Detail Section -->
    <section class="section mb-5">
        <div class="container mb-5">

            <!-- Back link -->
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="back-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H3.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L3.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    Back to Events
                </a>
            </div>

            <!-- Page Title -->
            <div class="text-center mb-5">
                <h2 class="section-title">{{ $event_details->title_english }}</h2>
                <div class="brand-divider"></div>
            </div>

            <!-- Featured Image -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <img src="{{ asset($event_details->main_image ?? null) }}" class="event-main-img"
                        alt="{{ $event_details->title_english }}">
                </div>
            </div>

            <!-- Short Description -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="content-card">
                        {!! $event_details->des_sm_eng !!}
                    </div>
                </div>
            </div>

            <!-- Long Description -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="content-card">
                        {!! $event_details->long_des1_eng !!}
                    </div>
                </div>
            </div>

            <!-- Share Strip -->
            @php $link = url()->current(); @endphp
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="share-strip">
                        <p>Share Now:</p>
                        <a href="https://www.facebook.com/sharer.php?u={{ urlencode($link) }}" target="_blank"
                            rel="noopener" class="share-btn fb" title="Share on Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($link) }}" target="_blank"
                            rel="noopener" class="share-btn li" title="Share on LinkedIn">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($event_details->title_english . ' ' . $link) }}"
                            target="_blank" rel="noopener" class="share-btn wa" title="Share on WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End -->
@endsection
