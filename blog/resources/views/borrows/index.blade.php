@extends('layouts.app');

@section('content')
    <form action="{{ route('borrows.show') }}" method="post">
        <input type="text" name="member_id" placeholder="会員ID">
        <button type="submit">照会</button>
    </form>   
@endsection