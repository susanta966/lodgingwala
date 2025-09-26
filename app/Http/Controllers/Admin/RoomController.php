<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Amenitie;
use App\Models\Room;
use App\Models\RoomImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.room.index', compact('rooms'));
    }

    public function create()
    {
        $amenities = Amenitie::where('status', 1)->get();
        return view('admin.room.add', compact('amenities'));
    }

    public function store(Request $request)
    {
        // Validation rules and messages
        $rules = [
            'name' => 'required|string|max:255',
          
            'short_description' => 'required|string|max:255',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'room_description_heading' => 'required|string|max:255',
            'room_description' => 'required',
            'amenities' => 'required|array',
            'amenities.*' => 'exists:amenities,id',
            'amenites_heading' => 'required|string|max:255',
            'house_rule' => 'required',
            'cancellation_rule' => 'required',
            'status' => 'required|in:1,0',
            'best_room' => 'required|in:1,0',
            'priority' => 'required|integer|unique:rooms,priority',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $room = new Room();

        // Handle images upload with priorities
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/roomImages'), $imageName);

                // Get the priority from the form
                $priority = $request->input("image_priorities.$index", 0);

                // Store image details
                $imageNames[] = [
                    'path' => $imageName,
                    'priority' => (int) $priority,
                ];
            }
        }

        // Store images as JSON
        $room->images = json_encode($imageNames);

        // Create a unique slug
        $slug = Str::slug($request->input('name'));
        while (Room::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->input('name') . '-' . Str::random(5));
        }

        // Save room details
        $room->name = $request->input('name');
        $room->slug = $slug;
      
        $room->short_description = $request->input('short_description');
        $room->room_description_heading = $request->input('room_description_heading');
        $room->room_description = $request->input('room_description');
        $room->amenites_heading = $request->input('amenites_heading');
        $room->amenites_id = json_encode($request->input('amenities'));
        $room->house_rule = $request->input('house_rule');
        $room->cancellation_rule = $request->input('cancellation_rule');
        $room->status = $request->input('status');
        $room->best_room = $request->input('best_room');
        $room->priority = $request->input('priority');
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }

    public function edit(Room $room)
    {
        $amenities = DB::table('amenities')->where('status', 1)->get();
        $roomAmenities = $room->amenites_id ? json_decode($room->amenites_id) : [];

        return view('admin.room.edit', compact('room', 'amenities', 'roomAmenities'));
    }

    public function update(Request $request, Room $room)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
           
            'short_description' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,jpg,png|max:5120',
            'room_description_heading' => 'required|string|max:255',
            'room_description' => 'required',
            'amenities' => 'required|array',
            'amenities.*' => 'exists:amenities,id',
            'amenites_heading' => 'required|string|max:255',
            'house_rule' => 'required',
            'cancellation_rule' => 'required',
            'status' => 'required|in:1,0',
            'best_room' => 'required|in:1,0',
            'priority' => 'required|integer|unique:rooms,priority,' . $room->id,
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update images
        $imageNames = $room->images ? json_decode($room->images, true) : [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/roomImages'), $imageName);

                // Default priority if not provided
                $priority = $request->input("image_priorities.$index", 0);

                // Store the new image
                $imageNames[] = [
                    'path' => $imageName,
                    'priority' => (int) $priority,
                ];
            }
        }

        // Handle updating image priorities
        if ($request->has('image_priorities') && is_array($request->input('image_priorities'))) {
            foreach ($request->input('image_priorities') as $index => $priority) {
                if (isset($imageNames[$index])) {
                    $imageNames[$index]['priority'] = (int) $priority;
                }
            }
        }

        // Save updated images
        $room->images = json_encode($imageNames);

        // Update slug if the name changed
        if ($request->input('name') !== $room->name) {
            $slug = Str::slug($request->input('name'));
            while (Room::where('slug', $slug)->exists()) {
                $slug = Str::slug($request->input('name') . '-' . Str::random(5));
            }
            $room->slug = $slug;
        }

        // Update other fields
        $room->name = $request->input('name');
      
        $room->short_description = $request->input('short_description');
        $room->room_description_heading = $request->input('room_description_heading');
        $room->room_description = $request->input('room_description');
        $room->amenites_heading = $request->input('amenites_heading');
        $room->amenites_id = json_encode($request->input('amenities'));
        $room->house_rule = $request->input('house_rule');
        $room->cancellation_rule = $request->input('cancellation_rule');
        $room->status = $request->input('status');
        $room->best_room = $request->input('best_room');
        $room->priority = $request->input('priority');
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }
    public function destroy(Room $room)
    {
        if ($room->images) {
            // Decode the JSON-encoded images into an array
            $images = json_decode($room->images, true);

            // Loop through each image and delete it
            foreach ($images as $image) {
                if (isset($image['path'])) {
                    $imagePath = public_path('admin/roomImages/' . $image['path']);

                    // If the image exists, delete it
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        }

        // Finally, delete the blog
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }

    public function destroyImage($id, $index)
    {
        $room = Room::findOrFail($id);

        // Decode JSON properly
        $images = json_decode($room->images, true);

        // Check if decoding failed
        if (!is_array($images)) {
            return response()->json(['success' => false, 'message' => 'Invalid image data'], 400);
        }

        // Validate if the index exists in the images array
        if (!isset($images[$index])) {
            return response()->json(['success' => false, 'message' => 'Image not found'], 404);
        }

        // Get image path safely
        $imagePath = public_path('admin/roomImages/' . $images[$index]['path']);

        // Delete file if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Remove the image from the array
        unset($images[$index]);

        // Re-index the array to avoid missing keys
        $images = array_values($images);

        // Save updated images back to the database
        $room->images = json_encode($images);
        $room->save();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
    }

    public function updateImagePriority(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $images = json_decode($room->images, true);

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

        $room->images = json_encode($images);
        $room->save();

        return response()->json(['success' => true]);
    }

    public function updateImageOrder(Request $request, $id)
    {
        //     return $request;
        //     dd($id);
        $room = Room::find($id);

        if ($room) {
            $newOrder = $request->input('order');
            $images = json_decode($room->images);
            $reorderedImages = [];

            // Reorder the images based on the new order
            foreach ($newOrder as $index) {
                $reorderedImages[] = $images[$index];
            }

            // Update the database with the new image order
            $room->images = json_encode($reorderedImages);
            $room->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


    public function show($id)
    {

        $data = Room::findOrFail($id);
        if (!empty($data)) {
            $roomimage = RoomImages::where('rooms_id', $data->id)->get();
        } else {
            $roomimage = [];
        }
        return view('admin.room.show', compact(
            'data',
            'roomimage'
        ));
    }
}
