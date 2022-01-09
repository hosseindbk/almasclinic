@extends('Admin.admin')
@section('title')
    <title> مدیریت رزرو </title>
    <link href="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min-rtl.css')}} " rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('main')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <div class="page-header">
                    <div>
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت رزرو</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active" aria-current="page">مدیریت رزرو</li>
                        </ol>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-10p"> ردیف </th>
                                            <th class="wd-lg-20p">نام و نام خانوادگی</th>
                                            <th class="wd-lg-20p">شماره موبایل</th>
                                            <th class="wd-10p"> عنوان درخواست </th>
                                            <th class="wd-10p"> زیر مجموعه درخواست </th>
                                            <th class="wd-10p"> پکیج درخواست </th>
                                            <th class="wd-10p"> زمان مشخص شده </th>
                                            <th class="wd-10p"> وضعیت درخواست </th>
                                            <th class="wd-10p">زمان درخواست کاربر </th>
                                            <th class="wd-10p"> ویرایش درخواست </th>
                                            <th class="wd-10p"> حذف درخواست </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $x=1; ?>
                                        @foreach($reservations as $reservation)
                                                <tr>
                                                    <td>{{$x++}}</td>
                                                    <td class="text-primary">
                                                        @foreach($users as $user)
                                                            @if($reservation->user_id == $user->id)
                                                                {{$user->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-primary">
                                                        @foreach($users as $user)
                                                            @if($reservation->user_id == $user->id)
                                                                {{$user->phone}}
                                                            @endif
                                                        @endforeach
                                                    </td>
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
                                                            <button class="btn ripple btn-outline-success">انجام شده </button>
                                                        @elseif($reservation->status == 3)
                                                            <button class="btn ripple btn-outline-danger">زمان تایید شده گذشته </button>
                                                        @endif
                                                    </td>
                                                    <td>{{jdate($reservation->created_at)->ago()}}</td>
                                                    <td  class="text-nowrap">
                                                        <a href="{{ route('reservations.edit' , $reservation->id) }}"  class="btn btn-outline-primary btn-xs">
                                                            <i class="fe fe-edit-2"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('delete-reserve' , $reservation->id) }}" method="post">
                                                            {{ method_field('delete') }}
                                                            {{ csrf_field() }}
                                                            <div class="btn-icon-list">
                                                                <button type="submit" class="btn ripple btn-outline-danger btn-icon">
                                                                    <i class="fe fe-trash-2"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('end')
    <script src="{{asset('admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/table-data.js')}}"></script>
@endsection
@endsection
