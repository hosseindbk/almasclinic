<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menudashboard;
use App\Package;
use App\Submenudashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages           = Package::all();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.packages.all')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('packages'));

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
        return view('Admin.packages.create')
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
        $packages = new Package();

        $packages->title            = $request->input('title');
        $packages->dis1             = $request->input('dis1');
        $packages->dis2             = $request->input('dis2');
        $packages->dis3             = $request->input('dis3');
        $packages->dis4             = $request->input('dis4');
        $packages->dis5             = $request->input('dis5');
        $packages->dis6             = $request->input('dis6');
        $packages->price            = $request->input('price');
        $packages->offprice         = $request->input('offprice');
        $packages->status           = '4';

        $packages->save();

        alert()->success('???????????? ????????', '?????????????? ???? ???????????? ?????? ????');
        return redirect(route('packages.index'));

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
        $packages           = Package::whereId($id)->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.packages.edit')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $package->title            = $request->input('title');
        $package->dis1             = $request->input('dis1');
        $package->dis2             = $request->input('dis2');
        $package->dis3             = $request->input('dis3');
        $package->dis4             = $request->input('dis4');
        $package->dis5             = $request->input('dis5');
        $package->dis6             = $request->input('dis6');
        $package->price            = $request->input('price');
        $package->offprice         = $request->input('offprice');
        $package->update();
        alert()->success('???????????? ????????', '?????????????? ???? ???????????? ?????? ????');
        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
        alert()->success('???????????? ????????', '?????????????? ???? ???????????? ?????? ????');
        return Redirect::back();
    }
}
