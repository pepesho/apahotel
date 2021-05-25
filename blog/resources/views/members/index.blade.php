@extends('layouts.app')

@section('content')
<h1>会員一覧</h1>
<p class="new_button"><a href="{{ route('members.create')}}" class="text">新規登録</a></p>
<button id="search_show">検索フォームの表示/非表示</button>
<div id="search_form">
    <form action="{{ route('members.index')}}" method="post">
        @csrf
        @method('get')
        <input type="search" name="id" value="" placeholder="IDで検索" class="search_form_input">
        <br>
        <input type="search" name="email" value="" placeholder="メールアドレスで検索" class="search_form_input">
        <br>
        <input type="submit" value="検索" id="sbtn">
    </form>
</div>
    <form action="{{ route('members.index') }}" method="post">
        @csrf
        @method('get')
        <select name="sort" onchange="submit(this.form)"  class="search_form_input">
            <option value="" disabled selected style='display:none;'>並べ替え</option>
            <option value="asc">昇順（会員ID）</option>
            <option value="desc">降順（会員ID）</option>
        </select>
    </form>

<table>
    <tr>
        <th>会員ID</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>貸出冊数</th>
    </tr>
@foreach ($members as $member)
    <tr>
        <td>{{ $member->id }}</td>
        <td><a href="{{ route('members.show', $member->id )}}">{{ $member->name }}</td>
        <td>{{ $member->email }}</td>
        <td>{{ $member->borrows_count }}</td>
    </tr>
@endforeach
</table>

 {{ $members->appends(Request::all())->links() }} 
 <script>
    $('#search_form').hide();
    $('#search_show').click(function (){
        $('#search_form').slideToggle(1000);
    });
</script>
@endsection