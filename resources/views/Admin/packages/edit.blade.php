@extends('Admin.admin')
@section('title')
    <title> ویرایش پکیج </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/sumoselect/sumoselect-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css-rtl/colors/default.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">ویرایش پکیج</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/packages')}}">مدیریت  پکیج</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش پکیج</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h3 class="text-center mb-5"><span class="badge badge-light">   @foreach($services as $service)  {{$service->title}} @endforeach</span></h3>
                                </div>
                                <div class="row row-sm">
                                    @foreach($services as $service)
                                    <div class="col-md-6">
                                        <p> عنوان خدمات : {{$service->title}}</p>
                                        <p> توضیحات : {!! $service->description !!}</p>
                                    </div>
                                        <div class="col-md-6">
                                            <div style="width: 250px;float: left;border: 2px solid #dad8d8;border-radius: 15px;">
                                                <img src="{{asset($service->images)}}" class="img-responsive" style="padding: 20px;" alt="">
                                                @if($service->images != null)
                                                    <div style="background: #efefef;text-align: center;padding: 5px;border-radius: 0px 0px 15px 15px;">
                                                        <form action="{{ route('updateproimg', $service->id)}}" method="post">
                                                            {{ method_field('patch') }}
                                                            {{csrf_field()}}
                                                            <div class="btn-group btn-group-xs">
                                                                <button type="submit" class="btn btn-danger btn-xs">
                                                                    <i class="fe fe-trash-2 "></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary" data-toggle="collapse" href="#collapseExample" role="button">@foreach($services as $service) ویرایش اطلاعات {{$service->title}} @endforeach</a>
                                    <div class="collapse mg-t-5" id="collapseExample">
                                        <div>
                                            <h3 class="text-center mb-5"><span class="badge badge-light">   @foreach($services as $service) ویرایش اطلاعات {{$service->title}} @endforeach</span></h3>
                                        </div>
                                            @foreach($services as $service)
                                            <form action="{{route('services.update', $service->id)}}" method="POST" enctype="multipart/form-data">
                                                <div class="row row-sm">
                                                    {{csrf_field()}}
                                                    {{ method_field('PATCH') }}
                                                    <div class="col-md-12">
                                                        @include('error')
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">عنوان پکیج</p>
                                                            <input type="text" name="title" value="{{$package->title}}"  placeholder="نام خدمات را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">ویژگی 1</p>
                                                            <input type="text" name="dis1" value="{{$package->dis1}}"  placeholder="ویژگی را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">ویژگی 2</p>
                                                            <input type="text" name="dis2" value="{{$package->dis2}}"  placeholder="ویژگی را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">ویژگی 3</p>
                                                            <input type="text" name="dis3" value="{{$package->dis3}}"  placeholder="ویژگی را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">ویژگی 4</p>
                                                            <input type="text" name="dis4" value="{{$package->dis4}}"  placeholder="ویژگی را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">ویژگی 5</p>
                                                            <input type="text" name="dis5" value="{{$package->dis5}}"  placeholder="ویژگی را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">ویژگی 6</p>
                                                            <input type="text" name="dis6" value="{{$package->dis6}}"  placeholder="ویژگی را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">قیمت پکیج</p>
                                                            <input type="text" name="price" value="{{$package->price}}"  placeholder="قیمت را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">قیمت با تخفیف </p>
                                                            <input type="text" name="offprice" value="{{$package->offprice}}"  placeholder="قیمت را وارد کنید" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mg-b-10 text-center">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-info  btn-lg m-r-20">ذخیره اطلاعات</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function($) {
            //fancyfileuplod
            $('#demo').FancyFileUpload({
                params : {
                    action : 'fileuploader',
                    id:"{{$service->id}}",
                    table:"service_id",
                },
                maxfilesize : 1000000
            });
        })(jQuery);

    </script>
@endsection
@endsection
