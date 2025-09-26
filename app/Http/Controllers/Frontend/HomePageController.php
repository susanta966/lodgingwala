<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banquet;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Facility;
use App\Models\Location;
use App\Models\Room;
use App\Models\MobileSlider;
use App\Models\Seo;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', 1)->orderBy('priority')->get();
        $mobilesliders = MobileSlider::where('status', 1)->orderBy('priority')->get();
        $about = About::find(1);
        $sitesetting = \App\Models\SiteSetting::find(1);
         $home = \App\Models\Home::find(1);
        $facility = Facility::where('status', 1)->orderBy('priority')->get();
        $bestroom = Room::where('status', 1)->where('best_room', 1)->orderBy('priority')->latest()->take(6)->get();
        $banquet = Banquet::where('status', 1)->orderBy('priority')->get();
        $location = Location::get();
        $blog = Blog::where('status', 1)->orderBy('priority')->latest()->take(6)->get();
        $testimonial = \App\Models\Testimonial::find(1);
          $seo = Seo::where('page_name','home')->first();
         //        dd($seo);
                 $meta_title=$seo->meta_title;
                 $meta_keywords=implode(",", json_decode($seo->meta_keywords));
                 $meta_description= $seo->meta_description;
        return view('frontend.index', compact('mobilesliders','slider', 'about', 'facility','bestroom','banquet','location','blog','testimonial','home','sitesetting','meta_title','meta_keywords','meta_description'));
    }
}
