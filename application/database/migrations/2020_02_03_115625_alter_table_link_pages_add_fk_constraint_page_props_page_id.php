<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLinkPagesAddFkConstraintPagePropsPageId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('link_pages', function (Blueprint $table) {
            $table->foreign('page_props_page_id')->references('page_id')->on('page_props');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_pages', function (Blueprint $table) {
         
            $table->dropForeign('link_pages_page_props_page_id_foreign');
        });
    }
}
