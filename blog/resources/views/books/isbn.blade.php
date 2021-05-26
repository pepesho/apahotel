@extends('layouts.app')

@section('content')
    <h1>ISBN番号で登録</h1>
    @include('commons/flash')
    <form action="{{ route('catalogs.check')}}" method="post">
        @csrf
        <p><input type="number" name="isbn_id" class="form_input" placeholder="ISBN_id(ハイフンなし)" required></p>
        <p><select name="genre_id" class="form_input">
            <option value="" disabled selected style='display:none;'>ジャンル</option>
        @foreach($genres as $genre)
            <option value="{{$genre->id}}"{{request('genre_id')==$genre->id?'selected':''}}>
                {{$genre->id}} {{$genre->genre}}
            </option>
        @endforeach
        </select></p>
        <p><button type="submit" class="btn btn-primary">登録</button></p>
    </form>
    <a href="{{ route('catalogs.index') }}">一覧ページに戻る</a>
@endsection