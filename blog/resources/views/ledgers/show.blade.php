@extends('layouts.app')

@section('content')
<h1>書籍詳細</h1>
<div class="edit_delete_wrapper">
    <a href="{{ route('ledgers.edit',$ledger->id) }}" class="btn btn-primary">変更する</a>
    <form action="{{ route('ledgers.destroy', $ledger->id) }}" method="POST" id="delete-form">
        @csrf
        @method('delete')
        <button type="submit" onclick="deleteledgers()" class="btn btn-primary">削除する</button>
    </form>
    <script type="text/javascript">
        function deleteledgers(){
            event.preventDefault();
            if(window.confirm('本当に削除しますか？')){
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</div>
<table class="show_table">
    <tr>
        <th>カタログID</th>
        <td>{{ $ledger->catalog_id }}</td>
    </tr>
    <tr>
        <th>タイトル</th>
        <td>{{ $ledger->catalog->title }}</td>
    </tr>
    <tr>
        <th>著者</th>
        <td>{{ $ledger->catalog->author }}</td>
    </tr>
    <tr>
        <th>出版日</th>
        <td>{{ $ledger->catalog->publisher_date}}</td>
    </tr>
    <tr>
        <th>入荷日</th>
        <td>{{ $ledger->arrival_day }}</td>
    </tr>
</table>

<a href="{{route('ledgers.index')}}">一覧ページに戻る</a>
@endsection