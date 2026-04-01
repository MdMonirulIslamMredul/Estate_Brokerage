<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Game;
use App\Models\BannerAndTitle;
use Carbon\Carbon;

class ResultController extends Controller
{
    public function tech_web_all_result(){
        $results = Result::with('gamedata')->latest('id', 'DESC')->get();
        return view('backend.result.all_result', compact('results'));
    }//end method-------------------------------------

    public function tech_web_create_result(){
        $games = Game::orderBy('id','DESC')->get();
        return view('backend.result.create_result',compact('games'));
    }//end method-----------------------------------------

    public function tech_web_result_store(Request $request){
        $data = array();
      
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('backend/result/'),$fileName);
            $data['pdf_file'] = 'backend/result/'.$fileName; //save image in db;
        }

        $data['game_id'] = $request->game_id;
        $data['year'] = $request->year;
        $data['created_at'] = Carbon::now();
        Result::insert( $data);

        $notification = array(
            'message' => 'Result Save Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.result')->with($notification);

    }//end method----------------------------------------

    public function tech_web_result_edit($id)
    {
        $edit_result = Result::findOrFail($id);
        $games = Game::orderBy('id','DESC')->get();
        return view('backend.result.edit_result', compact('edit_result','games'));

    } //end method------------------------------------------

    public function tech_web_result_update(Request $request){

        $data = array();

        $id = $request->id;
        $old_pdf_file = Result::find($id);
        $del_pdf_file = $old_pdf_file->pdf_file;
      
        if ($request->hasFile('pdf_file')) {
            @unlink($del_pdf_file);
            $file = $request->file('pdf_file');
            $fileName = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('backend/result/'),$fileName);
            $data['pdf_file'] = 'backend/result/'.$fileName; //save image in db;
        }

        $data['game_id'] = $request->game_id;
        $data['year'] = $request->year;
        $data['updated_at'] = Carbon::now();

        Result::findOrFail($id)->update( $data);

        $notification = array(
            'message' => 'Result Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.result')->with($notification);

    }//end method----------------------------------------

    public function tech_web_result_delete($id)
    {
        $old_pdf_file = Result::findOrFail($id); 
        $del_pdf_file = $old_pdf_file->pdf_file;

        @unlink($del_pdf_file);
             

        Result::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Result Data Has Deleted!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //end method-------------------------------------------

    // frontend reult method==========================

    public function tech_web_result_page(Request $request){
        $banner = BannerAndTitle::where('page','gallery')->first();
        $game = Game::all();
        $results = Result::all();
        $year = $request->year??null;
        
        $search_result = []; 
        if($request->year != null){       

        $search_result = Result::where('year', $request->year)->where('game_id', $request->game_id)->get();
        }
        
       
        return view('frontend.result.result_page',compact('results','banner','game', 'search_result','year'));
    }//end method -------------------------------------------

}
