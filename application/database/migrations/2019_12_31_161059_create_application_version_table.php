<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_version', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('main_version');
            $table->unsignedSmallInteger('incremental_version');
            $table->string('name', 75);
            $table->string('full_version_number',6)->storedAs("
                
               main_version.\'.\'.incremental_version"
                );
            $table->string('commit_SHA')->nullable();
            $table->string('commit_tag')->nullable();
            $table->longText('description');
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
        Schema::dropIfExists('application_version');
    }
}
