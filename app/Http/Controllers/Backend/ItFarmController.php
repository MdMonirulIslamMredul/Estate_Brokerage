<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItFarm;
use App\Models\BannerAndTitle;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ItFarmController extends Controller
{
    public function tech_web_all_itfarm_service(){
        $all_itservice = ItFarm::orderBy('id','DESC')->get();
        return view('backend.itfarm.all_itfarm_service',compact('all_itservice'));
    }//end method--------------------
    public function tech_web_add_itservice(){
        return view('backend.itfarm.add_itfarm_service');
    }//end method--------------------
    public function tech_web_it_service_store(Request $request){

        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/itservice/banner/' . $banner_image_name);
            $banner_image_url = 'backend/itservice/banner/' . $banner_image_name;
        }
        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/itservice/main_img/' . $main_image_name);
            $main_image_url = 'backend/itservice/main_img/' . $main_image_name;
        }
        if ($request->hasFile('details_image1')) {
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/itservice/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/itservice/details_img/' . $details_image1_name;
        }
        if ($request->hasFile('details_image2')) {
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/itservice/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/itservice/details_img/' . $details_image2_name;
        }

        $it_data = new ItFarm();
        $it_data->it_service_name_eng = $request->it_service_name_eng;
        $it_data->resource_eng = $request->resource_eng;
        $it_data->short_des_eng = $request->short_des_eng;
        $it_data->long_des_eng = $request->long_des_eng;
        $it_data->banner_image = $banner_image_url??null;
        $it_data->main_image = $main_image_url??null;
        $it_data->details_image1 = $details_image1_url??null;
        $it_data->details_image2 = $details_image2_url??null;
        $it_data->save();
        $notification = array(
            'message' => 'IT Service Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.itfarm.service')->with($notification);
     
    }//end method------------
    public function tech_web_edit_itservice($id)
    {
        $edit_itservice = ItFarm::findOrFail($id);
        return view('backend.itfarm.edit_itfarm_service', compact('edit_itservice'));
    } //end method------------------------------------------

    public function tech_web_itservice_update(Request $request)
    {
        $id = $request->id;
        $image = ItFarm::findOrFail($id);
        // dd($image);
        $data = array();

        if($request->hasFile('banner_image')) {
            @unlink($image->banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 600)->save('backend/itservice/banner/' . $banner_image_name);
            $banner_image_url = 'backend/itservice/banner/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;
        }
        if($request->hasFile('main_image')) {
            @unlink($image->main_image);
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(460, 440)->save('backend/itservice/main_img/' . $main_image_name);
            $main_image_url = 'backend/itservice/main_img/' . $main_image_name;
            $data['main_image'] = $main_image_url;
        }      
        if($request->hasFile('details_image1')) {
            @unlink($image->details_image1);
            $details_image1 = $request->file('details_image1');
            $details_image1_name = hexdec(uniqid()) . '.' . $details_image1->getClientOriginalExtension();
            Image::make($details_image1)->resize(460, 440)->save('backend/itservice/details_img/' . $details_image1_name);
            $details_image1_url = 'backend/itservice/details_img/' . $details_image1_name;
            $data['details_image1'] = $details_image1_url;
        }      
        if($request->hasFile('details_image2')) {
            @unlink($image->details_image2);
            $details_image2 = $request->file('details_image2');
            $details_image2_name = hexdec(uniqid()) . '.' . $details_image2->getClientOriginalExtension();
            Image::make($details_image2)->resize(460, 440)->save('backend/itservice/details_img/' . $details_image2_name);
            $details_image2_url = 'backend/itservice/details_img/' . $details_image2_name;
            $data['details_image2'] = $details_image2_url;
        }      

        $data['it_service_name_eng'] = $request->it_service_name_eng;
        $data['resource_eng'] = $request->resource_eng;
        $data['short_des_eng'] = $request->short_des_eng;               
        $data['long_des_eng'] = $request->long_des_eng;               
        $data['updated_at'] = Carbon::now();


        ItFarm::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'It Services Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.itfarm.service')->with($notification);
    } //end method------------------------------

    public function tech_web_itservice_delete($id)
    {
        $image = ItFarm::findOrFail($id);
          
        @unlink($image->banner_image);
        @unlink($image->main_image);
        @unlink($image->details_image1);
        @unlink($image->details_image2); //delete banner_image from local path_folder

        ItFarm::findOrFail($id)->delete();
        $notification = array(
            'message' => 'IT Service Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

     // AgroProduct status active inactive method start ------------
     public function tec_web_itservice_inactive($id)
     {
        ItFarm::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
     }
     public function tec_web_itservice_active($id)
     {
        ItFarm::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
     }
     // AgroProduct status active inactive method end ------------

}
