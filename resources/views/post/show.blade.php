@extends('template.master')
@section('main')
<div class="row">
{{-- @foreach ($posts as $post) --}}

        <h2>
            {{$post->title}}
        </h2>
        <div class="col-md-12 m-2 p-2">
            <img class="img-thumbnail" src="{{ url('images/' . $post->path) }}" alt="" >
            {{-- <img src="{{ asset('images/' . $post->path) }}" alt="" width="200"> --}}
        </div>
        <div class="col-md-12 m-2 p-2">
            {{$post->content}}
            {{-- <a href="{{route('post.show',['id'=>$post->id])}}">繼續閱讀</a> --}}
            {{-- <a class="btn btn-outline-primary" href="{{route('post.show',['post'=>$post->id])}}">繼續閱讀</a> --}}
        </div>
        <div class="col-md-12">
            最後更新時間 {{$post->updated_at}}
        </div>
        {{-- <form action="{{route('post.delete',['id'=>$post->id])}}" method="post"> --}}
        <form action="{{route('post.destroy',['post'=>$post->id])}}" method="post">
            @csrf
            @method('delete')
            <input class="btn btn-outline-danger m-2" type="submit" value="刪除" onclick="return confirm('確認刪除?')">
        </form>
        <a  class="btn btn-outline-primary m-2" href="{{route('post.edit',['post'=>$post->id])}}">編輯</a>
        {{-- 
        @if(Auth::id() == $post->user_id)
        <a href="{{route('post.edit',['id'=>$post->id])}}">編輯</a>
        @endif 
        --}}

{{-- @endforeach --}}
</div>
@endsection