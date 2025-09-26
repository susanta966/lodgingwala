<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::get();
        return view('admin.facility.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facility.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|max:255', // Typo corrected here
             'icon' => 'required|image|mimes:jpeg,jpg,png|max:5120',
//            'icon' => 'required|max:255',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:facilities,priority',
        ]);

        $data = new Facility();
         if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
             $imageName = time() . '_' . uniqid() . '.' . $request->file('icon')->getClientOriginalExtension();
             $request->file('icon')->move(public_path('admin/facilityImages'), $imageName);
             $data->icon = $imageName;
         }

        $data->name = $request->input('name');
        $data->short_description = $request->input('short_description'); // Typo corrected here
//        $data->icon = $request->input('icon');
        $data->status = $request->input('status');
        $data->priority = $request->input('priority');
        $data->save();

        return redirect()->route('facility.index')->with('success', 'Facility Added Successfully');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facility.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required', // Typo corrected here
             'icon' => 'image|mimes:jpeg,jpg,png|max:2048',
//            'icon' => 'required|max:255',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:facilities,priority,' . $facility->id,
        ]);

         if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
             $imageName = time() . '_' . uniqid() . '.' . $request->file('icon')->getClientOriginalExtension();
             $request->file('icon')->move(public_path('admin/facilityImages'), $imageName);
             $facility->icon = $imageName;
         }

        $facility->name = $request->input('name');
        $facility->short_description = $request->input('short_description'); // Typo corrected here
//        $facility->icon = $request->input('icon');
        $facility->status = $request->input('status');
        $facility->priority = $request->input('priority');
        $facility->save(); // Save the updated data

        return redirect()->route('facility.index')->with('success', 'Facility Updated Successfully');
    }

    public function destroy(Facility $facility)
    {
        // Add code to delete facility, if necessary
        $facility->delete();

        return redirect()->route('facility.index')->with('success', 'Facility Deleted Successfully');
    }
}
