<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_page', function (Blueprint $table) {
            $table->increments('id')->primaryKey();
            $table->integer('page_props_page_id');
            $table->bigInteger('link_id');
            $table->timestamps();
            $table->unique(['page_props_page_id','link_id']);
            $table->foreign('page_props_page_id')->references('page_props')->on('page_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('link_page');
    }
}