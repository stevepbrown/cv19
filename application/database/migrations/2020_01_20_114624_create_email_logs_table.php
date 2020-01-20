<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {


            $table->bigIncrements('id')->primaryKey();
            $table->unsignedInteger('person_id');
            $table->unsignedTinyInteger('template_id');
            $table->unsignedSmallInteger('batch_id');
            $table->boolean('dispatched')->nullable()->comment('Mail was sent from queue');
            $table->boolean('failed')->nullable()->comment('Mail is queued but raises error');
            $table->boolean('bounced')->nullable()->comment('Addressee not known at destination');
            $table->boolean('invoked')->nullable()->comment('When the email was queued');
            $table->dateTime('invoked_when')->nullable()->comment('Datetine when mail was added to the queue');
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('template_id')->references('id')->on('email_templates');
            $table->index(['person_id', 'template_id']);
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_logs');
    }
}
