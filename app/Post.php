<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{
    protected $fillable = ['product_name', 'description', 'product_group_id', 'price', 'img'];

    private $path = 'app/img';
    private $errorsMessages;

    private $rules = [
        'product_name'     => 'required|max:100',
        'description'      => 'required|max:200',
        'product_group_id' => 'required',
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


    public function saveImage($request) //Request
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


    public function deleteNews()
    {
        $this->deletePicture();
        $this->delete();
    }


    public function getPath()
    {
        return $this->path;
    }

    private function deletePicture()
    {
        $exists = Storage::disk('local')->has($this->img);
        if ($exists) {
            Storage::delete($this->img);
        }
    }
//    public function scoupePopular($query){
//
//        return $query->where('price','>','5');
//    }

}
