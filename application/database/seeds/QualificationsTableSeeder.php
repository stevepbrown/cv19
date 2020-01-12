<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualifications')->insert([
            
            ['id'=>'1','qualification'=>'GCSE','institution_id'=>'4','year_attained'=>'1988','created_at'=>'2020-01-09 11:56:06'],
            ['id'=>'2','qualification'=>'GCE (Advanced Level)','institution_id'=>'3','year_attained'=>'1990','created_at'=>'2020-01-09 11:56:06'],
            ['id'=>'3','qualification'=>'Bachelor of Arts (Hons) - 2-1','institution_id'=>'2','year_attained'=>'1995','created_at'=>'2020-01-09 11:56:06'],
            ['id'=>'4','qualification'=>'Certificate IV in Web Technologies (Equivalent to UK Higher National Certficate)','institution_id'=>'1','year_attained'=>'2016','created_at'=>'2020-01-09 11:56:06'],
            
            
            ]);
    }
}
