<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnershipType extends Model {

	protected $table = "partnershipTypes";
    
    public function partners () {
        
        return $this->hasMany('App\Partner', 'partnershipType_id');
        
    }

}
