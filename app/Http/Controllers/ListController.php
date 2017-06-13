<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostList;
use Illuminate\Support\Facades\Session;

class ListController extends Controller
{
    const LIST_CREATE='Ліст успішно створено';
    const LIST_UPDATE='Ліст успішно змінено';
    const LIST_DESTROY='Ліст успішно видалено';

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
            Session::flash('flash_message', self::LIST_CREATE);
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
            Session::flash('flash_message', self::LIST_UPDATE);

            return redirect()->route('list.index');
        } else {
            return redirect()->route('list.edit', ['list' => $list])->withInput()->withErrors($list->getErrorsMessages());

        }
    }


    public function destroy($id)
    {
        $list = PostList::find($id);
        $list->delete();

        Session::flash('flash_message',self::LIST_DESTROY);

        return redirect()->route('list.index');
    }
}
