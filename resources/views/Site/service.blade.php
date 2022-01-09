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
