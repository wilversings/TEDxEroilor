<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AlumniSeeder extends Seeder {
    
    public function run () {
        
        for ($current_id = 1; $current_id <= 20; ++$current_id) {
            DB::table('alumni')->insert ([
                'name' => str_random(10),
                'link' => str_random(10),
                'position_en' => str_random(10),
                'position_ro' => str_random(10),
            ]);
        }
            
    }
    
}