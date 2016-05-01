<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Validator;
use Illuminate\Http\Request;
use Mail;
use Config;

class ContactController extends Controller {

    public function index () {
        return view('contact');
    }
    
    public function post (Request $request) {
        
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        
        $newEntry = new App\ContactFormEntry;
        
        $newEntry->name = $request->name;
        $newEntry->email = $request->email;
        $newEntry->message = $request->message;
        
        $newEntry->save();
        
        $emailBody = "Nume: " . $newEntry->name . '; ' .
                     "Email: " . $newEntry->email . '; ' .
                     "Mesaj: " . $newEntry->message . '; ';
        
        Mail::raw($emailBody, function ($email) {
            $email->to(Config::get('tedx.contact_email_to'))->subject('TEDxEroilor: New contact entry'); 
            $email->from(Config::get('tedx.contact_email_from'));
        });
        
        return view('contact')->with ([
            'valMessage' => 'contact_entry_accepted'
        ]);
        
    }

}
