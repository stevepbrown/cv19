<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEntityAttributeValueTableAddUniquConstraintOnEntityId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entity_attribute_value', function (Blueprint $table) {
            $table->unique('entity_id');
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
            Schema::table('entity_attribute_value', function (Blueprint $table) {
                $table->dropUnique('entity_attribute_value_entity_id_unique');
                
            });
        });
    }
}
