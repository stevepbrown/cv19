<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEntityAttributeValueTableAddColumnsTableKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entity_attribute_value', function (Blueprint $table) {
            $table->integer('app_table_id')->after('attribute_id');
            $table->integer('key')->after('app_table_id');
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
            $table->dropColumn('app_table_id');
            $table->dropColumn('key');
        });
    }
}
