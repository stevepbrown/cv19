<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailBatchStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_batch_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('batch_id');
            $table->integer('count_accepted')->comment('Number of people included in batch');;
            $table->integer('count_rejected')->comment('Number of people excluded due to extant email log entries');
            $table->timestamps();
            
   
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_batch_statuses');
    }
}
