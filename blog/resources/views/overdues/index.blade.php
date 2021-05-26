@extends('layouts.app')

@section('content')
    <h1>延滞リスト</h1>
    <button id="search_show">検索フォームを表示/非表示</button>
    <div id="search_form"> 
        <form action="{{ route('overdues.index') }}" method="post">
            @csrf
            @method('get')
            <input type="search" name="id" value="" placeholder="IDで検索"  class="search_form_input">
            <br>
            <input type="search" name="name" value="" placeholder="名前で検索"  class="search_form_input">
            <br>
            <input type="search" name="email" value="" placeholder="メールアドレスで検索"  class="search_form_input">
            <br>
            <input type="submit" value="検索" id="sbtn">
        </form>
    </div>
    <div class="sort_wrapper">
        <form action="{{ route('overdues.index') }}" method="post">
            @csrf
            @method('get')
            <select name="sort" onchange="submit(this.form)" class="search_form_input">
                <option value="">並べ替え</option>
                <option value="asc">昇順（会員ID）</option>
                <option value="desc">降順（会員ID）</option>
            </select>
        </form>
    </div>

    <table class="index_table">
        <tr>
            <th>会員ID</th>
            <th>延滞者</th>
            <th>貸出番号</th>
            <th>延滞している本</th>
            <th>メールアドレス</th>
            <th>返却日</th>
        </tr>
        @foreach ($overdues as $overdue)
            <tr>
                <td>{{ $overdue->member_id}}</td>
                <td>{{ $overdue->member->name }}</td>
                <td>{{ $overdue->ledger->id }}</td>
                <td>{{ $overdue->ledger->catalog->title }}</td>
                <td>{{ $overdue->member->email}}</td>
                <td>{{ $overdue->return_date }}</td>
            </tr>
        @endforeach
    </table>
    {{ $overdues->appends(Request::all())->links() }}
    <script>
        $('#search_form').hide();
        $('#search_show').click(function (){
            $('#search_form').slideToggle(1000);
        });
    </script>
@endsection