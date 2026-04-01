<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OngoingEvent;
use App\Models\UpcommingEvent;
use App\Models\CompletedEvent;
use App\Models\BannerAndTitle;
use App\Models\Event;

class F_EventController extends Controller
{
    public function tech_web_events(){
        $banner = BannerAndTitle::where('page','event')->where('status',1)->first();
        $events = Event::where('status',1)->orderBy('id',"ASC")->get();
        return view('frontend.event.all_event',compact('events','banner'));
    }

    public function tech_web_events_detials($id){
        $banner = BannerAndTitle::where('page','event')->where('status',1)->first();
        $event_details = Event::find($id);
        return view('frontend.event.event_details',compact('event_details','banner'));
    }


}
