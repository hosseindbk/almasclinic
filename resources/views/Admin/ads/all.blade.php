@extends('Admin.admin')
@section('title')
    <title> مدیریت تبلیغات </title>
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
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت تبلیغات</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active" aria-current="page">مدیریت تبلیغات</li>
                        </ol>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">لیست تبلیغات </h6>
                                    @if(Auth::user()->username == 'hosseindbk') <a href="{{url('admin/ads/create')}}" class="btn btn-primary btn-xs">افزودن تبلیغات جدید</a> @endif
                                </div>

                                <div class="table-responsive">
                                    <table class="table" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-10p"> ردیف </th>
                                            <th class="wd-10p"> تصویر </th>
                                            <th class="wd-10p"> موقعیت </th>
                                            <th class="wd-10p"> وضعیت </th>
                                            <th class="wd-10p"> تغییر </th>
                                            @if(Auth::user()->username == 'hosseindbk')    <th class="wd-10p"> حذف </th> @endif

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($ads as $ad)
                                            <tr class="odd gradeX">
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <img src="{{asset($ad->image)}}" class="img-responsive" style="display: block" width="30" alt="">
                                                </td>

                                                <td>

                                                    @if($ad->position == 1)
                                                        <button class="btn ripple btn-outline-success">پایین صفحه</button>
                                                    @elseif($ad->position == 2)
                                                        <button class="btn ripple btn-outline-success">سمت راست</button>
                                                    @elseif($ad->position == 3)
                                                        <button class="btn ripple btn-outline-success">سمت چپ</button>
                                                    @endif

                                                </td>

                                                <td>

                                                    @if($ad->status == 0)
                                                        <button class="btn ripple btn-outline-danger">غیر فعال</button>
                                                    @elseif($ad->status == 1)
                                                        <button class="btn ripple btn-outline-success">فعال</button>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="btn-icon-list">
                                                        <a href="{{ route('ads.edit' , $ad->id ) }}" class="btn ripple btn-outline-info btn-icon">
                                                            <i class="fe fe-edit-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                @if(Auth::user()->username == 'hosseindbk')
                                                    <td>
                                                        <form action="{{ route('ads.destroy' , $ad->id) }}" method="post">
                                                            {{ method_field('delete') }}
                                                            {{ csrf_field() }}
                                                            <div class="btn-icon-list">
                                                                <button type="submit" class="btn ripple btn-outline-danger btn-icon">
                                                                    <i class="fe fe-trash-2 "></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                @endif
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
