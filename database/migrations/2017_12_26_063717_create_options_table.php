<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_phone');
            $table->string('header_email');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('linkin_url');
            $table->string('google_url');
            $table->string('theme_logo');
            $table->string('sidebar_add_img');
            $table->string('sidebar_add_link');
            $table->string('about_us_text');
            $table->string('footer_contact_address');
            $table->string('copyright_by');
            $table->string('developed_by');
            $table->string('map_latitude');
            $table->string('map_longitute');
            $table->string('contact_page_address');
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
        Schema::dropIfExists('tbl_option');
    }
}
