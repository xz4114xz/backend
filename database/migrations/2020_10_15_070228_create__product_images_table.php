<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductImages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_image');
            $table->integer('product_id');
            $table->integer('sort');
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
        Schema::dropIfExists('ProductImages', function (Blueprint $table) {
            //
        });
    }
}
