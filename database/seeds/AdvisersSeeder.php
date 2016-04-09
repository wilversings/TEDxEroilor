<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdvisersSeeder extends Seeder {
    
    private function getDescription() {
        $str = "";
        for ($i = 0; $i <= 75; ++$i) {
            $str .= str_random(10) . '
            '; 
        }
        return $str;
    }
    
    public function run() {
        for ($i = 0; $i < 20; ++$i) {
            
           DB::table('advisers')->insert([
               'name' => str_random(10),
               'link' => str_random(10),
               'position_en' => str_random(10),
               'position_ro' => str_random(10),
               'description_en' => $this->getDescription(),
               'description_ro' => $this->getDescription()
           ]);
           
        }
    }
    
}