<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->nullable(false);
            $table->string('name');
            $table->text('body');
            $table->bigInteger('author_id')->unsigned()->nullable(false);
            $table->tinyInteger('active')->unsigned()->nullable(false);
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('posts');
    }


}
