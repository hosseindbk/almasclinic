@extends('master')
@section('header')
    <meta name="description"        content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر">
    <meta name="keyword"            content="کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر">
    <meta name="twitter:card"       content="کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر" />
    <meta name="twitter:title"      content="خدمات کلینیک زیبایی الماس" />
    <meta name="twitter:description"content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر" />
    <meta itemprop="name"           content="خدمات کلینیک زیبایی الماس">
    <meta itemprop="description"    content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر">
    <meta property="og:title"       content="خدمات کلینیک زیبایی الماس | تزریق بوتاکس | تزریق فیلر | مزوتراپی | میکرونید لینگ | تزریق چربی | پی آر پی | کاشت نخ | خدمات لیزر "/>
    <meta property="og:description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر" />
    <meta property="og:url"         content="https://almasbeauty.com/services" />
    <title>خدمات کلینیک زیبایی الماس | تزریق بوتاکس | تزریق فیلر | مزوتراپی | میکرونید لینگ | تزریق چربی | پی آر پی | کاشت نخ | خدمات لیزر </title>

@endsection
@section('main')

<div class="almas-banner-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">خدمات کلینیک زیبایی الماس دکتر غلامرضا کریمی</h1>
                <br>
                <p class="text-center"> خدمات کلینیک الماس ( تزریق بوتاکس ، پی آر پی ، تزریق فیلر ، نخ کاگ ، میکرونید لینگ ، تزریق چربی) می باشد </p>
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
    <div class="container">
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-sm-6">
                    <div class="case-study-card">
                        <img src="{{asset($service->images)}}" alt="{{$service->title}}" title="{{$service->title}}" >
                        <div style="padding: 15px 25px; position: absolute; left: 0; top: 40%; width: 100%; text-align: center;background-color: #00000042;">
                            <a href="{{url('services/'.$service->slug)}}"  target="blank">
                                <h2 class="study-text" style="color: #fff;"> {{$service->title}}  </h2>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
