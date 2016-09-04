<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PartnershipTypesSeeder extends Seeder {
    
    public function run () {
        
        $pttypes = [
            "Brought you by",
            "Powered by",
            "Media partners",
            "Partners",
            "Honorable mentions",
        ];
        
        for ($current_id = 1; $current_id <= 5; ++$current_id) {
            DB::table('partnership_types')->insert ([
                'text_size' => 40,
                'priority_index' => $current_id,
                'name_en' => $pttypes[$current_id - 1],
                'description_en' => str_random(20),
                'name_ro' => $pttypes[$current_id - 1],
                'description_ro' => str_random(20),
            ]);
            for ($i = 1; $i <= 5; ++$i) {
                DB::table('partners')->insert ([
                    'name' => str_random(10),
                    'partnershipType_id' => $current_id,
                    'priority_index' => $i,
                ]);
            }
        }
            
    }
    
}
