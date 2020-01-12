<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('institutions')->insert([
            ['id'=>'1','institution'=>'North Metropolitan TAFE, Perth, Western Australia','created_at'=>'2020-01-09 11:54:52'],
            ['id'=>'2','institution'=>'University of Central Lancashire - Preston ,UK','created_at'=>'2020-01-09 11:54:52'],
            ['id'=>'3','institution'=>'Winstanley Sixth Form College, Billinge, Wigan, UK','created_at'=>'2020-01-09 11:54:52'],
            ['id'=>'4','institution'=>'The Byrchall High School, Ashton-in-Makerfield, UK ','created_at'=>'2020-01-09 11:54:52'],
         ]);
    }
}
