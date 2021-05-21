@extends('layouts.app')

@section('content')
    {{-- 会員ID検索 --}}
    {{-- <form action="{{ route('borrows.index', $borrow) }}" method="get">
        <input type="text" name="member_id" placeholder="会員ID">
        <button type="submit">照会</button>
    </form>  --}}
             {{-- 貸出 --}}
            <form action="{{ route('borrows.store') }}" method="post">
                @csrf
                <p>本のID<input type="text" name="book_id"></p>
                <p>会員ID<input type="text" name="member_id" value=""></p>
                <button type="submit">貸出</button>
            </form>
     
             {{-- 返却 --}}
            <table border="1">
                    <tr><th>書籍ID</th><th>タイトル</th><th>貸出日</th><th>返却日</th></tr>
                    @foreach ($borrows as $borrow)
                        <p>
                            <form action="{{ route('borrows.destroy',$borrow->id) }}" method="post">
                                @csrf
                                @method('delete')
                            <tr><td>{{ $borrow->book_id}}</td><td></td>
                                <td><input type="checkbox" name="checked[]"  value="{{$borrow->id}}"></td></tr>
                        </p>
                        
                    @endforeach
                </table>
                    <button type="submit">返却</button>
                    </form>   
                    
            
        
    {{-- 会員IDが検索されたら表示する --}}
@endsection