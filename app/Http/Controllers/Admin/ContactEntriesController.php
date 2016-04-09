<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Input;
use Illuminate\Http\Request;

class ContactEntriesController extends Controller {

    public function get () {
        
        $perPage = Input::get('perPage', 10);
        $page = Input::get('page', 1);

        return view("admin.display")->with ([
            'data' => App\ContactFormEntry::take($perPage)
                                                ->skip($perPage * ($page - 1))
                                                ->get()
                                                ->toArray(),
            'entityName' => "Contact form entry",
            'perPage' => $perPage,
            'page' => $page,
            'dataCount' => App\ContactFormEntry::count(),
            'actions' => ['delete', 'edit'],
        ]);
        
    }


}
