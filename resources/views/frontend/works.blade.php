@extends('frontend.layouts.app')
@section('content')
    <main>

        <!-- breadcrumb-area-start -->
        <section class="breadcrumb-area breadcrumb-wrap">
            <div class="breadcrumb-bg" data-background="assets/img/breadcrumb/breadcrumb-bg-1.jpg"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="tpbreadcrumb">
                            <div class="breadcrumb-link mb-15">
                                <span class="breadcrumb-item-active"><a
                                        href="{{ route('frontend.index') }}">الرئيسية</a></span>
                                <span> / {{ $work->project->title }}</span>
                            </div>
                            <h2 class="breadcrumb-title">{{ $work->title }}</h2>
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

        <!-- project-details-area-start -->
        <section class="project-details-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-project-details-thumb w-img mb-30">
                            <img src="assets/img/project/project-details-thumb-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="tp-project-details-catagory-border mb-30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tp-project-details-catagory mb-20">
                                <h4 class="tp-project-details-catagory-title">{{ $work->project->title }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="tp-project-details-catagory-item mb-35">
                                <p><span>اسم الجهة:</span>{{ $work->sub_title }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="tp-project-details-catagory-item mb-35">
                                <p><span>القسم:</span> {{ $work->title }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="tp-project-details-catagory-item mb-35">
                                <p><span>التاريخ:</span> {{ $work->created_at->format('Y-m-d') }}</p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-project-details-catagory-content mb-40">
                            <p>
                                {!! $work->description !!}
                            </p>
                        </div>
                    </div>

                </div>

                <div class="row align-items-center">
                    <div class="col-12">
                        <h3> صور اخري للمشروع</h3>
                    </div>

                    @foreach ($work->images as $image)
                        <div class="col-lg-3">
                            <div class="tp-project-details-list-thumb w-img">
                                <img src="{{ asset('storage/' . $image) }}" alt="">
                            </div>
                        </div>
                    @endforeach




                </div>
            </div>
        </section>
        <!-- project-details-area-end -->

        <!-- project-area-start -->
        <section class="project-area tp-project-inner-2 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tp-section mb-60">
                            <h4 class="tp-section-title">مشاريع اخري</h4>
                        </div>
                    </div>


                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6">
                            <div class="tp-project-4-item mb-30">
                                <div class="tp-project-4-item-thumb tp-thumb-common">
                                    <div class="tp-thumb-common-overlay wow"></div>
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="">
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
        </section>
        <!-- project-area-end -->
    </main>
@endsection
