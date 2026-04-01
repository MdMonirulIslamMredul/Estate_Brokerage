<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OngoingEvent;
use App\Models\UpcommingEvent;
use App\Models\CompletedEvent;
use App\Models\Project;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{

    public function tech_web_all_project()
    {
        $project = Project::orderBy('id', 'DESC')->get();
        return view('backend.project.all_project', compact('project'));
    }
    public function tech_web_add_project()
    {
        $categories = \App\Models\ProjectCategory::where('status', 1)->get();
        return view('backend.project.add_project', compact('categories'));
    } //end method------------------------

    public function tech_web_project_store(Request $request)
    {

        //video format--------
        $url = $request->property_video;
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);
        $videoId = isset($matches[1]) ? $matches[1] : null;
        //end video format-------

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            $banner_image->move(public_path('backend/project/banner/'), $banner_image_name);
            // Image::make($banner_image)->resize(1920, 600)->save('backend/project/banner/' . $banner_image_name);
            $banner_image_url = 'public/backend/project/banner/' . $banner_image_name;
        }
        if ($request->hasFile('property_thumbnail')) {
            $property_thumbnail = $request->file('property_thumbnail');
            $property_thumbnail_name = hexdec(uniqid()) . '.' . $property_thumbnail->getClientOriginalExtension();
            $property_thumbnail->move(public_path('backend/project/property_thumbnail/'), $property_thumbnail_name);
            // Image::make($main_image)->resize(460, 440)->save('backend/ongoing/main_img/' . $main_image_name);
            $property_thumbnail_url = 'public/backend/project/property_thumbnail/' . $property_thumbnail_name;
        }
        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1_name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('backend/project/details_img/'), $image1_name);
            // Image::make($details_image1)->resize(460, 440)->save('backend/ongoing/details_img/' . $details_image1_name);
            $image1_url = 'public/backend/project/details_img/' . $image1_name;
        }
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2_name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('backend/project/details_img/'), $image2_name);
            // Image::make($details_image2)->resize(460, 440)->save('backend/ongoing/details_img/' . $details_image2_name);
            $image2_url = 'public/backend/project/details_img/' . $image2_name;
        }
        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3_name = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('backend/project/details_img/'), $image3_name);
            // Image::make($details_image2)->resize(460, 440)->save('backend/ongoing/details_img/' . $details_image2_name);
            $image3_url = 'public/backend/project/details_img/' . $image3_name;
        }

        $data = new Project();
        $data->property_name = $request->property_name;
        // $data->property_status = $request->property_status;
        $data->status = 1;
        $data->project_category_id = $request->project_category_id;
        $data->project_subcategory_id = $request->project_subcategory_id;
        $data->price = $request->price;
        $data->discount = $request->discount;
        $data->commission = $request->commission;

        $data->short_des = $request->short_des;
        $data->long_des = $request->long_des;
        $data->bedrooms = $request->bedrooms;
        $data->bathrooms = $request->bathrooms;
        $data->rooms = $request->rooms;
        $data->units = $request->units;
        $data->floors = $request->floors;
        $data->kitchens = $request->kitchens;
        $data->garages = $request->garages;

        $data->title = $request->title;
        $data->main_road_size = $request->main_road_size;
        $data->approved_by = $request->approved_by;
        $data->ploot_status = $request->ploot_status;
        $data->face_type = $request->face_type;
        $data->lift = $request->lift;
        $data->store_room = $request->store_room;
        $data->belkuni = $request->belkuni;
        $data->daining = $request->daining;
        $data->drawing = $request->drawing;

        $data->property_mood = $request->property_mood;
        $data->property_size = $request->property_size;
        $data->property_type = $request->property_type;
        $data->property_video = $videoId;
        $data->map_link = $request->map_link;
        $data->location_eng = $request->location_eng;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;

        $data->property_thumbnail = $property_thumbnail_url;
        $data->banner_image = $banner_image_url ?? null;
        $data->image1 = $image1_url ?? null;
        $data->image2 = $image2_url ?? null;
        $data->image3 = $image3_url ?? null;

        // $data->start_date = date('Y-m-d',strtotime($request->start_date));
        // $data->end_date = date('Y-m-d',strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Project Data Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect('/all/project')->with($notification);
    } //end method------------------------------------

    public function tech_web_edit_project($id)
    {
        $edit_project = Project::findOrFail($id);
        $categories = \App\Models\ProjectCategory::where('status', 1)->get();
        return view('backend.project.edit_project', compact('edit_project', 'categories'));
    } //end method------------------------------------------

    public function tech_web_project_update(Request $request)
    {
        $id = $request->id;
        $image = Project::findOrFail($id);
        // dd($image);
        $data = array();
        //video format--------
        $url = $request->property_video;
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);
        $videoId = isset($matches[1]) ? $matches[1] : null;
        //end video format-------


        if ($request->hasFile('banner_image')) {
            @unlink($image->banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            $banner_image->move(public_path('backend/project/banner/'), $banner_image_name);
            $banner_image_url = 'public/backend/project/banner/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;
        }
        if ($request->hasFile('property_thumbnail')) {
            @unlink($image->property_thumbnail);
            $property_thumbnail = $request->file('property_thumbnail');
            $property_thumbnail_name = hexdec(uniqid()) . '.' . $property_thumbnail->getClientOriginalExtension();
            $property_thumbnail->move(public_path('backend/project/property_thumbnail/'), $property_thumbnail_name);
            $property_thumbnail_url = 'public/backend/project/property_thumbnail/' . $property_thumbnail_name;
            $data['property_thumbnail'] = $property_thumbnail_url;
        }
        if ($request->hasFile('image1')) {
            @unlink($image->image1);
            $image1 = $request->file('image1');
            $image1_name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('backend/project/details_img/'), $image1_name);
            $image1_url = 'public/backend/project/details_img/' . $image1_name;
            $data['image1'] = $image1_url;
        }
        if ($request->hasFile('image2')) {
            @unlink($image->image2);
            $image2 = $request->file('image2');
            $image2_name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('backend/project/details_img/'), $image2_name);
            $image2_url = 'public/backend/project/details_img/' . $image2_name;
            $data['image2'] = $image2_url;
        }
        if ($request->hasFile('image3')) {
            @unlink($image->image3);
            $image3 = $request->file('image3');
            $image3_name = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('backend/project/details_img/'), $image3_name);
            $image3_url = 'public/backend/project/details_img/' . $image3_name;
            $data['image3'] = $image3_url;
        }

        $data['property_name'] = $request->property_name;
        // $data['property_status'] = $request->property_status;
        $data['status'] = (int) $request->input('status', 0);
        // Keep existing category/subcategory unchanged during update.
        $data['project_category_id'] = $image->project_category_id;
        $data['project_subcategory_id'] = $image->project_subcategory_id;
        $data['price'] = $request->price;
        $data['discount'] = $request->discount;
        $data['commission'] = $request->commission;

        $data['short_des'] = $request->short_des;
        $data['long_des'] = $request->long_des;
        $data['bedrooms'] = $request->bedrooms;
        $data['bathrooms'] = $request->bathrooms;
        $data['rooms'] = $request->rooms;
        $data['units'] = $request->units;
        $data['floors'] = $request->floors;
        $data['kitchens'] = $request->kitchens;
        $data['garages'] = $request->garages;



        $data['title'] = $request->title;
        $data['main_road_size'] = $request->main_road_size;
        $data['approved_by'] = $request->approved_by;
        $data['face_type'] = $request->face_type;
        $data['lift'] = $request->lift;
        $data['store_room'] = $request->store_room;
        $data['belkuni'] = $request->belkuni;
        $data['daining'] = $request->daining;
        $data['drawing'] = $request->drawing;


        $data['property_mood'] = $request->property_mood;
        $data['property_size'] = $request->property_size;
        $data['property_type'] = $request->property_type;
        $data['property_video'] = $videoId;
        $data['map_link'] = $request->map_link;
        $data['location_eng'] = $request->location_eng;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;

        $data['updated_at'] = Carbon::now();

        Project::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Project Data Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect('/all/project')->with($notification);
    } //end method------------------------------

    public function tech_web_project_delete($id)
    {
        $image = Project::findOrFail($id);

        @unlink($image->banner_image);
        @unlink($image->property_thumbnail);
        @unlink($image->image1);
        @unlink($image->image2);
        @unlink($image->image3); //delete banner_image from local path_folder

        Project::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Project Data Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // Project status active inactive method start ------------
    public function tec_web_project_inactive($id)
    {
        Project::findOrFail($id)->update(['status' => 0]);
        return redirect()->back();
    }
    public function tec_web_project_active($id)
    {
        Project::findOrFail($id)->update(['status' => 1]);
        return redirect()->back();
    }
    // Project status active inactive method end ------------


    // -------------------Project method end---------------------------------------------

    public function tech_web_all_ongoing_events()
    {
        $all_events = OngoingEvent::orderBy('id', 'DESC')->get();
        return view('backend.project.all_ongoing_event', compact('all_events'));
    } //end method------------------------
    public function tech_web_add_ongoing_events()
    {
        return view('backend.project.add_ongoing_event');
    } //end method------------------------

    public function tech_web_ongoing_event_store(Request $request)
    {

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/ongoing/banner/' . $banner_image_name);
            $banner_image_url = 'backend/ongoing/banner/' . $banner_image_name;
        }
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/ongoing/main_img/' . $main_image_name);
            $main_image_url = 'backend/ongoing/main_img/' . $main_image_name;
        }
        if ($request->hasFile('details_image1')) {
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/ongoing/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/ongoing/details_img/' . $details_image1_name;
        }
        if ($request->hasFile('details_image2')) {
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/ongoing/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/ongoing/details_img/' . $details_image2_name;
        }

        $data = new OngoingEvent();
        $data->property_name = $request->property_name;
        // $data->property_status = $request->property_status;
        $data->price = $request->price;
        $data->property_thumbnail = $request->location_eng;

        $data->banner_image = $banner_image_url ?? null;
        $data->main_image = $main_image_url ?? null;
        $data->details_image1 = $details_image1_url ?? null;
        $data->details_image2 = $details_image2_url ?? null;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Ongoing Data Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.ongoing.events')->with($notification);
    } //end method------------------------------------

    public function tech_web_edit_ongoing_event($id)
    {
        $edit_ongoing = OngoingEvent::findOrFail($id);
        return view('backend.project.edit_ongoing_event', compact('edit_ongoing'));
    } //end method------------------------------------------

    public function tech_web_ongoing_event_update(Request $request)
    {
        $id = $request->id;
        $image = OngoingEvent::findOrFail($id);
        // dd($image);
        $data = array();

        if ($request->hasFile('banner_image')) {
            @unlink($image->banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/ongoing/banner/' . $banner_image_name);
            $banner_image_url = 'backend/ongoing/banner/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;
        }
        if ($request->hasFile('main_image')) {
            @unlink($image->main_image);
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/ongoing/main_img/' . $main_image_name);
            $main_image_url = 'backend/ongoing/main_img/' . $main_image_name;
            $data['main_image'] = $main_image_url;
        }
        if ($request->hasFile('details_image1')) {
            @unlink($image->details_image1);
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/ongoing/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/ongoing/details_img/' . $details_image1_name;
            $data['details_image1'] = $details_image1_url;
        }
        if ($request->hasFile('details_image2')) {
            @unlink($image->details_image2);
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/ongoing/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/ongoing/details_img/' . $details_image2_name;
            $data['details_image2'] = $details_image2_url;
        }

        $data['title_english'] = $request->title_english;
        $data['short_des_eng'] = $request->short_des_eng;
        $data['long_des_eng'] = $request->long_des_eng;
        $data['location_eng'] = $request->location_eng;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['updated_at'] = Carbon::now();

        OngoingEvent::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Ongoing Data Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.ongoing.events')->with($notification);
    } //end method------------------------------

    public function tech_web_ongoing_event_delete($id)
    {
        $image = OngoingEvent::findOrFail($id);

        @unlink($image->banner_image);
        @unlink($image->main_image);
        @unlink($image->details_image1);
        @unlink($image->details_image2); //delete banner_image from local path_folder

        OngoingEvent::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Ongoing Data Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // AgroProduct status active inactive method start ------------
    public function tec_web_ongoing_event_inactive($id)
    {
        OngoingEvent::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
    }
    public function tec_web_ongoing_event_active($id)
    {
        OngoingEvent::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
    // AgroProduct status active inactive method end ------------

    //  upcomming event all method start=============================================

    public function tech_web_all_upcomming_events()
    {
        $all_events = UpcommingEvent::orderBy('id', 'DESC')->get();
        return view('backend.project.all_upcomming_event', compact('all_events'));
    } //end method------------------------
    public function tech_web_add_upcomming_events()
    {
        return view('backend.project.add_upcomming_event');
    } //end method------------------------

    public function tech_web_upcomming_event_store(Request $request)
    {

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/upcomming/banner/' . $banner_image_name);
            $banner_image_url = 'backend/upcomming/banner/' . $banner_image_name;
        }
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/upcomming/main_img/' . $main_image_name);
            $main_image_url = 'backend/upcomming/main_img/' . $main_image_name;
        }
        if ($request->hasFile('details_image1')) {
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/upcomming/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/upcomming/details_img/' . $details_image1_name;
        }
        if ($request->hasFile('details_image2')) {
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/upcomming/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/upcomming/details_img/' . $details_image2_name;
        }

        $data = new UpcommingEvent();
        $data->title_english = $request->title_english;
        $data->short_des_eng = $request->short_des_eng;
        $data->long_des_eng = $request->long_des_eng;
        $data->location_eng = $request->location_eng;

        $data->banner_image = $banner_image_url ?? null;
        $data->main_image = $main_image_url ?? null;
        $data->details_image1 = $details_image1_url ?? null;
        $data->details_image2 = $details_image2_url ?? null;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Upcomming Data Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.upcomming.events')->with($notification);
    } //end method------------------------------------

    public function tech_web_edit_upcomming_event($id)
    {
        $edit_upcomming = UpcommingEvent::findOrFail($id);
        return view('backend.project.edit_upcomming_event', compact('edit_upcomming'));
    } //end method------------------------------------------

    public function tech_web_upcomming_event_update(Request $request)
    {
        $id = $request->id;
        $image = UpcommingEvent::findOrFail($id);
        // dd($image);
        $data = array();

        if ($request->hasFile('banner_image')) {
            @unlink($image->banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/upcomming/banner/' . $banner_image_name);
            $banner_image_url = 'backend/upcomming/banner/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;
        }
        if ($request->hasFile('main_image')) {
            @unlink($image->main_image);
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/upcomming/main_img/' . $main_image_name);
            $main_image_url = 'backend/upcomming/main_img/' . $main_image_name;
            $data['main_image'] = $main_image_url;
        }
        if ($request->hasFile('details_image1')) {
            @unlink($image->details_image1);
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/upcomming/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/upcomming/details_img/' . $details_image1_name;
            $data['details_image1'] = $details_image1_url;
        }
        if ($request->hasFile('details_image2')) {
            @unlink($image->details_image2);
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/upcomming/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/upcomming/details_img/' . $details_image2_name;
            $data['details_image2'] = $details_image2_url;
        }

        $data['title_english'] = $request->title_english;
        $data['short_des_eng'] = $request->short_des_eng;
        $data['long_des_eng'] = $request->long_des_eng;
        $data['location_eng'] = $request->location_eng;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['updated_at'] = Carbon::now();

        UpcommingEvent::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Upcomming Data Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.upcomming.events')->with($notification);
    } //end method------------------------------

    public function tech_web_upcomming_event_delete($id)
    {
        $image = UpcommingEvent::findOrFail($id);

        @unlink($image->banner_image);
        @unlink($image->main_image);
        @unlink($image->details_image1);
        @unlink($image->details_image2); //delete banner_image from local path_folder

        UpcommingEvent::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Upcomming Data Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // AgroProduct status active inactive method start ------------
    public function tec_web_upcomming_event_inactive($id)
    {
        UpcommingEvent::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
    }
    public function tec_web_upcomming_event_active($id)
    {
        UpcommingEvent::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
    // AgroProduct status active inactive method end ------------

    //  completed event all method==============================================

    public function tech_web_all_completed_events()
    {
        $all_events = CompletedEvent::orderBy('id', 'DESC')->get();
        return view('backend.project.all_completed_event', compact('all_events'));
    } //end method------------------------
    public function tech_web_add_completed_events()
    {
        return view('backend.project.add_completed_event');
    } //end method------------------------

    public function tech_web_completed_event_store(Request $request)
    {

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/completed/banner/' . $banner_image_name);
            $banner_image_url = 'backend/completed/banner/' . $banner_image_name;
        }
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/completed/main_img/' . $main_image_name);
            $main_image_url = 'backend/completed/main_img/' . $main_image_name;
        }
        if ($request->hasFile('details_image1')) {
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/completed/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/completed/details_img/' . $details_image1_name;
        }
        if ($request->hasFile('details_image2')) {
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/completed/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/completed/details_img/' . $details_image2_name;
        }

        $data = new CompletedEvent();
        $data->title_english = $request->title_english;
        $data->short_des_eng = $request->short_des_eng;
        $data->long_des_eng = $request->long_des_eng;
        $data->location_eng = $request->location_eng;

        $data->banner_image = $banner_image_url ?? null;
        $data->main_image = $main_image_url ?? null;
        $data->details_image1 = $details_image1_url ?? null;
        $data->details_image2 = $details_image2_url ?? null;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = array(
            'message' => 'Completed Data Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.completed.events')->with($notification);
    } //end method------------------------------------

    public function tech_web_edit_completed_event($id)
    {
        $edit_completed = CompletedEvent::findOrFail($id);
        return view('backend.project.edit_completed_event', compact('edit_completed'));
    } //end method------------------------------------------

    public function tech_web_completed_event_update(Request $request)
    {
        $id = $request->id;
        $image = CompletedEvent::findOrFail($id);
        // dd($image);
        $data = array();

        if ($request->hasFile('banner_image')) {
            @unlink($image->banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/completed/banner/' . $banner_image_name);
            $banner_image_url = 'backend/completed/banner/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;
        }
        if ($request->hasFile('main_image')) {
            @unlink($image->main_image);
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/completed/main_img/' . $main_image_name);
            $main_image_url = 'backend/completed/main_img/' . $main_image_name;
            $data['main_image'] = $main_image_url;
        }
        if ($request->hasFile('details_image1')) {
            @unlink($image->details_image1);
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/completed/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/completed/details_img/' . $details_image1_name;
            $data['details_image1'] = $details_image1_url;
        }
        if ($request->hasFile('details_image2')) {
            @unlink($image->details_image2);
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/completed/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/completed/details_img/' . $details_image2_name;
            $data['details_image2'] = $details_image2_url;
        }

        $data['title_english'] = $request->title_english;
        $data['short_des_eng'] = $request->short_des_eng;
        $data['long_des_eng'] = $request->long_des_eng;
        $data['location_eng'] = $request->location_eng;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['updated_at'] = Carbon::now();

        CompletedEvent::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Completed Data Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.completed.events')->with($notification);
    } //end method------------------------------

    public function tech_web_completed_event_delete($id)
    {
        $image = CompletedEvent::findOrFail($id);

        @unlink($image->banner_image);
        @unlink($image->main_image);
        @unlink($image->details_image1);
        @unlink($image->details_image2); //delete banner_image from local path_folder

        CompletedEvent::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Completed Data Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // AgroProduct status active inactive method start ------------
    public function tec_web_completed_event_inactive($id)
    {
        CompletedEvent::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
    }
    public function tec_web_completed_event_active($id)
    {
        CompletedEvent::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
    // AgroProduct status active inactive method end ------------
}
