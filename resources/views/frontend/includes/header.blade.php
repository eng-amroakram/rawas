<!-- header area start -->
<header>
    <div id="header-sticky" class="tp-header-area tp-header-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-4 col-md-3 col-6">
                    <div class="logo">
                        <a href="{{ route('frontend.index') }}">
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
                                    <a href="tel:0123456789">{{ $settings['GENERAL_SETTINGS']['phone_number'] }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="tp-header-btn ml-30 d-none d-lg-block">
                            <a class="tp-btn-red" href="{{ route('frontend.contact') }}">سجل اهتمامك </a>
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
