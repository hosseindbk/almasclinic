<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\menurequest;
use App\Menu;
use App\Menudashboard;
use App\Submenudashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public  function index(){
        $menus = Menu::all();
        $menudashboards = Menudashboard::all();
        $submenudashboards = Submenudashboard::all();


        return view('Admin.menus.all')
            ->with(compact('menus'))
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'));
    }

    public function create()
    {
        $menudashs = Menudashboard::all();
        $menudashboards = Menudashboard::whereStatus(1)->get();
        $submenudashboards = Submenudashboard::whereStatus(1)->get();

        return view('Admin.menus.create')
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('menudashs'));
    }

    public function store(menurequest $request )
    {
        $menudashboards = new Menudashboard();

        $menudashboards->title = $request->input('title');

        $menudashboards->save();
        alert()->success('عملیات موفق', 'اطلاعات با موفقیت ثبت شد');
        return redirect(route('menus.index'));
    }

    public function destroy($id)
    {
        $menu = Menu::findOrfail($id);
        $menu->delete();
        return Redirect::back();
    }
}
