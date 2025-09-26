<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.add');
    }

    public function store(Request $request)
    {
        // Validation rules and messages
        $rules = [
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'author' => 'required',
            'author_image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'publish_date' => 'required|date',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:blogs,priority',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blog = new Blog();

        // Handle images upload with priorities
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                // Generate image name
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Move the image to the appropriate folder
                $image->move(public_path('admin/blogImage'), $imageName);

                // Get the priority from the form
                $priority = $request->input("image_priorities.$index");

                // Store the image path and priority in the array
                $imageNames[] = [
                    'path' => $imageName,
                    'priority' => $priority,
                ];
            }
        }

        // Store the images and their priorities as a JSON string
        $blog->images = json_encode($imageNames);

        // Handle author image upload
        if ($request->hasFile('author_image')) {
            $authorImage = $request->file('author_image');
            $authorImageName = time() . '_' . uniqid() . '.' . $authorImage->getClientOriginalExtension();
            $authorImage->move(public_path('admin/blogImage'), $authorImageName);
            $blog->author_image = $authorImageName;
        }

        // Create a unique slug
        $slug = Str::slug($request->input('title'));
        while (Blog::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->input('title') . '-' . Str::random(5));
        }

        // Save blog details
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description = $request->input('description');
        $blog->author = $request->input('author');
        $blog->publish_date = $request->input('publish_date');
        $blog->status = $request->input('status');
        $blog->priority = $request->input('priority');
        $blog->slug = $slug;
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    public function edit(Blog $blog)
    {     
        // return $blog;
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        // Validation rules and messages
        $rules = [
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,jpg,png|max:5120',
            'author' => 'required',
            'author_image' => 'image|mimes:jpeg,jpg,png|max:5120',
            'publish_date' => 'required|date',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:blogs,priority,' . $blog->id,
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update images with path and priority
        $imageNames = $blog->images ? json_decode($blog->images, true) : [];

        // Handle uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('admin/blogImage'), $name);
                // Add the new image with default priority
                $imageNames[] = ['path' => $name, 'priority' => 0];
            }
        }

        // Handle updating priorities (if the user updated them)
        if ($request->has('image_priorities') && is_array($request->input('image_priorities'))) {
            foreach ($request->input('image_priorities') as $index => $priority) {
                if (isset($imageNames[$index])) {
                    $imageNames[$index]['priority'] = (int) $priority;
                }
            }
        }

        // Save the updated images data (with paths and priorities)
        $blog->images = json_encode($imageNames);

        // Update author image if provided
        if ($request->hasFile('author_image')) {
            $authorImage = $request->file('author_image');
            $authorImageName = time() . '_' . uniqid() . '.' . $authorImage->getClientOriginalExtension();
            $authorImage->move(public_path('admin/blogImage'), $authorImageName);
            $blog->author_image = $authorImageName;
        }

        // Update the slug if title changed
        if ($request->input('title') !== $blog->title) {
            $slug = Str::slug($request->input('title'));
            while (Blog::where('slug', $slug)->exists()) {
                $slug = Str::slug($request->input('title') . '-' . Str::random(5));
            }
            $blog->slug = $slug;
        }

        // Update other fields
        $blog->title = $request->input('title');
        $blog->short_description = $request->input('short_description');
        $blog->description = $request->input('description');
        $blog->author = $request->input('author');
        $blog->publish_date = $request->input('publish_date');
        $blog->status = $request->input('status');
        $blog->priority = $request->input('priority');
        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
    }

    public function destroyImage($id, $imageIndex = null)
    {
        $blog = Blog::find($id);

        if ($blog && $blog->images) {
            // Decode the JSON-encoded images into an array
            $images = json_decode($blog->images, true);

            // Check if the imageIndex exists in the array
            if (isset($imageIndex) && array_key_exists($imageIndex, $images)) {
                $image = $images[$imageIndex]; // Get the image at the specific index

                // Check if 'path' exists in the image array
                if (isset($image['path'])) {
                    $imagePath = public_path('admin/blogImage/' . $image['path']);

                    // If the image exists, delete it
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }

                    // Remove the image from the array
                    unset($images[$imageIndex]);
                    $images = array_values($images); // Re-index the array after removal

                    // Save the updated images back to the blog
                    $blog->images = json_encode($images);
                    $blog->save();

                    return redirect()->back()->with('success', 'Image deleted successfully');
                }
            }

            return redirect()->back()->with('error', 'Image not found');
        }

        return redirect()->back()->with('error', 'Blog not found');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->images) {
            // Decode the JSON-encoded images into an array
            $images = json_decode($blog->images, true);

            // Loop through each image and delete it
            foreach ($images as $image) {
                if (isset($image['path'])) {
                    $imagePath = public_path('admin/blogImage/' . $image['path']);

                    // If the image exists, delete it
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        }

        // Delete the author image if it exists
        if ($blog->author_image) {
            $authorImagePath = public_path('admin/blogImage/' . $blog->author_image);
            if (file_exists($authorImagePath)) {
                unlink($authorImagePath);
            }
        }

        // Finally, delete the blog
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }

    public function updateImageOrder(Request $request, $id)
    {
        //     return $request;
//     dd($id);
        $blog = Blog::find($id);

        if ($blog) {
            $newOrder = $request->input('order');
            $images = json_decode($blog->images);
            $reorderedImages = [];

            // Reorder the images based on the new order
            foreach ($newOrder as $index) {
                $reorderedImages[] = $images[$index];
            }

            // Update the database with the new image order
            $blog->images = json_encode($reorderedImages);
            $blog->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function updateImagePriority(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $images = json_decode($blog->images, true);

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

        $blog->images = json_encode($images);
        $blog->save();

        return response()->json(['success' => true]);
    }
}
