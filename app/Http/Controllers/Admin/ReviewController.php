<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
        public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

       public function edit(Review $review)
    {
        return view('admin.review.edit', compact('review'));
    }

   
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'heading' => 'required|max:255',
            'title' => 'required|max:255', 
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:5120',
            'link' => 'required|max:255',
        ]);

       
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/reviewImages'), $imageName);
            $review->image = $imageName;
        }

        $review->heading = $request->input('heading');
        $review->title = $request->input('title'); 
        $review->link = $request->input('link');
        $review->save();
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully');
    
    }

   
}
