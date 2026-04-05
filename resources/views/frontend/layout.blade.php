<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from golfclub.dexignlab.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 06:03:44 GMT -->

<head>
    @include('frontend.includes.headlink')
</head>
<style>
    :root {
        --primary-color: #b20101;
        --primary-dark: #8f0000;
    }

    /* Modern WhatsApp and Back-to-Top Floating Buttons */
    .floating-btn {
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.18);
        z-index: 1200;
        background: #25d366;
        color: #fff;
        font-size: 28px;
        border: none;
        transition: transform 0.2s, box-shadow 0.2s;
        right: 30px;
        cursor: pointer;
        text-decoration: none;
    }

    .floating-btn:hover {
        transform: translateY(-4px) scale(1.07);
        box-shadow: 0 8px 32px rgba(37, 211, 102, 0.25);
    }

    .floating-btn.whatsapp {
        bottom: 30px;
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
    }

    .floating-btn.back-to-top {
        bottom: 100px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        font-size: 22px;
        display: none;
    }

    .floating-btn svg,
    .floating-btn i {
        color: #fff;
        width: 28px;
        height: 28px;
    }

    @media (max-width: 767px) {
        .floating-btn {
            width: 40px;
            height: 40px;
            font-size: 18px;
            right: 12px;
        }

        .floating-btn.whatsapp {
            bottom: 18px;
        }

        .floating-btn.back-to-top {
            bottom: 70px;
        }
    }

    @media (max-width: 426px) {
        .floating-btn {
            width: 32px;
            height: 32px;
            font-size: 14px;
            right: 6px;
        }

        .floating-btn.whatsapp {
            bottom: 10px;
        }

        .floating-btn.back-to-top {
            bottom: 50px;
        }
    }

    .theme-switcher {
        display: none !important;
    }

    .back-to-top.open {
        bottom: 30px;
    }

    #back-to-top,
    #back-to-top.back-to-top {
        background-color: var(--primary-color) !important;
        color: #fff !important;
        border: 1px solid var(--primary-dark) !important;
    }

    #back-to-top .icons,
    #back-to-top svg,
    #back-to-top i {
        color: #fff !important;
        fill: currentColor !important;
        stroke: currentColor !important;
    }

    .phone-button {
        display: inline;
        font-size: 24px;

        line-height: 42px;
        text-align: center;
        position: fixed;
        bottom: 70px;
        right: 40px;
        z-index: 999;
        border-radius: 50%;


    }

    .bounce {
        -webkit-animation: float 1500ms infinite ease-in-out;
        animation: float 1500ms infinite ease-in-out;
    }

    .bounce_w {
        -webkit-animation: float 1500ms infinite ease-in-out;
        animation: float 1500ms infinite ease-in-out;
    }

    .phone-button i {
        color: #F08121;
    }
</style>
<!-- WhatsApp Floating Button -->
<a href="https://api.WhatsApp.com/send?phone=+8801715175856&text=Hello! " class="floating-btn whatsapp"
    title="Chat on WhatsApp" target="_blank" rel="noopener">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="28" height="28">
        <path fill="#fff"
            d="M16 3C9.373 3 4 8.373 4 15c0 2.385.832 4.58 2.236 6.36L4.07 28.07a1 1 0 0 0 1.2 1.2l6.71-2.166A12.94 12.94 0 0 0 16 27c6.627 0 12-5.373 12-12S22.627 3 16 3zm0 22c-2.13 0-4.16-.66-5.85-1.8l-.41-.27-4.01 1.29 1.3-3.98-.27-.41A9.96 9.96 0 0 1 6 15c0-5.514 4.486-10 10-10s10 4.486 10 10-4.486 10-10 10zm5.13-7.29c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.43-2.25-1.37-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.19.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.54-.45-.47-.61-.48-.16-.01-.36-.01-.56-.01-.19 0-.5.07-.76.36-.26.29-1 1-1 2.43s1.02 2.82 1.16 3.02c.14.2 2.01 3.2 5.01 4.36.7.24 1.25.38 1.68.48.71.15 1.36.13 1.87.08.57-.06 1.75-.72 2-1.41.25-.69.25-1.28.18-1.41-.07-.13-.25-.2-.53-.34z" />
    </svg>
</a>
<!-- Back to Top Floating Button -->
<button id="back-to-top" class="floating-btn back-to-top" title="Back to Top" aria-label="Back to Top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
        <path fill="none" stroke="#fff" stroke-width="2" d="M12 19V5m0 0l-7 7m7-7l7 7" />
    </svg>
</button>

<body id="bg">
    <div class="page-wraper ">
        <!-- header -->
        @include('frontend.includes.header')
        <!-- header END -->
        <!-- Content -->
        <div class="page-content">
            @yield('content')
        </div>
        <!-- Content END-->
        <!-- Footer -->
        @include('frontend.includes.footer')
        <!-- Footer END-->
        <!-- scroll top button -->
        {{-- <button class="scroltop fa fa-arrow-up" ></button> --}}
    </div>
    {{-- <div id="loading-area"></div> --}}


    @include('frontend.includes.script')
    <script>
        // Show/hide back-to-top button
        const backToTopBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                backToTopBtn.style.display = 'flex';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>


</body>



</html>
