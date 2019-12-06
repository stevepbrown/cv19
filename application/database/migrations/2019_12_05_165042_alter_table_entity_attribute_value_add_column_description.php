<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEntityAttributeValueAddColumnDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entity_attribute_value', function (Blueprint $table) {
            $table->string('entity_description')->after('value')->nullable();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entity_attribute_value', function (Blueprint $table) {
            $table->dropColumn('entity_description');
    });
   }
}