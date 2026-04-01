<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Event;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    public function tech_web_all_events()
    {
        $events = Event::latest('id', 'DESC')->get();
        return view('backend.event.all_event', compact('events'));
    } //end method-------------------------------------

    public function tech_web_add_events()
    {
        return view('backend.event.add_event');
    } //end method-------------------------------------

    public function tech_web_event_store(Request $request)
    {

        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(700, 500)->save('backend/event/main_image/' . $main_image_name);
            $main_image_url = 'backend/event/main_image/' . $main_image_name;
        }
        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 920)->save('backend/event/banner_image/' . $banner_image_name);
            $banner_image_url = 'backend/event/banner_image/' . $banner_image_name;
        }
        if ($request->hasFile('event_image1')) {
            $event_image1 = $request->file('event_image1');
            $event_image1_name = hexdec(uniqid()) . '.' . $event_image1->getClientOriginalExtension();
            Image::make($event_image1)->resize(1200, 900)->save('backend/event/details_images/' . $event_image1_name);
            $event_image1_url = 'backend/event/details_images/' . $event_image1_name;
        }
        if ($request->hasFile('event_image2')) {
            $event_image2 = $request->file('event_image2');
            $event_image2_name = hexdec(uniqid()) . '.' . $event_image2->getClientOriginalExtension();
            Image::make($event_image2)->resize(1200, 900)->save('backend/event/details_images/' . $event_image2_name);
            $event_image2_url = 'backend/event/details_images/' . $event_image2_name;
        }
        if ($request->hasFile('event_image3')) {
            $event_image3 = $request->file('event_image3');
            $event_image3_name = hexdec(uniqid()) . '.' . $event_image3->getClientOriginalExtension();
            Image::make($event_image3)->resize(1200, 900)->save('backend/event/details_images/' . $event_image3_name);
            $event_image3_url = 'backend/event/details_images/' . $event_image3_name;
        }

        Event::insert([
            'title_english' => $request->title_english,
            'title_bangla' => $request->title_bangla,
            
            'des_sm_eng' => $request->des_sm_eng,
            'des_sm_bng' => $request->des_sm_bng,
            'long_des1_eng' => $request->long_des1_eng,
            'long_des1_bng' => $request->long_des1_bng,
            'long_des2_eng' => $request->long_des2_eng,
            'long_des2_bng' => $request->long_des2_bng,
            'long_des3_eng' => $request->long_des3_eng,
            'long_des3_bng' => $request->long_des3_bng,

            'main_image' => $main_image_url ?? null,
            'banner_image' => $banner_image_url ?? null,
            'event_image1' => $event_image1_url ?? null,
            'event_image2' => $event_image2_url ?? null,
            'event_image3' => $event_image3_url ?? null,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Event inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.event')->with($notification);
    } //end method---------------------------------------------------

    public function tech_web_edit_event($id)
    {
        $edit_event = Event::findOrFail($id);
        return view('backend.event.edit_event', compact('edit_event'));
    } //end method------------------------------------------

    public function tech_web_event_update(Request $request)
    {

        $id = $request->id;
        $old_image = Event::find($id);
        $del_main_image = $old_image->main_image;
        $del_banner_image = $old_image->banner_image;
        $del_details_image1 = $old_image->event_image1;
        $del_details_image2 = $old_image->event_image2;
        $del_details_image3 = $old_image->event_image3;

        $data = array();
        $data['title_english'] = $request->title_english;
        $data['title_bangla'] = $request->title_bangla;
        
        $data['des_sm_eng'] = $request->des_sm_eng;
        $data['des_sm_bng'] = $request->des_sm_bng;
        $data['long_des1_eng'] = $request->long_des1_eng;
        $data['long_des1_bng'] = $request->long_des1_bng;
        $data['long_des2_eng'] = $request->long_des2_eng;
        $data['long_des2_bng'] = $request->long_des2_bng;
        $data['long_des3_eng'] = $request->long_des3_eng;
        $data['long_des3_bng'] = $request->long_des3_bng;

        if ($request->hasFile('main_image')) {
            @unlink($del_main_image);
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(700, 500)->save('backend/event/main_image/' . $main_image_name);
            $main_image_url = 'backend/event/main_image/' . $main_image_name;
            $data['main_image'] = $main_image_url;

           
        }

        if ($request->hasFile('banner_image')) {
            @unlink($del_banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 920)->save('backend/event/banner_image/' . $banner_image_name);
            $banner_image_url = 'backend/event/banner_image/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;

           
        }

        if ($request->hasFile('event_image1')) {
            @unlink($del_details_image1);
            $event_image1 = $request->file('event_image1');
            $event_image1_name = hexdec(uniqid()) . '.' . $event_image1->getClientOriginalExtension();
            Image::make($event_image1)->resize(1200, 900)->save('backend/event/details_images/' . $event_image1_name);
            $event_image1_url = 'backend/event/details_images/' . $event_image1_name;
            $data['event_image1'] = $event_image1_url;

            
        }
        if ($request->hasFile('event_image2')) {
            @unlink($del_details_image2);
            $event_image2 = $request->file('event_image2');
            $event_image2_name = hexdec(uniqid()) . '.' . $event_image2->getClientOriginalExtension();
            Image::make($event_image2)->resize(1200, 900)->save('backend/event/details_images/' . $event_image2_name);
            $event_image2_url = 'backend/event/details_images/' . $event_image2_name;
            $data['event_image2'] = $event_image2_url;

           
        }
        if ($request->hasFile('event_image3')) {
            @unlink($del_details_image3);
            $event_image3 = $request->file('event_image3');
            $event_image3_name = hexdec(uniqid()) . '.' . $event_image3->getClientOriginalExtension();
            Image::make($event_image3)->resize(1200, 900)->save('backend/event/details_images/' . $event_image3_name);
            $event_image3_url = 'backend/event/details_images/' . $detais_image_3_name;
            $data['event_image3'] = $event_image3_url;

            
        }

        Event::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Event Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.event')->with($notification);
    } //end method-----------------------------------------------

    public function tech_web_event_delete($id)
    {
        $event_image = Event::findOrFail($id);
        
        @unlink($event_image->main_image);
        @unlink($event_image->banner_image);
        @unlink($event_image->event_image1);
        @unlink($event_image->event_image2);
        @unlink($event_image->event_image3); //delete banner_image from local path_folder

        Event::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Event Data Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // service status active inactive method start ------------
    public function tec_web_event_inactive($id)
    {
        Event::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
    }
    public function tec_web_event_active($id)
    {
        Event::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
    // service status active inactive method end ------------

    
}
