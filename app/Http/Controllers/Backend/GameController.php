<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\BannerAndTitle;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class GameController extends Controller
{
    public function tech_web_all_game(){
        $games = Game::latest('id', 'DESC')->get();
        return view('backend.game.all_game', compact('games'));
    }//end method-------------------------------------

    public function tech_web_add_game()
    {
        return view('backend.game.add_game');
    } //end method-------------------------------------

    public function tech_web_game_store(Request $request)
    {

        if ($request->hasFile('main_image')) {
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(300, 250)->save('backend/game/main_image/' . $main_image_name);
            $main_image_url = 'backend/game/main_image/' . $main_image_name;
        }
        if ($request->hasFile('banner_image')) {
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 920)->save('backend/game/banner_image/' . $banner_image_name);
            $banner_image_url = 'backend/game/banner_image/' . $banner_image_name;
        }
        if ($request->hasFile('image1')) {
            $image_1 = $request->file('image1');
            $image_1_name = hexdec(uniqid()) . '.' . $image_1->getClientOriginalExtension();
            Image::make($image_1)->resize(870, 370)->save('backend/game/details_images/' . $image_1_name);
            $image_1_url = 'backend/game/details_images/' . $image_1_name;
        }
        

        Game::insert([
            'game_name' => $request->game_name,
            'game_name_bng' => $request->game_name_bng,
            'date' => date('Y-m-d', strtotime($request->date)),
            'start_time' => $request->start_time,
            'location_eng' => $request->location_eng,
            'short_des1_eng' => $request->short_des1_eng,
            'short_des1_bng' => $request->short_des1_bng,            
            'long_des1_eng' => $request->long_des1_eng,
            'long_des1_bng' => $request->long_des1_bng,           

            'main_image' => $main_image_url ?? null,
            'banner_image' => $banner_image_url ?? null,
            'image1' => $image_1_url ?? null,           
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Game Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.game')->with($notification);
    } //end method---------------------------------------------------

    public function tech_web_game_edit($id)
    {
        $edit_game = Game::findOrFail($id);
        return view('backend.game.edit_game', compact('edit_game'));

    } //end method------------------------------------------

    public function tech_web_game_update(Request $request)
    {

        $id = $request->id;
        $old_image = Game::find($id);
        $del_main_image = $old_image->main_image;
        $del_banner_image = $old_image->banner_image;
        $del_image1 = $old_image->image1;

        $data = array();
        $data['game_name'] = $request->game_name;
        $data['game_name_bng'] = $request->game_name_bng;
        $data['date'] = date('Y-m-d', strtotime($request->date));
        $data['start_time'] = $request->start_time;
        $data['location_eng'] = $request->location_eng;
        $data['short_des1_eng'] = $request->short_des1_eng;
        $data['short_des1_bng'] = $request->short_des1_bng;
        $data['long_des1_eng'] = $request->long_des1_eng;
        $data['long_des1_bng'] = $request->long_des1_bng;

        if ($request->hasFile('main_image')) {
            @unlink($del_main_image);
            $main_image = $request->file('main_image');
            $main_image_name = hexdec(uniqid()) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(300, 250)->save('backend/game/main_image/' . $main_image_name);
            $main_image_url = 'backend/game/main_image/' . $main_image_name;
            $data['main_image'] = $main_image_url;

           
        }

        if ($request->hasFile('banner_image')) {
            @unlink($del_banner_image);
            $banner_image = $request->file('banner_image');
            $banner_image_name = hexdec(uniqid()) . '.' . $banner_image->getClientOriginalExtension();
            Image::make($banner_image)->resize(1920, 920)->save('backend/game/banner_image/' . $banner_image_name);
            $banner_image_url = 'backend/game/banner_image/' . $banner_image_name;
            $data['banner_image'] = $banner_image_url;

           
        }

        if ($request->hasFile('image1')) {
            @unlink($del_image1);
            $detais_image_1 = $request->file('image1');
            $detais_image_1_name = hexdec(uniqid()) . '.' . $detais_image_1->getClientOriginalExtension();
            Image::make($detais_image_1)->resize(870, 370)->save('backend/game/details_images/' . $detais_image_1_name);
            $detais_image_1_url = 'backend/game/details_images/' . $detais_image_1_name;
            $data['image1'] = $detais_image_1_url;

            
        }
        
        Game::findOrFail($id)->update($data);

        $notification = array(
            'message' => 'Game Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.game')->with($notification);
    } //end method-----------------------------------------------

    public function tech_web_game_delete($id)
    {
        $game_image = Game::findOrFail($id);       
        @unlink($game_image->main_image);
        @unlink($game_image->banner_image);
        @unlink($game_image->image1);
       

        Game::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Game Data Has Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

     // Slider status active inactive method start ------------
     public function tec_web_game_inactive($id)
     {
        Game::findOrFail($id)->update(['status' => '0']);
         return redirect()->back();
     }
     public function tec_web_game_active($id)
     {
        Game::findOrFail($id)->update(['status' => '1']);
         return redirect()->back();
     }
     // Slider status active inactive method end ------------

   


    // forntend game all methods============================================

    public function tech_web_game_details($id){
        $game_details = Game::findOrFail($id);        
        return view('frontend.game.game_details',compact('game_details'));
    }//end method---------------------------------------------

    public function tech_web_upcomming_game_list(){
        $banner = BannerAndTitle::where('status',1)->where('page','team')->first();
        $game_list = Game::where('status','1')->get();
        return view('frontend.game.upcomming_game_list',compact('game_list','banner'));
    }

}
