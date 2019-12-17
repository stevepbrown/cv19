<?php

use Illuminate\Database\Seeder;

class AppTablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_tables')->insert([

            ['id'=>'1','table_name'=>'attributes','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'2','table_name'=>'attribute_datatypes','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'3','table_name'=>'employers','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'4','table_name'=>'employer_roles','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'5','table_name'=>'entity_attribute_value','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'6','table_name'=>'institutions','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'7','table_name'=>'migrations','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'8','table_name'=>'modules','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'9','table_name'=>'qualifications','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'10','table_name'=>'responsibilities','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'11','table_name'=>'roles','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'12','table_name'=>'role_responsibilities','description'=>null,'created_at'=>'2019-11-25 16:31:54'],
            ['id'=>'13','table_name'=>'skills','description'=>null,'created_at'=>'2019-11-25 16:31:54']

        ]);
    }
}
