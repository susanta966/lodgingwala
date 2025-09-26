<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Facility;
use App\Models\Testimonial;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){
        $about = About::find(1);
        $testimonial = Testimonial::find(1);
        $sitesettings = SiteSetting::find(1);
        $facility = Facility::where('status',1)->orderBy('priority')->get();
          $seo = Seo::where('page_name','about')->first();
         //        dd($seo);
                 $meta_title=$seo->meta_title;
                 $meta_keywords=implode(",", json_decode($seo->meta_keywords));
                 $meta_description= $seo->meta_description;
                   $image = $seo->image;
        return view('frontend.about', compact('about','sitesettings','testimonial','facility','meta_title','meta_keywords','meta_description','image'));
    }
}
