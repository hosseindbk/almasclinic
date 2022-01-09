<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\mediarequest;
use App\Http\Requests\productrequest;
use App\Http\Requests\servicerequest;
use App\Media;
use App\Menudashboard;
use App\Service;
use App\Submenudashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $services           = Service::all();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.services.all')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('services'));

    }

    public function create()
    {
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();
        return view('Admin.services.create')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'));
    }


    public function store(servicerequest $request)
    {
        $services = new Service();

        $services->title             = $request->input('title');
        $services->status               = '1';
        $services->description          = $request->input('description');
        $services->date                 = jdate()->format('Ymd ');
        $services->user_id              = Auth::user()->id;

        if ($request->file('images') != null) {
            $file = $request->file('images');
            $img = Image::make($file);
            $imagePath ="image/service/";
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $services->images = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $services->save();

        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('services.index'));

    }


    public function edit($id)
    {

        $medias             = Media::select('id','service_id' , 'image')->whereService_id($id)->get();
        $services           = Service::whereId($id)->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.services.edit')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('medias'))
            ->with(compact('services'));
    }

    public function update(servicerequest $request , Service $service )
    {
       $service->title             = $request->input('title');
       $service->description       = $request->input('description');
       $service->date              = jdate()->format('Ymd ');
       $service->user_id           = Auth::user()->id;

        if ($request->input('status') == 'on') {
            $service->status = 1;
        }
        if ($request->input('status') == null) {
            $service->status = 0;
        }

        if ($request->file('images') != null) {
            $file = $request->file('images');
            $img = Image::make($file);
            $imagePath ="image/service/";
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $service->images = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $service->update();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return Redirect::back();
    }

    public function destroy(Service $service)
    {
        $service->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return Redirect::back();
    }
   }
