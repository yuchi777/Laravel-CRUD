<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //Query Builder
    function index(){
        $posts = DB::select('SELECT * FROM posts');
        //return $posts ; //all data
        return view('post.index',compact('posts'));
        // return view('post.index',['posts',$posts]);
        // return view('post.index')->with(['posts'=>$posts]);
        // return view('post.index')->with('posts',$posts);
    }

    function show($id){
        $posts = DB::select('SELECT * FROM posts WHERE id = ?',[$id]);
        return view('post.show',compact('posts'));
    }

    function delete(Request $request){
        DB::delete('DELETE FROM posts WHERE id = ?',[$request->id]);
        return redirect()->route('post.index');
    }

    function create(){
        return view('post.create');
    }

    function store(Request $request){
        DB::insert('INSERT INTO posts(title,content,created_at,updated_at)VALUE(?,?,?,?)',[
            $request->title,
            $request->content,
            now(),
            now()
        ]);
        // return $request->all(); //全部表單的值
        return redirect()->route('post.index');
    }

    function edit($id){
        $posts = DB::select('SELECT * FROM posts WHERE id =?',[$id]);
        return view('post.edit',compact('posts'));
    }

    function update(Request $request){
        // return $request;
        DB::update('UPDATE posts SET title=?,content=?,updated_at=? WHERE id=?',[
            $request->title,
            $request->content,
            now(),
            $request->id
        ]);
        return redirect()->route('post.index');
    }
    
}
