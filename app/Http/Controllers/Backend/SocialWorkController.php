<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialWork;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SocialWorkController extends Controller
{
    public function tech_web_all_social_work(){
        $socail = SocialWork::latest('id', 'DESC')->get();
        return view('backend.socialwork.all_social_work',compact('socail'));
    }

    public function tech_web_add_social_work(){
        return view('backend.socialwork.add_social_work');
    }

    public function tech_web_social_work_store(Request $request){
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(600, 600)->save('backend/social/main_image/' . $main_image_name);
            $main_image_url = 'backend/social/main_image/' . $main_image_name;
        }
        if ($request->hasFile('details_image1')) {
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(600, 600)->save('backend/social/main_image/' . $details_image1_name);
            $details_image1_url = 'backend/social/main_image/' . $details_image1_name;
        }
        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 466)->save('backend/social/banner_image/' . $banner_image_name);
            $banner_image_url = 'backend/social/banner_image/' . $banner_image_name;
        }
       
        if ($request->hasFile('details_image2')) {
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(440, 330)->save('backend/social/details_images/' . $details_image2_name);
            $details_image2_url = 'backend/social/details_images/' . $details_image2_name;
        }
        if ($request->hasFile('details_image3')) {
            $details_image3 = $request->file('details_image3');
            $details_image3_name = hexdec(uniqid()) . '.' . $details_image3->getClientOriginalExtension();
            Image::make($details_image3)->resize(440, 330)->save('backend/social/details_images/' . $details_image3_name);
            $details_image3_url = 'backend/social/details_images/' . $details_image3_name;
        }
        if ($request->hasFile('details_image4')) {
            $details_image4 = $request->file('details_image4');
            $details_image4_name = hexdec(uniqid()) . '.' . $details_image4->getClientOriginalExtension();
            Image::make($details_image4)->resize(440, 330)->save('backend/social/details_images/' . $details_image4_name);
            $details_image4_url = 'backend/social/details_images/' . $details_image4_name;
        }

        SocialWork::insert([
            'title_english' => $request->title_english,
            'short_des_eng' => $request->short_des_eng,
            'long_des1_eng' => $request->long_des1_eng,
            'long_des2_eng' => $request->long_des2_eng,
            'long_des3_eng' => $request->long_des3_eng, 
            'main_image' => $main_image_url ?? null,
            'banner_image' => $banner_image_url ?? null,
            'details_image1' => $details_image1_url ?? null,
            'details_image2' => $details_image2_url ?? null,
            'details_image3' => $details_image3_url ?? null,
            'details_image4' => $details_image4_url ?? null,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Social Work inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.social.work')->with($notification);
    }

    public function tec_web_edit_social_work($id)
    {
        $edit_social = SocialWork::findOrFail($id);
        return view('backend.socialwork.edit_social_work', compact('edit_social'));
    } //end method------------------------------------------

    public function tec_web_update_social_work(Request $request){
        $id = $request->id;
        $image = SocialWork::findOrFail($id);
        $data = array();

        if ($request->hasFile('main_image')) {
            @unlink($image->main_image);
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(360, 255)->save('backend/social/main_image/' . $main_image_name);
            $main_image_url = 'backend/social/main_image/' . $main_image_name;
            $data['main_image'] = $main_image_url;
        }
        if ($request->hasFile('details_image1')) {
            @unlink($image->details_image1);
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(600, 600)->save('backend/social/main_image/' . $details_image1_name);
            $details_image1_url = 'backend/social/main_image/' . $details_image1_name;
            $data['details_image1'] = $details_image1_url;
        }
        if ($request->hasFile('banner_image')) {
            @unlink($image->banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 466)->save('backend/social/banner_image/' . $banner_image_name);
            $banner_image_url = 'backend/social/banner_image/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;
        }
        if ($request->hasFile('details_image2')) {
            @unlink($image->details_image2);
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(440, 330)->save('backend/social/details_images/' . $details_image2_name);
            $details_image2_url = 'backend/social/details_images/' . $details_image2_name;
            $data['details_image2'] = $details_image2_url;

        }
        if ($request->hasFile('details_image3')) {
            @unlink($image->details_image3);
            $details_image3 = $request->file('details_image3');
            $details_image3_name = hexdec(uniqid()) . '.' . $details_image3->getClientOriginalExtension();
            Image::make($details_image3)->resize(440, 330)->save('backend/social/details_images/' . $details_image3_name);
            $details_image3_url = 'backend/social/details_images/' . $details_image3_name;
            $data['details_image3'] = $details_image3_url;

        }
        if ($request->hasFile('details_image4')) {
            @unlink($image->details_image4);
            $details_image4 = $request->file('details_image4');
            $details_image4_name = hexdec(uniqid()) . '.' . $details_image4->getClientOriginalExtension();
            Image::make($details_image4)->resize(440, 330)->save('backend/social/details_images/' . $details_image4_name);
            $details_image4_url = 'backend/social/details_images/' . $details_image4_name;
            $data['details_image4'] = $details_image4_url;

        }

        $data['title_english'] = $request->title_english;
        $data['short_des_eng'] = $request->short_des_eng;
        $data['long_des1_eng'] = $request->long_des1_eng;
        $data['long_des2_eng'] = $request->long_des2_eng;
        $data['long_des3_eng'] = $request->long_des3_eng;
        $data['updated_at'] = Carbon::now();

        SocialWork::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Social Work Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.social.work')->with($notification);

    }
    
    //Delete method----------------------------- 
    public function tec_web_delete_social_work($id)
    {
        $social_image = SocialWork::findOrFail($id);        
        @unlink($social_image->main_image);
        @unlink($social_image->banner_image);
        @unlink($social_image->details_image1);
        @unlink($social_image->details_image2);
        @unlink($social_image->details_image3); 
        @unlink($social_image->details_image4); //delete banner_image from local path_folder

        SocialWork::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Social Work Data Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // service status active inactive method start ------------
    public function tec_web_social_work_inactive($id)
    {
        SocialWork::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
    }
    public function tec_web_social_work_active($id)
    {
        SocialWork::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
    // service status active inactive method end ------------

}
