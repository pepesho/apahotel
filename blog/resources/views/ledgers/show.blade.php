@extends('layouts.app')

@section('content')

<a href="{{ route('ledgers.edit',$ledger->id) }}">変更する</a>
<form action="{{ route('ledgers.destroy', $ledger->id) }}" method="POST" id="delete-form">
@csrf
@method('delete')
<button type="submit" onclick="deleteledgers()">削除する</button>
</form>
<script type="text/javascript">
function deleteledgers(){
    event.preventDefault();
    if(window.confirm('本当に削除しますか？')){
        document.getElementById('delete-form').submit();
    }
}
</script>
<h1>書籍詳細</h1>
<p>カタログID： {{ $ledger->catalog_id }} </p>
<p>到着日： {{ $ledger->arrival_day }} </p>
<a href="{{route('ledgers.index')}}">一覧ページに戻る</a>
@endsection