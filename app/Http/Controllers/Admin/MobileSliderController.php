<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\MobileSlider;
use Illuminate\Http\Request;

class MobileSliderController extends Controller
{

    public function index()
    {
        $slider = MobileSlider::get();
        return view('admin.mobile_silder.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.mobile_silder.add');
    }


    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'heading' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:5120',
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:mobile_slider,priority',
        ];
        $messages = [
            'title.required' => 'Please enter title',
            'heading.required' => 'Please enter heading',
            'image.required' => 'Please select image',
            'image.mimes' => 'Please select valid image',
            'image.max' => 'Image size should not be greater than 5MB',

            'status.required' => 'Status is required',
            'status.in' => 'Status must be 1 or 0',
            'priority.required' => 'Priority is required',
            'priority.integer' => 'Priority must be an integer',
            'priority.unique' => 'Priority already exists',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider = new MobileSlider();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/mobilesilder'), $imageName);
            $slider->image = $imageName;
        }
        $slider->title = $request->input('title');
        $slider->heading = $request->input('heading');

        $slider->status = $request->input('status');
        $slider->priority = $request->input('priority');
        $slider->save();
        return redirect()->route('mobile-slider.index')->with('success', 'Mobile Slider added successfully');
    }


    public function edit($id)
    {
        $slider = MobileSlider::findOrFail($id);
        return view('admin.mobile_silder.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'heading' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif|max:5120',

            'status' => 'required|in:1,0',
            'priority' => 'required|integer',
        ];
        $messages = [
            'title.required' => 'Please enter title',
            'heading.required' => 'Please enter heading',
            'image.mimes' => 'Please select valid image',
            'image.max' => 'Image size should not be greater than 5MB',

            'status.required' => 'Status is required',
            'status.in' => 'Status must be 1 or 0',
            'priority.required' => 'Priority is required',
            'priority.integer' => 'Priority must be an integer',
            'priority.unique' => 'Priority already exists',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            //  dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $slider =  MobileSlider::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/mobilesilder'), $imageName);
            $slider->image = $imageName;
        }
        $slider->title = $request->input('title');
        $slider->heading = $request->input('heading');

        $slider->status = $request->input('status');
        $slider->priority = $request->input('priority');
        $slider->save();
        return redirect()->route('mobile-slider.index')->with('success', 'Mobile Slider updated successfully');
    }


    public function destroy($id)
    {
        MobileSlider::destroy($id);
        return redirect()->route('mobile-slider.index')->with('success', 'Mobile Slider deleted successfully');
    }
}
