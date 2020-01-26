<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePageKeywordsRenameColumnPageIdToPagePropsId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_keywords', function (Blueprint $table) {
            $table->renameColumn('page_id','page_props_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_keywords', function (Blueprint $table) {
            $table->renameColumn('page_props_id','page_id');
        });
    }
}
