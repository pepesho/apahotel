@extends('layouts.app')
@section('content')
    {{-- 会員ID検索 --}}
    @include('commons/flash')
        <h1>貸出・返却</h1>
        <h2>照会</h2>
        <div class="borrow_form_wrapper">
            <div class="borrow_form">
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
    <p>{{ session('error') }}</p>
        <div id="borrow_form">
            <h2>貸出</h2>
            <div class="borrow_form_wrapper">
                <div class="borrow_form">
                    <form action="{{ route('borrows.store') }}" method="post">
                    @csrf
                    <p>本のID<br><input type="text" name="ledger_id" class="search_form_input"></p>
                    <p>会員ID<br><input type="text" name="member_id" value="" class="search_form_input"></p>
                    <button id="borrow" class="btn btn-primary">貸出</button>
                    </form>
                </div>
            </div>
            @if ($search_flag)
            <h2>返却</h2>
            <table>
                <tr>
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
@endsection