@extends('layouts.app')

@section('content')

<a href="{{ route('members.edit',$member->id) }}">変更する</a>
<form action="{{ route('members.destroy', $member) }}" method="POST" id="delete-form">
@csrf
@method('delete')
<button type="submit" onclick="deleteMember()">削除する</button>
</form>
<script type="text/javascript">
function deleteMember(){
    event.preventDefault();
    if(window.confirm('本当に削除しますか？')){
        document.getElementById('delete-form').submit();
    }
}
</script>
<h1>会員詳細</h1>
<p>ID： {{ $member->id }} </p>
<p>名前： {{ $member->name }} </p>
<p>郵便番号: {{ $member->postal }} </p>
<p>住所: {{ $member->address }}</p>
<p>電話番号:{{ $member->tel }} </p>
<p>メールアドレス： {{ $member->email }} </p>
<p>生年月日: {{ $member->birthday }} </p>
<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection