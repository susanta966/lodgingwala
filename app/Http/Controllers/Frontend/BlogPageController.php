<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\Blog;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index()
    {
        $blog = Blog::where('status', 1)->get();
        $seo = Seo::where('page_name', 'blog')->first();
        //        dd($seo);
//         $sitesettings = SiteSetting::where('id', 1)->first();
        $meta_title = $seo->meta_title;
        $meta_keywords = implode(",", json_decode($seo->meta_keywords));
        $meta_description = $seo->meta_description;
        $image = $seo->image;
        $sitesettings = SiteSetting::find(1);
        return view('frontend.blog', compact('blog', 'sitesettings', 'meta_title', 'meta_keywords', 'meta_description', 'image'));
    }
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $currentblog = Blog::where('slug', $slug)->firstOrFail();
        if ($blog) {
            $latest = Blog::where('status', 1)->latest()->take(5)->get();
            $seo = Seo::where('page_name', 'blog-details')->first();
            //        dd($seo);
            $meta_title = $seo->meta_title;
            $meta_keywords = implode(",", json_decode($seo->meta_keywords));
            $meta_description = $seo->meta_description;
            $image = $seo->image;
            $sitesettings = SiteSetting::find(1);
            return view('frontend.blog-details', compact('currentblog','blog', 'latest', 'sitesettings', 'meta_title', 'meta_keywords', 'meta_description', 'image'));
        } else {
            abort(404);

        }

    }
}
