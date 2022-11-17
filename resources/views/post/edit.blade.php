@extends('template.master')
@section('main')
    <h1>編輯文章</h1>
    {{-- @foreach($posts as $post) --}}
        {{-- <form action="{{route('post.update',['id'=>$post->id])}}" method="post"> --}}
        <form action="{{route('post.update',['post'=>$post->id])}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for='title'>文章標題</label>
                <input class="form-control" type='text' name='title' id='title' value='{{$post->title}}'>
            </div>

            <div class="form-group">
                <label for='content'>內文</label>
                <textarea class="form-control" name="content" id="content"  rows="3">{{$post->content}}</textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="編輯">
        </form>
    {{-- @endforeach --}}
@endsection