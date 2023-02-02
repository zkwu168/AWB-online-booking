<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Contact;
use Mail;

class ContactUsFormController extends Controller {

    // Create Contact Form
    public function createForm(Request $request) {
      return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
       $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',

            'subject'=>'required',
            'message' => 'required'
         ]); 

        //  Store data in database
         Contact::create($request->all());

 
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

}