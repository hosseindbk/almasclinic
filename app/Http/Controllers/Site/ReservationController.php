<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\reservationrequest;
use App\Menu;
use App\Notifications\Sendsms as SendSmsNotification;
use App\Package;
use App\Reseration;
use App\Service;
use App\Subservice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function index(){

        if(! Auth::check()){
            return view('Site.auth.login');
        }
        $menus          = Menu::whereStatus(1)->get();
        $services       = Service::whereStatus(1)->get();
        $service_link   = Service::select('title' , 'slug')->get();
        $subservices    = Subservice::whereStatus(1)->get();
        $packages       = Package::whereStatus(1)->get();
        $reservations   = Reseration::latest()->get();

        return view('Site.reservation')
            ->with(compact('service_link'))
            ->with(compact('packages'))
            ->with(compact('subservices'))
            ->with(compact('reservations'))
            ->with(compact('services'))
            ->with(compact('menus'));
    }
    public function packagereserve($id){
        if(! Auth::check()){
            return view('Site.auth.login');
        }
        $menus              = Menu::whereStatus(1)->get();
        $service_link       = Service::select('title' , 'slug')->get();
        $packages           = Package::whereId($id)->get();
        $reservations       = Reseration::latest()->get();

        return view('Site.packagereserve')
            ->with(compact('service_link'))
            ->with(compact('packages'))
            ->with(compact('reservations'))
            ->with(compact('menus'));
    }

    public function reservset(reservationrequest $request){
        $reserations = new Reseration();

        $reserations->user_id           = $request->input('user_id');
        $reserations->service_id        = $request->input('service_id');
        $reserations->subservice_id     = $request->input('subservice_id');

        $reserations->save();

        $user = User::whereId($request->input('user_id'))->first();
        $service = Service::whereId($request->input('service_id'))->first();

        $user->notify(new SendSmsNotification($service->title ,  $user->phone , $user->name));

        return back();
    }

    public function packageset(reservationrequest $request){
        $reserations = new Reseration();

        $reserations->user_id              = $request->input('user_id');
        $reserations->package_id           = $request->input('package_id');

        $reserations->save();

        $user = User::whereId($request->input('user_id'))->first();
        $packages = Package::whereId($request->input('package_id'))->first();

        $user->notify(new SendSmsNotification($packages->title ,  $user->phone , $user->name));

        return redirect('reservation');
    }

    public function serviceoption(Request $request){

        $subservices = Subservice::whereService_id($request->input('id'))->get();
        $output1 = [];


        foreach($subservices as $subservice )
        {
            $output1[$subservice->id] = $subservice->title;
        }


        return $output1;
    }
    public function deletreserve(Request $request , $id){
        $reserations = Reseration::findOrfail($id);
        $reserations->delete();

        return Redirect::back();

    }
}
