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
       
            ['employer_id'=>'1','role_id'=>'5','created_at'=>'2019-11-21 16:17:42'],
            ['employer_id'=>'2','role_id'=>'2','created_at'=>'2019-11-21 16:17:42'],
            ['employer_id'=>'2','role_id'=>'5','created_at'=>'2019-11-21 16:17:42'],
            ['employer_id'=>'3','role_id'=>'1','created_at'=>'2019-11-21 16:17:42'],
            ['employer_id'=>'4','role_id'=>'6','created_at'=>'2019-11-21 16:17:42'],
            ['employer_id'=>'6','role_id'=>'3','created_at'=>'2019-11-21 16:17:42']
       
            ]);
    }
}
