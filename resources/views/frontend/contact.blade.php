@extends('frontend.layouts.app')
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <section class="breadcrumb-area breadcrumb-wrap">
            <div class="breadcrumb-bg" data-background="{{ asset('assets/img/breadcrumb/breadcrumb-bg-1.jpg') }}"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="tpbreadcrumb">
                            <div class="breadcrumb-link mb-15">
                                <span class="breadcrumb-item-active"><a
                                        href="{{ route('frontend.index') }}">الرئيسية</a></span>
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
                            @include('flash::message')

                            <!-- Errors block -->
                            @include('backend.includes.errors')
                            <!-- / Errors block -->

                            <form action="{{ route('backend.contacts.store') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <input type="text" name="name" placeholder="الاسم" required>
                                            <span><i class="fa-light fa-user"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <input type="email" name="email" placeholder="البريد الالكتروني">
                                            <span><i class="fa-light fa-envelope"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <input type="tel" name="phone" placeholder="رقم الجوال" required>
                                            <span><i class="fa-light fa-phone"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            {{-- <select name="service_id" class="select">
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select> --}}
                                            <input type="text" name="service" placeholder="الخدمة المطلوبة">
                                            <span><i class="fa-light fa-user"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-input mb-20">
                                            <textarea name="message" placeholder="اكتب رسالتك هنا"></textarea>
                                            <span><i class="fa-light fa-pen"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="tp-contact-details-form-btn">
                                            <button type="submit" class="tp-btn">تقديم طلب</button>
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
@endsection
