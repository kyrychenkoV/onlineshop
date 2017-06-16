<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class Post extends Model
{
    protected $fillable = ['product_name', 'description', 'post_list_id', 'price', 'img'];
    const PATH ='app/img/';
    private $path = 'app/img/';
    private $nameImage='';
    private $errorsMessages;

    private $rules = [
        'product_name'     => 'required|max:100',
        'description'      => 'required|max:1000',
        'post_list_id' => 'required',
        'img'              => 'required|image|max:10240',
    ];

    public function postList()
    {
        return $this->belongsTo('App\PostList');
    }

    public function validateForm($post)
    {

        $validatorPost = Validator::make($post, $this->rules);
        if ($validatorPost->fails()) {
            $this->errorsMessages = $validatorPost->getMessageBag();

            return false;
        }

        return true;
    }

    public function getErrorsMessages()
    {
        return $this->errorsMessages;
    }


    public function saveImage($request)
    {

        if ($this->img) {
            $this->deletePicture();
        }
        $file = $request->file('img');
        $pictureName = $file->getClientOriginalName();
        $timestamp = time();
        $pictureName = $timestamp . "_" . $pictureName;
        $file->move($this->path, $pictureName);
        $this->img = $pictureName;

        return $this->img;

    }


    public function deletePost()
    {
        $this->deletePicture();
        $this->delete();
    }


    public  function getImage()
    {

        return $this->path.$this->img;
    }

    private function deletePicture()
    {
        $exists = Storage::disk('local')->has($this->img);
        if ($exists) {
            Storage::delete($this->img);
        }
    }


    public function searchPosts($request){

        $search=$request->input('search');
        $lists=$request->input('list');

        $queryBuilder= DB::table('posts');

        if(!empty($search)){

            $queryBuilder->where('product_name', 'like', '%' . $search . '%');
        }
        if(!empty($lists)) {
            $queryBuilder->whereIn('post_list_id', $lists);
        }

        $queryBuilder->select();

       return $queryBuilder->get();
    }

    public function helperSave($request)
    {
        $picture_name= $this->saveImage($request);

        $input = $request->all();
        $this->fill($input);
        $this->img=$picture_name;
        $this->save();

    }

    public function queryJoinTable(){

       return DB::table('lists')
            ->leftJoin('posts', 'lists.id', '=', 'post_list_id')
            ->whereIn('post_list_id',[1,2])
            ->get();
    }

}
