<?php

namespace App\Http\Controllers;

use App\PostList;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{

    public function index()
    {
        $postsList = PostList::all();
        $posts = Post::orderBy('id', 'desc')->get();

        return view('admin.index', ['posts' => $posts, 'postsList' => $postsList]);
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
            $this->helperSave($post, $request);

            Session::flash('flash_message', 'Пост успішно створено!');

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
            $this->helperSave($post, $request);
            Session::flash('flash_message', 'Пост успішно змінено!');

            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.edit', ['$post' => $post])->withInput()->withErrors($post->getErrorsMessages());

        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->deleteNews();
        Session::flash('flash_message', 'Пост успішно видалено!');
        return redirect()->route('admin.index');
    }

    private function helperSave($post, $request)
    {
         $picture_name= $post->saveImage($request);

        $input = $request->all();
        $post->fill($input);
        $post->img=$picture_name;
        $post->save();

    }

}
