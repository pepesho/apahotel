@extends('layouts.app')

@section('content')
        {{-- 会員ID検索 --}}
        @include('commons/flash')
        <p><label>会員ID検索</label></p>
        <div>
            <form action="{{ route('borrows.index') }}" method="post">
            @csrf
            @method('get')
                <input type="text" name="member_id" value="{{ old('member_id')}}">
                <button type="submit">照会</button>
            </form>
        </div>
    <div id="borrow_form">
            {{-- 貸出 --}}
        <form action="{{ route('borrows.store') }}" method="post">
            @csrf
            <p>本のID<input type="text" name="ledger_id"></p>
            <p>会員ID<input type="text" name="member_id" value=""></p>
            <button type="submit">貸出</button>
        </form>
    
            {{-- 返却 --}}
            <table border="1">
                <tr>
                    <th>書籍名</th>
                    <th>会員名</th>
                    <th>貸出日</th>
                    <th>返却日</th>
                    <th>返却</th>
                </tr>
                @foreach ($borrows as $borrow)
                    <form action="{{ route('borrows.destroy',$borrow->id) }}" method="post">
                @csrf
                @method('delete')
                <tr>
                    <td>{{ $borrow->ledger->catalog->title }}</td>
                    <td>{{ $borrow->member->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td><input type="checkbox" name="checked[]"  value="{{$borrow->id}}"></td>
                </tr>
                @endforeach
            </table>
            <button type="submit">返却</button>
        </form>   
    </div>            
            
        
    {{-- 会員IDが検索されたら表示する --}}
@endsection