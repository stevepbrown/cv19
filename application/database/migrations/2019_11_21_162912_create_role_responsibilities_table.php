<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleResponsibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_responsibilities', function (Blueprint $table) {
            $table->bigInteger('role_id');
            $table->bigInteger('responsibility_id');
            $table->timestamps();
            $table->primary(['role_id','responsibility_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_responsibilities');
    }
}
