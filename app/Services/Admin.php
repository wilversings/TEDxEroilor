<?php namespace App\Services;

use Input;
use App;
use Config;

class Admin {
    
    static function getDisplayData ($entityName, $modelClass, $actions) {
        
        $lang = Input::get('lang', 'en');
        App::setLocale ($lang);
        
        $perPage = Input::get('perPage', 10);
        $page = Input::get('page', 1);
        
            
        $rawEvents = $modelClass::skip(($page - 1) * $perPage)->take($perPage)->get();
        $data = [];
        
        foreach ($rawEvents as $event) {
            
            $currentEvent = $event->toArray();
            array_push ($data, App\Services\Data::translate($currentEvent));
            
        }
        
        return [
            'entityName' => $entityName,
            'actions' => $actions,
            'dataCount' => $modelClass::count(),
            'data' => $data,
            'locale' => $lang,
            'perPage' => $perPage,
            'page' => $page,
        ];
        
    }
    
    static function assignValuesToForm ($model, $id, $configName) {
        
        $itemToModify = $model::find($id);
        if ($itemToModify == null)
            return null;
            
        $config = Config::get("form.$configName");
        $config['values'] = $itemToModify;
        
        return $config;
        
    }
    
    static function saveRequest ($model, $items) {
        
        if (isset($items['id'])) {
            $itemToModify = $model::find($items['id']);
            unset($items['id']);
        }
        else {
            $itemToModify = new $model;
        }
        unset ($items['_token']);
        
        foreach ($items as $name => $value) {
            $itemToModify[$name] = $value;
        }
        
        $itemToModify->save();
        
        return $itemToModify->id;
        
    }
    
    static function getNextEvent () {
        
        $nowDateTime = Carbon\Carbon::now('Europe/Bucharest');
        $nowTime = $nowDateTime->toTimeString();
        $nowDate = $nowDateTime->toDateString();
        
        $selectArray = [
            'type',
            'name_'.App::getLocale().' AS name',
            'description_'.App::getLocale().' AS description',
            'location_'.App::getLocale().' AS location',
            'time',
            'date'
        ];
        
        $currentDateEvents = App\Event
            ::select($selectArray)
            ->where('date', '=', $nowDate)
            ->where('time', '>=', $nowTime)
            ->orderBy('time', 'ASC');
                     
        if ($currentDateEvents->count() > 0) {
            
            $nextEvent = $currentDateEvents->first();
            
        }
        else {
            $nextEvent = App\Event
            ::select($selectArray)
            ->where('date', '>', $nowDate)
            ->orderBy('date', 'ASC')
            ->orderBy('time', 'ASC')
            ->first();
        }
        
        return $nextEvent;
        
    }
    
}