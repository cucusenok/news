<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Comment;


class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create(Comment::tableName(), function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->nullable(false);
            $table->bigInteger('post_id')->unsigned()->nullable(false);
            $table->bigInteger('author_id')->unsigned()->nullable(false);
            $table->bigInteger('parent_id');
            $table->text('body');
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');

            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists(Comment::tableName());
    }


}
