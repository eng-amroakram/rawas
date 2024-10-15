@extends('frontend.layouts.app')
@section('content')
    <main>

        <!-- banner-area-start -->
        <section class="banner-area tp-banner-5-bg" data-background="assets/img/banner/five/banner-5-bg-1.jpg">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="tp-banner-5-wrapper">

                            <h4 class="tp-banner-5-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                                {{ $settings['HERO_SECTION']['main_title_ar'] }}
                            </h4>

                            <p class="header-p wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".7s">
                                {{ $settings['HERO_SECTION']['description_ar'] }}
                            </p>



                            <div class="tp-banner-5-info d-flex align-items-center wow fadeInUp" data-wow-duration="1.6s"
                                data-wow-delay=".9s">


                                <div class="tp-banner-5-btn">
                                    <a class="tp-btn-red" href="{{ route('frontend.contact') }}">سجل اهتمامك </a>
                                </div>
                                @if ($settings['GENERAL_SETTINGS']['video'])
                                    <div class="tp-banner-5-video d-flex align-items-center">
                                        <a class="popup-video" href="{{ $settings['GENERAL_SETTINGS']['video'] }}"><i
                                                class="flaticon-play"></i></a>
                                        <span>{!! $settings['HERO_SECTION']['circle_text_ar'] !!}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-banner-5-thumb">
                            <div class="tp-banner-5-thumb-1">
                                <img src="{{ $settings['HERO_SECTION']['background_image'] }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <a href="tel:0123456789">{{ $settings['GENERAL_SETTINGS']['phone_number'] }}</a>
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
                                    <p>
                                        {{ $settings['ABOUT_US']['description_ar'] }}
                                    </p>
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
                                        <p>
                                            {{ $settings['ABOUT_US']['feature_description_1'] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="tp-about-info-item d-flex mb-15">
                                    <div class="tp-about-info-item-icon">
                                        <i class="flaticon-technical-support"></i>
                                    </div>
                                    <div class="tp-about-info-item-content">
                                        <h5 class="tp-about-info-item-title">
                                            {{ $settings['ABOUT_US']['feature_main_title_2'] }}
                                        </h5>
                                        <p>
                                            {{ $settings['ABOUT_US']['feature_description_2'] }}
                                        </p>
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

                                        @foreach ($projects as $project)
                                            <div class="swiper-slide">
                                                <div class="tp-project-4-item">
                                                    <div class="tp-project-4-item-thumb tp-thumb-common">
                                                        <div class="tp-thumb-common-overlay-red wow"></div>
                                                        <img src="{{ asset('storage/' . $project->image) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="tp-project-4-item-content">
                                                        <span>{{ $project->sub_title }}</span>
                                                        <h4 class="tp-project-4-title under-line-white"><a
                                                                href="{{ route('frontend.projects', $project->id) }}">{{ $project->title }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="tp-project-4-arrow">
                                                        <a href="{{ route('frontend.projects', $project->id) }}"><i
                                                                class="fa-regular fa-arrow-right"></i></a>
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
                        <div class="col-lg-3 col-6">
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
                        <div class="col-lg-3 col-6">
                            <div class="tp-services-5 mb-40">
                                <div class="tp-services-5-icon mb-25">
                                    <i class="flaticon-coding"></i>
                                </div>
                                <div class="tp-services-5-content">
                                    <h5 class="tp-services-5-title under-line-white mb-25"><a
                                            href="#services-details">{{ $services[1]['name'] }}</a></h5>
                                    <p>
                                        {{ $services[1]['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($services[2]))
                        <div class="col-lg-3 col-6">
                            <div class="tp-services-5 mb-40">
                                <div class="tp-services-5-icon mb-25">
                                    <i class="flaticon-advertisig-agency"></i>
                                </div>
                                <div class="tp-services-5-content">
                                    <h5 class="tp-services-5-title under-line-white mb-25"><a
                                            href="#services-details">{{ $services[2]['name'] }}</a></h5>
                                    <p>
                                        {{ $services[2]['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (isset($services[3]))
                        <div class="col-lg-3 col-6">
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
        <!-- services-area-end -->


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
                                        data-swiper-slide-index="{{ $index }}" role="group" aria-label="1 / 15"
                                        style="width: 234px;">
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
@endsection
