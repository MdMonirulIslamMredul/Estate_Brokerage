@extends('frontend.layout')
@section('title')
    Coverage
@endsection
@section('content')
    <style>
        :root {
            --brand: #f08121;
            --brand-deep: #d66d17;
            --ink: #18202b;
            --muted: #6f7782;
            --card-shadow: 0 18px 45px rgba(20, 24, 33, 0.08);
        }

        .coverage-hero {
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .coverage-kicker {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 999px;
            background: rgba(240, 129, 33, 0.22);
            color: #fff;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .coverage-hero .title-heading h5 {
            font-size: clamp(2rem, 4vw, 3.6rem);
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 12px;
        }

        .coverage-hero .title-heading p {
            max-width: 620px;
            font-size: 1rem;
        }

        .coverage-shell {
            position: relative;
            margin-top: -40px;
            z-index: 2;
        }

        .coverage-panel {
            background: linear-gradient(180deg, #ffffff 0%, #fff8f2 100%);
            border: 1px solid rgba(240, 129, 33, 0.12);
            border-radius: 28px;
            padding: 34px;
            box-shadow: var(--card-shadow);
        }

        .coverage-header {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
        }

        .coverage-header h2 {
            margin: 0;
            color: var(--ink);
            font-size: clamp(1.8rem, 3vw, 2.7rem);
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .coverage-header p {
            margin: 10px 0 0;
            color: var(--muted);
            max-width: 640px;
            line-height: 1.75;
        }

        .coverage-divider {
            width: 84px;
            height: 5px;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--brand), var(--brand-deep));
            flex-shrink: 0;
        }

        .video-card {
            position: relative;
            height: 100%;
            border-radius: 22px;
            overflow: hidden;
            background: #fff;
            border: 1px solid rgba(24, 32, 43, 0.06);
            box-shadow: 0 12px 32px rgba(19, 24, 32, 0.08);
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        }

        .video-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 22px 44px rgba(240, 129, 33, 0.18);
            border-color: rgba(240, 129, 33, 0.25);
        }

        .video-frame {
            position: relative;
            aspect-ratio: 16 / 9;
            background: #101010;
        }

        .video-frame iframe {
            width: 100%;
            height: 100%;
            border: 0;
            display: block;
        }

        .video-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 20px 20px;
        }

        .video-label {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .video-label span {
            color: var(--brand);
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .video-label h6 {
            margin: 0;
            color: var(--ink);
            font-size: 1rem;
            font-weight: 700;
        }

        .video-badge {
            width: 46px;
            height: 46px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--brand), var(--brand-deep));
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(240, 129, 33, 0.25);
            flex-shrink: 0;
        }

        @media (max-width: 991px) {
            .coverage-shell {
                margin-top: -24px;
            }

            .coverage-panel {
                padding: 24px;
                border-radius: 22px;
            }

            .coverage-header {
                align-items: start;
                flex-direction: column;
            }
        }

        @media (max-width: 575px) {
            .coverage-panel {
                padding: 18px;
            }

            .video-meta {
                padding: 16px;
            }
        }
    </style>


    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100 coverage-hero"
        style="background: url({{ asset('frontend/assets/images/bg/05.jpg') }}) center;">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <div class="coverage-kicker">Featured Media</div>
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Media Coverage</h5>
                        <p class="text-white-50 para-desc mx-auto mb-0">A curated stream of interviews, public appearances,
                            and media highlights from across our work.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->

    <section class="section">

        <div class="container coverage-shell">
            <div class="coverage-panel">
                <div class="coverage-header">
                    <div>
                        <h2>Watch Our Latest Coverage</h2>
                        <p>Explore video highlights in a cleaner viewing layout with responsive embeds, stronger hierarchy,
                            and a more contemporary visual treatment.</p>
                    </div>
                    <div class="coverage-divider"></div>
                </div>

                <div class="row g-4">
                    @foreach ($video_gallery as $item)
                        <div class="col-md-6 col-xl-6">
                            <div class="video-card">
                                <div class="video-frame">
                                    <iframe src="https://www.youtube.com/embed/{{ $item->video_link }}"
                                        title="Media Coverage Video {{ $loop->iteration }}" loading="lazy"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="video-meta">
                                    <div class="video-label">
                                        <span>Coverage {{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                        <h6>Media Feature {{ $loop->iteration }}</h6>
                                    </div>
                                    <div class="video-badge" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M6.271 3.055a.5.5 0 0 1 .52.037l5.5 4a.5.5 0 0 1 0 .816l-5.5 4A.5.5 0 0 1 6 11.5v-7a.5.5 0 0 1 .271-.445z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    @endforeach
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
