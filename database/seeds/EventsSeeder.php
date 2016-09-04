<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EventsSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    private function getDescription() {
        $str = "";
        for ($i = 0; $i <= 75; ++$i) {
            $str .= str_random(10) . '
            '; 
        }
        return $str;
    }
     
	public function run()
	{
		for ($i = 0; $i < 20; ++$i) {
            DB::table('events')->insert ([
                'type' => 'salon',
                'datetime' => '2017-05-11 13:00:00',
                'name_en' => str_random (10),
                'name_ro' => str_random (10),
                'location_en' => str_random (10) . '\\' . str_random(10) . '\\' . str_random(10),
                'location_ro' => str_random (10) . '\\' . str_random(10) . '\\' . str_random(10),
                'description_en' => $this->getDescription(),
                'description_ro' => $this->getDescription(),
            ]);
            
        }
        
	}

}
