@extends('layouts.app')

@section('content')
<h1>職員詳細</h1>
<div class="edit_delete_wrapper">
    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary create_edit_button">変更する</a>
    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="deleteUser()"  class="btn btn-primary">削除する</button>
    </form>
    <script type="text/javascript">
    function deleteUser(){
        event.preventDefault();
        if(window.confirm('本当に削除しますか？')){
            document.getElementById('delete-form').submit();
        }
    }
    </script>
</div>
<table class="show_table">
    <tr>
        <th>職員番号</th>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>名前</th>
        <td>{{ $user->name }}</a></td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{{ $user->email }}</td>
    </tr>
</table>
<p><a href="{{ route('users.index') }}">一覧ページに戻る</a></p>
@endsection