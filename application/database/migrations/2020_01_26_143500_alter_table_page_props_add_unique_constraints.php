<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePagePropsAddUniqueConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_props', function (Blueprint $table) {
            $table->unique('page_id');
            $table->unique('slug');
            $table->unique('title');
            $table->unique('name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_props', function (Blueprint $table) {
            $table->dropUnique('page_props_page_id_unique');
            $table->dropUnique('page_props_slug_unique');
            $table->dropUnique('page_props_title_unique');
            $table->dropUnique('page_props_name_unique');
            
        });
    }
}
