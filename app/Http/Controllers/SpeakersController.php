<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpeakersController extends Controller {

    public function index($id = null) {
        
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
        
        try {
            $currentSpeaker = $nextEvent->speakers()->find($id);
            if ($currentSpeaker == null)
                $currentSpeaker = $nextEvent->speakers()->first();
        }
        catch (Exception $ex) {
            $currentSpeaker = $nextEvent->speakers()->first();
        }
        //return $previousEventsSpeakers;
                
        $currentSpeaker = $currentSpeaker['description_'.App::getLocale()];
        $nextEvent['date'] = Carbon::parse($nextEvent['date'])->formatLocalized('%B %d, %Y');

        return view('speakers')->with(compact([
            'currentSpeaker',
            'nextEvent',
            'nextEventSpeakers',
            'previousEventsSpeakers',
        ]));
        
    }

}
