@extends('Admin.admin')
@section('title')
    <title> مدیریت پکیج ها </title>
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
                        <h2 class="main-content-title tx-24 mg-b-5">مدیریت پکیج ها</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item active" aria-current="page">مدیریت پکیج ها</li>
                        </ol>
                    </div>
                </div>

                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div>
                                    <h6 class="main-content-label mb-1">لیست پکیج ها </h6>
                                    <a href="{{url('admin/packages/create')}}" class="btn btn-primary btn-xs">افزودن پکیج ها جدید</a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" id="example1">
                                        <thead>
                                        <tr>
                                            <th class="wd-10p"> ردیف </th>
                                            <th class="wd-10p"> عنوان خدمات </th>
                                            <th class="wd-10p"> شاخه خدمات1 </th>
                                            <th class="wd-10p"> شاخه خدمات2 </th>
                                            <th class="wd-10p"> شاخه خدمات3 </th>
                                            <th class="wd-10p"> شاخه خدمات4 </th>
                                            <th class="wd-10p"> شاخه خدمات5 </th>
                                            <th class="wd-10p"> شاخه خدمات6 </th>
                                            <th class="wd-10p"> قیمت پکیچ </th>
                                            <th class="wd-10p"> قیمت با تخفیف </th>
                                            <th class="wd-10p"> وضعیت </th>
                                            <th class="wd-10p"> تغییر </th>
                                            <th class="wd-10p"> حذف </th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($packages as $package)
                                            <tr class="odd gradeX">

                                                <td>  {{$loop->iteration}}   </td>
                                                <td>  {{$package->title}}    </td>
                                                <td>  {{$package->dis1}}     </td>
                                                <td>  {{$package->dis2}}     </td>
                                                <td>  {{$package->dis3}}     </td>
                                                <td>  {{$package->dis4}}     </td>
                                                <td>  {{$package->dis5}}     </td>
                                                <td>  {{$package->dis6}}     </td>
                                                <td>  {{$package->price}}    </td>
                                                <td>  {{$package->offprice}} </td>

                                                <td>

                                                    @if($package->status == 0)
                                                        <button class="btn ripple btn-outline-danger">غیر فعال</button>
                                                    @elseif($package->status == 1)
                                                        <button class="btn ripple btn-outline-success">فعال</button>
                                                    @endif

                                                </td>
                                                <td>
                                                    <div class="btn-icon-list">
                                                        <a href="{{ route('packages.edit' , $package->id ) }}" class="btn ripple btn-outline-info btn-icon">
                                                            <i class="fe fe-edit-2"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="{{ route('packages.destroy' , $package->id) }}" method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="btn-icon-list">
                                                            <button type="submit" class="btn ripple btn-outline-danger btn-icon">
                                                                <i class="fe fe-trash-2 "></i>
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
