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
                                    <div class="collapse show mg-t-5" id="collapseExample">
                                        <div>
                                            <h3 class="text-center mb-5"><span class="badge badge-light">   @foreach($packages as $package) ویرایش اطلاعات {{$package->title}} @endforeach</span></h3>
                                        </div>
                                            @foreach($packages as $package)
                                            <form action="{{route('packages.update', $package->id)}}" method="POST" enctype="multipart/form-data">
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
@endsection
@endsection
