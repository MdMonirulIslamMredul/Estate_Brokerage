<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\BookTicket;


class TicketController extends Controller
{
    public function tech_web_booking_ticket(){
        $game = Game::all();
        return view('frontend.ticket.ticket_page',compact('game'));
    }//end method-----------------------------------

    public function tech_web_booking_ticket_store(Request $request){
        
        $booking = new BookTicket();
        $booking->game_id = $request->game_id;
        $booking->name_english = $request->name_english;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->address_eng = $request->address_eng;
        $booking->message_english = $request->message_english;
        $booking->status = '0';
        $booking->save();

        $notification = array(
            'message' => 'Your Booking Sent Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }
}
