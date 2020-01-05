<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    const TABLE_NAME = 'posts';

    const BASE_CONTROLLER = 'controller';
    const BASE = 'base';

   public static $route = [
       'base' => 'post',
       'controller' => 'PostController',
       'list' => 'list',
       'view' => 'view',
   ];



   public static function createRouteByParams(array $params) : string {
       $paramsString = '';

       foreach ($params as $param)
           $paramsString .=  '{' . $param . '}';

       return $paramsString;
   }

   public static function createRoute(string $name, array $params = []) : string {
                return static::$route[self::BASE] .'/'. static::$route[$name]
                    . '/'
                    . ($params ? self::createRouteByParams($params) : '');
   }

   public static function getController(string $view,  string $controller = '') : string {
       $controller = $controller ? $controller : self::BASE_CONTROLLER;
       return static::$route[$controller] . '@' . static::$route[$view];
   }


   public static function tableName():string {
       return self::TABLE_NAME;
   }



    public function author()
    {
        return $this->hasOne('App\User', 'id', 'author_id');
    }

    public function comment(){
       return $this->hasMany(Comment::class);
    }





}
