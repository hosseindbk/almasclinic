@extends('Admin.admin')
@section('title')
    <title> ویرایش خدمات </title>
    <link href="{{asset('admin/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/sumoselect/sumoselect-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
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
                        <h2 class="main-content-title tx-24 mg-b-5">ویرایش خدمات</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/panel')}}">صفحه اصلی</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/services')}}">مدیریت  خدمات</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ویرایش خدمات</li>
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
                                    <h3 class="text-center mb-5"><span class="badge badge-light">   @foreach($subservices as $subservice)  {{$subservice->title}} @endforeach</span></h3>
                                </div>
                                <div class="row row-sm">
                                    @foreach($subservices as $subservice)
                                    <div class="col-md-6">
                                        <p> عنوان خدمات : {{$subservice->title}}</p>
                                        <p> توضیحات : {!! $subservice->description !!}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{asset($subservice->images)}}" class="img-responsive" alt="">
                                    </div>
                                    @if($subservice->images != null)
                                        <div style="position: absolute;bottom: 0px;margin: 0 40%;">
                                            <form action="{{ route('updateproimg', $subservice->id)}}" method="post">
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
                                    <a aria-controls="collapseExample" aria-expanded="false" class="btn ripple btn-primary" data-toggle="collapse" href="#collapseExample" role="button">@foreach($subservices as $subservice) ویرایش اطلاعات {{$subservice->title}} @endforeach</a>
                                    <div class="collapse mg-t-5" id="collapseExample">
                                        <div>
                                            <h3 class="text-center mb-5"><span class="badge badge-light">   @foreach($subservices as $subservice) ویرایش اطلاعات {{$subservice->title}} @endforeach</span></h3>
                                        </div>
                                            @foreach($subservices as $subservice)
                                            <form action="{{route('subservices.update', $subservice->id)}}" method="POST" enctype="multipart/form-data">
                                                <div class="row row-sm">
                                                    {{csrf_field()}}
                                                    {{ method_field('PATCH') }}
                                                    <div class="col-md-12">
                                                        @include('error')
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">نام خدمات</p>
                                                            <input type="text" name="title" data-required="1" value="{{$subservice->title}}"  class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">انتخاب خدمات اصلی</p>
                                                            <select name="service_id" class="form-control select-lg select2">

                                                                @foreach($services as $service)
                                                                    @if($service->id == $subservice->service_id)
                                                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                                                    @endif
                                                                @endforeach
                                                                    @foreach($services as $service)
                                                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p class="mb-2">نمایش/عدم نمایش</p>
                                                            <label class="custom-switch">
                                                                @if($subservice->status == '0')
                                                                    <input type="checkbox" name="status" class="custom-switch-input">
                                                                @elseif($subservice->status == '1')
                                                                    <input type="checkbox" name="status" class="custom-switch-input" checked="">
                                                                @endif
                                                                <span class="custom-switch-indicator"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">تصویر اصلی خدمات</p>
                                                            <input type="file" name="images" class="dropify" data-height="200">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p class="mg-b-10">توضیحات</p>
                                                            <textarea name="description" id="editor" cols="30" data-required="1" rows="5" class="form-control" >{{$subservice->description}}</textarea>
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
                <div class="row row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div>
                                    <h3 class="text-center mb-5"><span class="badge badge-light"> @foreach($subservices as $subservice) بارگذاری تصاویر {{$subservice->title}} @endforeach</span></h3>
                                </div>
                                <div class="mg-t-10">
                                    <input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png," multiple="">
                                </div>
                                <div class="mg-t-10">
                                <ul id="lightgallery" class="list-unstyled row mb-0">
                                    @foreach($medias as $media)
                                        <li class="col-xs-4 col-sm-3 col-md-3 col-xl-3 mb-3" data-responsive="{{asset($media->image)}}" data-src="{{asset($media->image)}}" >
                                            <div style="position: relative;">
                                                <img class="img-responsive" height="150" src="{{asset($media->image)}}">
                                            </div>
                                            <div style="position: absolute;bottom: 0px;margin: 0 40%;">
                                                <form action="{{ route('medias.destroy', $media->id)}}" method="post">
                                                    {{ method_field('delete') }}
                                                    {{csrf_field()}}
                                                    <div class="btn-group btn-group-xs">
                                                        <button type="submit" class="btn btn-danger btn-xs">
                                                            <i class="fe fe-trash-2 "></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
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
    <script src="{{asset('admin/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
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
                    id:"{{$subservice->id}}",
                    table:"subservice_id",
                },
                maxfilesize : 1000000
            });
        })(jQuery);

    </script>
@endsection
@endsection
