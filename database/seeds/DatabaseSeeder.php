<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(EventsSeeder::class);
        $this->call(TeamMembersSeeder::class);
        $this->call(AdvisersSeeder::class);
        $this->call(AlumniSeeder::class);
        $this->call(PartnershipTypesSeeder::class);
        $this->call(PartnersSeeder::class);
        $this->call(SpeakersSeeder::class);
        
        DB::table('users')->insert([
            'username' => 'marius',
            'password' => '$2y$10$MddeaPC5ZX3X9spzXxH7l.8vPTF/OvYj9Ny.ocH6nJyNXyifHrsli',
        ]);
        
    }
}