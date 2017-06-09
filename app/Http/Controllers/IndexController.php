<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostList;
class IndexController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        $lists=PostList::all();
        return view('index',['posts'=>$posts,'lists'=>$lists]);
    }

    public function show()
    {
        return view('showPost');
    }
}
