<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Validator;
use Illuminate\Http\Request;
use Mail;

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
        
        $emailBody = "Ai un nou mesaj de contact <br><br>" .
                     "Nume: " . $newEntry->name . '<br>' .
                     "Email: " . $newEntry->email . '<br>' .
                     "Mesaj: " . $newEntry->message;
        
        Mail::raw($emailBody, function ($email) {
            $email->to(Config::get('contact_email'))->subject('TEDxEroilor: New contact entry'); 
        });
        
        return view('contact')->with ([
            'valMessage' => 'contact_entry_accepted'
        ]);
        
    }

}
