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
                ['id'=>'1','attribute'=>'active','attribute_datatype_id'=>'3','description'=>'A boolean flag to set the record as active status','created_at'=>'2020-01-09 11:50:17'],
                ['id'=>'2','attribute'=>'sort index','attribute_datatype_id'=>'2','description'=>'An index for use in order by clauses','created_at'=>'2020-01-09 11:50:17'],
                ['id'=>'3','attribute'=>'suppress_on_print','attribute_datatype_id'=>'3','description'=>'Will not display for print','created_at'=>'2020-01-09 11:50:17'],

            ]


            );
    }
}
