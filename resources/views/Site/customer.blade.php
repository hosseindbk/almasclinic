@extends('master')
@section('header')
    <meta name="description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر">
    <meta name="keyword" content="کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر">
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
                <div class="col-12">
                    <h1 class="text-center">مشتریان کلینیک زیبایی الماس دکتر غلامرضا کریمی</h1>
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
                                    <img src="{{asset($media->image)}}" alt="{{$service->title}}">
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
