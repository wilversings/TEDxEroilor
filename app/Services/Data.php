<?php namespace App\Services;

use Carbon\Carbon;
use Input;
use App;

class Data {
    
        static function excerpt($text, $wordCount) {
            
            $words = explode (' ', $text, $wordCount);
            return implode (' ', array_slice ($words, 0, count ($words) - 1)) . "...";
            
        }
    
        static function getNextEvent () {
        
        $nowDateTime = Carbon::now('Europe/Bucharest');
        $nowTime = $nowDateTime->toTimeString();
        $nowDate = $nowDateTime->toDateString();
        
        
        $selectArray = [
            'id',
            'type',
            'name_'.App::getLocale().' AS name',
            'description_'.App::getLocale().' AS description',
            'location_'.App::getLocale().' AS location',
            'datetime',
        ];
        
        $nextEvent = App\Event
            ::select($selectArray)
            ->where('datetime', '>=', $nowDateTime)
            ->orderBy('datetime', 'ASC')
            ->first();
        
        $nextEvent['date'] = substr ($nextEvent['datetime'], 0, 10);
        $nextEvent['time'] = substr ($nextEvent['datetime'], 11);
        
        return $nextEvent;
        
    }
    
    static function translate ($item) {
        
        $langs = ['en', 'ro'];
        $lang = App::getLocale();
       
        $translated = [];
       
        foreach ($item as $name => $value) {
            
            $_name = explode("_", $name);
            if (in_array(end($_name), $langs) && end($_name) == $lang) {
                $translated[join('_', array_slice($_name, 0, count($_name) - 1))] = $value;
            }
            elseif(!in_array($_name[count($_name) - 1], $langs)) {
                $translated[$name] = $value;
            }
        }
        
        return $translated;
       
    }
    
}