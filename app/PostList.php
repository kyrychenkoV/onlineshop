<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PostList extends Model
{
    protected $table="lists";
    protected $fillable = ['name'];
    private $rules = [
        'name'     => 'required|max:200',
    ];

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function getLists(){

        $lists=$this::orderBy('name','asc')->get();
        $productName=[];
        foreach ($lists as $list){
            array_push($productName,$list->name);
        }
       return $productName;
    }

    public function validateForm($list)
    {
//        dump($list['name']);
//        $name = htmlspecialchars(stripslashes($list['name']));
//        dd($name);
        $validatorList = Validator::make($list, $this->rules);
        if ($validatorList->fails()) {
            $this->errorsMessages = $validatorList->getMessageBag();

            return false;
        }

        return true;
    }
}
