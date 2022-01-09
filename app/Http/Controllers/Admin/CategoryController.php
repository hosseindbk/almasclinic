<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\representativerequest;
use App\Menudashboard;
use App\Submenudashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories      = category::all();
        $menudashboards = Menudashboard::whereStatus(1)->get();
        $submenudashboards = Submenudashboard::whereStatus(1)->get();
        return view('Admin.categories.all')
            ->with(compact('categories'))
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menudashboards = Menudashboard::whereStatus(1)->get();
        $submenudashboards = Submenudashboard::whereStatus(1)->get();
        return  view('Admin.categories.create')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(representativerequest $request)
    {

        $categories = new category();

        $categories->title = $request->input('title');

        $categories->save();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('categories.index'));
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
        $categories      = category::whereId($id)->get();
        return view('Admin.categories.edit' , compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(representativerequest $request, Category $category)
    {
        $category->title = $request->input('title');

        if($request->input('status') == 'on'){
            $category->status = 1;
        }

        if($request->input('status') == null) {
            $category->status = 0;
        }

        $category->update();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت پاک شد');
        return redirect(route('categories.index'));
    }
}
