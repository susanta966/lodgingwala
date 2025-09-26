<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function index()
    {
        $slider= Slider::get();
        return view('admin.slider.index', compact('slider'));
    }

        public function create()
    {
        return view('admin.slider.add');     
    }

   
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'heading' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:5120',
             'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:sliders,priority',
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
                $slider = new Slider();
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('admin/sliderImage'), $imageName);
                    $slider->image = $imageName;
                }
                $slider->title = $request->input('title');
                $slider->heading = $request->input('heading');
               
                $slider->status = $request->input('status');
                $slider->priority = $request->input('priority');
                $slider->save();
                return redirect()->route('sliders.index')->with('success', 'Slider added successfully');

    }

    
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $rules = [
            'title' => 'required',
            'heading' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif|max:5120',
            
            'status' => 'required|in:1,0',
            'priority' => 'required|integer|unique:sliders,priority,' . $slider->id,
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
                    return redirect()->back()->withErrors($validator)->withInput();
                    }
                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $imageName = time() . '_' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('admin/sliderImage'), $imageName);
                        $slider->image = $imageName;
                    }
                    $slider->title = $request->input('title');
                    $slider->heading = $request->input('heading');
                   
                    $slider->status = $request->input('status');
                    $slider->priority = $request->input('priority');
                    $slider->save();
                    return redirect()->route('sliders.index')->with('success', 'Slider updated successfully');
    }

   
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully');
    }
}
