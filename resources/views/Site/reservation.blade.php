@extends('master')
@section('header')
    <meta name="description" content="رزرو وقت از کلینیک یبایی الماس دکتر غلامرضا کریمی به صورت آنلاین و تلفنی">
    <meta name="keyword" content="نوبت دهی کلینیک زیبایی الماس، رزرو وقت آنلاین کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر">
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
                            <p class="mg-b-10">نام و نام خانوادگی</p>
                            <input type="hidden" name="user_id" data-required="1" value="{{Auth::user()->id}}" class="form-control" />
                            <input type="text" disabled value="{{Auth::user()->name}}" class="form-control" />
                        </div>
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
                            <input type="text" name="dateset" class="form-control fc-datepicker" placeholder="روز / ماه / سال" >
                        </div>
                    </div>
                <div class="col-lg-12 mg-b-10 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info  btn-lg m-r-20">ارسال درخواست</button>
                        </div>
                    </div>
            </form>
            <div class="table-responsive">
                <table class="table" id="example1">
                    <thead>
                    <tr>
                        <th class="wd-10p"> ردیف </th>
                        <th class="wd-10p">عنوان خدمات </th>
                        <th class="wd-10p"> زیرمجموعه خدمات </th>
                        <th class="wd-10p"> پکیج </th>
                        <th class="wd-10p"> زمان حضور </th>
                        <th class="wd-10p"> وضعیت درخواست </th>
                        <th class="wd-10p"> زمان درخواست </th>
                        <th class="wd-10p"> حذف درخواست </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x= 1; ?>
                    @foreach($reservations as $reservation)
                        @if($reservation->user_id == auth::user()->id)
                        <tr>
                            <td>{{$x++}}</td>

                            <td>
                                @foreach($services as $service)
                                    @if($service->id == $reservation->service_id)
                                        {{$service->title}}
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                @foreach($subservices as $subservice)
                                    @if($subservice->id == $reservation->subservice_id)
                                        {{$subservice->title}}
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                @foreach($packages as $package)
                                    @if($package->id == $reservation->package_id)
                                        {{$package->title}}
                                    @endif
                                @endforeach
                            </td>

                            <td>
                                {{$reservation->dateset}} - {{$reservation->timeset}}
                            </td>
                            <td>
                                @if($reservation->status == 0)
                                    <button class="btn ripple btn-outline-warning">در حال بررسی کارشناسان</button>
                                @elseif($reservation->status == 1)
                                    <button class="btn ripple btn-outline-primary">تایید زمان رزرو</button>
                                @elseif($reservation->status == 2)
                                    <button class="btn ripple btn-outline-primary">درخواست شما انجام شده </button>
                                @elseif($reservation->status == 3)
                                    <button class="btn ripple btn-outline-primary">زمان تایید شده گذشته است </button>
                                @endif
                            </td>
                            <td>
                                {{jdate($reservation->created_at)->ago()}}
                            </td>
                            <td>
                            @if($reservation->status == 0)
                                <form action="{{ route('deletereserve' , $reservation->id) }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="btn-icon-list">
                                        <button type="submit" class="btn ripple btn-outline-danger btn-icon">
                                            <i class="la la-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
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
