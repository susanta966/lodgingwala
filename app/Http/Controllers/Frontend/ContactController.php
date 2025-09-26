<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\RegistrationNotification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {

    public function index() {
        $sitesetting = SiteSetting::find(1);
        $seo = Seo::where('page_name', 'contact')->first();
        //        dd($seo);
        $meta_title = $seo->meta_title;
        $meta_keywords = implode(",", json_decode($seo->meta_keywords));
        $meta_description = $seo->meta_description;
        $image = $seo->image;
        return view('frontend.contact', compact('sitesetting', 'meta_title', 'meta_keywords', 'meta_description', 'image'));
    }

    public function store(Request $request) {
        // Define the validation rules
        $rules = [
            'name' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
            'email' => ['required', 'email', 'regex:/^.+@.+\..+$/'],
            'phone' => ['required', 'numeric', 'regex:/^\d{10}$/', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
            'message' => ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'],
        ];

        // Add subject validation if exists
        if ($request->has('subject')) {
            $rules['subject'] = ['required', 'not_regex:/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i'];
        }

        // Add check-in/check-out validation
        if ($request->has('check_in') && $request->has('check_out')) {
            $rules['check_in'] = ['required', 'date'];
            $rules['check_out'] = ['required', 'date', function ($attribute, $value, $fail) use ($request) {
                    if (strtotime($value) < strtotime($request->input('check_in'))) {
                        $fail('Check-out date must be later than check-in date.');
                    }
                }];
        }


        // Define custom validation messages
        $messages = [
            'name.required' => 'Name is required.',
            'name.not_regex' => 'Name should not contain URLs.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.not_regex' => 'Email should not contain URLs.',
            'phone.required' => 'Phone number is required.',
            'phone.numeric' => 'Phone number should contain only numbers.',
            'phone.regex' => 'Phone number should be exactly 10 digits.',
            'phone.not_regex' => 'Phone number should not contain URLs.',
            'message.required' => 'Comments are required.',
            'message.not_regex' => 'Comments should not contain URLs.',
            'subject.required' => 'Subject is required if provided.',
            'check_in.required' => 'Check-in date is required.',
            'check_in.date' => 'Please enter a valid check-in date.',
            'check_out.required' => 'Check-out date is required.',
            'check_out.date' => 'Please enter a valid check-out date.',
        ];

        // Validator
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Store the contact data
        $data = new Contact();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->message = $request->input('message');

        // Handle check-in/check-out times
        if ($request->has('check_in') && $request->has('check_out')) {
            $data->check_in = Carbon::parse($request->input('check_in'));
            $data->check_out = Carbon::parse($request->input('check_out'));
        }

        // Handle subject if it exists
        if ($request->has('subject')) {
            $data->subject = $request->input('subject');
        }

//        Mail::to('sales.vizag@hotelrockdale.com')->send(new RegistrationNotification($data->toArray()));
        Mail::to('sales.vizag@hotelrockdale.com')
                ->bcc('reservations.vizag@hotelrockdale.com')
                ->send(new RegistrationNotification($data->toArray()));
        // Save the data
        $data->save();

        // Return success response
        return redirect()->back()->with('success', 'Thank you! We will get in touch with you soon.');
    }
}
