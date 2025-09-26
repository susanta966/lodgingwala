<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;

use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
          
           $contact = Contact::whereNotNull('check_in')
                      ->whereNotNull('check_out')
                      ->orderBy('created_at', 'desc')
                      ->get();
        return view('admin.enquiry.index', 
        compact('contact')
    );

    }
public function contactindex()
{
    $contact = Contact::whereNull('check_in')
                      ->whereNull('check_out')
                      ->orderBy('created_at', 'desc')
                      ->get();
    return view('admin.contactform.index', compact('contact'));
}

    public function delete($id)
    {
         Contact::where('id', $id)->delete();
        return redirect()->route('admin.enquiry.index')->with('success', 'Deleted successfully.');
    }
}
