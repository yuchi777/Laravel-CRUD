<?php

namespace App\Http\Controllers;

use App\Post;
//加入自定義Model
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all(); //無法排序
        // $posts = Post::get();
        $posts = Post::orderby('id','DESC')->get();
        
        return view('post.index', compact('posts'));

        // $categories = Category::get();
        // return view('post.index')->with([
        //     'posts'=>$posts,
        //     'categories'=>$categories
        // ]);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表單送過來的值
        // return $request;

        //方法一
        //建立一個動態類別(new Post),Model; 若靜態則為Post::
        //Post的資料表
        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        //方法二
        // $post = new Post;
        // $post->fill([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);
        // $post->save();

        //方法三
        //只適用表單文字
        // $post = new Post;
        // $post->fill($request->all());
        // $post->save();

        //方法四
        //只適用表單文字,不適用檔案或關聯資料
        // Post::create($request->all());

        //基本欄位驗證
        // $this->validate($request,[
        //     'title' => 'required|min:5|max:255',
        //     'content' => 'required'
        // ]);

        //檔案上傳>先到遠端暫存>遠端存放資料夾
        //獲取檔案      $file = $request->file('file');
        //取得檔案名稱  $file->getClientOriginalName();
        //檔案大小kb    $file->getClientSize();
        //驗證碼        $file->isValid();

        $post = new Post;
        $post->fill($request->all());
        $post->category_id = $request->category_id;

        if($file = $request->file('file')){
            //取檔名
            $fileName = $file->getClientOriginalName();
            //從暫存到資料夾
            $file->move('images',$fileName);
            $post->path = $fileName;
        }

        $post->save();
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //返回確認data
        // return $post;

        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // return $post;
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $post->title = $request->title;
        // $post->content = $request->content;

        // $post->fill($request->all());
        
        $post->fill([
            'title' => $request->title,
            'content' => $request->content
        ]);
        
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        //需要id
        // Post::destroy($post->id);

        //刪除檔案
        if($file = $post->path){
            unlink('images/'.$post->path);
        }

        return redirect()->route('post.index');
    }
}
