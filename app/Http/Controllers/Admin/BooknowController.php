<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booknow;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BooknowController extends Controller
{
    public function index()
    {
        $booknows = Booknow::get();
        return view('admin.booknow.index', compact('booknows'));
    }

    public function create()
    {
        return view('admin.booknow.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            //'heading' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
//            'platform_images' => 'nullable|array',
//            'platform_images.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'phone' => 'required',
            'email_1' => 'required|email',
            'email_2' => 'nullable|email',
            'status' => 'required|in:1,0',
//            'link' => 'nullable|array',
//            'link.*' => 'nullable|url',
            'priority' => 'required|integer|unique:booknows,priority',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Custom validation to ensure links are provided for each platform image
//       $validator->after(function ($validator) use ($request) {
//    if ($request->hasFile('platform_images') && is_array($request->file('platform_images'))) {
//        foreach ($request->file('platform_images') as $index => $image) {
//            if ($image->isValid() && empty($request->input('link')[$index])) {
//                $validator->errors()->add('link.' . $index, 'A link is required for each platform image.');
//            }
//        }
//    }

    // Check if the 'link' field has no image
//    if ($request->has('link') && is_array($request->input('link'))) {
//        foreach ($request->input('link') as $index => $link) {
//            // If there's a link but no corresponding image
//            if (empty($request->file('platform_images')[$index])) {
//                $validator->errors()->add('platform_images.' . $index, 'An image is required for each link.');
//            }
//        }
//    }
//});


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $booknow = new Booknow();

        // Handle main image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/booknowImages'), $imageName);
            $booknow->image = $imageName;
        }

        // Save other details
        $booknow->title = $request->input('title');
       // $booknow->heading = $request->input('heading');
        $booknow->phone = $request->input('phone');
        $booknow->email_1 = $request->input('email_1');
        $booknow->email_2 = $request->input('email_2');
        $booknow->status = $request->input('status');
        $booknow->priority = $request->input('priority');
        $booknow->save();

        // Save platform links with corresponding images
//        $links = $request->input('link', []);
//        if ($request->hasFile('platform_images')) {
//            foreach ($request->file('platform_images') as $index => $image) {
//                if ($image->isValid() && isset($links[$index])) {
//                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path('admin/platformImage'), $imageName);
//
//                    $platform = new Platform();
//                    $platform->book_now_id = $booknow->id;
//                    $platform->link = $links[$index];
//                    $platform->images = $imageName;
//                    $platform->save();
//                }
//            }
//        }

        return redirect()->route('booknow.index')->with('success', 'Booking created successfully');
    }

    public function edit(Booknow $booknow)
    {
        return view('admin.booknow.edit', compact('booknow'));
    }

    public function update(Request $request, Booknow $booknow)
    {
       $rules = [
    'title' => 'required|string|max:255',
    //'heading' => 'required|string|max:255',
    'image' => 'image|mimes:jpeg,jpg,png|max:2048',
//    'platform_images.*' => 'image|mimes:jpeg,jpg,png|max:2048',
    'phone' => 'required',
    'email_1' => 'required|email',
    'email_2' => 'nullable|email',
    'status' => 'required|in:1,0',
    'priority' => 'required|integer|unique:booknows,priority,' . $booknow->id,
//    'link.*' => 'nullable|url', // Make the link field nullable and validate URL
];

    
        $validator = Validator::make($request->all(), $rules);
    
        // Custom validation to ensure links are provided for each platform image
//       $validator->after(function ($validator) use ($request) {
//    if ($request->hasFile('platform_images') && is_array($request->file('platform_images'))) {
//        foreach ($request->file('platform_images') as $index => $image) {
//            if ($image->isValid() && empty($request->input('link')[$index])) {
//                $validator->errors()->add('link.' . $index, 'A link is required for each platform image.');
//            }
//        }
//    }

    // Check if the 'link' field has no image
//    if ($request->has('link') && is_array($request->input('link'))) {
//        foreach ($request->input('link') as $index => $link) {
//            // If there's a link but no corresponding image
//            if (empty($request->file('platform_images')[$index])) {
//                $validator->errors()->add('platform_images.' . $index, 'An image is required for each link.');
//            }
//        }
//    }
//});

    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Update main image if provided
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/booknowImages'), $imageName);
            $booknow->image = $imageName;
        }
    
        // Update other details
        $booknow->title = $request->input('title');
       // $booknow->heading = $request->input('heading');
        $booknow->phone = $request->input('phone');
        $booknow->email_1 = $request->input('email_1');
        $booknow->email_2 = $request->input('email_2');
        $booknow->status = $request->input('status');
        $booknow->priority = $request->input('priority');
        $booknow->save();
    
        // Handle platform images update
//        $links = $request->input('link', []);
//        if ($request->hasFile('platform_images')) {
//            foreach ($request->file('platform_images') as $index => $image) {
//                if ($image->isValid() && isset($links[$index])) {
//                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
//                    $image->move(public_path('admin/platformImage'), $imageName);
//    
//                    $platform = new Platform();
//                    $platform->book_now_id = $booknow->id;
//                    $platform->link = $links[$index];
//                    $platform->images = $imageName;
//                    $platform->save();
//                }
//            }
//        }
    
        return redirect()->route('booknow.index')->with('success', 'Booking updated successfully');
    }
    

    public function destroy(Booknow $booknow)
    {
        // Delete related platform images and links
        Platform::where('book_now_id', $booknow->id)->delete();

        // Delete main image
        if ($booknow->image) {
            $imagePath = public_path('admin/booknowImages/' . $booknow->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete platform images (if any)
        if ($booknow->platform_images) {
            $images = json_decode($booknow->platform_images, true);
            foreach ($images as $image) {
                $imagePath = public_path('admin/platformImage/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Delete the Booknow record
        $booknow->delete();

        return redirect()->route('booknow.index')->with('success', 'Booking and related platforms deleted successfully');
    }
   
}
