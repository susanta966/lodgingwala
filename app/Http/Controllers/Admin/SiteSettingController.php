<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller {

    function index() {

        $sitesettings = SiteSetting::get();
        // return $state;
        return view('admin.siteSetting.index', compact('sitesettings'));
    }

    public function update(Request $request, $id) {
//return $request;
//exit();
        //    return $request;
        $request->validate([
            'site_title' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,jpg,png|max:5120',
            'favicon' => 'image|mimes:jpeg,jpg,png|max:5120',
            'ftlogo' => 'image|mimes:jpeg,jpg,png|max:5120',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'whatsapp' => 'required',
            'og_title' => 'required|string|max:255',
            'og_type' => 'required|string|max:255',
            'og_url' => 'required|string|max:255',
            'og_site_name' => 'required|string|max:255',
            'og_image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'og_width' => 'required|string|max:255',
            'og_height' => 'required|string|max:255',
            'og_description' => 'required',
            'twitter_card' => 'required|string|max:255',
            'twitter_title' => 'required|string|max:255',
            'twitter_image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'site_location' => 'required',
            'site_about' => 'required',
            'map_link' => 'required',
            'contact_title' => 'required|string|max:255',
            'about_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'room_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'roomdeatis_breadcome_imahe' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'blogs_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'ourblogs_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'contact_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'review_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'banquet_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'book_now_breadcome_image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
        ]);

        $data = SiteSetting::find($id);

        if ($request->hasFile('logo')) {
            $img_extension = $request->file('logo')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('logo')->move(public_path('admin/siteImage/logo'), $name);
            $data->logo = $name;
        }
        if ($request->hasFile('favicon')) {
            $img_extension = $request->file('favicon')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('favicon')->move(public_path('admin/siteImage/favicon'), $name);
            $data->favicon = $name;
        }
        if ($request->hasFile('ftlogo')) {
            $img_extension = $request->file('ftlogo')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('ftlogo')->move(public_path('admin/siteImage/ftlogo'), $name);
            $data->ftlogo = $name;
        }
        if ($request->hasFile('og_image')) {
            $img_extension = $request->file('og_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('og_image')->move(public_path('admin/siteImage/og-image'), $name);
            $data->og_image = $name;
        }
        if ($request->hasFile('twitter_image')) {
            $img_extension = $request->file('twitter_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('twitter_image')->move(public_path('admin/siteImage/twitter-image'), $name);
            $data->twitter_image = $name;
        }
        if ($request->hasFile('about_breadcome_image')) {
            $img_extension = $request->file('about_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('about_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->about_breadcome_image = $name;
        }
        if ($request->hasFile('room_breadcome_image')) {
            $img_extension = $request->file('room_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('room_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->room_breadcome_image = $name;
        }
        if ($request->hasFile('roomdeatis_breadcome_imahe')) {
            $img_extension = $request->file('roomdeatis_breadcome_imahe')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('roomdeatis_breadcome_imahe')->move(public_path('admin/siteImage/'), $name);
            $data->roomdeatis_breadcome_imahe = $name;
        }
        if ($request->hasFile('blogs_breadcome_image')) {
            $img_extension = $request->file('blogs_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('blogs_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->blogs_breadcome_image = $name;
        }
        if ($request->hasFile('ourblogs_breadcome_image')) {
            $img_extension = $request->file('ourblogs_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('ourblogs_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->ourblogs_breadcome_image = $name;
        }
        if ($request->hasFile('contact_breadcome_image')) {
            $img_extension = $request->file('contact_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('contact_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->contact_breadcome_image = $name;
        }
        if ($request->hasFile('review_breadcome_image')) {
            $img_extension = $request->file('review_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('review_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->review_breadcome_image = $name;
        }
        if ($request->hasFile('banquet_breadcome_image')) {
            $img_extension = $request->file('banquet_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('banquet_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->banquet_breadcome_image = $name;
        }
         if ($request->hasFile('book_now_breadcome_image')) {
            $img_extension = $request->file('book_now_breadcome_image')->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $request->file('book_now_breadcome_image')->move(public_path('admin/siteImage/'), $name);
            $data->book_now_breadcome_image = $name;
        }

        $data->site_title = $request->input('site_title');
        $data->address = $request->input('address');
        $data->email = $request->input('email');

        $data->phone = $request->input('phone');
        $data->whatsapp = $request->input('whatsapp');

        $data->instagram = $request->input('instagram');
        $data->facebook = $request->input('facebook');
        $data->twitter = $request->input('twitter');

        $data->og_title = $request->input('og_title');
        $data->og_type = $request->input('og_type');
        $data->og_url = $request->input('og_url');
        $data->og_site_name = $request->input('og_site_name');
        $data->og_width = $request->input('og_width');
        $data->og_height = $request->input('og_height');
        $data->twitter_card = $request->input('twitter_card');
        $data->twitter_title = $request->input('twitter_title');
        $data->site_about = $request->input('site_about');
        $data->site_location = $request->input('site_location');
        $data->map_link = $request->input('map_link');
        $data->contact_title = $request->input('contact_title');
        $data->save();

        return redirect()->route('sitesettings.index')
                        ->with('success', 'Updated Successfully.');
    }

    public function edit($id) {
        $sitesettings = SiteSetting::findOrFail($id);
        return view('admin.siteSetting.edit', compact('sitesettings'));
    }
}
