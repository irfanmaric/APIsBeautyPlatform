<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeautyShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beautyshop')->insert([
            ['Name' => 'Beauty Shop 1'],
            ['Name' => 'Beauty Shop 2'],
        ]);
    }
}
