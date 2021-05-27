@extends('layouts.app')
@section('content')
<h1>館内書籍一覧</h1>
<p><a href="{{ route('ledgers.create') }}" class="btn btn-primary">新規入荷</a></p>
<button id="search_show">検索フォームの表示/非表示</button>
<div id="search_form">
    <form action="{{ route('ledgers.index')}}" method="post">
        @csrf
        @method('get')
        <input type="search" name="title" value="" placeholder="タイトルで検索" class="form_input">
        <br>
        <input type="search" name="author" value="" placeholder="著者名で検索" class="form_input">
        <br>
        <input type="submit" value="検索" id="sbtn" class="btn btn-primary">
    </form>
</div>
<div class="sort_wrapper">
    <form action="{{ route('ledgers.index') }}" method="post">
        @csrf
        @method('get')
        <select name="sort" onchange="submit(this.form)" class="sort">
            <option value="" disabled selected style='display:none;'>並べ替え</option>
            <option value="asc">昇順（書籍ID）</option>
            <option value="desc">降順（書籍ID）</option>
        </select>
    </form>
</div>

<table class="index_table">
    <tr>
        <th>書籍<br>ID</th>
        <th>タイトル</th>
        <th>著者</th>
        <th>入荷日</th>
        <th>貸出可否</th>
    </tr>
@foreach ($ledgers as $ledger)
    <tr>
        <td><a href="{{ route('ledgers.show', $ledger->id) }}">{{ $ledger->id }}</a></td>
        <td>{{ $ledger->catalog->title }}</td>
        <td>{{ $ledger->catalog->author }}</td>
        <td>{{ $ledger->arrival_day }}</td>
        <td>
            @isset($ledger->borrows)
                {{ "×" }}               
            @else
                {{ "〇" }}
            @endisset
        </td>
    </tr>
@endforeach
</table>
{{ $ledgers->appends(Request::all())->links() }}
<script>
    $('#search_form').hide();
    $('#search_show').click(function (){
        $('#search_form').slideToggle(1000);
    });
</script>
@endsection