<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\BannerAndTitle;


class FServiceController extends Controller
{
    public function tech_web_all_services(){
        $banner = BannerAndTitle::where('status',1)->where('page','service')->first();
        $services = Service::all();
        return view('frontend.services.all_services',compact('services','banner'));
    }//
}
