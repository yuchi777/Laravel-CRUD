@extends('template.master')
@section('main')
<div class="row">
    <h1>新增文章</h1>
    <form class="col-md-12" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_id">文章分類</label>
            <select name="category_id" class="form-control" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}} / {{$category->slug}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="title">標題</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        
        <div class="form-group">
            <label for="content">內文</label>
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="file">檔案</label>
            <input type="file" class="form-control-file" name="file" id="file">
        </div>
        <input type="submit" class="btn btn-primary" value="新增">
    </form>
</div>
@if (count($errors)>0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection