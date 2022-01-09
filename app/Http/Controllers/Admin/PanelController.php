<?php

namespace App\Http\Controllers\Admin;

use App\Menudashboard;
use App\Package;
use App\Reseration;
use App\Service;
use App\Tblproduct;
use App\Category;
use App\Matn;
use App\Submenudashboard;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{

    public function index()
    {
        $countusers         = User::count();
        $users              = User::all();
        $categories         = category::whereStatus(1)->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();
        $reservations       = Reseration::whereStatus(0)->latest()->get();
        $packages       = Package::all();
        $services           = Service::all();

        $day = jdate()->getDay();
        $month = jdate()->getMonth();

        $dayvisitos  = Visitor::selectRaw('substring(datetime , 6,2 ) month , substring(datetime , 9,2 ) day, count(ip) publish')
            ->groupBy('day' , 'month')
            ->having('day' , '=', $day)
            ->having('month' , '=', $month)
            ->pluck('publish')->first();

        $monthvisits = Visitor::selectRaw('substring(datetime , 6,2 ) month , count(*) publish')
            ->groupBy('month')
            ->having('month' , '=', $month)
            ->pluck('publish')->first();

        $month = 12;

        $visitos = Visitor::selectRaw('substring(datetime , 6,2 ) month , count(*) publish')
            ->groupBy('month')
            ->pluck('publish');
        $visitors = $this->CheckCount($visitos , $month);

        $pievisitors = Visitor::selectRaw('page_id , count(*) publish')
            ->groupBy('page_id')
            ->pluck('publish');


        $lables = $this->getLastMonths($month);

        return view('Admin.panel.index')

            ->with(compact('packages'))
            ->with(compact('users'))
            ->with(compact('reservations'))
            ->with(compact('services'))
            ->with(compact('categories'))
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('dayvisitos'))
            ->with(compact('pievisitors'))
            ->with(compact('visitors'))
            ->with(compact('countusers'))
            ->with(compact('monthvisits'))
            ->with(compact('lables'));
    }

    private function getLastMonths($month)
    {
        for ($i = 0 ; $i < $month ; $i++) {
            $labels[] = jdate(Carbon::now()->subMonths($i-1))->format('%B');
        }

        return array_reverse($labels);
    }

    private function CheckCount($count, $month)
    {
        for ($i = 0 ; $i < $month ; $i++) {
            $new[$i] = empty($count[$i]) ? 0 : $count[$i];
        }

        return ($new);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creatmenu()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function editmenu($id)
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
