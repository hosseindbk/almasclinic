<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\reservationrequest;
use App\Menudashboard;
use App\Notifications\SendTimeset as SendTimesetNotification;
use App\Package;
use App\Reseration;
use App\Service;
use App\Submenudashboard;
use App\Subservice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{

    public function index()
    {
        $users              = User::all();
        $services           = Service::all();
        $packages           = Package::all();
        $subservices        = Subservice::all();
        $reservations       = Reseration::latest()->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.reservations.all')
            ->with(compact('packages'))
            ->with(compact('users'))
            ->with(compact('subservices'))
            ->with(compact('services'))
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('reservations'));
    }

    public function edit($id)
    {
        $users              = User::all();
        $packages           = Package::all();
        $services           = Service::all();
        $subservices        = Subservice::all();
        $reservations       = Reseration::whereId($id)->get();
        $menudashboards     = Menudashboard::whereStatus(1)->get();
        $submenudashboards  = Submenudashboard::whereStatus(1)->get();

        return view('Admin.reservations.edit')
            ->with(compact('users'))
            ->with(compact('packages'))
            ->with(compact('subservices'))
            ->with(compact('services'))
            ->with(compact('menudashboards'))
            ->with(compact('submenudashboards'))
            ->with(compact('reservations'));
    }

    public function update(reservationrequest $request , Reseration $reservation)
    {
        $reservation->dateset    = $request->input('dateset');
        $reservation->timeset    = $request->input('timeset');
        $reservation->matn       = $request->input('matn');
        $reservation->status     = $request->input('status');

        $reservation->update();

        $user       = User::whereId($request->input('user_id'))->first();
        if($request->input('service_id') != null) {
            $service = Service::whereId($request->input('service_id'))->first();
            $dateset = $request->input('dateset');
            $timeset = $request->input('timeset');
            if ($request->input('status') == 1) {
                $user->notify(new SendTimesetNotification($service->title, $user->phone, $user->name, $dateset, $timeset));
            }
        }
        if($request->input('package_id') != null) {
            $package = Package::whereId($request->input('package_id'))->first();
            $dateset = $request->input('dateset');
            $timeset = $request->input('timeset');
            if ($request->input('status') == 1) {
                $user->notify(new SendTimesetNotification($package->title, $user->phone, $user->name, $dateset, $timeset));
            }
        }

        return redirect(route('reservations.index'));

    }

    public function destroy(Reseration $reservation)
    {
        $reservation->delete();
        return Redirect::back();
    }
    public function deletreserve($id){

        $reserve = Reseration::findOrfail($id);
        $reserve->delete();
        return Redirect::back();
    }
}
