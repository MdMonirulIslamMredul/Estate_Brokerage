<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutOwner;
use App\Models\Team;
use App\Models\CounterIcon;
use App\Models\Testimonial;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function tech_web_about_setting()
    {
        $about = About::latest()->first();
        return view('backend.about.about_setting', compact('about'));
    } //end mehtod----------------------------------

    public function tech_web_about_store_and_update(Request $request)
    {
        $about = About::latest()->first();

        if ($about) {
            $about = About::latest()->first();
            $id = $about->id;
            // dd($id);

            $data = array();
            $data['title_english'] = $request->title_english;
            $data['title_bangla'] = $request->title_bangla;
            $data['short_title_english'] = $request->short_title_english;
            $data['short_title_bangla'] = $request->short_title_bangla;
            $data['details_1_eng'] = $request->details_1_eng;
            $data['details_1_bng'] = $request->details_1_bng;
            $data['details_2_eng'] = $request->details_2_eng;
            $data['details_2_bng'] = $request->details_2_bng;
            $data['details_3_eng'] = $request->details_3_eng;
            $data['details_3_bng'] = $request->details_3_bng;

            $data['mission_english'] = $request->mission_english;
            $data['mission_bangla'] = $request->mission_bangla;
            $data['vission_english'] = $request->vission_english;
            $data['vission_bangla'] = $request->vission_bangla;
            $data['updated_at'] = Carbon::now();

            if ($request->file('profile_image')) {
                @unlink($about->profile_image);
                $profile_image_image = $request->file('profile_image');
                $profile_image_name = hexdec(uniqid()) . '.' . $profile_image_image->getClientOriginalExtension();
                Image::make($profile_image_image)->resize(400, 500)->save('backend/about/' . $profile_image_name);
                $profile_image_save = 'backend/about/' . $profile_image_name; //image save into db
                $data['profile_image'] = $profile_image_save;
            }

            if ($request->file('main_image')) {
                @unlink($about->main_image);
                $about_main_image = $request->file('main_image');
                $about_main_image_name = hexdec(uniqid()) . '.' . $about_main_image->getClientOriginalExtension();
                Image::make($about_main_image)->resize(400, 500)->save('backend/about/' . $about_main_image_name);
                $about_image_save = 'backend/about/' . $about_main_image_name; //image save into db
                $data['main_image'] = $about_image_save;
            }

            if ($request->file('banner_image')) {
                @unlink($about->banner_image);
                $banner_image = $request->file('banner_image');
                $banner_image_Name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
                Image::make($banner_image)->resize(1920, 920)->save('backend/about/' . $banner_image_Name);
                $banner_image_save = 'backend/about/' . $banner_image_Name; //image save into db;
                $data['banner_image'] = $banner_image_save;
            }

            if ($request->file('about_info_image')) {
                @unlink($about->about_info_image);
                $about_info_image = $request->file('about_info_image');
                $about_info_image_Name = hexdec(uniqid()) . '.' . $about_info_image->getClientOriginalExtension();
                Image::make($about_info_image)->resize(1200, 900)->save('backend/about/' . $about_info_image_Name);
                $about_info_image_save = 'backend/about/' . $about_info_image_Name; //image save into db;
                $data['about_info_image'] = $about_info_image_save;
            }

            if ($request->file('mission_image')) {
                @unlink($about->mission_image);
                $mission_image = $request->file('mission_image');
                $mission_image_Name = hexdec(uniqid()) . '.' . $mission_image->getClientOriginalExtension();
                Image::make($mission_image)->resize(400, 500)->save('backend/about/mission/' . $mission_image_Name);
                $mission_image_save = 'backend/about/mission/' . $mission_image_Name; //image save into db;
                $data['mission_image'] = $mission_image_save;
            }
            if ($request->file('vission_image')) {
                @unlink($about->about_info_image);
                $vission_image = $request->file('vission_image');
                $vission_image_Name = hexdec(uniqid()) . '.' . $vission_image->getClientOriginalExtension();
                Image::make($vission_image)->resize(400, 500)->save('backend/about/vission/' . $vission_image_Name);
                $vission_image_save = 'backend/about/vission/' . $vission_image_Name; //image save into db;
                $data['vission_image'] = $vission_image_save;
            }

            About::findOrFail($id)->update($data);

            $notification = array(
                'message' => 'About Data Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            //

            $profile_image_image = $request->file('profile_image');
            $profile_image_name = hexdec(uniqid()) . '.' . $about_main_image->getClientOriginalExtension();
            Image::make($profile_image_image)->resize(400, 500)->save('backend/about/' . $profile_image_name);
            $profile_image_save = 'backend/about/' . $profile_image_name; //image save into db

            $about_main_image = $request->file('main_image');
            $about_main_image_name = hexdec(uniqid()) . '.' . $about_main_image->getClientOriginalExtension();
            Image::make($about_main_image)->resize(400, 500)->save('backend/about/' . $about_main_image_name);
            $about_image_save = 'backend/about/' . $about_main_image_name; //image save into db

            $banner_image = $request->file('banner_image');
            $banner_image_Name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 920)->save('backend/about/' . $banner_image_Name);
            $banner_image_save = 'backend/about/' . $banner_image_Name; //image save into db;

            $about_info_image = $request->file('about_info_image');
            $about_info_image_Name = hexdec(uniqid()) . '.' . $about_info_image->getClientOriginalExtension();
            Image::make($about_info_image)->resize(1200, 900)->save('backend/about/' . $about_info_image_Name);
            $about_info_image_save = 'backend/about/' . $about_info_image_Name; //image save into db;

            $mission_image = $request->file('mission_image');
            $mission_image_name = hexdec(uniqid()) . '.' . $mission_image->getClientOriginalExtension();
            Image::make($mission_image)->resize(400, 500)->save('backend/about/mission/' . $mission_image_name);
            $mission_image_save = 'backend/about/mission/' . $mission_image_name; //image save into db

            $vission_image = $request->file('vission_image');
            $vission_image_name = hexdec(uniqid()) . '.' . $vission_image->getClientOriginalExtension();
            Image::make($vission_image)->resize(400, 500)->save('backend/about/vission/' . $vission_image_name);
            $vission_image_save = 'backend/about/vission/' . $vission_image_name; //image save into db

            About::insert([
                'title_english' => $request->title_english,
                'title_bangla' => $request->title_bangla,
                'short_title_english' => $request->short_title_english,
                'short_title_bangla' => $request->short_title_bangla,
                'details_1_eng' => $request->details_1_eng,
                'details_1_bng' => $request->details_1_bng,
                'details_2_eng' => $request->details_2_eng,
                'details_2_bng' => $request->details_2_bng,
                'details_3_eng' => $request->details_3_eng,
                'details_3_bng' => $request->details_3_bng,

                'mission_english' => $request->mission_english,
                'mission_bangla' => $request->mission_bangla,
                'vission_english' => $request->vission_english,
                'vission_bangla' => $request->vission_bangla,

                'profile_image' => $profile_image_save,
                'main_image' => $about_image_save,
                'banner_image' => $banner_image_save,
                'about_info_image' => $about_info_image_save,
                'mission_image' => $mission_image_save,
                'vission_image' => $vission_image_save,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'About Data Inserted Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    } //end method----------------------------------------------------

    // owner information start----------------------------------------

    public function tech_web_about_owner(){
        $about = AboutOwner::latest()->first();
        return view('backend.about.about_owner',compact('about'));
    }

    public function tech_web_about_owner_store(Request $request){
        $owner = AboutOwner::latest()->first();

        if ($owner) {
            $owner = AboutOwner::latest()->first();
            $id = $owner->id;
            // dd($id);

            $data = array();
            $data['name'] = $request->name;
            $data['designation'] = $request->designation;
            $data['short_des'] = $request->short_des;
            $data['long_des'] = $request->long_des;
            $data['phone'] = $request->phone;
            $data['facebook'] = $request->facebook;
            $data['instagram'] = $request->instagram;
            $data['linkedIn'] = $request->linkedIn;
            $data['twitter'] = $request->twitter;
            $data['telegram'] = $request->telegram;
            $data['youtube'] = $request->youtube;
            $data['website_link'] = $request->website_link;
            $data['updated_at'] = Carbon::now();

            if ($request->file('profile_image')) {
                @unlink($about->profile_image);
                $profile_image_image = $request->file('profile_image');
                $profile_image_name = hexdec(uniqid()) . '.' . $profile_image_image->getClientOriginalExtension();
                Image::make($profile_image_image)->resize(680, 460)->save('backend/owner/' . $profile_image_name);
                $profile_image_save = 'backend/owner/' . $profile_image_name; //image save into db
                $data['profile_image'] = $profile_image_save;
            }

            if ($request->file('banner_image')) {
                @unlink($about->banner_image);
                $banner_image = $request->file('banner_image');
                $banner_image_Name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
                Image::make($banner_image)->resize(1920, 920)->save('backend/owner/' . $banner_image_Name);
                $banner_image_save = 'backend/owner/' . $banner_image_Name; //image save into db;
                $data['banner_image'] = $banner_image_save;
            }

            if ($request->file('image_1')) {
                @unlink($about->image_1);
                $image_1 = $request->file('image_1');
                $image_1_Name = hexdec(uniqid()) . '.' . $image_1->getClientOriginalExtension();
                Image::make($image_1)->resize(450, 280)->save('backend/owner/more/' . $image_1_Name);
                $image_1_save = 'backend/owner/more/' . $image_1_Name; //image save into db;
                $data['image_1'] = $image_1_save;
            }
            if ($request->file('image_2')) {
                @unlink($about->image_2);
                $image_2 = $request->file('image_2');
                $image_2_Name = hexdec(uniqid()) . '.' . $image_2->getClientOriginalExtension();
                Image::make($image_2)->resize(450, 280)->save('backend/owner/more/' . $image_2_Name);
                $image_2_save = 'backend/owner/more/' . $image_2_Name; //image save into db;
                $data['image_2'] = $image_2_save;
            }
            if ($request->file('image_3')) {
                @unlink($about->image_3);
                $image_3 = $request->file('image_3');
                $image_3_Name = hexdec(uniqid()) . '.' . $image_3->getClientOriginalExtension();
                Image::make($image_3)->resize(450, 280)->save('backend/owner/more/' . $image_3_Name);
                $image_3_save = 'backend/owner/more/' . $image_3_Name; //image save into db;
                $data['image_3'] = $image_3_save;
            }
            if ($request->file('image_4')) {
                @unlink($about->image_4);
                $image_4 = $request->file('image_4');
                $image_4_Name = hexdec(uniqid()) . '.' . $image_4->getClientOriginalExtension();
                Image::make($image_4)->resize(450, 280)->save('backend/owner/more/' . $image_4_Name);
                $image_4_save = 'backend/owner/more/' . $image_4_Name; //image save into db;
                $data['image_4'] = $image_4_save;
            }
            if ($request->file('image_5')) {
                @unlink($about->image_5);
                $image_5 = $request->file('image_5');
                $image_5_Name = hexdec(uniqid()) . '.' . $image_5->getClientOriginalExtension();
                Image::make($image_5)->resize(450, 280)->save('backend/owner/more/' . $image_5_Name);
                $image_5_save = 'backend/owner/more/' . $image_5_Name; //image save into db;
                $data['image_5'] = $image_5_save;
            }
            if ($request->file('image_6')) {
                @unlink($about->image_6);
                $image_6 = $request->file('image_6');
                $image_6_Name = hexdec(uniqid()) . '.' . $image_6->getClientOriginalExtension();
                Image::make($image_6)->resize(450, 280)->save('backend/owner/more/' . $image_6_Name);
                $image_6_save = 'backend/owner/more/' . $image_6_Name; //image save into db;
                $data['image_6'] = $image_6_save;
            }
            AboutOwner::findOrFail($id)->update($data);

            $notification = array(
                'message' => 'Owner Data Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            //insert owner information
            $profile_image_image = $request->file('profile_image');
            $profile_image_name = hexdec(uniqid()) . '.' . $profile_image_image->getClientOriginalExtension();
            Image::make($profile_image_image)->resize(680, 460)->save('backend/owner/' . $profile_image_name);
            $profile_image_save = 'backend/owner/' . $profile_image_name; //image save into db
           
            $banner_image = $request->file('banner_image');
            $banner_image_Name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 920)->save('backend/owner/' . $banner_image_Name);
            $banner_image_save = 'backend/owner/' . $banner_image_Name; //image save into db;
          
            $image_1 = $request->file('image_1');
            $image_1_Name = hexdec(uniqid()) . '.' . $image_1->getClientOriginalExtension();
            Image::make($image_1)->resize(450, 280)->save('backend/owner/more/' . $image_1_Name);
            $image_1_save = 'backend/owner/more/' . $image_1_Name; //image save into db;
        
            $image_2 = $request->file('image_2');
            $image_2_Name = hexdec(uniqid()) . '.' . $image_2->getClientOriginalExtension();
            Image::make($image_2)->resize(450, 280)->save('backend/owner/more/' . $image_2_Name);
            $image_2_save = 'backend/owner/more/' . $image_2_Name; //image save into db;
        
            $image_3 = $request->file('image_3');
            $image_3_Name = hexdec(uniqid()) . '.' . $image_3->getClientOriginalExtension();
            Image::make($image_3)->resize(450, 280)->save('backend/owner/more/' . $image_3_Name);
            $image_3_save = 'backend/owner/more/' . $image_3_Name; //image save into db;
        
            $image_4 = $request->file('image_4');
            $image_4_Name = hexdec(uniqid()) . '.' . $image_4->getClientOriginalExtension();
            Image::make($image_4)->resize(450, 280)->save('backend/owner/more/' . $image_4_Name);
            $image_4_save = 'backend/owner/more/' . $image_4_Name; //image save into db;

            $image_5 = $request->file('image_5');
            $image_5_Name = hexdec(uniqid()) . '.' . $image_5->getClientOriginalExtension();
            Image::make($image_5)->resize(450, 280)->save('backend/owner/more/' . $image_5_Name);
            $image_5_save = 'backend/owner/more/' . $image_5_Name; //image save into db;
        
            $image_6 = $request->file('image_6');
            $image_6_Name = hexdec(uniqid()) . '.' . $image_6->getClientOriginalExtension();
            Image::make($image_6)->resize(450, 280)->save('backend/owner/more/' . $image_6_Name);
            $image_6_save = 'backend/owner/more/' . $image_6_Name; //image save into db;
            

            AboutOwner::insert([
                'name' => $request->name,
                'designation' => $request->designation,
                'short_des' => $request->short_des,
                'long_des' => $request->long_des,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedIn' => $request->linkedIn,
                'twitter' => $request->twitter,
                'telegram' => $request->telegram,
                'youtube' => $request->youtube,
                'website_link' => $request->website_link,

                'profile_image' => $profile_image_save,               
                'banner_image' => $banner_image_save,
                'image_1' => $image_1_save,
                'image_2' => $image_2_save,
                'image_3' => $image_3_save,
                'image_4' => $image_4_save,
                'image_5' => $image_5_save,
                'image_6' => $image_6_save,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Owner Data Inserted Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }



    
}
