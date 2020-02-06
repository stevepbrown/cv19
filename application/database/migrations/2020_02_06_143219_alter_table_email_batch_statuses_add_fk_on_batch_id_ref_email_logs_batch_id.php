<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailBatchStatusesAddFkOnBatchIdRefEmailLogsBatchId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_batch_statuses', function (Blueprint $table) {
            $table->foreign('batch_id')->references('email_logs')->on('batch_id');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_batch_statuses', function (Blueprint $table) {
            $table->dropForeign('email_batch_statuses_email_logs_batch_id_foreign');
        });
    }
}
