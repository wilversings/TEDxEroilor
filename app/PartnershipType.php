<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnershipType extends Model {

	protected $table = "partnership_types";
    
    public function partners () {
        
        return $this->hasMany('App\Partner', 'partnershipType_id');
        
    }

}
