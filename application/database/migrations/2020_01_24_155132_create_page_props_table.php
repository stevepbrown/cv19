<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagePropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()



    {
        Schema::create('page_props', function (Blueprint $table) {
            $table->BigIncrements('id')->primaryKey();
            $table->unsignedInteger('page_id');
            $table->string('name',50);
            $table->string('title',25);
            $table->string('favicon_id',30)->nullable();
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
        Schema::dropIfExists('page_props');
    }
}
