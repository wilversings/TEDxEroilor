<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index () {
        
        return view('admin.login');
        
    }
    
    public function login (Request $request) {
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('administration-dashboard/dashboard');
        }
        return redirect()->back()->withErrors("Access denied!");
        
    }
    
    public function logout () {
        
        Auth::logout();
        return redirect()->back();
        
    }
    
    public function dashboard () {
        
        return view('admin.dashboard');
        
    }

}
