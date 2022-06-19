<?php

namespace App\Http\Controllers\Admin;

use App\Ads;
use App\Http\Controllers\Controller;
use App\Menudashboard;
use App\Submenudashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads                = Ads::all();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.ads.all')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.ads.create')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ads = new Ads();

        $ads->title             = $request->input('title');
        $ads->status            = '1';
        $ads->url               = $request->input('url');
        $ads->position          = $request->input('position');

        if ($request->file('image') != null) {
            $file = $request->file('image');
            $img = Image::make($file);
            $imagePath ="image/ads/";
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $ads->image = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode('jpg');
        }
        $ads->save();

        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('ads.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads                = Ads::whereId($id)->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.ads.edit')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = Ads::findOrfail($id);

        $ad->url               = $request->input('url');

        if ($request->input('status') == 'on') {
            $ad->status = 1;
        }
        if ($request->input('status') == null) {
            $ad->status = 0;
        }

        if ($request->file('image') != null) {

            $file = $request->file('image');
            $img = Image::make($file);
            $imagePath ="image/ad/";
            $extension = $file->getClientOriginalExtension();
            $imageName = md5(uniqid(rand(), true)) . $file->getClientOriginalName();
            $ad->image = $file->move($imagePath, $imageName);
            $img->save($imagePath.$imageName);
            $img->encode($extension);
        }
        $ad->update();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('ads.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ad)
    {
        $ad->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return Redirect::back();
    }
}
