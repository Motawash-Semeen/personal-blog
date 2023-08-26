<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('time_zone', 255);
            $table->string('default_language', 255);
            $table->string('site_name', 255);
            $table->string('site_email', 255);
            $table->string('site_logo', 255);
            $table->string('site_favicon', 255);
            $table->text('site_description')->nullable();
            $table->text('site_keywords')->nullable();
            $table->string('site_copyright', 255)->nullable();
            $table->string('web_fb_link', 255)->nullable();
            $table->string('web_twitter_link', 255)->nullable();
            $table->string('web_instagram_link', 255)->nullable();
            $table->string('web_linkedin_link', 255)->nullable();
            $table->string('web_youtube_link', 255)->nullable();
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
        Schema::dropIfExists('site_settings');
    }
};
