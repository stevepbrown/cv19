<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployerRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('employer_role')->insert([
       
            ['id'=>'1','employer_id'=>'1','role_id'=>'5','created_at'=>'2019-11-14 13:17:04'],
            ['id'=>'2','employer_id'=>'2','role_id'=>'5','created_at'=>'2019-11-14 13:17:04'],
            ['id'=>'3','employer_id'=>'2','role_id'=>'2','created_at'=>'2019-11-14 13:17:04'],
            ['id'=>'4','employer_id'=>'6','role_id'=>'3','created_at'=>'2019-11-14 13:17:04'],
            ['id'=>'5','employer_id'=>'4','role_id'=>'6','created_at'=>'2019-11-14 13:17:04'],
            ['id'=>'6','employer_id'=>'3','role_id'=>'1','created_at'=>'2019-11-14 13:17:04'],
            ['id'=>'7','employer_id'=>'5','role_id'=>'7','created_at'=>'2019-11-14 13:17:04']
       
            ]);
    }
}
