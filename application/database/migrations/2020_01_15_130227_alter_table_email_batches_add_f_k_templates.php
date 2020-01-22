<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmailBatchesAddFKTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_batches', function (Blueprint $table) {
            $table->foreign('template_id')->references('id')->on('email_templates');
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
            $table->dropForeign('email_batches_template_id_foreign');
        });
    }
}
