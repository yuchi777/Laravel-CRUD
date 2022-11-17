<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //若大量賦值給予值需要保護機制
    protected $fillable = ['title','slug'];

    //關聯//一個分類有很多文章//一對多//hasMany to Post Model
    function posts(){
        return $this->hasMany('App\Post');
    }
}
