<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_post', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('post_title');
            $table->text('post_description');
            $table->string('post_image');
            $table->tinyInteger('post_category');
            $table->tinyInteger('post_user');
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
        Schema::dropIfExists('tbl_post');
    }
}
