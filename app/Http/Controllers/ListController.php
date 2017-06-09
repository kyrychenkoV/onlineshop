<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostList;
use Illuminate\Support\Facades\Session;

class ListController extends Controller
{

    public function index()
    {
        $lists=PostList::all();
        return view('admin.lists.index', ['lists' => $lists]);

    }


    public function create()
    {
        return view('admin.lists.create');
    }


    public function store(Request $request)
    {
        $list = new PostList;
        if ($list->validateForm($request->all())) {

            $input = $request->all();
            $list->fill($input);
            $list->save();
            Session::flash('flash_message', 'Ліст успішно створено!');
            return redirect()->route('list.index');
        } else {
            return redirect()->route('list.create')->withInput()->withErrors($list->getErrorsMessages());
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $list = PostList::find($id);

        return view('admin.lists.edit', ['list' => $list]);
    }


    public function update(Request $request, $id)
    {
        $list = PostList::find($id);
        if ($list->validateForm($request->all())) {

            $input = $request->all();
            $list->fill($input);
            $list->save();
            Session::flash('flash_message', 'Ліст успішно змінено!');

            return redirect()->route('list.index');
        } else {
            return redirect()->route('list.edit', ['list' => $list])->withInput()->withErrors($list->getErrorsMessages());

        }
    }


    public function destroy($id)
    {
        $list = PostList::find($id);
        $list->delete();

        Session::flash('flash_message', 'Ліст успішно видалено!');

        return redirect()->route('list.index');
    }
}
