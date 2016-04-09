<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpeakersController extends Controller {

    public function index() {
        
        $nextEvent = App\Services\Data::getNextEvent ();
        
        $nextEventSpeakers = $nextEvent->speakers()->get()->toArray();
        
        foreach ($nextEventSpeakers as &$speaker) {
            $speaker = App\Services\Data::translate ($speaker);
        }
        // php e naspa...
        unset ($speaker);
        
        $previousEventsSpeakers = [];
        
        $previousEvents = App\Event::where('datetime', '<', $nextEvent->datetime)->get();
        
        foreach ($previousEvents as $event) {
            
            foreach ($event->speakers()->get()->toArray() as $speaker) {
                
                array_push ($previousEventsSpeakers, App\Services\Data::translate($speaker));
                
            }
            
        }
        //return $previousEventsSpeakers;
                
        $nextEvent['date'] = Carbon::parse($nextEvent['date'])->formatLocalized('%d %B %Y');

        return view('speakers')->with(compact([
            'nextEvent',
            'nextEventSpeakers',
            'previousEventsSpeakers',
        ]));
        
    }

}
