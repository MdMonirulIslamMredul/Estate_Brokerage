<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Membership;
use App\Models\BannerAndTitle;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class MembershipController extends Controller
{
    public function tech_web_game_membership(){
        $banner = BannerAndTitle::where('status',1)->where('page','membership')->first();
        return view('frontend.membership.membership_page',compact('banner'));
    }//end mehtod------------------------------

    public function tech_web_game_membership_list(){
        $banner = BannerAndTitle::where('status',1)->where('page','membership')->first();
        $members = Membership::where('status',1)->orderBy('id','DESC')->paginate(10);        
        return view('frontend.membership.membership_list',compact('members','banner'));
    }

    public function tech_web_membership_store(Request $request){ 
        $data = array();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 400)->save('backend/membership/' . $image_name);
            $image_url = 'backend/membership/' . $image_name;
            $data['image'] = $image_url;
        }
        $data['name_english'] = $request->name_english;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['fat_name_eng'] = $request->fat_name_eng;
        $data['occupation'] = $request->occupation;
        $data['reference'] = $request->reference;
        $data['address_eng'] = $request->address_eng;
        $data['message_english'] = $request->message_english;
        $data['status'] = '0';
        $data['created_at'] = Carbon::now();
        Membership::insert($data);

        $notification = array(
            'message' => 'Membership Data Sent Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method---------------------------------------

    public function tech_web_all_pending_member(){
        $all_members = Membership::where('status',0)->get();
        return view('backend.membership.all_pending_membership',compact('all_members'));
    }//end method ----------------------------
    
    public function tech_web_all_activ_emember(){
        $all_active_members = Membership::where('status',1)->get();
        return view('backend.membership.all_active_membership',compact('all_active_members'));
    }//end method ----------------------------

    public function tec_web_membership_active($id)
    {
        Membership::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
}
