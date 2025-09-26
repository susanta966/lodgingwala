<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Models\Amenitie;
use App\Models\Banquet;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanquetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banquets = Banquet::all();
        return view('admin.banquet.index', compact('banquets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenitie::where('status', 1)->get();
        return view('admin.banquet.add', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'short_description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:5000',
            'person' => 'required|max:255',
            'images.*' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'amenities' => 'required|array',
            'amenities.*' => 'exists:amenities,id',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:banquets,id', // should be unique for banquets, not amenities
        ];
    //   
//        return $request;
        $validator = Validator::make($request->all(), $rules);
         
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $banquet = new Banquet();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/banquetImages'), $imageName);
            $banquet->image = $imageName;
        }
        
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/banquetImages'), $imageName);

                // Get the priority from the form
                $priority = $request->input("image_priorities.$index", 0);

                // Store image details
                $imageNames[] = [
                    'path' => $imageName,
                    'priority' => (int) $priority,
                ];
            }
        }

        $banquet->images = json_encode($imageNames);

        $slug = Str::slug($request->input('name'));
        while (Banquet::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->input('name') . '-' . Str::random(5));
        }
        $banquet->slug = $slug;
        // $banquet->images = json_encode($imageNames);
        $banquet->name = $request->input('name');
        $banquet->person = $request->input('person');
        $banquet->short_description = $request->input('short_description');
        $banquet->status = $request->input('status');
        $banquet->priority = $request->input('priority');
        $banquet->amenities_id = json_encode($request->input('amenities')); // Corrected typo
        $banquet->save();

        return redirect()->route('banquets.index')->with('success', 'Banquet created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banquet $banquet)
    {
        // Retrieve amenities with status 1
        $amenities = DB::table('amenities')->where('status', 1)->get();

        // Decode amenities_id column as an array (from banquet model)
        $roomAmenities = $banquet->amenities_id ? json_decode($banquet->amenities_id) : [];

        return view('admin.banquet.edit', compact('banquet', 'amenities', 'roomAmenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banquet $banquet)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5000',
            'images.*' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'short_description' => 'required|string',
            'person' => 'required|max:255',
//            'short_description' => 'nullable|string|max:255',
            'amenities' => 'required|array',
            'amenities.*' => 'exists:amenities,id', // Ensure amenities are validated
        ]);

        // Handle the main image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/banquetImages'), $imageName);
            $banquet->image = $imageName;
        }

        // Handle additional images upload
        $imageNames = json_decode($banquet->images, true) ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('admin/banquetImages'), $name);
                    // $imageNames[] = $name;
                    $imageNames[] = [
                        'path' => $name,
                        'priority' => (int) count($imageNames)+1,
                    ];
                }
            }
        }
        if ($request->input('name') !== $banquet->name) {
            $slug = Str::slug($request->input('name'));
            while (Banquet::where('slug', $slug)->exists()) {
                $slug = Str::slug($request->input('name') . '-' . Str::random(5));
            }
            $banquet->slug = $slug;
        }


        $banquet->images = json_encode($imageNames);
        $banquet->name = $request->input('name');
        $banquet->short_description = $request->input('short_description');
        $banquet->person = $request->input('person');
        $banquet->short_description = $request->input('short_description');
        $banquet->status = $request->input('status');
        $banquet->priority = $request->input('priority');
        $banquet->amenities_id = json_encode($request->input('amenities'));
        $banquet->save();



        return redirect()->route('banquets.index')->with('success', 'Banquet updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banquet $banquet)
    {
        // Remove main image
//        if ($banquet->image && file_exists(public_path('admin/banquetImages/' . $banquet->image))) {
//            unlink(public_path('admin/banquetImages/' . $banquet->image));
//        }
//
//        // Remove additional images
//        if ($banquet->images) {
//            $images = json_decode($banquet->images);
//            foreach ($images as $image) {
//                if (file_exists(public_path('admin/banquetImages/' . $image))) {
//                    unlink(public_path('admin/banquetImages/' . $image));
//                }
//            }
//        }

        // Delete banquet and associated amenities
//        $banquet->amenities()->detach();
        $banquet->delete();

        return redirect()->route('banquets.index')->with('success', 'Banquet deleted successfully');
    }

    public function destroyImage($id, $imageIndex)
    {
        // return $imageIndex;
        // Find the Banquet instance by ID
        $banquet = Banquet::findOrFail($id);

        // Decode the images JSON
        $images = json_decode($banquet->images, true);
        // return $images ;

        if (!is_array($images)) {
            return response()->json(['success' => false, 'message' => 'Invalid image data'], 400);
        }
        if (!isset($images[$imageIndex])) {
            return response()->json(['success' => false, 'message' => 'Image not found'], 404);
        }
        $imagePath = public_path('admin/banquetImages/' . $images[$imageIndex]['path']);


        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
     
        // Remove the image from the array
        unset($images[$imageIndex]);
     
        // Re-index the array to avoid missing keys
        $images = array_values($images);
     
        // Save updated images back to the database
        $banquet->images = json_encode($images);
        $banquet->save();

        // return redirect()->route('banquets.index')->with('success', 'Image deleted successfully');
        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);

    }


    public function updateImageOrder(Request $request, $id)
    {
        //     return $request;
        //     dd($id); 
        $banquet = Banquet::find($id);

        if ($banquet) {
            $newOrder = $request->input('order');
            $images = json_decode($banquet->images);
            $reorderedImages = [];

            // Reorder the images based on the new order
            foreach ($newOrder as $index) {
                $reorderedImages[] = $images[$index];
            }

            // Update the database with the new image order
            $banquet->images = json_encode($reorderedImages);
            $banquet->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
     public function updateImagePriority(Request $request, $id)
    {
        $banquet = Banquet::findOrFail($id);
        $images = json_decode($banquet->images, true);

        foreach ($request->images as $imageData) {
            $index = (int) $imageData['index'];
            if (isset($images[$index])) {
                // Ensure each image is stored as an array with 'path' and 'priority'
                if (is_string($images[$index])) {
                    $images[$index] = ['path' => $images[$index], 'priority' => (int) $imageData['priority']];
                } else {
                    $images[$index]['priority'] = (int) $imageData['priority'];
                }
            }
        }

        // Sort images by priority before saving
        usort($images, fn($a, $b) => $a['priority'] <=> $b['priority']);

        $banquet->images = json_encode($images);
        $banquet->save();

        return response()->json(['success' => true]);
    }

}
