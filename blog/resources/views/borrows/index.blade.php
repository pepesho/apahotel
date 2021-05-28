@extends('layouts.app')
@section('content')
    {{-- 会員ID検索 --}}
    @include('commons/flash')
    <p class="msg">{{ session('msg') }}</p>
    <div class="borrow_wrapper">
        <div class="lend_wrapper">
            <h2>貸出</h2>
            <div class="lend_form_wrapper">
                <div class="lend_form">
                    <form action="{{ route('borrow.confirm') }}" method="get">
                    @csrf
                    <p>書籍ID<br><input type="text" name="ledger_id" class="form_input"></p>
                    <p>会員ID<br><input type="text" name="member_id" value="" class="form_input"></p>
                    <button id="borrow" class="btn btn-primary">貸出</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="return_wrapper">
            <h2>返却</h2>
            <div class="return_form_wrapper">
                <div class="return_form">
                    <form action="{{ route('borrows.index') }}" method="post">
                        @csrf
                        @method('get')
                        <p>
                            <label>会員ＩＤ
                            <br>
                            <input class="form_input" type="text" name="member_id" value="{{ old('member_id') }}"></label>
                        </p>
                        <button class="btn btn-primary" type="submit" id="query">照会</button>
                    </form>
                </div>
            </div>
            @if ($search_flag)
                <h2>返却</h2>
                <table class="return_table">
                    <tr>
                        <th>書籍ID</th>
                        <th>書籍名</th>
                        <th>会員名</th>
                        <th>貸出日</th>
                        <th>返却日</th>
                        <th>返却</th>
                    </tr>
                    @foreach ($borrows as $borrow)
                        <form action="{{ route('borrows.destroy', $borrow->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <tr>
                                <td>{{ $borrow->ledger->id }}</td>
                                <td>{{ $borrow->ledger->catalog->title }}</td>
                                <td>{{ $borrow->member->name }}</td>
                                <td>{{ $borrow->borrow_date }}</td>
                                <td>{{ $borrow->return_date }}</td>
                                <td><input type="checkbox" name="checked[]" value="{{ $borrow->id }}"></td>
                            </tr>
                    @endforeach
                </table>
                <button type="submit" id="return" class="btn btn-primary">返却</button>
                </form>
            @endif
        </div>
    </div>
@endsection