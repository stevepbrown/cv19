<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_batches', function (Blueprint $table) {
           

            $table->bigIncrements('id');
            $table->integer('organisation_id'); 			
            $table->json('recipients');
            $table->unsignedTinyInteger('template_id');
            $table->unsignedTinyInteger('batch_id');
            $table->timestamps();
            $table->softDeletes('deleted_at',0);

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_batches');
    }
}
