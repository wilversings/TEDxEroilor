<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model {

	protected $table = "partners";

    public function type() {
        
        return $this->belongsTo('App\PartnershipType', 'partnershipType_id');
        
    }

}
