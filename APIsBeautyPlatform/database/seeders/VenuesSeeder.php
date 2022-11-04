<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venues')->insert([
            ['Address' => 'Mostar 1', 'BeautyShopID'=>'1'],
            ['Address' => 'Mostar 2', 'BeautyShopID'=>'2'],

        ]);
    }
}
