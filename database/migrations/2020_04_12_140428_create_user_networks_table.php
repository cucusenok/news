<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\UserNetwork;

class CreateUserNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserNetwork::tableName(), function (Blueprint $table) {

            $table->bigInteger('userID')->unsigned()->comment('ID пользователя которому преналдежит социальная сеть');
            $table->tinyInteger('type')->comment('Тип социальной сети 1 - Вконтакте, 2 - Телеграм');
            $table->integer('networkID')->comment('ID пользователя в социальной сети, или id чата для телеграма');

            $table->foreign('userID')->references('id')->on('users');
            $table->unique(['userID', 'type'], 'user_network_type_composite_index');
            $table->index(['userID']);
            $table->index(['type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_networks');
    }

}

