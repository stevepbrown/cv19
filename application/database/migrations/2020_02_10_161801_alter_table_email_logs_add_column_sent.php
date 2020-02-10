<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailLogsAddColumnSent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_logs', function (Blueprint $table) {
            $table->boolean('sent')->default(false)->after('invoked');
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
            $table->dropColumn('sent');
        });
    }
}
