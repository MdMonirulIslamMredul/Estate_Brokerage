@extends('frontend.layout')
@section('title')
    Events
@endsection
@section('content')
    <style>
        :root {
            --brand: #f08121;
        }

        /* Hero */
        .events-hero {
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .events-hero .hero-badge {
            display: inline-block;
            background: var(--brand);
            color: #fff;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            padding: .35rem 1rem;
            border-radius: 999px;
            margin-bottom: 1rem;
        }

        .events-hero h5 {
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: 800;
            color: #fff;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .35);
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

        /* Event cards */
        .event-card {
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
            transition: transform .3s ease, box-shadow .3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 36px rgba(240, 129, 33, .22);
        }

        .event-card .thumb {
            position: relative;
            overflow: hidden;
            height: 240px;
        }

        .event-card .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s ease;
        }

        .event-card:hover .thumb img {
            transform: scale(1.06);
        }

        .event-card .thumb .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(240, 129, 33, .8) 0%, transparent 60%);
            opacity: 0;
            transition: opacity .3s ease;
        }

        .event-card:hover .thumb .overlay {
            opacity: 1;
        }

        .event-card .card-body {
            padding: 1.25rem 1.5rem 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }

        .event-card .card-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1a1a2e;
            margin: 0;
            line-height: 1.4;
        }

        .event-card .read-more {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .85rem;
            font-weight: 600;
            color: var(--brand);
            margin-top: auto;
            text-decoration: none;
            transition: gap .2s;
        }

        .event-card .read-more:hover {
            gap: .65rem;
        }
    </style>

    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100 events-hero"
        style="background: url({{ asset($banner->banner_image ?? null) }});">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <span class="hero-badge">Explore</span>
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Our Events</h5>
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

    <!-- Events Section -->
    <section class="section mb-5">
        <div class="container mb-5">

            <!-- Heading -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">All Our <span>Events</span></h2>
                    <div class="brand-divider"></div>
                </div>
            </div>

            <!-- Cards Grid -->
            <div class="row g-4">
                @foreach ($events as $item)
                    <div class="col-md-6 col-lg-4 d-flex">
                        <a href="{{ route('events.detials', $item->id) }}" class="text-decoration-none w-100">
                            <div class="event-card">
                                <div class="thumb">
                                    <img src="{{ asset($item->main_image ?? null) }}" alt="{{ $item->title_english }}">
                                    <div class="overlay"></div>
                                </div>
                                <div class="card-body">
                                    <p class="card-title">{{ $item->title_english }}</p>
                                    <span class="read-more">
                                        View Details
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End -->
@endsection
