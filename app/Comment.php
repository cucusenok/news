<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const TABLE_NAME = 'comments';

    public static function tableName():string {
        return self::TABLE_NAME;
    }

    //get comment author
    public function user(){ return $this->belongsTo('App\User', 'id'); }
}
