<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model {

	protected $table = "speakers";
    
    public function events () {
        
        return $this->belongsToMany('App\Event');
        
    }

}
