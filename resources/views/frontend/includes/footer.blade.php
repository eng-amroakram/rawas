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
                                    <a href="{{ route('frontend.index') }}">
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
                                        <li><a href="#about"><i class="fa-sharp fa-solid fa-plus"></i> تعرف
                                                علينا</a></li>
                                        <li><a href="#projects"><i class="fa-sharp fa-solid fa-plus"></i> مشاريعنا</a>
                                        </li>

                                        <li><a href="{{ route('frontend.contact') }}"><i
                                                    class="fa-sharp fa-solid fa-plus"></i> اتصل
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
                                        <i class="fa-solid fa-location-dot"></i> <a href="#">
                                            {{ $settings['FOOTER']['location'] }}
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
