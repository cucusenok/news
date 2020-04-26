<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_media', function (Blueprint $table) {
            $table->bigInteger('media_id')->unsigned()->comment('ID поста к которому привязана медиа');
            $table->bigInteger('post_id')->unsigned()->comment('ID поста к которому привязана медиа');
            $table->tinyInteger('post_media_type')->comment('Значение медиа для поста, 1 - главное изображение');


            $table->foreign('media_id')->references('id')->on('media');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->unique(['media_id', 'post_id'], 'post_media_composite_index');
            $table->index(['post_media_type']);
            $table->index(['post_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_media');
    }
}
