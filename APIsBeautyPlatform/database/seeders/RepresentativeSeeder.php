<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('representative')->insert([
            ['FirstName' => 'Irfan','LastName'=>'Maric','Email'=>'irfanmaric99@gmail.com','Password'=>'123','BeautyShopID'=>'1']
        ]);
    }
}
