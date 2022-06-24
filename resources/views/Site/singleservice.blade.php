@extends('master')
@section('header')
    @foreach($services as $service)
    <meta name="description" content="{!! $service->description !!}">
    <meta name="keywords" content="کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="کلینیک زیبایی الماس-{{$service->title}}" />
    <meta name="twitter:description" content="{!! $service->description !!}" />
    <meta itemprop="name" content="کلینیک زیبایی الماس-{{$service->title}}">
    <meta itemprop="description" content="{!! $service->description !!}">
    <meta property="og:title" content="کلینیک زیبایی الماس-{{$service->title}}"/>
    <meta property="og:description" content="{!! $service->description !!}" />
    <title>{{$service->title}} | دکتر غلامرضا کریمی </title>
    @endforeach

@endsection
@section('main')
<div class="case-study-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            @foreach($services as $service)

                <div class="col-lg-12 col-sm-12">
                    <div class="case-study-card text-center">
                        <img src="{{asset($service->images)}}" alt="{{$service->title}}" style="max-width: 400px;">
                    </div>
                    <div >
                        <h1 style="text-align: center">{{$service->title}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">

                    <div style="text-align: justify">

                        <p>{!! $service->description !!}</p>
                    </div>


                </div>
                <div class="col-lg-6 hidden-sm d-none d-sm-block" style="text-align: left;padding: 56px 20px;">

                    <img src="{{asset($service->image2)}}" style="width: 50%;float: left;padding: 2px;" alt="{{$service->title}}">
                    <img src="{{asset($service->image3)}}" style="width: 50%;float: left;padding: 2px;" alt="{{$service->title}}">

                    <img src="{{asset($service->image4)}}" style="width: 50%;float: right;padding: 2px;" alt="{{$service->title}}">
                    <img src="{{asset($service->image5)}}" style="width: 50%;float: right;padding: 2px;" alt="{{$service->title}}">

                    <img src="{{asset($service->image6)}}" style="width: 100%;float: right;margin-top: 50px;" alt="{{$service->title}}">

                    <img src="{{asset($service->image7)}}" style="width: 100%;float: right;margin-top: 30px;padding: 2px;" alt="{{$service->title}}">

                    <img src="{{asset($service->image8)}}"  style="width: 50%;float: right;padding: 2px;" alt="{{$service->title}}">
                    <img src="{{asset($service->image9)}}"  style="width: 50%;float: right;padding: 2px;" alt="{{$service->title}}">
                    <img src="{{asset($service->image10)}}" style="width: 50%;float: right;padding: 2px;" alt="{{$service->title}}">
                    <img src="{{asset($service->image11)}}" style="width: 50%;float: right;padding: 2px;" alt="{{$service->title}}">

                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="case-study-card text-center">
                        <h4> نمونه {{$service->title}} کلینیک الماس </h4>
                    </div>
                </div>
            @endforeach
                <div class="case-study-area pb-100">
                    <div class="container">
                        <div class="row">
                            @foreach($medias as $media)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="case-study-card">
                                        <img src="{{asset($media->image)}}" alt="{{$service->title}}">
                                        <div style="padding: 15px 25px; position: absolute; left: 0; top: 40%; width: 100%; text-align: center;">
                                            <a href="{{url('services/'.$service->slug)}}"  target="blank">
                                                <h3 class="study-text" style="color: #fff;">{{$service->title}}</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
