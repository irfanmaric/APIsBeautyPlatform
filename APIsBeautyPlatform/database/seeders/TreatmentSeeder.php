<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('treatment')->insert([
            ['price' => '50','Duration'=>'60','Description'=>'Make up','VenuesID'=>'1','RepresentativeID'=>'1'],
            ['price' => '40','Duration'=>'30','Description'=>'Manicure','VenuesID'=>'1','RepresentativeID'=>'1'],
            ['price' => '30','Duration'=>'30','Description'=>'Pedicure','VenuesID'=>'1','RepresentativeID'=>'1']
        ]);
    }
}
