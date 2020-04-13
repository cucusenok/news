<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    const TABLE_NAME = 'media';


    public static function tableName(){
        return self::TABLE_NAME;
    }
}
