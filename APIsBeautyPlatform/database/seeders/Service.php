<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Service extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service')->insert([
            ['name'=>'Šminkanje'],
            ['name'=>'ŠiŠanje'],
            ['name'=>'Pranje i feniranje kose'],
            ['name'=>'Manikura'],
            ['name'=>'Pedikura'],
        ]);
    }
}
