@extends('template.master')
@section('main')
<div class="row">
    <h1>文章列表</h1>
    <div class="col-md-12 text-right">
        <a href="{{route('post.create')}}" class="m-2 btn btn-primary">新增</a>
    </div>
    <div class="col-md-12 mx-auto">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>ID</td>
                    <td>分類</td>
                    <td style="width:20%">標題</td>
                    <td style="width:30%">內容</td>
                    <td>更新時間</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>
                        {{$post->category->title}}
                    </td>
                    <td>
                        {{-- <a href="{{route('post.show',['id'=>$post->id])}}">繼續閱讀</a> --}}
                        <a href="{{route('post.show',['post'=>$post->id])}}">{{$post->title}}</a>
                    </td>
                    <td>{{$post->content}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a style="white-space:nowrap;" class="btn btn-outline-primary" href="{{route('post.edit',['post'=>$post->id])}}">編輯</a>
                    </td>
                    <td>
                        <form action="{{route('post.destroy',['post'=>$post->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit"class="btn btn-outline-danger" value="刪除" onclick="return confirm('確認刪除?')">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
{{-- @section('footer')
    <h3>
        This is footer section
    </h3>
@endsection --}}