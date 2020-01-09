<?php

use Illuminate\Database\Seeder;

class AttributeDataTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_datatypes')->insert([
            ['id'=>'1','type'=>'string','created_at'=>'2020-01-09 12:14:07'],
            ['id'=>'2','type'=>'integer','created_at'=>'2020-01-09 12:14:07'],
            ['id'=>'3','type'=>'boolean','created_at'=>'2020-01-09 12:14:07'],
            ['id'=>'4','type'=>'date','created_at'=>'2020-01-09 12:14:07'],
            ['id'=>'5','type'=>'datetime','created_at'=>'2020-01-09 12:14:07'],
            ['id'=>'6','type'=>'decimal','created_at'=>'2020-01-09 12:14:07'],
            ['id'=>'7','type'=>'float','created_at'=>'2020-01-09 12:14:07'],
            ['id'=>'8','type'=>'json','created_at'=>'2020-01-09 12:14:07'],

            

        ]); 

            
    }
}
