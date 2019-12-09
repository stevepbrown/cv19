<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmployerRolesAddIdVirtual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employer_roles', function (Blueprint $table) {
            $table->integer('id')->virtualAs('CONCAT(`employer_id`,`role_id`)')->nullable(false)->after('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employer_roles', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
}
