<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerAndTitle;
use App\Models\RentRequest;
use App\Mail\Contactus;
use App\Mail\RentPropertyRequestMail;
use Illuminate\Support\Facades\Mail;

class FcontactusController extends Controller
{
    public function tech_web_contact_us()
    {
        $banner = BannerAndTitle::where('status', 1)->where('page', 'contacts')->first();
        return view('frontend.contact.contact_us', compact('banner'));
    } //end method------------------------------------

    public function tech_web_rent_property()
    {
        return view('frontend.rent.rent_property_request');
    }

    public function tech_web_contactdata_store(Request $request)
    {
        // $request->validate([
        //     'name_english' => 'required|max:200',
        //     'email' => 'required|unique:users|max:200',
        //     'phone' => 'required|unique:users|max:200',
        //     'message_english' => 'required',
        // ]);

        $item = $request;
        $adminEmail = "mesbaalam90@gmail.com";
        Mail::to($adminEmail)->send(new Contactus($item));
        return back()->with('status', 'Thank you for your message. It has been sent');
        $notification = array(
            'message' => 'Your Message Sent Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function tech_web_rent_property_store(Request $request)
    {
        $validated = $request->validate([
            'name_english' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'property_type' => 'required|string|max:255',
            'monthly_rent' => 'required|numeric|min:0',
            'property_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'area_size' => 'nullable|string|max:255',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'available_from' => 'nullable|date',
            'full_address' => 'required|string|max:500',
            'description' => 'required|string|max:3000',
        ]);

        // store request data
        RentRequest::create($validated);

        return back()->with('status', 'Your rent property request has been submitted successfully. Our team will contact you for further queries.');
    }
}
