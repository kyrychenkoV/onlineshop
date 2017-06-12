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

        $lists=$this::pluck('name','id')->toArray();
        asort($lists);
       return $lists;
    }

    public function validateForm($list)
    {
        $validatorList = Validator::make($list, $this->rules);
        if ($validatorList->fails()) {
            $this->errorsMessages = $validatorList->getMessageBag();

            return false;
        }

        return true;
    }
}
