<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerAndTitle;
use App\Models\VideoGallery;
use App\Models\ImageGallery;


class FVideoGalleryController extends Controller
{
    public function tech_web_video_gallery(){
        $banner = BannerAndTitle::where('page','video-gallery')->where('status',1)->first();
        $video_gallery = VideoGallery::where('status',1)->get();
        return view('frontend.gallery.video_gallery',compact('video_gallery','banner'));
    }
    public function tech_web_image_gallery(){
        $banner = BannerAndTitle::where('page','gallery')->where('status',1)->first();
        $img_gallery  = ImageGallery::where('status',1)->get();
        return view('frontend.gallery.image_gallery',compact('img_gallery','banner'));
    }
}
