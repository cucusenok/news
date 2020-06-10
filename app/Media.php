<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Media
 * @package App
 *
 * @param integer id
 * @param string path
 * @param string fullName
 * @param string ext
 * @param integer type
 */
class Media extends Model
{
    const TABLE_NAME = 'media';


    public $timestamps = false;

    public static function tableName(){
        return self::TABLE_NAME;
    }

    public function getFullNameAttribute() : string {
        return $this->fileName . $this->ext;
    }


}
