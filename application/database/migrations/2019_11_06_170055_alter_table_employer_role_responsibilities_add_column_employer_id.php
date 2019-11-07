<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmployerRoleResponsibilitiesAddColumnEmployerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employer_role_responsibilities', function (Blueprint $table) {
            $table->integer('employer_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employer_role_responsibilities', function (Blueprint $table) {
            $table->dropColumn('employer_id');
        });
    }
}
