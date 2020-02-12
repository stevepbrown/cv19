<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterContactFormsTableAddFkTrafficSourceCodeCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->index('traffic_source_code');
               });
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->foreign('traffic_source_code')->references('code')->on('traffic_source_types');
               });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->dropForeign('contact_forms_traffic_source_code_foreign');
               });

        
        Schema::table('contact_forms', function (Blueprint $table) {
            $table->dropIndex('contact_forms_traffic_source_code_index');
               });



    }
}
