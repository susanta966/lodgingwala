<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::select('platforms.id', 'platforms.images', 'platforms.link', 'booknows.title')
            ->leftJoin('booknows', 'platforms.book_now_id', '=', 'booknows.id')
            ->get();

        return view('admin.platform.index', compact('platforms'));
    }

    public function create()
    {
        $booknow = \App\Models\Booknow::where('status', 1)->get();
        return view('admin.platform.create', compact('booknow'));
    }

    public function store(Request $request)
    {
        $rules = [
            'booknow' => 'required|exists:booknows,id',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5120',
            'link' => 'required|url',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $platform = new Platform();

        if ($request->hasFile('image')) {
            $platform->images = $this->uploadImage($request->file('image'));
        }

        $platform->book_now_id = $request->input('booknow');
        $platform->link = $request->input('link');
        $platform->save();

        return redirect()->route('platform.index')->with('success', 'Platform created successfully.');
    }

    public function edit($id)
    {
        $platform = Platform::findOrFail($id); // Ensure the record exists
        $booknow = \App\Models\Booknow::where('status', 1)->get();
        return view('admin.platform.edit', compact('platform', 'booknow'));
    }

    public function update(Request $request, $id)
    {
        $platform = Platform::findOrFail($id); // Ensure the record exists

        $rules = [
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'link' => 'required|url',
            'booknow' => 'required|exists:booknows,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $platform->images = $this->uploadImage($request->file('image'));
        }

        $platform->book_now_id = $request->input('booknow');
        $platform->link = $request->input('link');
        $platform->save();

        return redirect()->route('platform.index')->with('success', 'Platform updated successfully.');
    }

    public function destroy($id)
    {
        $platform = Platform::findOrFail($id); // Ensure the record exists
        $platform->delete();
        return redirect()->route('platform.index')->with('success', 'Platform deleted successfully.');
    }

    private function uploadImage($image)
    {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admin/platformImage'), $imageName);
        return $imageName;
    }
}
