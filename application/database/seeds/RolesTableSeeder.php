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
        DB::table('users')->insert([
            ['id'=>'1','role'=>'Track-side Engineer','employer_id'=>'3','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'2','role'=>'Data Manager','employer_id'=>'2','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'3','role'=>'Auction Driver','employer_id'=>'6','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'4','role'=>'Analyst Programmer','employer_id'=>'1','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'5','role'=>'Analyst Programmer','employer_id'=>'2','created_at'=>'2019-11-14 13:30:10'],
            ['id'=>'6','role'=>'Laravel Developer','employer_id'=>'4','created_at'=>'2019-11-14 13:30:10'],
        ]);
    }
}
