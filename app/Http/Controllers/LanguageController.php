<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;

class LanguageController extends Controller {

	public function toggleLang () {
        
        if (Session::has('applocale') && Session::get('applocale') == "ro")
            Session::set('applocale', 'en');
        else 
            Session::set('applocale', 'ro');
            
        return redirect()->back();
        
    }

}
