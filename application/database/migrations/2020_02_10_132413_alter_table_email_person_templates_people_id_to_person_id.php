<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailPersonTemplatesPeopleIdToPersonId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('email_person_templates', function (Blueprint $table) {
            $table->renameColumn('people_id', 'person_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_person_templates', function (Blueprint $table) {
            $table->renameColumn('person_id','people_id');
        });
    }
}
