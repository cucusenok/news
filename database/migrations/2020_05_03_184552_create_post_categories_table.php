<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->comment('ID категории к которому привязан пост');
            $table->bigInteger('post_id')->unsigned()->comment('ID поста к которому привязана категория');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->unique(['category_id', 'post_id'], 'post_category_unique_index');

            $table->index(['category_id', 'post_id']);
            $table->index(['post_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
    }

}
