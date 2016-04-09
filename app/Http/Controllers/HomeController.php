<?php namespace App\Http\Controllers;

use App;
use Carbon\Carbon;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/*public function __construct()
	{
        $this->middleware('auth');
	}*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function home() {
        
        $nowDateTime = Carbon::now('Europe/Bucharest');
        $nowTime = $nowDateTime->toTimeString();
        $nowDate = $nowDateTime->toDateString();
        
        $nextEvent = App\Services\Data::getNextEvent();

        $time = (new Carbon ($nextEvent->time))->format("g:i A");
        $date = (new Carbon ($nextEvent->date))->formatLocalized("%d %B, %Y");
        $eventDateTime = $nextEvent->date." ".$nextEvent->time;

        $daysLeft = $nowDateTime->diffInDays(new Carbon ($eventDateTime));
        $hoursLeft = $nowDateTime->diffInHours(new Carbon ($eventDateTime)) - 24 * $daysLeft;

		return view('home')->with([
            'time' => $time,
            'date' => $date,
            'daysLeft' => $daysLeft,
            'hoursLeft' => $hoursLeft,
            'event' => $nextEvent,
        ]);
        
	}

}
