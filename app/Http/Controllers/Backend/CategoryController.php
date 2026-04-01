<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function tech_web_all_category(){
        $category = Category::orderBy('id','DESC')->get();
        return view('backend.category.all_category',compact('category'));
    }//end method----------------------------

    public function tech_web_add_category(){
        return view('backend.category.add_category');
    }//end method-----------------

    public function tech_web_category_store(Request $request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(210, 140)->save('backend/category/' . $image_name);
            $image_url = 'backend/category/' . $image_name;
        }
        $category = new Category();
        $category->category_name_eng = $request->category_name_eng;
        $category->image =  $image_url??null;
        $category->save();

        $notification = array(
            'message' => 'Category Data Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }//end method ----------------------------------

    public function tech_web_edit_category($id)
    {
        $edit_cat = Category::findOrFail($id);
        return view('backend.category.edit_category', compact('edit_cat'));
    } //end method------------------------------------------

    public function tech_web_category_update(Request $request)
    {
        $id = $request->id;
        $image = Category::findOrFail($id);
        // dd($image);
        $data = array();
        if($request->hasFile('image')) {
            @unlink($image->image);
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image1)->resize(210, 140)->save('backend/category/' . $image_name);
            $image_url = 'backend/category/' . $image_name;
            $data['image'] = $image_url;
        }        
        $data['category_name_eng'] = $request->category_name_eng;                   
        $data['updated_at'] = Carbon::now();

        Category::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Category Data Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    } //end method------------------------------

    public function tech_web_category_delete($id)
    {
        $image = Category::findOrFail($id);          
      
        @unlink($image->image); //delete banner_image from local path_folder

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Data Deleted Successfully!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

      // Category status active inactive method start ------------
      public function tec_web_category_inactive($id)
      {
        Category::findOrFail($id)->update(['status' => '0']);
          return redirect()->back();
      }
      public function tec_web_category_active($id)
      {
        Category::findOrFail($id)->update(['status' => '1']);
          return redirect()->back();
      }
      // AgroProduct status active inactive method end ------------

}
