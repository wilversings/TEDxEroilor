<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use App;
use Config;
use Illuminate\Http\Request;
use Services;

class AdminController extends Controller {

    public function __construct () {
        
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('guest', ['only' => 'index']);
        
    }

    public function index () {
        
        return view('admin.login');
        
    }
    
    public function login (Request $request) {
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/administration-dashboard/dashboard');
        }
        return redirect()->back()->withErrors("Access denied!");
        
    }
    
    public function logout () {
        
        Auth::logout();
        return redirect()->back();
        
    }
    
    public function dashboard () {
        
        return view('admin.dashboard');
        
    }
    
    /* Contact entries */
    
    public function displayContactEntries () {
        
        return view("admin.display")->with(App\Services\Admin::getDisplayData(
            'Contact entry',
            App\ContactFormEntry::class, 
            ['delete']
        ));
        
    }
    
    public function deleteContactEntries($id) {
        App\ContactFormEntry::destroy($id);
        return redirect()->back();
    }
    
    /* Events */
    
    public function displayEvents() {
        
        return view("admin.display")->with(App\Services\Admin::getDisplayData(
            'event',
            App\Event::class, 
            ['edit', 'delete']
        ));
        
    }
    public function addEvents() {
        return view('admin.modify')->with (Config::get("form.events"));
    }
    
    public function deleteEvents($id) {
        App\Event::destroy($id);
        return redirect()->back();
    }
    
    public function modifyEvents (Request $request) {
        
        $fields = $request->all();
        $fields['location_ro'] = str_replace (PHP_EOL, '\\', $fields['location_ro']);
        $fields['location_en'] = str_replace (PHP_EOL, '\\', $fields['location_en']);
        
        $fields['datetime'] = $fields['date'].' '.$fields['time'];
        unset($fields['date']);
        unset($fields['time']);
        
        unset ($fields['map_image']);
        $id = App\Services\Admin::saveRequest(App\Event::class, $fields);
        if (Input::hasFile('map_image')) {
            Input::file('map_image')->move("events_img", $id);
        }
        
        return redirect()->back();
        
    }
    
    public function editEvents($Id) {
       
        $itemToModify = App\Event::find($Id);
        
        if ($itemToModify == null) {
            return redirect()->back()->withErrors("There is no item with $Id id in the database");
        }
        
        $config = Config::get("form.events");
        
        $itemToModify['date'] = substr($itemToModify['datetime'], 0, 10);
        $itemToModify['time'] = substr($itemToModify['datetime'], 11);
        //return $config;
        $config['values'] = $itemToModify;
        return view("admin.modify")->with($config);
       
    }
    
    /* Advisers */
    
    public function displayAdvisers() {
        
        return view('admin.display')->with(App\Services\Admin::getDisplayData(
            'adviser',
            App\Adviser::class, 
            ['edit', 'delete']
        ));
        
    }
    public function deleteAdvisers($id) {
        App\Adviser::destroy($id);
        return redirect()->back();
    }
    public function addAdvisers () {
        
        return view('admin.modify')->with(Config::get("form.advisers"));
        
    }
    public function editAdvisers($Id) {
        $itemToModify = App\Adviser::find($Id);
        
        if ($itemToModify == null) {
            return redirect()->back()->withErrors("There is no item with $Id id in the database");
        }
        
        $config = Config::get("form.advisers");
        
        //return $config;
        $config['values'] = $itemToModify;
        return view("admin.modify")->with($config);
    }
    public function modifyAdvisers (Request $request) {
        
        $fields = $request->all();
        unset ($fields['photo']);
        $id = App\Services\Admin::saveRequest(App\Adviser::class, $fields);
        
        if (Input::hasFile('photo')) {
            Input::file('photo')->move('advisers_img', $id);
        }
        
        return redirect()->back();
        
    }
    
    /* Speakers */
     
    public function displaySpeakers() {
        
         return view('admin.display')->with(App\Services\Admin::getDisplayData(
            'speaker',
            App\Speaker::class, 
            ['edit', 'delete']
        ));
        
    }
    public function deleteSpeakers($id) {
        App\Speaker::destroy($id);
        return redirect()->back();
    }
    public function addSpeakers () {
        
        $fields = App\Event::all();
        $config = Config::get("form.speakers");
        
        $eventOptions = &$config['metadata']['event_id']['options'];
        foreach ($fields as $event) {
            $eventOptions[$event['id']] = $event['name_en'];
        }
        
        if(count ($eventOptions) == 0) {
            return "There are no events";
        }
        return view('admin.modify')->with ($config);
    }
    public function editSpeakers($Id) {
        $itemToModify = App\Speaker::find($Id);
        
        if ($itemToModify == null) {
            return redirect()->back()->withErrors("There is no item with $Id id in the database");
        }
        
        $config = Config::get("form.speakers");
        $fields = App\Event::all();
        
        $eventOptions = &$config['metadata']['event_id']['options'];
        
        foreach ($fields as $event) {
            $eventOptions[$event['id']] = $event->name_en;
        }
        
        //return $config;
        $config['values'] = $itemToModify;
        return view("admin.modify")->with($config);
    }
    public function modifySpeakers (Request $request) {
        
        $fields = $request->all();
        
        unset($fields['photo']);
        
        if (isset($fields['id'])) {
            $itemToModify = App\Speaker::find($fields['id']);
            unset($fields['id']);
        }
        else {
            $itemToModify = new App\Speaker;
        }
        unset ($fields['_token']);
        foreach ($fields as $name => $value) {
            $itemToModify[$name] = $value;
        }
        unset($itemToModify['event_id']);
        $itemToModify->save();
        $itemToModify->events()->attach($fields['event_id']);
        
        if (Input::hasFile('photo')) {
            Input::file('photo')->move("speakers_img", $id);
        }
        
        return redirect()->back();
        
    }
    
    /* Partners */
    
    public function displayPartners() {
        
        return view('admin.display')->with(App\Services\Admin::getDisplayData(
            'partner',
            App\Partner::class,
            ['edit', 'delete']
        ));
        
    }
    public function deletePartners($id) {
        App\Partner::destroy($id);
        return redirect()->back();
    }
    public function addPartners () {
        
        $config = Config::get("form.partners");
        $partnershipTypeOptions = &$config['metadata']['partnershipType_id']['options'];
        
        $partnershipTypes = App\PartnershipType::all();
        foreach($partnershipTypes as $partnershipType) {
            $partnershipTypeOptions[$partnershipType['id']] = $partnershipType->name_en;
        }
        
        return view('admin.modify')->with ($config);
        
    }
    public function editPartners($Id) {
        $itemToModify = App\Partner::find($Id);
        
        if ($itemToModify == null) {
            return redirect()->back()->withErrors("There is no item with $Id id in the database");
        }
        
        $config = Config::get("form.partners");
        $partnershipTypeOptions = &$config['metadata']['partnershipType_id']['options'];
        
        $partnershipTypes = App\PartnershipType::all();
        foreach($partnershipTypes as $partnershipType) {
            $partnershipTypeOptions[$partnershipType['priority_index']] = $partnershipType->name_en;
        }
        
        $config['values'] = $itemToModify;
        return view("admin.modify")->with($config);
    }
    public function modifyPartners (Request $request) {
        
        $fields = $request->all();
                              
        if ($fields['priority_index'] == -1) {
            $fields['priority_index'] = App\Partner::all()->max('priority_index') + 1;
        }
        
        foreach (App\Partner::where('partnershipType_id', '=', $request['partnershipType_id'])
                              ->where('priority_index', '>=', $request['priority_index'])
                              ->get() as $relocated) {
            $relocated->priority_index++;
            $relocated->save();
        }
        
        $thisPtType = App\Partner::find($fields['id']);
        $thisPtType->priority_index = $fields['priority_index'];
        $thisPtType->save ();
        
        unset ($fields['logo']);
        $id = App\Services\Admin::saveRequest(App\Partner::class, $fields);
        
        if (Input::hasFile('logo')) {
            Input::file('logo')->move("partners_img", $id);
        }
        
        return redirect()->back();
        
    }
    
    
    /* Partnership types */
    
    public function displayPartnershiptypes () {
        
        return view('admin.display')->with(App\Services\Admin::getDisplayData(
            'partnership type',
            App\PartnershipType::class, 
            ['edit', 'delete']
        ));
        
    }
    public function deletePartnershiptypes($id) {
        App\PartnershipType::destroy($id);
        return redirect()->back();
    }
    public function addPartnershiptypes () {
        
        $config = Config::get("form.partnershiptypes");
        $insertBeforeOptions = &$config['metadata']['priority_index']['options'];
        
        $partnershipTypes = App\PartnershipType::orderBy('priority_index', 'ASC')->get();
        foreach($partnershipTypes as $partnershipType) {
            $insertBeforeOptions[$partnershipType['id']] = $partnershipType->name_en;
        }
        
        $insertBeforeOptions["-1"] = "{{ Last }}";
        return view('admin.modify')->with($config);
    }
    public function editPartnershiptypes($Id) {
        $itemToModify = App\PartnershipType::find($Id);
        
        if ($itemToModify == null) {
            return redirect()->back()->withErrors("There is no item with $Id id in the database");
        }
        
        $config = Config::get("form.partnershiptypes");
        $insertBeforeOptions = &$config['metadata']['priority_index']['options'];
        
        $partnershipTypes = App\PartnershipType::orderBy('priority_index', 'ASC')->get();
        foreach($partnershipTypes as $partnershipType) {
            $insertBeforeOptions[$partnershipType['priority_index']] = $partnershipType->name_en;
        }
        $insertBeforeOptions[-1] = "<Insert last>";
        
        //return $config;
        $config['values'] = $itemToModify;
        return view("admin.modify")->with($config);
    }
    public function modifyPartnershiptypes(Request $request) {
        
        $fields = $request->all();
        
        if ($fields['priority_index'] == -1) {
            $fields['priority_index'] = App\PartnershipType::all()->max('priority_index') + 1;
        }
        
        foreach (App\PartnershipType::where ('priority_index', '>=', $fields['priority_index'])->get() as $relocated) {
            
            $relocated->priority_index++;
            $relocated->save();
            
        }
        
        /*if (isset ($fields['id'])) {
            $thisPtType = App\PartnershipType::find($fields['id']);
            $thisPtType->priority_index = $fields['priority_index'];
            $thisPtType->save ();
        }*/
        App\Services\Admin::saveRequest (App\Partnershiptype::class, $fields);
        
        return redirect()->back();
        
    }
    
    /* Team members */
    
    public function displayTeammembers () {
        
        return view('admin.display')->with(App\Services\Admin::getDisplayData(
            'team member',
            App\TeamMember::class, 
            ['edit', 'delete']
        ));
        
    }
    public function deleteTeammembers($id) {
        App\TeamMember::destroy($id);
        return redirect()->back();
    }
    public function addTeammembers () {
        return view('admin.modify')->with (Config::get("form.teammembers"));
    }
    public function editTeammembers($Id) {
       
        return view("admin.modify")->with(App\Services\Admin::assignValuesToForm(
            App\TeamMember::class,
            $Id,
            "teammembers"
        ));
       
    }
    public function modifyTeammembers(Request $request)
    {
        $fields = $request->all();
        unset ($fields['photo']);
        $id = App\Services\Admin::saveRequest(App\TeamMember::class, $fields);
        if (Input::hasFile('photo')) {
            Input::file('photo')->move("teammembers_img", $id);
        }
        
        return redirect()->back();
    }
    
    /* Alumni */
    
    public function displayAlumni() {
        
        return view('admin.display')->with(App\Services\Admin::getDisplayData(
            'alumna',
            App\Alumna::class,
            ['edit', 'delete']
        ));
        
    }
     public function deleteAlumni($id) {
        App\Alumna::destroy($id);
        return redirect()->back();
    }
    public function addAlumni () {
        return view('admin.modify')->with (Config::get("form.alumni"));
    }
    public function editAlumni($Id) {
        return view("admin.modify")->with(App\Services\Admin::assignValuesToForm(
            App\Alumna::class,
            $Id,
            "alumni"
        ));
    }
    public function modifyAlumni (Request $request) {
        
        $fields = $request->all();
        unset($fields['photo']);
        $id = App\Services\Admin::saveRequest(App\Alumna::class, $fields);
        
        if (Input::hasFile('photo')) {
            Input::file('photo')->move('alumni_img', $id);
        }
        
        return redirect('administration-dashboard/alumni/');
        
    }
    
    /* Admin accounts */
    
    public function displayAdminaccounts () {
        
        return view('admin.display')->with(App\Services\Admin::getDisplayData(
            'admin account',
            App\Event::class, 
            ['edit', 'delete']
        ));
        
    }
    
    
    

}
