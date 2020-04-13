<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author', 'comment')
                        ->where('active', 1)
                        ->take(1)
                        ->get();

        foreach($posts as $post){
            var_dump($post);
        }
    }


    public function vue(){
        return view('home');
    }

    public function view($id){
        return response()
            ->json(Post::with('author')->where('id', $id)->get());
    }

    public function list(){
        return response()
            ->json(Post::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        //dd($request->all());die;

        $post = new Post();
        $fillableFields = $request->only($post->getFillable());
        $fillableFields['active'] = 1;

        $post->fill( $fillableFields );

        try {
            $post->save();
            return response()
                ->json(
                    ['status' => 'ok', 'Save success']
                );
        }
        catch (\Exception $ex ) {
            return response()
                ->json( ['status' => 'error', 'msg' => $ex->getMessage(), ] );
        }

    }


}
