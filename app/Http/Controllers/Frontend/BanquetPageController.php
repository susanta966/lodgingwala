<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use \App\Models\Banquet;
use App\Models\SiteSetting;
use App\Models\Seo;
use Illuminate\Http\Request;

class BanquetPageController extends Controller
{
  public function index($slug)
  {
    $banquet = Banquet::where('slug', $slug)->first();
    $currentbanquet = Banquet::where('slug', $slug)->firstOrFail();
//    return $banquet;
 $sitesettings = SiteSetting::where('id', 1)->first();
    $latest = Banquet::where('status', 1)->orderBy('priority')->latest()->take(3)->get();

    $seo = Seo::where('page_name', 'banquet')->first();
    //        dd($seo);
    $meta_title = $seo->meta_title;
    $meta_keywords = implode(",", json_decode($seo->meta_keywords));
    $meta_description = $seo->meta_description;
    $image = $seo->image;
    return view('frontend.banquet', compact('currentbanquet','sitesettings','banquet', 'meta_title', 'meta_keywords', 'meta_description', 'image', 'latest'));
  }
  
   public function banquetpage()
  {
   
    return view('frontend.banquetpage');
  }
  
}
