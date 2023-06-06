<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            ['name' => 'Jane Doe','companyID'=>'1', 'SkillTypeID'=>'1'],
            ['name' => 'Joe Doe','companyID'=>'1', 'SkillTypeID'=>'2'],
            ['name' => 'Jane Doe','companyID'=>'2', 'SkillTypeID'=>'1'],

        ]);
    }
}
