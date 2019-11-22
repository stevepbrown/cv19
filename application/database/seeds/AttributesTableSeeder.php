<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert(

            [
                ['id'=>'1','attribute'=>'active','attribute_datatype_id'=>'3','description'=>'A boolean flag to set the record as active status','created_at'=>'2019-11-22 15:40:01']

            ]


            );
    }
}
