<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class Post extends Model
{
    protected $fillable = ['product_name', 'description', 'post_list_id', 'price', 'img'];

    private $path = 'app/img';
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

    public function getNameList($id){

        $name=DB::table('lists')->select('name')->where('id',$id)->get();
        $name=$name->first()->name;

        return $name;
    }
    public function searchPosts($request){

        $search=$request->input('search');
        $data=$request->all();
         if(!empty($search)&&count($data)==1){
            $posts=Post::where('product_name', 'like', '%' . $search . '%')->get();
        }
        else if(!empty($search)&&count($data)>1){
            $posts=collect();

            foreach ($data as $key =>$value){
                $post=Post::where('post_list_id',$key)
                    ->where('product_name', 'like', '%' . $data['search'] . '%')
                    ->get();

                $posts->push($post->all());
            }
            $posts=$posts->collapse();

        }
        else if(count($data)>1){
            $posts=collect();

            foreach ($data as $key =>$value){
                $post=Post::where('post_list_id',$key)
                    ->get();

                $posts->push($post->all());

            }
            $posts=$posts->collapse();
        }

        else{
            $posts = Post::all();
        }
        return $posts;

    }

}
