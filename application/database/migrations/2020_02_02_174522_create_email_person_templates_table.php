<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailPersonTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_person_templates', function (Blueprint $table) {
            $table->bigIncrements('id')->primaryKey();
            $table->int('people_id');
            $table->tinyInteger('email_templates_id');
            $table->text('comment');
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
        Schema::dropIfExists('email_person_templates');
    }
}
