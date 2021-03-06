<?php

namespace App\Http\Controllers;

use App\PostList;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    const POST_CREATE='Пост успішно створено!';
    const POST_UPDATE='Пост успішно змінено!';
    const POST_DESTROY='Пост успішно видалено!';

    public function index(Request $request)
    {
        $postsList = PostList::all();
        $postOne = new Post();

        return view('admin.index', ['posts' => $postOne->searchPosts($request), 'postOne' => $postOne, 'postsList' => $postsList]);

    }

    public function create()
    {
        $lists = new PostList();
        return view('admin.createPost', ['lists' => $lists->getLists()]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        if ($post->validateForm($request->all())) {
            $post->helperSave($request);

            Session::flash('flash_message', self::POST_CREATE);

            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.create')->withInput()->withErrors($post->getErrorsMessages());
        }
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $lists = new PostList();

        return view('admin.editPost', ['post' => $post, 'lists' => $lists->getLists()]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post->validateForm($request->all())) {
            $post->helperSave($request);
            Session::flash('flash_message', self::POST_UPDATE);

            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.edit', ['$post' => $post])->withInput()->withErrors($post->getErrorsMessages());

        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->deletePost();
        Session::flash('flash_message', self::POST_DESTROY);

        return redirect()->route('admin.index');
    }


}
