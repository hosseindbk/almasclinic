@extends('Admin.admin')
@section('title')
    <title> ویرایش درخواست کاربر </title>
    <link href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('main')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">ویرایش درخواست کاربر</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/reservations')}}">مدیریت  درخواست ها</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش درخواست کاربر</li>
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
                                   <div>
                                       <h3 class="text-center mb-5"><span class="badge badge-light"> بررسی درخواست کاربر</span></h3>
                                   </div>
                                            @foreach($reservations as $reservation)
                                            <form action="{{route('reservations.update', $reservation->id)}}" method="POST" enctype="multipart/form-data">
                                                <div class="row row-sm">
                                                    {{csrf_field()}}
                                                    {{ method_field('PATCH') }}
                                                    <div class="col-md-12">
                                                        @include('error')
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">نام و نام خانوادگی درخواست کننده</p>
                                                            <input type="hidden" name="user_id"  value="{{$reservation->user_id}}"  class="form-control" />
                                                            <input type="text" disabled  value="@foreach($users as $user) @if($user->id == $reservation->user_id){{$user->name}}@endif @endforeach"  class="form-control" />
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="mg-b-10">وضعیت درخواست کاربر</p>
                                                            <select name="status" class="form-control select-lg select2">
                                                                <option value="0" {{$reservation->status == 0 ? 'selected' : ''}}>در انتظار تایید</option>
                                                                <option value="1" {{$reservation->status == 1 ? 'selected' : ''}}>تایید کارشناس</option>
                                                                <option value="2" {{$reservation->status == 2 ? 'selected' : ''}}>انجام کار</option>
                                                                <option value="3" {{$reservation->status == 3 ? 'selected' : ''}}>زمان اعلام شده گذشته است</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="mg-b-10">روز حضور درخواست کننده</p>
                                                            <input type="text" name="dateset" value="{{$reservation->dateset}}" class="form-control fc-datepicker" placeholder="روز / ماه / سال" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">نوع درخواست کاربر</p>
                                                            <select name="service_id" class="form-control select-lg select2">
                                                                @foreach($services as $service)
                                                                    @if($service->id == $reservation->service_id)
                                                                        <option value="{{$service->id}}" {{$service->id == $reservation->service_id ? 'selected' : ''}}>{{$service->title}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="mg-b-10">زیر مجموعه درخواست کاربر</p>
                                                            <select name="subservice_id" class="form-control select-lg select2">
                                                                @foreach($subservices as $subservice)
                                                                    @if($subservice->id == $reservation->subservice_id)
                                                                        <option value="{{$subservice->id}}" {{$subservice->id == $reservation->subservice_id ? 'selected' : ''}}>{{$subservice->title}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="mg-b-10">ساعت حضور درخواست کننده</p>
                                                            <input type="text" name="timeset" id="datetimepicker3" data-required="1" value="{{$reservation->timeset}}" placeholder="{{jdate()->format('H:i')}}"  class="form-control timepicker" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">پکیج انتخابی کاربر</p>
                                                            <select name="package_id" class="form-control select-lg select2">
                                                                @foreach($packages as $package)
                                                                    @if($package->id == $reservation->package_id)
                                                                        <option value="{{$package->id}}" {{$package->id == $reservation->package_id ? 'selected' : ''}}>{{$package->title}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p class="mg-b-10">شماره موبایل درخواست کننده</p>
                                                            <input type="hidden" name="phone"  value="@foreach($users as $user) @if($user->id == $reservation->user_id){{$user->phone}}@endif @endforeach"  class="form-control" />
                                                            <input type="text" disabled value="@foreach($users as $user) @if($user->id == $reservation->user_id){{$user->phone}}@endif @endforeach"  class="form-control" />
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


@section('end')
    <script src="{{asset('admin/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/select2.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <script src="{{asset('admin/assets/js/form-elements.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')}}"></script>
@endsection
@endsection
