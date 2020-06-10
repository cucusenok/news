<?php

namespace App;

use App\Jobs\TextClassificationJob;
use App\library\http\CurlHttpAdapter;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use App\library\media\ImageManager;
use App\PostMedia;
use Illuminate\Support\Facades\Storage;
use App\library\classification\DocToVecLogRegClassifierService;

/**
 * Class Post
 * @package App
 *
 * @property string name
 * @property string body
 */
class Post extends Model
{

    const TABLE_NAME = 'posts';

    const BASE_CONTROLLER = 'controller';
    const BASE = 'base';

    protected $fillable = ['name', 'body', 'author_id', 'active'];
    protected $appends = ['main_image'];


    public static $route = [
       'base' => 'post',
       'controller' => 'PostController',
       'list' => 'list',
       'view' => 'view',
   ];


    /**
     * TODO: realise model field validation
     */
    public function validate(){

    }



    public static function boot()
    {
        parent::boot();

        self::created(function($model){

            dispatch(
                new TextClassificationJob(
                    new DocToVecLogRegClassifierService
                    (
                        new CurlHttpAdapter(),
                        $model
                    )
                )
            );

        });

    }


    /**
     * @string $mainImage blob
     */
    public function saveMainImage($mainImage) {
        $postMedia = new PostMedia();
        return $postMedia->saveMainImage($mainImage);
    }


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

    public function getMainImageAttribute() : string
    {

        if(!isset($this->image->media)) return '';

        /**
         * App\Media
         */
        $media = $this->image->media;

        if (!Storage::disk($media->disk)->exists($media->fullName) ) return '';

        return '/storage/postMainImages/' . $media->fullName;
    }


    public function image()
    {
        return $this->hasOne('App\PostMedia', 'post_id', 'id')
            ->where('post_media_type', '=', PostMedia::TYPE_MAIN_IMAGE)
            ->with('media');
    }

    public function comment(){
       return $this->hasMany(Comment::class);
    }





}
