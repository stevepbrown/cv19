<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['id'=>'1','role'=>'Track-side Engineer','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'2','role'=>'Data Manager','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'3','role'=>'Auction Driver','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'4','role'=>'Analyst Programmer','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'5','role'=>'Analyst Programmer','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'6','role'=>'Laravel Developer','created_at'=>'2019-11-14 13:30:10'],
        ]);
    }
}
