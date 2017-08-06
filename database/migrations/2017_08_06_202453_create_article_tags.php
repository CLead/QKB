<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleTags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ArticleID');
            $table->unsignedInteger('TagID');

            $table->foreign('ArticleID')->references('id')->on('articles');
            $table->foreign('TagID')->references('id')->on('Tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articleTags');
    }
}
