<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.location.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.location.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'distance' => 'required|string|max:255',
            'time' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120'
        ];

        $messages = [
            'name.required' => 'Please enter location name',
            'distance.required' => 'Please enter distance',
            'time.required' => 'Please enter time',
            'image.required' => 'Please upload an image',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a jpeg, jpg, or png',
            'image.max' => 'The image size must be under 5MB',
        ];

        $this->validate($request, $rules, $messages);

        $location = new Location();
        $location->name = $request->input('name');
        $location->distance = $request->input('distance');
        $location->time = $request->input('time');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/locationImage'), $imageName);
            $location->image = $imageName;
        }

        $location->save();

        return redirect()->route('locations.index')->with('success', 'Location added successfully.');
    }

    // public function show(Location $location)
    // {
    //     return view('admin.locations.show', compact('location'));
    // }

    public function edit(Location $location)
    {
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'distance' => 'required|string|max:255',
            'time' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:5120'
        ];

        $messages = [
            'name.required' => 'Please enter location name',
            'distance.required' => 'Please enter distance',
            'time.required' => 'Please enter time',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a jpeg, jpg, or png',
            'image.max' => 'The image size must be under 5MB',
        ];

        $this->validate($request, $rules, $messages);

        $location->name = $request->input('name');
        $location->distance = $request->input('distance');
        $location->time = $request->input('time');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('admin/locationImage'), $imageName);
            $location->image = $imageName;
        }

        $location->save();

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
