<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>مؤسسةرواس للتسويق الرقمي</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon_tecz.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <!-- loading content here -->
                <div class="tp-preloader-content">
                    <div class="tp-preloader-logo">
                        <div class="tp-preloader-circle">
                            <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round">
                                </circle>
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6"
                                    stroke-linecap="round"></circle>
                            </svg>
                        </div>
                        <img src="{{ asset('assets/img/logo/preloader/preloader-icon.png') }}" alt="">
                    </div>
                    <p class="tp-preloader-subtitle">Loading...</p>
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="back-to-top-wrapper">
        <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>
    <!-- back to top end -->
    <!-- header area start -->
    <header>
        <div id="header-sticky" class="tp-header-area tp-header-4">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-4 col-md-3 col-6">
                        <div class="logo">
                            <a href="index.html">
                                <img data-width="115" src="{{ asset('assets/img/logo/logo-white.png') }}"
                                    alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 d-none d-xl-block">
                        <div class="main-menu">
                            <nav id="mobile-menu" class="tp-main-menu-content">
                                <ul class="tp-onepage-menu">
                                    <li class="has-dropdown">
                                        <a href="#">الرئيسية</a>

                                    </li>
                                    <li><a href="#about-one-page">تعرف علينا</a></li>
                                    <li><a href="#project-one-page">مشاريعنا</a></li>
                                    <li><a href="#price-one-page">خدماتنا</a></li>
                                    <li><a href="#blog-one-page">المدونة</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-8 col-md-9 col-6">
                        <div class="tp-header-right d-flex align-items-center justify-content-end">

                            <div class="d-none d-md-block">
                                <div class="tp-header-4-contact d-flex align-items-center">
                                    <div class="tp-header-4-contact-icon">
                                        <i class="fa-solid fa-phone-flip"></i>
                                    </div>
                                    <div class="tp-header-4-contact-content">
                                        <span>معكم بكل وقت</span>
                                        <a href="tel:0123456789">+966 (576) 8765</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-header-btn ml-30 d-none d-lg-block">
                                <a class="tp-btn-red" href="contact.html">سجل اهتمامك </a>
                            </div>
                            <div class="offcanvas-btn d-xl-none ml-20">
                                <button class="offcanvas-open-btn"><i class="fa-solid fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!--  -->
    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
                <button class="offcanvas__close-btn offcanvas-close-btn">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>


            <div class="offcanvas__content">
                <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/img/logo/logo-black.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="tp-main-menu-mobile"></div>
                <div class="offcanvas__btn">
                    <a href="contact.html" class="tp-btn">سجل اهتمامك</a>
                </div>
                <div class="side-info-contact">
                    <span>للتواصل والاستفسار</span>
                    <p>+966 56422310.</p>
                </div>
                <div class="side-info-social">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                    <a href="#"><i class="fa-solid fa-paper-plane"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->



    <div class="body-overlay"></div>
    <!-- offcanvas area end -->



    <main>

        <!-- breadcrumb-area-start -->
        <section class="breadcrumb-area breadcrumb-wrap">
            <div class="breadcrumb-bg" data-background="{{ asset('assets/img/breadcrumb/breadcrumb-bg-1.jpg') }}">
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="tpbreadcrumb">
                            <div class="breadcrumb-link mb-15">
                                <span class="breadcrumb-item-active"><a href="index.html">الرئيسية</a></span>
                                <span> / اتصل بنا</span>
                            </div>
                            <h2 class="breadcrumb-title">اتصل بنا</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-shape">
                <div class="breadcrumb-shape-1 wow fadeInRight" data-wow-duration="1.8s" data-wow-delay=".4s">
                    <img src="{{ asset('assets/img/breadcrumb/breadcrumb-shape-1.png') }}" alt="">
                </div>
                <div class="breadcrumb-shape-4 wow slideInRight" data-wow-duration="1.2s" data-wow-delay=".1s">
                    <img src="{{ asset('assets/img/breadcrumb/breadcrumb-shape-3.png') }}" alt="">
                </div>
                <div class="breadcrumb-shape-5 wow slideInRight" data-wow-duration="1.4s" data-wow-delay=".3s">
                    <img src="{{ asset('assets/img/breadcrumb/breadcrumb-shape-2.png') }}" alt="">
                </div>
            </div>

        </section>
        <!-- breadcrumb-area-end -->

        <!-- contact-area-start -->
        <section class="contact-area pt-115 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="offset-xl-1 col-xl-6 col-lg-6">
                        <div class="tp-contact-details-form mb-40">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <input type="text" placeholder="الاول">
                                            <span><i class="fa-light fa-user"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <input type="text" placeholder="البريد الالكتروني">
                                            <span><i class="fa-light fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <input type="text" placeholder="رقم الجوال">
                                            <span><i class="fa-light fa-phone"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <input type="text" placeholder="الخدمة المطلوبة">
                                            <span><i class="fa-light fa-user"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <textarea name="Message" placeholder="اكتب رسالتك هنا"></textarea>
                                            <span><i class="fa-light fa-pen"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-btn">
                                            <button class="tp-btn">تقديم طلب</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>

    <!-- footer-area-start -->
    <footer>
        <div class="footer-area tp-footer-red theme-bg-2">
            <div class="tp-footer-top pt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="tp-footer-widget footer-col-1 mb-40 wow fadeInUp" data-wow-duration=".8s"
                                data-wow-delay=".4s">
                                <div class="tp-footer-widget-logo mb-15">
                                    <a href="index.html">
                                        <img src="{{ asset('assets/img/logo/logo-black.png') }}" alt="fw-logo">
                                    </a>
                                </div>
                                <div class="tp-footer-widget-content">

                                    <p>نص تجريبي لنبذة عن المؤسسة يكتب هنا نص تجريبي لتفاصيل التعريف بالمؤسسة يكتب هنا
                                    </p>


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tp-footer-widget tp-footer-col-2 mb-40 wow fadeInUp" data-wow-duration="1s"
                                data-wow-delay=".6s">
                                <h4 class="tp-footer-widget-title mb-30">القائمة الرئيسية</h4>
                                <div class="tp-footer-widget-link">
                                    <ul>
                                        <li><a href="about.html"><i class="fa-sharp fa-solid fa-plus"></i> تعرف
                                                علينا</a></li>
                                        <li><a href="blog.html"><i class="fa-sharp fa-solid fa-plus"></i> مشاريعنا</a>
                                        </li>
                                        <li><a href="project-1.html"><i class="fa-sharp fa-solid fa-plus"></i>
                                                المدونة</a>
                                        </li>
                                        <li><a href="contact.html"><i class="fa-sharp fa-solid fa-plus"></i> اتصل
                                                بنا</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="tp-footer-widget tp-footer-col-4 mb-40 wow fadeInUp" data-wow-duration="1.4s"
                                data-wow-delay="1s">

                                <h4 class="tp-footer-widget-title mb-20">سجل اهتمامك </h4>


                                <div class="tp-footer-widget-content-list">

                                    <div class="tp-footer-widget-content-list-item">
                                        <i class="fa-solid fa-square-phone"></i><a href="tel:0123456789">+966 566
                                            (9098)
                                            98765</a>
                                    </div>
                                    <div class="tp-footer-widget-content-list-item">
                                        <i class="fa-solid fa-envelope"></i> <a
                                            href="../../cdn-cgi/l/email-protection.html#d5a1b0b6afbab3b3bcb6b4bcb9b495b2b8b4bcb9fbb6bab8"><span
                                                class="__cf_email__"
                                                data-cfemail="b9cddcdac3d6dfdfd0dad8d0d5d8f9ded4d8d0d597dad6d4">[email&#160;protected]</span></a>
                                    </div>
                                    <div class="tp-footer-widget-content-list-item">
                                        <i class="fa-solid fa-location-dot"></i> <a href="#">المملكة العربية
                                            السعوية - جدة- حي الرويس
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="tp-footer-copyright">
                                <span>جميع الحقوق محفوظة لمؤسسة رواس 2024 </span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="tp-footer-terms">
                                <a href="#">تطوير شركة حلول</a>

                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </footer>
    <!-- footer-area-end -->


    <!-- JS here -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/range-slider.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
