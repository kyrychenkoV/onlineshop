<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostList;
class IndexController extends Controller
{
    public function index(Request $request=null)
    {

        $postsList=PostList::all();
        $post=new Post();

        return view('index', ['posts' => $post->searchPosts($request), 'postsList' => $postsList]);
    }

    public function show(Request $request)
    {

        $post= Post::find($request->id);
        return view('showPost',['post'=>$post]);
    }
}
