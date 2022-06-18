<?php

namespace App\Http\Controllers\Site;

use App\Ads;
use App\Blog;
use App\Counter;
use App\Http\Controllers\Controller;
use App\Http\Requests\counterrequest;
use App\Media;
use App\Menu;
use App\Package;
use App\Service;

class IndexController extends Controller
{
    public function index(){
        $menus          = Menu::whereStatus(1)->get();
        $packages       = Package::whereStatus(1)->get();
        $services       = Service::whereStatus(1)->whereHome(1)->limit(9)->get();
        $service_link   = Service::select('title' , 'slug')->get();
        $blogs          = Blog::all();
        $ads            = Ads::all();

        return view('Site.index')
            ->with(compact('service_link'))
            ->with(compact('packages'))
            ->with(compact('blogs'))
            ->with(compact('ads'))
            ->with(compact('services'))
            ->with(compact('menus'));
    }
    public function service(){
        $services       = Service::all();
        $service_link   = Service::select('title' , 'slug')->get();
        $menus          = Menu::whereStatus(1)->get();
        $ads            = Ads::all();


        return view('Site.service')
            ->with(compact('service_link'))
            ->with(compact('menus'))
            ->with(compact('ads'))
            ->with(compact('services'));
    }
    public function counter(counterrequest $request){

        $counters = new Counter();
        $counters->ip = $request->input('ip');
        $counters->save();
    }

    public function singleservice($slug){

        $services       = Service::whereSlug($slug)->get();
        $service_id     = Service::whereSlug($slug)->pluck('id');
        $service_link   = Service::select('title' , 'slug')->get();
        $medias         = Media::whereServiceId($service_id)->get();
        $menus          = Menu::whereStatus(1)->get();
        $ads            = Ads::all();


        return view('Site.singleservice')
            ->with(compact('service_link'))
            ->with(compact('medias'))
            ->with(compact('menus'))
            ->with(compact('ads'))
            ->with(compact('services'));
    }

    public function aboutus(){
        $menus          = Menu::whereStatus(1)->get();
        $service_link   = Service::select('title' , 'slug')->get();
        $ads            = Ads::all();


        return view('Site.aboutus')
            ->with(compact('service_link'))
            ->with(compact('ads'))
            ->with(compact('menus'));
    }

    public function customer(){
        $menus          = Menu::whereStatus(1)->get();
        $services       = Service::all();
        $service_link   = Service::select('title' , 'slug')->get();
        $ads            = Ads::all();
        $medias         = Media::latest()->paginate(12);
        return view('Site.customer')
            ->with(compact('service_link'))
            ->with(compact('services'))
            ->with(compact('medias'))
            ->with(compact('ads'))
            ->with(compact('menus'));
    }

    public function packageservice(){
        $menus          = Menu::whereStatus(1)->get();
        $packages       = Package::all();
        $service_link   = Service::select('title' , 'slug')->get();
        $ads            = Ads::all();
        $medias         = Media::latest()->paginate(12);
        return view('Site.packageservice')
            ->with(compact('packages'))
            ->with(compact('service_link'))
            ->with(compact('medias'))
            ->with(compact('ads'))
            ->with(compact('menus'));
    }
}
