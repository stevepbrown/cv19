<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailLogsAddColumnOrganisationId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_logs', function (Blueprint $table) {
            $table->unsignedInteger('organisation_id')->nullable()->after('batch_id');
            $table->foreign('organisation_id')->references('id')->on('organisations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_logs', function (Blueprint $table) {
            $table->dropForeign('email_logs_organisation_id_foreign');
            $table->dropColumn('organisation_id');
        });
    }
}
