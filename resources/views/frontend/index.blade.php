<!doctype html>
<html class="no-js" lang="AR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>مؤسسةرواس للتسويق الرقمي</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">

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
                                <img data-width="115" src="{{ $settings['GENERAL_SETTINGS']['logo'] }}" alt="">
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
                                    {{-- <li><a href="#blog-one-page">المدونة</a></li> --}}
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
                                        <a
                                            href="tel:0123456789">{{ $settings['GENERAL_SETTINGS']['phone_number'] }}</a>
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
                    <a href="contact.html" class="tp-btn">Getting Started</a>
                </div>
                <div class="side-info-contact">
                    <span>we are here</span>
                    <p>1489 Langley Ave <br> Grand Forks Afb, North.</p>
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
    <!-- header-cart-end -->

    <main>

        <!-- banner-area-start -->
        <section class="banner-area tp-banner-5-bg"
            data-background="{{ asset('assets/img/banner/five/banner-5-bg-1.jpg') }}">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="tp-banner-5-wrapper">

                            <h4 class="tp-banner-5-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                                {{ $settings['HERO_SECTION']['main_title_ar'] }}</h4>
                            <p class="header-p wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".7s">
                                {{ $settings['HERO_SECTION']['description_ar'] }}</p>
                            <div class="tp-banner-5-info d-flex align-items-center wow fadeInUp"
                                data-wow-duration="1.6s" data-wow-delay=".9s">
                                <div class="tp-banner-5-btn">
                                    <a class="tp-btn-red" href="about.html">سجل اهتمامك </a>
                                </div>
                                <div class="tp-banner-5-video d-flex align-items-center">
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=tUP5S4YdEJo"><i
                                            class="flaticon-play"></i></a>
                                    <span>{!! $settings['HERO_SECTION']['circle_text_ar'] !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-banner-5-thumb">
                            <div class="tp-banner-5-thumb-1">
                                <img src="{{ $settings['HERO_SECTION']['background_image'] }}" alt="">
                                {{-- asset('assets/img/banner/five/banner-5-thumb-1.png') --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-slider-2-social d-none d-lg-block">
                <span>Follow us _ </span>
                <a href="#">Fb</a>
                <a href="#">Tw</a>
                <a href="#">Yt</a>
                <a href="#">In</a>
            </div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-start -->
        <section id="about-one-page" class="video-area tp-benifits-4 pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-7 col-xl-6 col-lg-6 order-2 order-lg-1">
                        <div class="tp-benifits-5-thumb">
                            <div class="tp-benifits-5-thumb-1">
                                <img src="{{ $settings['ABOUT_US']['image_one'] }}" alt="">
                            </div>
                            <div class="tp-benifits-5-thumb-2 overlay-anim">
                                <div class="tp-thumb-common-overlay-red wow"></div>
                                <img src="{{ $settings['ABOUT_US']['image_two'] }}" alt="">
                            </div>
                            <div class="tp-benifits-5-wrap">
                                <div class="tp-benifits-5-contact">
                                    <div class="tp-benifits-5-contact-icon">
                                        <i class="fa-solid fa-phone-flip"></i>
                                    </div>
                                    <div class="tp-benifits-5-contact-content">
                                        <span>معكم بكل وقت</span>
                                        <a
                                            href="tel:0123456789">{{ $settings['GENERAL_SETTINGS']['phone_number'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 col-lg-6 order-1 order-lg-2">
                        <div class="tp-video-two-wrapper p-relative pb-120 wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay=".6s">
                            <div class="tp-section tp-section-red mb-35">
                                <span class="tp-section-sub-title">{{ $settings['ABOUT_US']['caption_ar'] }}</span>
                                <h4 class="tp-section-title">{{ $settings['ABOUT_US']['main_title_ar'] }}</h4>
                                <div class="tp-section-title-wrapper">
                                    <p>{{ $settings['ABOUT_US']['description_ar'] }}</p>
                                </div>


                            </div>

                            <div class="tp-about-info pb-45">
                                <div class="tp-about-info-item d-flex mb-15">
                                    <div class="tp-about-info-item-icon">
                                        <i class="flaticon-server"></i>
                                    </div>
                                    <div class="tp-about-info-item-content">
                                        <h5 class="tp-about-info-item-title">
                                            {{ $settings['ABOUT_US']['feature_main_title_1'] }}</h5>
                                        <p>{{ $settings['ABOUT_US']['feature_description_1'] }}</p>
                                    </div>
                                </div>
                                <div class="tp-about-info-item d-flex mb-15">
                                    <div class="tp-about-info-item-icon">
                                        <i class="flaticon-technical-support"></i>
                                    </div>
                                    <div class="tp-about-info-item-content">
                                        <h5 class="tp-about-info-item-title">
                                            {{ $settings['ABOUT_US']['feature_main_title_2'] }}</h5>
                                        <p>{{ $settings['ABOUT_US']['feature_description_2'] }}</p>

                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

        </section>
        <!-- about-area-end -->

        <!-- project-area-start -->
        <section id="project-one-page" class="project-area tp-project-4 pb-50">
            <div class="tp-project-4-bg" data-background="{{ asset('assets/img/project/five/1.jpg') }}"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="tp-section tp-section-red mb-65">
                            <span class="tp-section-sub-title">ابداعات فريق عملنا</span>
                            <h4 class="tp-section-title"> جديد مشاريعنا في مجالات العمل المختلفة</h4>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-4">
                        <div class="tp-project-4-arrows mb-35">
                            <div class="tp-project-4-arrows-wrapper">
                                <div class="tp-project-4-prv"><i class="fa-regular fa-arrow-left"></i></div>
                                <div class="tp-project-4-nxt"><i class="fa-regular fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tp-project-5-wrap">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tp-project-4-wrapper">
                                <div class="swiper-container tp-project-4-active">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="tp-project-4-item">
                                                <div class="tp-project-4-item-thumb tp-thumb-common">
                                                    <div class="tp-thumb-common-overlay-red wow"></div>
                                                    <img src="{{ asset('assets/img/project/four/4.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="tp-project-4-item-content">
                                                    <span>تغطية</span>
                                                    <h4 class="tp-project-4-title under-line-white"><a
                                                            href="project-details.html">المؤتمرات والفعاليات </a></h4>
                                                </div>
                                                <div class="tp-project-4-arrow">
                                                    <a href="project-details.html"><i
                                                            class="fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="tp-project-4-item">
                                                <div class="tp-project-4-item-thumb tp-thumb-common">
                                                    <div class="tp-thumb-common-overlay-red wow"></div>
                                                    <img src="{{ asset('assets/img/project/four/1.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="tp-project-4-item-content">
                                                    <span>الانتاج المرئي </span>
                                                    <h4 class="tp-project-4-title under-line-white"><a
                                                            href="project-details.html">تصوير الفيديو</a></h4>
                                                </div>
                                                <div class="tp-project-4-arrow">
                                                    <a href="project-details.html"><i
                                                            class="fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="tp-project-4-item">
                                                <div class="tp-project-4-item-thumb tp-thumb-common">
                                                    <div class="tp-thumb-common-overlay-red wow"></div>
                                                    <img src="{{ asset('assets/img/project/four/2.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="tp-project-4-item-content">
                                                    <span>العلامات التجارية</span>
                                                    <h4 class="tp-project-4-title under-line-white"><a
                                                            href="project-details.html">تصميم والمونتاج</a></h4>
                                                </div>
                                                <div class="tp-project-4-arrow">
                                                    <a href="project-details.html"><i
                                                            class="fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="tp-project-4-item">
                                                <div class="tp-project-4-item-thumb tp-thumb-common">
                                                    <div class="tp-thumb-common-overlay-red wow"></div>
                                                    <img src="{{ asset('assets/img/project/four/3.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="tp-project-4-item-content">
                                                    <span>االتسويق</span>
                                                    <h4 class="tp-project-4-title under-line-white"><a
                                                            href="project-details.html">الحملات الدعائية</a></h4>
                                                </div>
                                                <div class="tp-project-4-arrow">
                                                    <a href="project-details.html"><i
                                                            class="fa-regular fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tp-price-shape-1">
                <img src="{{ asset('assets/img/shape/line-5-shape-2.png') }}" alt="">
            </div>
        </section>

        <!-- services-area-start -->
        <section class="services-area tp-services-5-bg pt-115 pb-70"
            data-background="{{ asset('assets/img/services/five/services-5-bg.jpg') }}">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-section tp-section-red-white text-center mb-50">
                            <span class="tp-section-sub-title">هذا ما نبدع بتقديمه</span>
                            <h4 class="tp-section-title"> أفضل خدمات الحلول التسويقية</h4>
                        </div>
                    </div>
                </div>

                <div class="row">

                    @if (isset($services[0]))
                        <div class="col-lg-3 col-md-6">
                            <div class="tp-services-5 mb-40">
                                <div class="tp-services-5-icon mb-25">
                                    <i class="flaticon-consultant"></i>
                                </div>
                                <div class="tp-services-5-content">
                                    <h5 class="tp-services-5-title under-line-white mb-25"><a
                                            href="services-details.html">{{ $services[0]['name'] }}</a></h5>
                                    <p>
                                        {{ $services[0]['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if (isset($services[1]))
                        <div class="col-lg-3 col-md-6">
                            <div class="tp-services-5 mb-40">
                                <div class="tp-services-5-icon mb-25">
                                    <i class="flaticon-coding"></i>
                                </div>
                                <div class="tp-services-5-content">
                                    <h5 class="tp-services-5-title under-line-white mb-25"><a
                                            href="services-details.html">{{ $services[1]['name'] }}</a></h5>
                                    <p>
                                        {{ $services[1]['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if (isset($services[2]))
                        <div class="col-lg-3 col-md-6">
                            <div class="tp-services-5 mb-40">
                                <div class="tp-services-5-icon mb-25">
                                    <i class="flaticon-advertisig-agency"></i>
                                </div>
                                <div class="tp-services-5-content">
                                    <h5 class="tp-services-5-title under-line-white mb-25"><a
                                            href="services-details.html">{{ $services[2]['name'] }}</a></h5>
                                    <p>
                                        {{ $services[2]['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($services[3]))
                        <div class="col-lg-3 col-md-6">
                            <div class="tp-services-5 mb-40">
                                <div class="tp-services-5-icon mb-25">
                                    <i class="flaticon-solution"></i>
                                </div>
                                <div class="tp-services-5-content">
                                    <h5 class="tp-services-5-title under-line-white mb-25"><a
                                            href="services-details.html">{{ $services[3]['name'] }}</a></h5>
                                    <p>
                                        {{ $services[3]['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>


        <!-- partners-area-end -->
        <div class="brand-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-section tp-section-red text-center mb-50">
                            <span class="tp-section-sub-title">شركاؤنا في النجاح</span>
                            <h4 class="tp-section-title">عملاء كنا جزءاً من تحقيق أهدافهم</h4>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div
                            class="swiper-container tp-brand-3-active swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                            <div class="swiper-wrapper" id="swiper-wrapper-1285ab7f7172ba31" aria-live="off"
                                style="transform: translate3d(-2340px, 0px, 0px); transition-duration: 0ms;">


                                @foreach ($partners as $index => $partner)
                                    <div class="swiper-slide  swiper-slide-duplicate-active"
                                        data-swiper-slide-index="{{ $index }}" role="group"
                                        aria-label="1 / 15" style="width: 234px;">
                                        <div class="tp-brand-3-item text-center">
                                            <img src="{{ asset('storage/' . $partner['image']) }}" alt="">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                        <img src="{{ $settings['FOOTER']['logo'] }}" alt="fw-logo">
                                    </a>
                                </div>
                                <div class="tp-footer-widget-content">

                                    <p>
                                        {{ $settings['FOOTER']['description_ar'] }}
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
                                        {{-- <li><a href="project-1.html"><i class="fa-sharp fa-solid fa-plus"></i>
                                                المدونة</a>
                                        </li> --}}
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
                                        <i class="fa-solid fa-square-phone"></i><a
                                            href="tel:0123456789">{{ $settings['GENERAL_SETTINGS']['phone_number'] }}</a>
                                    </div>
                                    <div class="tp-footer-widget-content-list-item">
                                        <i class="fa-solid fa-envelope"></i> <a
                                            href="../../cdn-cgi/l/email-protection.html#d5a1b0b6afbab3b3bcb6b4bcb9b495b2b8b4bcb9fbb6bab8"><span
                                                class="__cf_email__"
                                                data-cfemail="b9cddcdac3d6dfdfd0dad8d0d5d8f9ded4d8d0d597dad6d4">[email&#160;protected]</span></a>
                                    </div>
                                    <div class="tp-footer-widget-content-list-item">
                                        <i class="fa-solid fa-location-dot"></i> <a
                                            href="#">{{ $settings['FOOTER']['location'] }}</a>
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
                                <span>{{ $settings['FOOTER']['copyright_text_ar'] }}</span>
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
