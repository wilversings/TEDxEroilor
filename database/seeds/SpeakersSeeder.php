<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SpeakersSeeder extends Seeder {
    
    public function run () {
        
        for ($current_id = 1; $current_id <= 10; ++$current_id) {
            DB::table('speakers')->insert ([
                'name' => str_random(10),
                'link' => str_random(10),
                'description_ro' => str_random(20),
                'description_en' => str_random(20),
            ]);
            DB::table('event_speaker')->insert ([
                 'speaker_id' => $current_id,
                 'event_id' => $current_id
            ]);
        }
            
    }
    
}