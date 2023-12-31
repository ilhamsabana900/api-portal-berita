<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index(){
        $posts= Post::all();
        return PostResource::collection($posts);
    }
    public function show($id){
        $post= Post::with('writer:id,username')->FindOrFail($id);
        return new PostDetailResource($post);
    }
    
}
 