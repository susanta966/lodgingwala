<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = Home::get();
       
      
         return view('admin.home.index', compact('home'));
    }

    public function edit($id)
    {
        $home = Home::find($id);
        return view('admin.home.edit', compact('home'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
          
            'best_room_one_word' => 'nullable|string|max:255',
            'best_room_heading' => 'nullable|string|max:255',
            'best_room_title' => 'nullable|string|max:255',

            'banquet_one_word' => 'nullable|string|max:255',
            'banquet_heading' => 'nullable|string|max:255',
            'banquet_title' => 'nullable|string|max:255',

            'faciltie_one_word' => 'nullable|string|max:255',
            'faciltie_heading' => 'nullable|string|max:255',
            'faciltie_title' => 'nullable|string|max:255',

            'testimonial_one_word' => 'nullable|string|max:255',
            'testimonial_heading' => 'nullable|string|max:255',
            'testimonial_title' => 'nullable|string|max:255',

            'location_one_word' => 'nullable|string|max:255',
            'location_heading' => 'nullable|string|max:255',
            'location_title' => 'nullable|string|max:255',

            'blog_one_word' => 'nullable|string|max:255',
            'blog_heading' => 'nullable|string|max:255',
            'blog_title' => 'nullable|string|max:255',
        ]);

        // Redirect back if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

     

        // Update remaining fields
        $home->best_room_one_word = $request->input('best_room_one_word');
        $home->best_room_heading = $request->input('best_room_heading');
        $home->best_room_title = $request->input('best_room_title');

        $home->banquet_one_word = $request->input('banquet_one_word');
        $home->banquet_heading = $request->input('banquet_heading');
        $home->banquet_title = $request->input('banquet_title');

        $home->faciltie_one_word = $request->input('faciltie_one_word');
        $home->faciltie_heading = $request->input('faciltie_heading');
        $home->faciltie_title = $request->input('faciltie_title');

        $home->testimonial_one_word = $request->input('testimonial_one_word');
        $home->testimonial_heading = $request->input('testimonial_heading');
        $home->testimonial_title = $request->input('testimonial_title');

        $home->location_one_word = $request->input('location_one_word');
        $home->location_heading = $request->input('location_heading');
        $home->location_title = $request->input('location_title');

        $home->blog_one_word = $request->input('blog_one_word');
        $home->blog_heading = $request->input('blog_heading');
        $home->blog_title = $request->input('blog_title');

        $home->save();

        return redirect()->route('home.index')->with('success', 'Home updated successfully!');
    }
    public function popupIndex(){
        $popup = Home::get();
//      dd($popup);
        return view('admin.popup.index', compact('popup'));
    }
    public function popupedit($id)
    {
        $popup = Home::find($id);
        return view('admin.popup.edit', compact('popup'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function popupupdate(Request $request, $id)
{
    // Validation rules
    $rules = [
        'modal_heading' => 'required|string|max:255',
        'modal_heading_word' => 'nullable|string|max:255',
        'modal_heading_word_2' => 'nullable|string|max:255',
        'modal_description' => 'nullable|string',
        'modal_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
         'status' => 'required|in:1,0',
    ];

    // Custom error messages
    $messages = [
        'modal_heading.required' => 'The Popup heading field is required.',
        'modal_heading.string' => 'The Popup heading must be a valid string.',
        'modal_heading.max' => 'The Popup heading must not exceed 255 characters.',
        'modal_image.image' => 'The file must be an image.',
        'modal_image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
        'modal_image.max' => 'The image size must not exceed 2MB.',
    ];

    // Validation
    $validator = Validator::make($request->all(), $rules, $messages);

    // Redirect back if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the Home record
    $home = Home::find($id);

    // Update each field individually
    $home->modal_heading = $request->input('modal_heading');
    $home->modal_heading_word = $request->input('modal_heading_word');
    $home->modal_heading_word_2 = $request->input('modal_heading_word_2');
    $home->modal_description = $request->input('modal_description');
     $home->popup = $request->input('status');

    // Handle Modal Image
    if ($request->hasFile('modal_image') && $request->file('modal_image')->isValid()) {
        $imageName = time() . '_modal_' . uniqid() . '.' . $request->file('modal_image')->getClientOriginalExtension();
        $request->file('modal_image')->move(public_path('admin/homeImage'), $imageName);
        $home->modal_image = $imageName;
    }

    $home->save();

    return redirect()->route('admin.popup.index')->with('success', 'Popup updated successfully!');
}

}
