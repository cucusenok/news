<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller{

    public function upload(){
    }


    public function send(Request $request) {
        var_dump($request);
    }

}