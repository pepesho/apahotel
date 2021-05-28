@extends('layouts.app')

@section('content')
<h1>登録書籍</h1>
<div class="main_form">
    <p><a href="{{route('catalogs.isbn')}}" class="btn btn-primary">ISBN新規登録</a></p>
    <p><a href="{{ route('catalogs.create') }}" class="btn btn-primary">なかった場合の登録</a></p>
    <button id="search_show">検索フォームを表示</button>
    <div id="search_form">     
        <form action="{{ route('catalogs.index')}}" method="post">
            @csrf
            @method('get')

            <input type="search" name="ISBN_id" value="" placeholder="ISBN_IDで検索" class="form_input">
            <br>
            <input type="search" name="title" value="" placeholder="タイトルで検索" class="form_input">
            <br>
            <select name="genre_id" class="form_input">
                <option value="" disabled selected style='display:none;'>ジャンル検索</option>
            @foreach($genres as $genre)
                <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
                    {{$genre->id}} {{$genre->genre}}
                </option>
            @endforeach
            </select>
            <br>
            <input type="search" name="author" value="" placeholder="著者名で検索" class="form_input">
            <br>
            <input type="submit" value="検索" id="sbtn" class="btn btn-primary">
        </form>
    </div>
    <p class="msg">{{ session('msg') }}</p>
    <div class="sort_wrapper">
        <form action="{{ route('catalogs.index') }}" method="post">
            @csrf
            @method('get')
            <select name="sort" onchange="submit(this.form)" class="sort">
                <option value="" disabled selected style='display:none;'>並べ替え</option>
                <option value="asc">昇順（カタログID）</option>
                <option value="desc">降順（カタログID）</option>
            </select>
        </form>
    </div>
    <table class="index_table">
        <tr>
            <th>カタログ<br>ID</th>
            <th>ISBN番号</th>
            <th>タイトル</th>
            <th>ジャンル<br>ID</th>
            <th>著者名</th>
            <th>在庫数</th>
        </tr>
    @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->ISBN_id }}</td>
            <td><a href="{{ route('catalogs.show', $book->id )}}">{{ $book->title }}</a></td>
            <td>{{$book->genre_id}}</td><td>{{$book->author}}</td>
            <td>{{ $book->ledgers_count }}</td>
        </tr>
    @endforeach
    </table>
    {{ $books->appends(Request::all())->links() }}
</div>
<script>
    $('#search_form').hide();
    $('#search_show').click(function (){
        $('#search_form').slideToggle(1000);
        var elem = document.getElementById("search_show");
        if (elem.innerHTML === "検索フォームを表示"){
            elem.innerHTML = "検索フォームを非表示";
        }else {
            elem.innerHTML = "検索フォームを表示";
        }
    });
</script>
@endsection