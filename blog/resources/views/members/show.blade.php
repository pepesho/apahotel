@extends('layouts.app')

@section('content')
<h1>会員詳細</h1>
<div class="edit_delete_wrapper">
    <a href="{{ route('members.edit',$member->id) }}" class="btn btn-primary create_edit_button">変更する</a>
    <form action="{{ route('members.destroy', $member) }}" method="POST" id="delete-form">
        @csrf
        @method('delete')
        <button type="submit" onclick="deleteMember()" class="btn btn-primary">削除する</button>
    </form>
    <script type="text/javascript">
    function deleteMember(){
        event.preventDefault();
        if(window.confirm('本当に削除しますか？')){
            document.getElementById('delete-form').submit();
        }
    }
    </script>
</div>
<table class="show_table">
    <tr>
        <th>ID</th>
        <td id="table1">{{ $member->id }}</td>
    </tr>
    <tr>
        <th id="table1">名前</th>
        <td>{{ $member->name }}</td>
    </tr>
    <tr>
        <th>郵便番号</th>
        <td id="table1"> {{ $member->postal }}</td>
    </tr>
    <tr>
        <th id="table1">住所</th>
        <td>{{ $member->address }}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td id="table1">{{ $member->tel }}</td>
    </tr>
    <tr>
        <th id="table1">メールアドレス</th>
        <td>{{ $member->email }}</td>
    </tr>
    <tr>
        <th>生年月日</th>
        <td id="table1">{{ $member->birthday }}</td>
    </tr>
</table>

<a href="{{route('members.index')}}">一覧ページに戻る</a>
@endsection