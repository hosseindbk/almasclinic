<?php

namespace App\Http\Controllers\Site;

use App\Ads;
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
            $menus          = Menu::whereStatus(1)->get();
            $services       = Service::whereStatus(1)->get();
            $service_link   = Service::select('title' , 'slug')->get();
            $subservices    = Subservice::whereStatus(1)->get();
            $packages       = Package::whereStatus(1)->get();
            $ads            = Ads::all();

            return view('Site.reservation')
                ->with(compact('service_link'))
                ->with(compact('packages'))
                ->with(compact('subservices'))
                ->with(compact('services'))
                ->with(compact('ads'))
                ->with(compact('menus'));
        }else {
            $menus = Menu::whereStatus(1)->get();
            $services = Service::whereStatus(1)->get();
            $service_link = Service::select('title', 'slug')->get();
            $subservices = Subservice::whereStatus(1)->get();
            $packages = Package::whereStatus(1)->get();
            $reservations = Reseration::latest()->get();
            $ads = Ads::all();

            return view('Site.reservation')
                ->with(compact('service_link'))
                ->with(compact('packages'))
                ->with(compact('subservices'))
                ->with(compact('reservations'))
                ->with(compact('services'))
                ->with(compact('ads'))
                ->with(compact('menus'));
        }
    }
    public function packagereserve($id){
        if(! Auth::check()){
            $menus              = Menu::whereStatus(1)->get();
            $service_link       = Service::select('title' , 'slug')->get();
            $packages           = Package::whereId($id)->get();
            $ads                = Ads::all();

            return view('Site.packagereserve')
                ->with(compact('service_link'))
                ->with(compact('packages'))
                ->with(compact('ads'))
                ->with(compact('menus'));
        }
        $menus              = Menu::whereStatus(1)->get();
        $service_link       = Service::select('title' , 'slug')->get();
        $packages           = Package::whereId($id)->get();
        $reservations       = Reseration::latest()->get();
        $ads                = Ads::all();

        return view('Site.packagereserve')
            ->with(compact('service_link'))
            ->with(compact('packages'))
            ->with(compact('reservations'))
            ->with(compact('ads'))
            ->with(compact('menus'));
    }

    public function reservset(Request $request){

        if(!auth::check()){
            return redirect('register');
        }else {
            $reserations = new Reseration();

            $reserations->user_id       = auth::user()->id ;
            $reserations->service_id    = $request->input('service_id');
            $reserations->subservice_id = $request->input('subservice_id');
            $reserations->dateset       = $request->input('dateset');

            $reserations->save();

            $user = User::whereId( Auth::user()->id)->first();
            $dateset = $request->input('dateset');
            $user->notify(new SendSmsNotification($dateset, $user->phone, $user->name));

            return back();
        }
    }

    public function packageset(Request $request){

        if(!auth::check()){
            return redirect('register');
        }else {
            $reserations = new Reseration();

            $reserations->user_id = Auth::user()->id;
            $reserations->package_id = $request->input('package_id');

            $reserations->save();

            $user = User::whereId(Auth::user()->id)->first();
            $packages = Package::whereId($request->input('package_id'))->first();

            $user->notify(new SendSmsNotification($packages->title, $user->phone, $user->name));

            return redirect('reservation');
        }
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
