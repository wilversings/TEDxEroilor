<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TeamMembersSeeder extends Seeder {
    
    public function run () {
        
        for ($current_id = 1; $current_id <= 20; ++$current_id) {
            DB::table('team_members')->insert ([
                'name' => str_random(10),
                'email' =>  str_random(5) . "@" . str_random(5) . ".com",
                'link' => str_random(10),
                'superpower_en' => str_random(10),
                'position_en' => str_random(10),
                'superpower_ro' => str_random(10),
                'position_ro' => str_random(10),
            ]);
        }
            
    }
    
}