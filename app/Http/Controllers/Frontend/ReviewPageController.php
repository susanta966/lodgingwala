<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\Review;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ReviewPageController extends Controller
{
    public function index(){
        $review = Review::get();
          $seo = Seo::where('page_name','review')->first();
         //        dd($seo);
          $sitesettings = SiteSetting::find(1);
                 $meta_title=$seo->meta_title;
                 $meta_keywords=implode(",", json_decode($seo->meta_keywords));
                 $meta_description= $seo->meta_description;
                 $image = $seo->image;
        return view('frontend.review', compact('sitesettings','review','meta_title','meta_keywords','meta_description','image'));
    }
}
