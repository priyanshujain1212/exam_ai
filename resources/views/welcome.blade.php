@extends('layouts.app')

@section('search')
<div class="col-lg-6 col-12 col-sm-12">
   
</div>
@endsection

@section('main-content')

<!-- ========================= SECTION INTRO ========================= -->
@if(!blank($banners))
<section class="section-intro padding-y-sm">
    <div class="container">
        <div class="main-banner slider-banner-slick">
            @foreach($banners as $banner)
                <a href="{{ $banner->link ? url($banner->link) : '#' }}">
                    <div class="item-slide">
                        <img src="{{ $banner->images }}" class="img-fluid rounded">
                        @if($banner->title != '' || $banner->short_description)
                            <div class="carousel-caption d-none d-md-block">
                                @if($banner->title)
                                    <h4>{{ Str::limit($banner->title, 120, '..') }}</h4>
                                @endif
                                @if($banner->short_description)
                                    <p>
                                        {{ Str::of(strip_tags($banner->short_description))->limit(150, '..') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div> <!-- container //  -->
</section>
@endif
<!-- ========================= SECTION INTRO END// ========================= -->


<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-content padding-y-sm">
    <div class="container">
        <article class="card card-body">
            <div class="row">
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i
                                class="{{ setting('step_one_icon', 'fa fa-2x fa-truck') }}"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">{{ setting('step_one_title', 'Fast delivery') }}</h5>
                            <p>{{ setting('step_one_description','Fast Deliver is a fast growing and promising courier and parcel service in Bangladesh.') }}
                            </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i
                                class="{{ setting('step_two_icon', 'fa fa-2x fa-landmark') }}"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">{{ setting('step_two_title', 'Creative Strategy') }}</h5>
                            <p>{{ setting('step_two_description','A creative strategy is made to help explain to all concerned') }}</p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div><!-- col // -->
                <div class="col-md-4">
                    <figure class="item-feature">
                        <span class="text-primary"><i
                                class="{{ setting('step_three_icon', 'fa fa-2x fa-lock') }}"></i></span>
                        <figcaption class="pt-3">
                            <h5 class="title">{{ setting('step_three_title', 'High secured') }}</h5>
                            <p>{{ setting('step_three_description','A high secured strategy is made to help explain to all concerned') }}
                            </p>
                        </figcaption>
                    </figure> <!-- iconbox // -->
                </div> <!-- col // -->
            </div>
        </article>

    </div> <!-- container .//  -->
</section>


<!-- ========================= SECTION CONTENT ========================= -->







@section('style')
<link href="{{ asset('frontend/plugins/slickslider/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/plugins/slickslider/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection
