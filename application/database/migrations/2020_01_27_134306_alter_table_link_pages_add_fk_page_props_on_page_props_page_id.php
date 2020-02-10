<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLinkPagesAddFkPagePropsOnPagePropsPageId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('link_pages', function (Blueprint $table) {

        //     $table->foreign('page_props_page_id')->references('page_props')->on('page_id');
 
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_pages', function (Blueprint $table) {
           $table->dropForeign('page_links_page_props_page_id_foreign'); 
        });
    }
}
