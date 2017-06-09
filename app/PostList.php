<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostList extends Model
{
    protected $table="lists";
    protected $fillable = ['name'];

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
}
