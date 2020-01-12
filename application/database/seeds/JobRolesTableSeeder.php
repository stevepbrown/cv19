<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_roles')->insert([
         
            ['id'=>'1','role'=>'Track-side Engineer','created_at'=>'2020-01-09 12:09:52'],
            ['id'=>'2','role'=>'Data Manager','created_at'=>'2020-01-09 12:09:52'],
            ['id'=>'3','role'=>'Auction Driver','created_at'=>'2020-01-09 12:09:52'],
            ['id'=>'4','role'=>'Analyst Programmer','created_at'=>'2020-01-09 12:09:52'],
            ['id'=>'5','role'=>'Analyst Programmer','created_at'=>'2020-01-09 12:09:52'],
            ['id'=>'6','role'=>'Laravel Developer','created_at'=>'2020-01-09 12:09:52'],
            ['id'=>'7','role'=>'Technical Data Processor','created_at'=>'2020-01-09 12:09:52'],
                        
        ]);
    }
}
