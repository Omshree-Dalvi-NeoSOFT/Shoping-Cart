<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // display contact page
    public function contactUs(){
        try{
            $contacts = ContactUs::paginate(5)->all();
            return view('contact.showcontact',compact('contacts'));
        }
        catch(\Exception $e){
            return view('contact.contactnotfound');
        }
    }
}
