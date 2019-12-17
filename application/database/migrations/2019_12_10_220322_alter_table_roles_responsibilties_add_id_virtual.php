<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRolesResponsibiltiesAddIdVirtual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_responsibilities', function (Blueprint $table) {
            $table->integer('id')->virtualAs('CONCAT(`role_id`,`responsibility_id`)')->nullable(false)->after('responsibility_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_responsibilities', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
}
