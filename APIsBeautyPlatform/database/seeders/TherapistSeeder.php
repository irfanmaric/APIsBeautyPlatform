<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('therapist')->insert([
            ['FirstName' => 'Laura','LastName'=>'Jerkusic','VenuesID'=>'1','SkillTypeID'=>'1'],
            ['FirstName' => 'Jane','LastName'=>'Doe','VenuesID'=>'1','SkillTypeID'=>'2']
        ]);
    }
}
