<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    //若使用fill()方法需要以下,並帶入所需欄位
    protected $fillable = ['title','content','path'];

    //關聯//一篇文章一個分類//一對一//belongTo Category Model
    function category(){
        return $this->belongsTo('App\Category');
    }
}
