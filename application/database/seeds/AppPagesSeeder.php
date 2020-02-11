<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AppPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_pages')->insert([


            ['id'=>'1','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'2','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'3','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'4','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'5','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'6','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'7','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'8','app_tables_id'=>null,'created_at'=>Carbon::now()],
            ['id'=>'9','app_tables_id'=>null,'created_at'=>Carbon::now()],


        ]);
    }
}
