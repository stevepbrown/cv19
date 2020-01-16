<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailBatchesAddColumnInvoked extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_batches', function (Blueprint $table) {
            $table->boolean('invoked')->default(false)->after('batch_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_batches', function (Blueprint $table) {
            $table->dropColumn('invoked');
        });
    }
}
