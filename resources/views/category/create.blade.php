@extends('template.master')
@section('main')
<div class="row">
    <h1>新增分類</h1>
    <form class="col-md-12" action="{{route('category.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">分類標題</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="slug">分類英文標題</label>
            <input type="text" class="form-control" name="slug" id="slug">
        </div>
        <input type="submit" class="btn btn-primary" value="新增標題">
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
<div class="row">
    <h2 class="mt-5">分類列表</h2>
    <ul class="col-md-12 list-group">
        @foreach ($categories as $category)
            <li class="list-group-item">
                {{$category->title}} / {{$category->slug}}
                <form class="text-right" action="{{route('category.destroy',['category'=>$category->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-outline-danger " value="刪除" onclick="return confirm('確認刪除?')">
                </form>
            </li>
        @endforeach
    </ul>
</div>

@endsection