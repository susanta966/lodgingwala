<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index(){
       
          $enquiry = \App\Models\Contact::count();
        $room = \App\Models\Room::count();
        $blog = \App\Models\Blog::count(); 
        $booknow = \App\Models\Booknow::count();
          
        return view('admin.home', compact('enquiry','room','blog','booknow'));    
    }
    public function logout()
    {    Session::flush();
        Auth::logout();
        return redirect('admin/login')->with('success','Logout Successfully');
    }
}
