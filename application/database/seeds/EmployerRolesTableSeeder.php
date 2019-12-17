<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployerRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('employer_roles')->insert([
            ['employer_id'=>'1','role_id'=>'5','tenure'=>'April 2011 to October 2015','created_at'=>'2019-11-26 15:41:33'],
            ['employer_id'=>'2','role_id'=>'2','tenure'=>'July 2001 to December 2001','created_at'=>'2019-11-26 15:41:33'],
            ['employer_id'=>'2','role_id'=>'5','tenure'=>'December 2001 to April 2011','created_at'=>'2019-11-26 15:41:33'],
            ['employer_id'=>'3','role_id'=>'1','tenure'=>'1999 to July 2001','created_at'=>'2019-11-26 15:41:33'],
            ['employer_id'=>'4','role_id'=>'6','tenure'=>'April 2017 to August 2017 (temporary contract)','created_at'=>'2019-11-26 15:41:33'],
            ['employer_id'=>'5','role_id'=>'7','tenure'=>'1997 - 1999','created_at'=>'2019-11-26 15:41:33'],
            ['employer_id'=>'6','role_id'=>'3','tenure'=>'August 1995 - 1997','created_at'=>'2019-11-26 15:41:33']
       
            ]);
    }
}
