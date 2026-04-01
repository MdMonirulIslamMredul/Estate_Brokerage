@extends('frontend.layout')
@section('title')
    News
@endsection
@section('content')
    <style>
        :root {
            --brand: #f08121;
        }

        /* Hero */
        .blog-detail-hero {
            background-size: cover;
            background-position: center;
        }

        .blog-detail-hero h5 {
            font-size: clamp(1.6rem, 3.5vw, 2.8rem);
            font-weight: 800;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .4);
        }

        /* Main article card */
        .article-card {
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 28px rgba(0, 0, 0, .09);
        }

        .article-card .cover-img {
            width: 100%;
            max-height: 460px;
            object-fit: cover;
        }

        .article-card .article-body {
            padding: 2rem 2.5rem;
        }

        .article-card .article-body h2 {
            font-size: 1.65rem;
            font-weight: 800;
            color: #1a1a2e;
            border-left: 4px solid var(--brand);
            padding-left: .9rem;
            margin-bottom: 1.5rem;
        }

        .article-card .article-body p {
            color: #555;
            line-height: 1.85;
        }

        /* Share strip */
        .share-strip {
            background: #fff8f2;
            border-left: 4px solid var(--brand);
            border-radius: 0 12px 12px 0;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .share-strip p {
            margin: 0;
            font-weight: 700;
            font-size: .9rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #1a1a2e;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            color: #fff;
            font-size: .95rem;
            text-decoration: none;
            transition: transform .25s, box-shadow .25s;
        }

        .share-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, .18);
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

        /* Sidebar */
        .sidebar-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .08);
            padding: 1.75rem;
            position: sticky;
            top: 90px;
        }

        .sidebar-card .sidebar-heading {
            font-size: .75rem;
            font-weight: 800;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--brand);
            margin-bottom: 1.25rem;
            padding-bottom: .6rem;
            border-bottom: 2px solid #f1f1f1;
        }

        .recent-post-item {
            display: flex;
            gap: .9rem;
            padding: .75rem 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .recent-post-item:last-child {
            border-bottom: none;
        }

        .recent-post-item img {
            width: 72px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .recent-post-item .meta {
            display: flex;
            flex-direction: column;
            gap: .2rem;
        }

        .recent-post-item .meta a {
            font-size: .875rem;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            line-height: 1.35;
        }

        .recent-post-item .meta a:hover {
            color: var(--brand);
        }

        .recent-post-item .meta span {
            font-size: .75rem;
            color: #999;
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
    <section class="bg-half-170 d-table w-100 blog-detail-hero"
        style="background: url({{ asset($banner->banner_image ?? null) }});">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12 text-center">
                    <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">{{ $blog_details->title_english }}
                    </h5>
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

    <!-- Blog Detail -->
    <section class="section">
        <div class="container">

            <!-- Back link -->
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="back-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H3.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L3.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    Back to News
                </a>
            </div>

            <div class="row g-5">

                <!-- Article -->
                <div class="col-lg-8">
                    <div class="article-card">
                        <img src="{{ asset($blog_details->main_image ?? null) }}" class="cover-img"
                            alt="{{ $blog_details->title_english }}">
                        <div class="article-body">
                            <h2>{{ $blog_details->title_english }}</h2>
                            <div class="text-muted">{!! $blog_details->short_des_eng !!}</div>
                            <div class="text-muted mt-3">{!! $blog_details->long_des1_eng !!}</div>
                            <div class="text-muted mt-3">{!! $blog_details->long_des2_eng !!}</div>
                            <div class="text-muted mt-3">{!! $blog_details->long_des3_eng !!}</div>

                            <!-- Share -->
                            @php $link = url()->current(); @endphp
                            <div class="share-strip">
                                <p>Share:</p>
                                <a href="https://www.facebook.com/sharer.php?u={{ urlencode($link) }}" target="_blank"
                                    rel="noopener" class="share-btn fb" title="Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($link) }}"
                                    target="_blank" rel="noopener" class="share-btn li" title="LinkedIn">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($blog_details->title_english . ' ' . $link) }}"
                                    target="_blank" rel="noopener" class="share-btn wa" title="WhatsApp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar-card">
                        @php
                            $recentBlogs = App\Models\Blog::where('status', 1)->latest()->limit(5)->get();
                        @endphp
                        <p class="sidebar-heading">Recent Posts</p>
                        @foreach ($recentBlogs as $item)
                            <div class="recent-post-item">
                                <img src="{{ asset($item->main_image ?? null) }}" alt="{{ $item->title_english }}">
                                <div class="meta">
                                    <a href="{{ route('news.details', $item->id) }}">{{ $item->title_english }}</a>
                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End -->
@endsection
