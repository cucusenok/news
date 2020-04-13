<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNetwork extends Model
{
    const TABLE_NAME = 'user_networks';


    const TYPE_NETWORK_VK = 1;
    const TYPE_NETWORK_TELEGRAM = 2;

    public static function tableName(){
        return self::TABLE_NAME;
    }


}
