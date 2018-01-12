<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_title');
            $table->text('product_description');
            $table->string('product_image');
            $table->string('product_manufacture');
            $table->string('product_key');
            $table->string('product_price');
            $table->integer('product_quantity');
            $table->integer('product_aviality');
            $table->tinyInteger('product_condition')->default(1)->comment('New=1,Old=0');
            $table->string('product_view');
            $table->tinyInteger('product_user');
            $table->tinyInteger('publication_status')->default(1)->comment('Published=1,Unpublished=0');
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
        Schema::dropIfExists('tbl_product');
    }
}
