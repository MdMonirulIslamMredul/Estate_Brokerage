<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use Carbon\Carbon;
use Auth;

class DonateController extends Controller
{
    public function tech_web_donate_complete(Request $request){
        // dd($request->donate_id);

        $donate = new Donate();
        $donate->user_id = auth()->user()->id;
        $donate->game_id = $request->donate_id;
        $donate->phone = $request->phone;
        $donate->transaction_status = $request->payment_status;
        $donate->transaction_number = $request->transaction_number;
        $donate->save();

        $notification = array(
            'message' => 'Donate Data Sent Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }
}
