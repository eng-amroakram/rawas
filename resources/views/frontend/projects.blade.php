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
                                <span> / {{ $project->title }}</span>
                            </div>
                            <h2 class="breadcrumb-title">مشاريعنا</h2>
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

        <!-- project-area-start -->
        <section class="project-area tp-project-inner-2  pb-120 pt-120">
            <div class="container">
                <div class="row">

                    @foreach ($project->works as $work)
                        <div class="col-lg-4 col-md-6">
                            <div class="tp-project-4-item mb-30">
                                <div class="tp-project-4-item-thumb tp-thumb-common">
                                    <div class="tp-thumb-common-overlay wow"></div>
                                    <img src="{{ asset('storage/' . $work->image) }}" alt="">
                                </div>
                                <div class="tp-project-4-item-content">
                                    <span>{{ $work->sub_title }}</span>
                                    <h4 class="tp-project-4-title under-line-white"><a
                                            href="{{ route('frontend.work', $work->id) }}">{{ $work->title }}</a></h4>
                                </div>
                                <div class="tp-project-4-arrow">
                                    <a href="{{ route('frontend.work', $work->id) }}"><i
                                            class="fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination text-center mt-30">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa-light fa-arrow-left-long"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <span class="current">2</span>
                                    </li>
                                    <li>
                                        <a href="#">3</a>
                                    </li>
                                    <li>
                                        <a href="#">...</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-light fa-arrow-right-long"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> --}}

            </div>
        </section>
        <!-- project-area-end -->

    </main>
@endsection
