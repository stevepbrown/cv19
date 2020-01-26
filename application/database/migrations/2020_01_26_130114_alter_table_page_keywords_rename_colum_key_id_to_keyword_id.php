<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePageKeywordsRenameColumKeyIdToKeywordId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_keywords', function (Blueprint $table) {
           $table->renameColumn('key_id','keyword_id');
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
            $table->renameColumn('keyword_id','key_id');
        });
    }
}
