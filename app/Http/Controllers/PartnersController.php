<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;

class PartnersController extends Controller {

	public function index () {
        
        $partnershipTypes = App\PartnershipType::orderBy('priority_index', 'ASC')->get();
        $data = [];
        
        foreach ($partnershipTypes as $partnershipType) {
            
            $entry = App\Services\Data::translate($partnershipType->toArray());
            $entry['partners'] = $partnershipType->partners()->orderBy('priority_index', 'ASC')->get();
            //$partnershipType['partners'] = $partnershipType->partners()->get();
            array_push ($data, $entry);
            
        }
        return view('partners')->with([
            'data' => $data,
        ]);
        
    }

}
