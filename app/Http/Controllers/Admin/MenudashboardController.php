<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\menudashboardrequest;
use App\Menudashboard;
use App\Submenudashboard;
use Illuminate\Http\Request;

class MenudashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menudashs = Menudashboard::all();
        $menudashboards = Menudashboard::whereStatus(1)->get();
        $submenudashboards = Submenudashboard::whereStatus(1)->get();

        return view('Admin.menudashboards.all')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('menudashs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menudashs = Menudashboard::all();
        $menudashboards = Menudashboard::whereStatus(1)->get();
        $submenudashboards = Submenudashboard::whereStatus(1)->get();

        return view('Admin.menudashboards.create')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('menudashs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(menudashboardrequest $request )
    {
        $menudashboards = new Menudashboard();

       $menudashboards->title = $request->input('title');

        $menudashboards->save();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('submenudashboards.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
