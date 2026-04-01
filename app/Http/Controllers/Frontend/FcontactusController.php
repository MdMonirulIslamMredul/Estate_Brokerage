<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactU;
use App\Models\BannerAndTitle;
use Mail;
use App\Mail\Contactus;
use Illuminate\Support\Facades\Auth;

class FcontactusController extends Controller
{
    public function tech_web_contact_us(){
        $banner = BannerAndTitle::where('status',1)->where('page','contacts')->first();
        return view('frontend.contact.contact_us',compact('banner'));
    }//end method------------------------------------

    public function tech_web_contactdata_store(Request $request){
        // $request->validate([
        //     'name_english' => 'required|max:200',
        //     'email' => 'required|unique:users|max:200',
        //     'phone' => 'required|unique:users|max:200',
        //     'message_english' => 'required',
        // ]);
    
           $item=$request;
        $adminEmail = "mesbaalam90@gmail.com";
            Mail::to($adminEmail)->send(new Contactus($item));
            return back()->with('status','Thank you for your message. It has been sent');
           $notification = array(
            'message' => 'Your Message Sent Successfully!',
            'alert-type' => 'info'
           );
        return redirect()->back()->with($notification);

    }
}
