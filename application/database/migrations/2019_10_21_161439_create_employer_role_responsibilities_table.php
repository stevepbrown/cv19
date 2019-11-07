<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerRoleResponsibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_role_responsibilities', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('role_id');
            $table->bigInteger('responsibility_id');
            $table->timestamps();
            $table->primary('id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_role_responsibilities');
    }
}
