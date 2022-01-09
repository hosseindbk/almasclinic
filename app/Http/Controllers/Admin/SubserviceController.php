<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\subservicerequest;
use App\Media;
use App\Menudashboard;
use App\Service;
use App\Submenudashboard;
use App\Subservice;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class SubserviceController extends Controller
{
    public function index()
    {
        $subservices           = Subservice::all();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.subservices.all')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('subservices'));

    }

    public function create()
    {
        $services           = Service::whereStatus(1)->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();
        return view('Admin.subservices.create')
            ->with(compact('services'))
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'));
    }


    public function store(subservicerequest $request)
    {
        $subservices = new Subservice();

        $subservices->title                = $request->input('title');
        $subservices->service_id           = $request->input('service_id');
        $subservices->status               = '1';
        $subservices->description          = $request->input('description');
        $subservices->date                 = jdate()->format('Ymd ');
        $subservices->user_id              = Auth::user()->id;

        if ($request->file('images') != null) {
            $file = $request->file('images');
            $img = Image::make($file);
            $imagePath ="image/subservice/";
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $subservices->images = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $subservices->save();

        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('subservices.index'));

    }


    public function edit($id)
    {

        $medias             = Media::select('id','subservice_id' , 'image')->whereSubservice_id($id)->get();
        $subservices        = Subservice::whereId($id)->get();
        $services           = Service::whereStatus(1)->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.subservices.edit')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('medias'))
            ->with(compact('services'))
            ->with(compact('subservices'));
    }

    public function update(subservicerequest $request , Subservice $subservice )
    {
        $subservice->title             = $request->input('title');
        $subservice->description       = $request->input('description');
        $subservice->service_id        = $request->input('service_id');
        $subservice->date              = jdate()->format('Ymd ');
        $subservice->user_id           = Auth::user()->id;

        if ($request->input('status') == 'on') {
            $subservice->status = 1;
        }
        if ($request->input('status') == null) {
            $subservice->status = 0;
        }

        if ($request->file('images') != null) {
            $file = $request->file('images');
            $img = Image::make($file);
            $imagePath ="image/subservice/";
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $subservice->images = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $subservice->update();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return Redirect::back();
    }

    public function destroy(Subservice $subservice)
    {
        $subservice->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return Redirect::back();
    }
}
