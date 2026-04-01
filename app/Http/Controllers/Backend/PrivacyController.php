<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacPolicy;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class PrivacyController extends Controller
{
    public function tech_web_privacy_setting(){
        $privacy = PrivacPolicy::latest()->first();
        return view('backend.privacy_policy.privacy_policy', compact('privacy'));
    }

    public function tech_web_privacy_store(Request $request){
        $privacy = PrivacPolicy::latest()->first();

        if ($privacy) {
            $privacy = PrivacPolicy::latest()->first();
            $id = $privacy->id;
            // dd($id);

            $data = array();
            $data['short_des'] = $request->short_des;
            $data['short_des2'] = $request->short_des2;
            $data['long_des'] = $request->long_des;
            $data['updated_at'] = Carbon::now();

            if ($request->file('banner_image')) {
                @unlink($privacy->banner_image);
                $banner_image = $request->file('banner_image');
                $banner_image_Name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
                Image::make($banner_image)->resize(1920, 920)->save('backend/policy/' . $banner_image_Name);
                $banner_image_save = 'backend/policy/' . $banner_image_Name; //image save into db;
                $data['banner_image'] = $banner_image_save;
            }

            if ($request->file('image1')) {
                @unlink($privacy->image1);
                $image1 = $request->file('image1');
                $image1_Name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
                Image::make($image1)->resize(540, 360)->save('backend/policy/' . $image1_Name);
                $image1_save = 'backend/policy/' . $image1_Name; //image save into db;
                $data['image1'] = $image1_save;
            }

            if ($request->file('image2')) {
                @unlink($privacy->image2);
                $image2 = $request->file('image2');
                $image2_Name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
                Image::make($image2)->resize(540, 360)->save('backend/policy/' . $image2_Name);
                $image2_save = 'backend/policy/' . $image2_Name; //image save into db;
                $data['image2'] = $image2_save;
            }           

            PrivacPolicy::findOrFail($id)->update($data);

            $notification = array(
                'message' => 'Privacy Data Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            //

           

            $banner_image = $request->file('banner_image');
            $banner_image_Name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 920)->save('backend/policy/' . $banner_image_Name);
            $banner_image_save = 'backend/policy/' . $banner_image_Name; //image save into db;

            $image1 = $request->file('image1');
            $image1_Name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->resize(540, 360)->save('backend/policy/' . $image1_Name);
            $image1_save = 'backend/policy/' . $image1_Name; //image save into db;

            $image2 = $request->file('image2');
            $image2_Name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(540, 360)->save('backend/policy/' . $image2_Name);
            $image2_save = 'backend/policy/' . $image2_Name; //image save into db;


            PrivacPolicy::insert([
                'short_des' => $request->short_des,
                'short_des2' => $request->short_des2,
                'long_des' => $request->long_des,
                'banner_image' => $banner_image_save,
                'image1' => $image1_save,
                'image2' => $image2_save,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Privacy Data Inserted Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
