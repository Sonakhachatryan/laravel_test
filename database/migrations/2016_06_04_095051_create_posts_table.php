<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id')->unique();
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('content_en');
            $table->string('content_ru');
            $table->integer('author_id');
            $table->string('images');
            $table->string('category');
            $table->rememberToken();
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
        Schema::drop('posts');
    }
}
