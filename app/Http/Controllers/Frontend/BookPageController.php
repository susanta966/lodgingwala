<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Booknow;
use App\Models\Seo;
use App\Models\SiteSetting;
use App\Models\Platform;
use Illuminate\Http\Request;

class BookPageController extends Controller
{
    public function index(){
        $booknow = Booknow::where('status',1)->orderBy('priority')->get();
         $sitesettings = SiteSetting::where('id', 1)->first();
          $seo = Seo::where('page_name','booknow')->first();
         //        dd($seo);
                 $meta_title=$seo->meta_title;
                 $meta_keywords=implode(",", json_decode($seo->meta_keywords));
                 $meta_description= $seo->meta_description;
                 $image = $seo->image;
                
        return view('frontend.book-now',compact('sitesettings','booknow','meta_title','meta_keywords','meta_description','image'));

    }
     public function getPlatformData(Request $request)
    {
        // Validate the incoming request to ensure 'id' is provided
        $request->validate([
            'id' => 'required|integer|exists:booknows,id'
        ]);

        // Fetch platform data based on booknow ID
        $platforms = Platform::where('book_now_id', $request->id)->get(['link', 'images']);

        // Return the data as a JSON response
        return response()->json(['data' => $platforms]);
    }
}
