<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;

class AboutController extends Controller {

    public function index () {
        
        return redirect()->action('AboutController@team');
        
    }
    
    public function team() {
        
        $teamMembers = App\TeamMember::all();
        
        $ans = [];
        
        foreach ($teamMembers as $tm) {
            array_push ($ans, App\Services\Data::translate($tm->toArray()));
        }
        
        return view('about')->with ([
            'entityName' => "teammember",
            'data' => $ans
        ]);
        
    }
    
    public function alumni() {
        
        $alumni = App\Alumna::all ();
        
        $ans = [];
        
        foreach ($alumni as $tm) {
            array_push ($ans, App\Services\Data::translate($tm->toArray()));
        }
        
        return view("about")->with([
            'entityName' => "alumna",
            'data' => $ans,
        ]);
        
    }
    
    public function boa() {
        
        $alumni = App\Adviser::all ();
        
        $ans = [];
        
        foreach ($alumni as $tm) {
            array_push ($ans, App\Services\Data::translate($tm->toArray()));
        }
        
        return view("about")->with([
            'entityName' => "adviser",
            'data' => $ans,
        ]);
        
    }

}
