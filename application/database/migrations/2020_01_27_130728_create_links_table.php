<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            
                $table->bigIncrements('id');
                $table->string('attr_id',45)->unique()->comment('String (id) attribute of the link element');
                $table->string('link_type')->comment('String of media type eg. text/css');
                $table->string('href')->comment('The URL');
                $table->string('rel')->comment('String of rel attribute, specifying the relationship between the current document and the linked document resource eg. stylesheet');
                $table->string('media')->nullable()->comment('String of what media/device the target resource is optimized for eg. print');
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
        Schema::dropIfExists('links');
    }
}
