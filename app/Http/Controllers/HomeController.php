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
	 
	private static function getFacebookLastPost () {
		
		$fbApiUrl = "https://graph.facebook.com/v2.6/TEDxEroilor/feed?limit=1&access_token=" .
		"EAADBb4mzn18BAIGZCTZCmK32ZCBV55R2TDXdiPkzI2g4wPm15jq4xbNU1ZAoZAZA1ZAKzoZALcYNZCKdTIrTqyvnpVp7ZBFG1deGknf1f0VVEihZCxD7GExDRTQjwf1lZApopKG1ebnR5ZCOikaEDZBgKtSeoKRLr0LObVUJ8ZD";
		
		return json_decode(file_get_contents($fbApiUrl));
		
	}
	 
	public function home() {
        
		//return HomeController::getFacebookLastPost();
		
		$fbPost = HomeController::getFacebookLastPost();
		
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
			'fbDate' => Carbon::parse($fbPost->data[0]->created_time)->formatLocalized('%d %B %Y'),
			'fbMessage' => $fbPost->data[0]->message
        ]);
        
	}

}
