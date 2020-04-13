<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Media;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Media::tableName(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path')->unique()->comment('Path to file')->unique();
            $table->string('ext')->comment('File extension');
            $table->tinyInteger('type')->comment('File type 1 - image, 2 - video');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
