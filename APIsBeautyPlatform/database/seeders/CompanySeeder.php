<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
            ['image_url' => 'link','name'=>'Mostar Beauty','description'=>'Salon za uljepšavanje','rating'=>'4'],
            ['image_url' => 'link','name'=>'Beauty Slon','description'=>'Salon za uljepšavanje i njegu','rating'=>'3.6'],

        ]);
    }
}
