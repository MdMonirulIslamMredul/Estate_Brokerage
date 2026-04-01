<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\AgroMultiImg;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AgroProductController extends Controller
{
    public function tech_web_agro_product(){
        $all_agro = Business::orderBy('id','DESC')->get();
        return view('backend.agro_complex.all_agro_complex',compact('all_agro'));
    }//end method------------
    public function tech_web_add_agro_product(){        
        return view('backend.agro_complex.add_agro_product');
    }//end method------------
    public function tech_web_agro_product_store(Request $request){

        if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $image1_name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->resize(460, 440)->save('backend/business/' . $image1_name);
            $image1_url = 'backend/business/' . $image1_name;
        }
        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2_name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(460, 440)->save('backend/business/' . $image2_name);
            $image2_url = 'backend/business/' . $image2_name;
        }

        // $agro_id = Business::insertGetId([
        //     'title_english' => $request->title_english,
        //     'short_des_eng' => $request->short_des_eng,	
        //     'long_des_eng' => $request->long_des_eng,	
        //     'short_des_eng' => $request->short_des_eng,	
        //     'short_des_eng' => $request->short_des_eng,	
        //     'image1' => $image1_url??null,	
        //     'image2' => $image2_url??null,	
        //     'created_at' => Carbon::now(),            
        // ]);

          // start multi-images 
        //   $multi_images = $request->file('multi_img');
        //   foreach($multi_images as $multi_image){
        //       $image_make_name = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
        //       Image::make($multi_image)->resize(460, 440)->save('backend/agro/multiImg/'.$image_make_name);
        //       $uploadPath = 'backend/agro/multiImg/'.$image_make_name;
  
        //       AgroMultiImg::insert([
        //           'agro_id' => $agro_id,
        //           'agro_image' => $uploadPath,
        //           'created_at' => Carbon::now(),
        //       ]);
        //   }
          // end multi-images 

        $agro_data = new Business();
        $agro_data->title_english = $request->title_english;
        $agro_data->short_des_eng = $request->short_des_eng;
        $agro_data->long_des_eng = $request->long_des_eng;
        $agro_data->image1 = $image1_url??null;
        $agro_data->image2 = $image2_url??null;
        $agro_data->save();
        $notification = array(
            'message' => 'Agro Product Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.agro_product')->with($notification);
     
    }//end method------------

    public function tech_web_edit_agro_product($id)
    {
        $edit_product = Business::findOrFail($id);
        return view('backend.agro_complex.edit_agro_product', compact('edit_product'));
    } //end method------------------------------------------

    public function tech_web_agro_product_update(Request $request)
    {
        $id = $request->id;
        $image = Business::findOrFail($id);
        // dd($image);
        $data = array();

        if($request->hasFile('image1')) {
            @unlink($image->image1);
            $image1 = $request->file('image1');
            $image1_name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->resize(460, 440)->save('backend/business/' . $image1_name);
            $image1_url = 'backend/business/' . $image1_name;
            $data['image1'] = $image1_url;
        }
        if($request->hasFile('image2')) {
            @unlink($image->image2);
            $image2 = $request->file('image2');
            $image2_name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(460, 440)->save('backend/business/' . $image2_name);
            $image2_url = 'backend/business/' . $image2_name;
            $data['image2'] = $image2_url;
        }      

        $data['title_english'] = $request->title_english;
        $data['short_des_eng'] = $request->short_des_eng;
        $data['long_des_eng'] = $request->long_des_eng;               
        $data['updated_at'] = Carbon::now();

        Business::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Agro Product Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.agro_product')->with($notification);
    } //end method------------------------------

    public function tech_web_agro_product_delete($id)
    {
        $image = Business::findOrFail($id);
          
        @unlink($image->image1);
        @unlink($image->image2); //delete banner_image from local path_folder

        Business::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Agro Product Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // Business status active inactive method start ------------
    public function tec_web_agro_product_inactive($id)
    {
        Business::findOrFail($id)->update(['status' => '0']);
        return redirect()->back();
    }
    public function tec_web_agro_product_active($id)
    {
        Business::findOrFail($id)->update(['status' => '1']);
        return redirect()->back();
    }
    // Business status active inactive method end ------------

}
