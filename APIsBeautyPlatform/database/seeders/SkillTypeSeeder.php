<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skilltype')->insert([
            ['Description'=>'Make up artis'],
            ['Description'=>'Pedicure artis'],
            ['Description'=>'Manicure artis'],
        ]);
    }
}
