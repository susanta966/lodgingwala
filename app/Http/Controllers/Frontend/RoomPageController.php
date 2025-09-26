<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Seo;
use App\Models\SiteSetting;
use App\Models\RoomImages;

class RoomPageController extends Controller
{
    public function index(){
        $room = Room::where('status',1)->orderBy('priority', 'ASC')->get();
         $sitesettings = SiteSetting::where('id', 1)->first();
          $seo = Seo::where('page_name','room')->first();
         //        dd($seo);
                 $meta_title=$seo->meta_title;
                 $meta_keywords=implode(",", json_decode($seo->meta_keywords));
                 $meta_description= $seo->meta_description;
                 $image = $seo->image;
        return view('frontend.room',compact('sitesettings','room','meta_title','meta_keywords','meta_description','image'));
    }

    public function show($slug)
    {
        $room = Room::where('slug', $slug)->first();
          $currentRoom = Room::where('slug', $slug)->firstOrFail();
          $sitesettings = SiteSetting::where('id', 1)->first();
//         return $room;
        if ($room) {
            $latest = Room::where('status', 1)->latest()->take(5)->get();
            $seo = Seo::where('page_name', 'room-details')->first();
            $meta_title = $seo->meta_title;
            $meta_keywords = implode(",", json_decode($seo->meta_keywords));
            $meta_description = $seo->meta_description;
            $image = $seo->image;
            $sitesettings = SiteSetting::find(1);
            $room->latest_images = RoomImages::where('rooms_id', $room->id)->orderBy('priority', 'ASC')->pluck('image');
            return view('frontend.room-details', compact('currentRoom','sitesettings','room', 'latest', 'meta_title', 'meta_keywords', 'meta_description', 'image','sitesettings'));
        } else {
            abort(404);
        }
    }
}
