<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
   
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

  

  
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'one_word' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'year_of_exprience' => 'required|string|max:255',
            'year_of_exprience_title' => 'required|string|max:255',
            'testimonials_word' => 'required|string|max:255',
            'testimonials_heading' => 'required|string|max:255',
            'testimonials_short_description' => 'required|string|max:255',
            'facilties_word' => 'required|string|max:255',
            'facilties_heading' => 'required|string|max:255',
            'facilties_short_description' => 'required|string|max:255',
        ]);

        $about->title = $request->input('title');
        $about->heading = $request->input('heading');
          $about->one_word = $request->input('one_word');
        $about->description = $request->input('description');
        $about->year_of_exprience = $request->input('year_of_exprience');
        $about->year_of_exprience_title = $request->input('year_of_exprience_title');
        $about->testimonials_word = $request->input('testimonials_word');
        $about->testimonials_heading = $request->input('testimonials_heading');
        $about->testimonials_short_description = $request->input('testimonials_short_description');
        $about->facilties_word = $request->input('facilties_word');
        $about->facilties_heading = $request->input('facilties_heading');
        $about->facilties_short_description = $request->input('facilties_short_description');

        // Handle image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/aboutImages'), $imageName);
            $about->image = $imageName;
        }

        $about->save();

        return redirect()->route('abouts.index')->with('success', 'About section updated successfully.');
    }
}
