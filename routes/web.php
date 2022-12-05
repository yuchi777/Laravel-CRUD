<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Post;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//=========================================================
//直接view
// Route::get('/test',function(){
//     return view('test');
// });

//=========================================================
//經由Controller
//TestController裡的asdf方法
// Route::get('/test','TestController@asdf');
// Route::get('/test/{id}','TestController@asdf');
// Route::get('/test/{id}','TestController@asdf');

//=========================================================
//傳參至URL
// Route::get('/test/{id}',function($id){
//     return view('test')->with('id',$id);
// });

// Route::get('/test/{name}/{mail}', function($name, $mail){
//     return view('test');
// });

//=========================================================
//DB Insert
//title = "標題-1"
//content = "內容-1"
// Route::get('insert',function(){
//     //DB 靜態類別 insert 方法
//     DB::insert("INSERT INTO posts (title,content) VALUE(?,?)",["標題-1","內容-1"]);
// });

//DB Update
//title='標題1'
//id=1
// Route::get('update',function(){
//     DB::update("UPDATE posts SET title='標題1' WHERE id=?",[1]);
// });

//DB Delete
// Route::get("delete",function(){
//     DB::delete("DELETE FROM posts WHERE id = ? ", [2]);
// });

//DB SELECT
// Route::get("read",function(){
//     $results = DB::select("SELECT * FROM posts WHERE id=?", [1]);
//     // return $results;
//     foreach($results as $result){
//         return $result->title;
//     }
// });

//=========================================================
// Model 
// Route::get('read',function(){
//     $posts = Post::all();
//     return $posts;
// });

//=========================================================
//樣板
// Route::get('/post',function(){
//     return view('post.index');
// });


//經由PostController裡的index方法
// Route::get('/post','PostController@index')->name('post.index');

// Route::get('/post/show/{id}','PostController@show')->name('post.show');
// Route::delete('/post','PostController@delete')->name('post.delete');

// Route::get('/post/create','PostController@create')->name('post.create');
// Route::post('/post/store','PostController@store')->name('post.store');

// Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
// Route::put('/post','PostController@update')->name('post.update');
//===============================================================================

//經由php artisan make:controller PostController --resource之後要改路由
// Route::resource('/post','PostController');
//因controller使用resource
// Route::resource('/category','CategoryController');






//===============================================================================
//加入auth保護
// Route::resource('/post','postController')->middleware('auth');
// Route::group(['middleware'=>'auth'],function(){
//     // Route::resource('/post','postController')->except('index');//除了index
//     Route::resource('/post','PostController');
//     Route::resource('/category','CategoryController');
// });
//===============================================================================

// Route::resource('/post','postController')->only('index');//只有index


Route::resource('/post','PostController');
Route::resource('/category','CategoryController');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
