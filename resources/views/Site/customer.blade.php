@extends('master')
@section('header')
    <meta name="description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر">
    <meta name="keywords" content="کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="مشتریان کلینیک زیبایی الماس دکتر غلامرضا کریمی" />
    <meta name="twitter:description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر" />
    <meta itemprop="name" content="مشتریان کلینیک زیبایی الماس دکتر غلامرضا کریمی">
    <meta itemprop="description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر">
    <meta property="og:title" content="مشتریان کلینیک زیبایی الماس دکتر غلامرضا کریمی"/>
    <meta property="og:description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر" />
    <title>مشتریان کلینیک زیبایی الماس دکتر غلامرضا کریمی</title>

@endsection
@section('main')

    <div class="almas-banner-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <h1 class="text-center">مشتریان کلینیک زیبایی الماس دکتر غلامرضا کریمی</h1>
                    <br>
                    <p class="text-center">مشتریان در کلینیک الماس، خدمات ( تزریق بوتاکس ، پی آر پی ، تزریق فیلر ، نخ کاگ ، میکرونید لینگ ، تزریق چربی) می توانند دریافت نمایند </p>
                </div>
                <div class="col-12 mt-4" style="border: 3px solid;border-radius: 15px;background: #fff;padding: 30px;background-image:url({{asset('site/images/slider.jpg')}});background-repeat: no-repeat;">
                    <p class="text-right" style="line-height:20px !important;color: #fff;">مشتریان کلینیک زیبایی الماس چه خدماتی دریافت می کنند؟</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;"> مشاوره</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;"> تزریق بوتاکس</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;">تزريق فيلر</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;">مزوتراپی</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;">ميكرونيدلينگ</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;">تزريق چربی</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;">پی آر پی</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;">كاشت نخ</p>
                    <p class="text-right" style="line-height:20px !important;margin-right: 20px;color: #fff;">خدمات ليزر</p>
                </div>
            </div>
        </div>
    </div>
    <div class="case-study-area pb-100">
        <div class="container-fluid">
            <div class="row">
                @foreach($services as $service)
                    @foreach($medias as $media)
                        @if($media->service_id == $service->id)
                            <div class="col-lg-3 col-sm-6">
                                <div class="case-study-card">
                                    <img  src="{{asset('site/images/logo-white.png')}}" class="lazy" data-src="{{asset($media->image)}}"  title="{{$service->title}}" alt="{{$service->title}}">
                                    <div class="caption">
                                        <div class="d-table">
                                            <div class="d-table-cell">
                                                <div class="study-text">
                                                    <h3>{{$service->title}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
