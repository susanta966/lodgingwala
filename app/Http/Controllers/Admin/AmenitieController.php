<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenitie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AmenitieController extends Controller
{
    public function index()
    {
        $amenities = Amenitie::all();
        return view('admin.amenities.index', compact('amenities'));
    }

    public function create()
    {
        return view('admin.amenities.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,jpg,png,gif|max:5000',
            'status' => 'required|boolean',
        ]);

        $amenitie = new Amenitie();
        $amenitie->name = $request->input('name');

         if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path('admin/amenityImage'), $imageName);
            $amenitie->icon = $imageName;
        }


        $amenitie->status = $request->input('status');
        $amenitie->save();

        return redirect()->route('amenities.index')->with('success', 'Amenitie created successfully');
    }

    public function edit($id)
    {
        $amenitie = Amenitie::find($id);
        return view('admin.amenities.edit', compact('amenitie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5000',
            'status' => 'required|boolean',
        ]);
        $amenitie = Amenitie::find($id);
        $amenitie->name = $request->input('name');

         if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $imageName = time() . '_' . uniqid() . '.' . $request->file('icon')->getClientOriginalExtension();
            $request->file('icon')->move(public_path('admin/amenityImage'), $imageName);
            $amenitie->icon = $imageName;
        }


        $amenitie->status = $request->input('status');
        $amenitie->save();

        return redirect()->route('amenities.index')->with('success', 'Amenitie updated successfully');
    }

    public function destroy($id)
    {
        Amenitie::find($id)->delete();
        return redirect()->route('amenities.index')->with('success', 'Amenitie deleted successfully');
    }
}
