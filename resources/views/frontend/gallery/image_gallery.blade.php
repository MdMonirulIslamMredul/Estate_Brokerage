@extends('frontend.layout')
@section('title')
    Gallery
@endsection
@section('content')
    <style>
        :root {
            --brand: #f08121;
        }

        .gallery-grid {
            row-gap: 24px;
        }

        .gallery-item-btn {
            width: 100%;
            border: 0;
            background: transparent;
            padding: 0;
            border-radius: 14px;
            overflow: hidden;
            cursor: zoom-in;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.12);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .gallery-item-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 28px rgba(240, 129, 33, 0.2);
        }

        .gallery-item-btn img {
            width: 100%;
            aspect-ratio: 4 / 3;
            height: auto;
            object-fit: cover;
            display: block;
        }

        .image-lightbox {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.92);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 12px;
        }

        .image-lightbox.is-open {
            display: flex;
        }

        .lightbox-dialog {
            position: relative;
            width: min(1680px, calc(100vw - 8px));
            height: min(97vh, calc(100vh - 12px));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-stage {
            width: min(calc((100vh - 72px) * 4 / 3), calc(100vw - 96px));
            max-width: 100%;
            aspect-ratio: 4 / 3;
            background: #111;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.45);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #111;
        }

        .lightbox-close,
        .lightbox-nav {
            position: absolute;
            border: 0;
            color: #fff;
            background: rgba(240, 129, 33, 0.9);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .lightbox-close:hover,
        .lightbox-nav:hover {
            opacity: 1;
            transform: scale(1.05);
        }

        .lightbox-close {
            top: -10px;
            right: -10px;
            width: 44px;
            height: 44px;
            border-radius: 999px;
            font-size: 17px;
            font-weight: 700;
        }

        .lightbox-nav {
            top: 50%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border-radius: 999px;
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-prev {
            left: 4px;
        }

        .lightbox-next {
            right: 4px;
        }

        .lightbox-counter {
            position: absolute;
            left: 50%;
            bottom: -34px;
            transform: translateX(-50%);
            color: #fff;
            font-size: 14px;
            letter-spacing: 0.08em;
            background: rgba(0, 0, 0, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 6px 12px;
            border-radius: 999px;
        }

        body.lightbox-open {
            overflow: hidden;
        }

        @media (max-width: 767px) {
            .lightbox-dialog {
                width: calc(100vw - 4px);
                height: min(94vh, calc(100vh - 8px));
            }

            .lightbox-stage {
                width: calc(100vw - 56px);
            }

            .lightbox-nav {
                width: 42px;
                height: 42px;
                font-size: 18px;
            }
        }
    </style>

    <div class="page-content bg-white">
        <!-- inner page banner -->

        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100"
            style="background: url({{ asset('frontend/assets/images/bg/05.jpg') }}) center;">
            <div class="bg-overlay bg-gradient-overlay-2"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <p class="text-white-50 para-desc mx-auto mb-0">Image Gallery</p>
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Image Gallery </h5>
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
        <br>
        <br>
        <br>
        <!-- Breadcrumb row END -->
        <div class="section-full content-inner-1">
            <!-- Left & right section start -->
            <div class="container">

                <div class="row gallery-grid">
                    @foreach ($img_gallery as $index => $item)
                        <div class="col-sm-6 col-lg-4">
                            <button type="button" class="gallery-item-btn" data-gallery-image
                                data-image-src="{{ asset($item->image ?? null) }}"
                                data-image-alt="Gallery Image {{ $index + 1 }}" data-image-index="{{ $index }}">
                                <img src="{{ asset($item->image ?? null) }}" alt="Gallery Image {{ $index + 1 }}">
                            </button>
                        </div>
                    @endforeach

                </div>
                <!-- Gallery END -->

                <!-- Pagination END -->
            </div>

        </div>
    </div>

    <div class="image-lightbox" id="imageLightbox" aria-hidden="true">
        <div class="lightbox-dialog" role="dialog" aria-modal="true" aria-label="Image preview">
            <button type="button" class="lightbox-close" id="lightboxClose" aria-label="Close preview">Close</button>
            <button type="button" class="lightbox-nav lightbox-prev" id="lightboxPrev"
                aria-label="Previous image">&lt;</button>
            <div class="lightbox-stage">
                <img src="" alt="Gallery preview" class="lightbox-image" id="lightboxImage">
            </div>
            <button type="button" class="lightbox-nav lightbox-next" id="lightboxNext"
                aria-label="Next image">&gt;</button>
            <div class="lightbox-counter" id="lightboxCounter"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageButtons = Array.from(document.querySelectorAll('[data-gallery-image]'));
            if (!imageButtons.length) {
                return;
            }

            const lightbox = document.getElementById('imageLightbox');
            const lightboxImage = document.getElementById('lightboxImage');
            const lightboxPrev = document.getElementById('lightboxPrev');
            const lightboxNext = document.getElementById('lightboxNext');
            const lightboxClose = document.getElementById('lightboxClose');
            const lightboxCounter = document.getElementById('lightboxCounter');
            let currentIndex = 0;

            const updateLightbox = function() {
                const activeButton = imageButtons[currentIndex];
                lightboxImage.src = activeButton.dataset.imageSrc;
                lightboxImage.alt = activeButton.dataset.imageAlt || 'Gallery preview';
                lightboxCounter.textContent = (currentIndex + 1) + ' / ' + imageButtons.length;
            };

            const openLightbox = function(index) {
                currentIndex = index;
                updateLightbox();
                lightbox.classList.add('is-open');
                lightbox.setAttribute('aria-hidden', 'false');
                document.body.classList.add('lightbox-open');
            };

            const closeLightbox = function() {
                lightbox.classList.remove('is-open');
                lightbox.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('lightbox-open');
            };

            const moveImage = function(direction) {
                currentIndex = (currentIndex + direction + imageButtons.length) % imageButtons.length;
                updateLightbox();
            };

            imageButtons.forEach(function(button, index) {
                button.addEventListener('click', function() {
                    openLightbox(index);
                });
            });

            lightboxPrev.addEventListener('click', function() {
                moveImage(-1);
            });

            lightboxNext.addEventListener('click', function() {
                moveImage(1);
            });

            lightboxClose.addEventListener('click', closeLightbox);

            lightbox.addEventListener('click', function(event) {
                if (event.target === lightbox) {
                    closeLightbox();
                }
            });

            document.addEventListener('keydown', function(event) {
                if (!lightbox.classList.contains('is-open')) {
                    return;
                }

                if (event.key === 'Escape') {
                    closeLightbox();
                }

                if (event.key === 'ArrowLeft') {
                    moveImage(-1);
                }

                if (event.key === 'ArrowRight') {
                    moveImage(1);
                }
            });
        });
    </script>
@endsection
