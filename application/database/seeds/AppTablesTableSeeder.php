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
            ['id'=>'1','table_name'=>'attributes','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'2','table_name'=>'attribute_datatypes','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'3','table_name'=>'employers','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'4','table_name'=>'employer_roles','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'5','table_name'=>'entity_attribute_value','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'6','table_name'=>'institutions','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'7','table_name'=>'migrations','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'8','table_name'=>'modules','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'9','table_name'=>'qualifications','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'10','table_name'=>'responsibilities','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'11','table_name'=>'job_roles','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'12','table_name'=>'role_responsibilities','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'13','table_name'=>'skills','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'14','table_name'=>'app_tables','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'16','table_name'=>'application_version','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'17','table_name'=>'entity_attribute_values','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'18','table_name'=>'telescope_entries','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'19','table_name'=>'telescope_entries_tags','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'20','table_name'=>'telescope_monitoring','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            ['id'=>'21','table_name'=>'users','description'=>null,'created_at'=>'2020-01-09 12:14:56'],
            

        ]);
    }
}
