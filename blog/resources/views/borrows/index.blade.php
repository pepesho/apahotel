@extends('layouts.app')

@section('content')
    {{-- <form action="{{ route('borrows.show', $borrow) }}" method="get"> --}}
        {{-- @method('get') --}}
        <input type="text" name="id" placeholder="会員ID">
        <button type="submit">照会</button>
    {{-- </form>    --}}
@endsection