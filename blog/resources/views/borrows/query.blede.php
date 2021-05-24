<div id="borrow_form">
        <h1>貸出</h1>
        <form action="{{ route('borrows.store') }}" method="post">
            @csrf
            <p>本のID<input type="text" name="ledger_id"></p>
            <p>会員ID<input type="text" name="member_id" value=""></p>
            <button  id="borrow">貸出</button>
        </form>
    
        <h1>返却</h1>
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
                    <button type="submit" id="return">返却</button>
                    </form>   
    </div>