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
        Schema::create('posts', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->integer('user_id');
            $table->string('category_id');
            $table->string('tags');
            $table->integer('status')->default(0);
            $table->integer('view_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->date('published_at');
            

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
        Schema::dropIfExists('posts');
    }
};
