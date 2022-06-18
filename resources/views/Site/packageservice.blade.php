@extends('master')
@section('main')

<div class="almas-banner-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">پکیج های زیبایی الماس دکتر غلامرضا کریمی</h1>
            </div>
        </div>
    </div>
</div>
<div class="case-study-area pb-100">
    <div class="container">
        <div class="row">
            @foreach($packages as $package)
            <form action="{{route('package-set')}}" method="post" style="width: 100%;display: contents;">
                @csrf

                <input type="hidden" name="package_id" value="{{$package->id}}" >

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="prising-card pric-tabe">
                        <div class="price-header text-center">
                            <h3>{{$package->title}}</h3>
                            <h4 class="demo"></h4>
                        </div>
                        <ul>
                            @if($package->dis1)
                                <li> <i class="las la-check"></i>
                                    <p style="font-size: 13px;line-height: 2.7;">{{$package->dis1}}</p>
                                </li>
                            @endif
                            @if($package->dis2)
                                <li>
                                    <i class="las la-check"></i>
                                    <p style="font-size: 13px;line-height: 2.7;">{{$package->dis2}}</p>
                                </li>
                            @endif
                            @if($package->dis3)
                                <li>
                                    <i class="las la-check"></i>
                                    <p style="font-size: 13px;line-height: 2.7;">{{$package->dis3}}</p>
                                </li>
                            @endif
                            @if($package->dis4)
                                <li>
                                    <i class="las la-check"></i>
                                    <p style="font-size: 13px;line-height: 2.7;">{{$package->dis4}}</p>
                                </li>
                            @endif
                            @if($package->dis5)
                                <li>
                                    <i class="las la-check"></i>
                                    <p style="font-size: 13px;line-height: 2.7;">{{$package->dis5}}</p>
                                </li>
                            @endif
                            @if($package->dis6)
                                <li>
                                    <i class="las la-check"></i>
                                    <p style="font-size: 13px;line-height: 2.7;">{{$package->dis6}}</p>
                                </li>
                            @endif
                        </ul>
                        <div class="price-header text-center">
                            <h6 style="text-decoration: line-through;color: rgb(201 3 3 / 64%)">{{number_format($package->price)}} تومان </h6>
                            <h6 style="color: #00af26;">{{number_format($package->offprice)}} تومان </h6>
                        </div>
                        <div class="price-btn text-center">
                            <button type="submit" class="btn btn-info  btn-lg m-r-20">ارسال درخواست</button>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
{{--        <div class="row">--}}
{{--            <form action="{{route('package-set')}}" method="post">--}}
{{--                @csrf--}}
{{--                    <div class="col-md-12">--}}
{{--                        @include('error')--}}
{{--                    </div>--}}
{{--                        @foreach($packages as $package)--}}
{{--                            <input type="hidden" name="package_id" value="{{$package->id}}" >--}}
{{--                            <div class="col-lg-3 col-md-6 col-sm-12">--}}
{{--                                <div class="prising-card pric-tabe" style="height: 470px;">--}}
{{--                                    <div class="price-header text-center">--}}
{{--                                        <h3>{{$package->title}}</h3>--}}
{{--                                        <h4 class="demo"></h4>--}}
{{--                                    </div>--}}
{{--                                    <ul>--}}
{{--                                        @if($package->dis1)--}}
{{--                                            <li> <i class="las la-check"></i>--}}
{{--                                                <p style="font-size: 13px;line-height: 2.7;">{{$package->dis1}}</p>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                        @if($package->dis2)--}}
{{--                                            <li>--}}
{{--                                                <i class="las la-check"></i>--}}
{{--                                                <p style="font-size: 13px;line-height: 2.7;">{{$package->dis2}}</p>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                        @if($package->dis3)--}}
{{--                                            <li>--}}
{{--                                                <i class="las la-check"></i>--}}
{{--                                                <p style="font-size: 13px;line-height: 2.7;">{{$package->dis3}}</p>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                        @if($package->dis4)--}}
{{--                                            <li>--}}
{{--                                                <i class="las la-check"></i>--}}
{{--                                                <p style="font-size: 13px;line-height: 2.7;">{{$package->dis4}}</p>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                        @if($package->dis5)--}}
{{--                                            <li>--}}
{{--                                                <i class="las la-check"></i>--}}
{{--                                                <p style="font-size: 13px;line-height: 2.7;">{{$package->dis5}}</p>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                        @if($package->dis6)--}}
{{--                                            <li>--}}
{{--                                                <i class="las la-check"></i>--}}
{{--                                                <p style="font-size: 13px;line-height: 2.7;">{{$package->dis6}}</p>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
{{--                                    </ul>--}}
{{--                                    <div class="price-header text-center">--}}
{{--                                        <h6 style="text-decoration: line-through;color: rgba(160,160,160,0.64)">{{number_format($package->price)}} تومان </h6>--}}
{{--                                        <h6>{{number_format($package->offprice)}} تومان </h6>--}}
{{--                                    </div>--}}
{{--                                    <div class="price-btn text-center">--}}
{{--                                        <button type="submit" class="btn btn-info  btn-lg m-r-20">ارسال درخواست</button>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--            </form>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
