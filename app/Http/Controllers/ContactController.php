<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Validator;
use Illuminate\Http\Request;

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
        
        return redirect()->back();
        
    }

}
