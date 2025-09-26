<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\RoomImages;
use App\Models\Room;

class RoomImagesController extends Controller
{

    protected $rooms;

    public function __construct()
    {
        $this->rooms = Room::all();
    }

    public function index()
    {
        $data = RoomImages::leftJoin('rooms', 'roomimages.rooms_id', '=', 'rooms.id')
            ->select('roomimages.*', 'rooms.name as rooms_name')
            ->get();
        return view('admin.room_images.index', [
            'data' => $data,
        ]);
    }
    public function create()
    {
        return view('admin.room_images.add', [
            'rooms' => $this->rooms,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rooms_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'priority' =>'required|numeric|unique:roomimages,priority,NULL,id,rooms_id,' . $request->rooms_id,
        ]);
        //    dd($request->all());
        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new RoomImages();
        $data->priority = $request->priority;
        $data->rooms_id = $request->rooms_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_1.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/roomimage'), $imageName);
            $data->image = $imageName;
        }

        // dd($request->all());
        $data->save();
        return redirect()->route('room-images.index')->with('success', 'Image added successfully');
    }

     public function edit($id)
     {
         $list = RoomImages::findOrFail($id);
         $rooms = Room::all();
         return view('admin.room_images.edit', [
             'list' => $list,
             'rooms' => $rooms,
         ]);
     }

     public function update(Request $request, $id)
     {
         $validator = Validator::make($request->all(), [
            'rooms_id' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'priority' =>'required|numeric|unique:roomimages,priority,NULL,id,rooms_id,' . $request->rooms_id,

         ]);

         if ($validator->fails()) {
//                         dd($validator->errors());
             return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
         }

         $data = RoomImages::findOrFail($id);
         $data->priority = $request->priority;
         $data->rooms_id = $request->rooms_id;
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = time() . '_1.' . $image->getClientOriginalExtension();
             $image->move(public_path('admin/roomimage'), $imageName);
             $data->image = $imageName;
         }
         $data->save();
        //   return $data;
         return redirect()->route('room-images.index')->with('success', 'Image updated successfully');
     }
}
