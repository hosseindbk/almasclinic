@extends('master')
@section('header')
    <meta name="description" content="رزرو وقت از کلینیک یبایی الماس دکتر غلامرضا کریمی به صورت آنلاین و تلفنی">
    <meta name="keywords" content="نوبت دهی کلینیک زیبایی الماس، رزرو وقت آنلاین کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="رزرو وقت آنلاین کلینیک زیبایی الماس" />
    <meta name="twitter:description" content="رزرو وقت از کلینیک یبایی الماس دکتر غلامرضا کریمی به صورت آنلاین و تلفنی" />
    <meta itemprop="name" content="رزرو وقت آنلاین کلینیک زیبایی الماس">
    <meta itemprop="description" content="رزرو وقت از کلینیک یبایی الماس دکتر غلامرضا کریمی به صورت آنلاین و تلفنی">
    <meta property="og:title" content="رزرو وقت آنلاین کلینیک زیبایی الماس"/>
    <meta property="og:description" content="رزرو وقت از کلینیک یبایی الماس دکتر غلامرضا کریمی به صورت آنلاین و تلفنی" />
    <title>رزرو وقت آنلاین کلینیک زیبایی الماس دکتر غلامرضا کریمی</title>
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/assets/css-rtl/style/style.css')}}">


@endsection
@section('main')

<div class="almas-banner-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">نوبت دهی کلینیک زیبایی الماس دکتر رضا کریمی</h1>
            </div>
        </div>
    </div>
</div>
<div class="case-study-area pb-100">
    <div class="container">
        <div class="row">
            <form action="{{route('reservation-set')}}" method="post" style="width: 50%;margin: 0 auto;">
                @csrf
                    <div class="col-md-12">
                        @include('error')
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <p class="mg-b-10">نوع خدمات</p>
                            <select name="service_id" id="service_id" class="form-control select-lg select2">
                                <option value="" >یکی را انتخاب کنید</option>
                            @foreach($services as $service)
                                    <option value="{{$service->id}}" >{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <p class="mg-b-10">زیر مجموعه خدمات</p>
                            <select name="subservice_id" id="subservice_id" class="form-control select-lg select2">
                                <option value="" >یکی را انتخاب کنید</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <p class="mg-b-10">تاریخ پیشنهادی</p>
                            <input type="text" name="dateset" class="form-control fc-datepicker" autocomplete="off" placeholder="روز / ماه / سال" >
                        </div>
                    </div>
                    <div class="col-lg-12 mg-b-10 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info  btn-lg m-r-20">ارسال درخواست</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <script src="{{asset('admin/assets/js/form-elements.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>
    <script>
        $(function(){
            $('#service_id').change(function(){
                $("#subservice_id option").remove();
                var id = $('#service_id').val();

                $.ajax({
                    url : '{{ route( 'serviceoption' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( result )
                    {
                        $.each( result, function(k, v) {
                            $('#subservice_id').append($('<option>', {value:k, text:v}));
                        });
                    },
                    error: function()
                    {
                        //handle errors
                        alert('error...');
                    }
                });
            });
        });
    </script>
@endsection
