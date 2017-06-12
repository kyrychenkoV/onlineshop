<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class Post extends Model
{
    protected $fillable = ['product_name', 'description', 'post_list_id', 'price', 'img'];

    private $path = 'app/img/';
    private $nameImage='';
    private $errorsMessages;

    private $rules = [
        'product_name'     => 'required|max:100',
        'description'      => 'required|max:200',
        'post_list_id' => 'required',
        'price'            => 'required',
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


    public function getImage()
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

    public function getNameList($id){

        $name=DB::table('lists')->select('name')->where('id',$id)->get();
        $name=$name->first()->name;

        return $name;
    }
    public function searchPosts($request){

        $search=$request->input('search');
        $lists=$request->input('list');

        if(!empty($search)&&empty($lists)){
            $posts=Post::where('product_name', 'like', '%' . $search . '%')->get();
        }
        else if(!empty($search)&&!empty($lists)){
               $posts=Post::whereIn('post_list_id',$lists)
                    ->where('product_name', 'like', '%' . $search . '%')
                   ->get();
        }
        else if(!empty($lists)){
              $posts=Post::whereIn('post_list_id',$lists)
                    ->get();
        }

        else{
            $posts = Post::all();
        }
        return $posts;

    }

    public function helperSave($request)
    {
        $picture_name= $this->saveImage($request);

        $input = $request->all();
        $this->fill($input);
        $this->img=$picture_name;
        $this->save();

    }

}
