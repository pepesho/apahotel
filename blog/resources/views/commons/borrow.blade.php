        {{-- 貸出 --}}
        <form action="{{ route(borrows.store) }}" method="post">
            <input type="text" name="book_id">
            <input type="hidden" name="member_id" value="{{ $borrow->member_id}}">
            {{-- <input type="date" name="borrow_id" value=""> --}}
            <button type="submit">貸出</button>
        </form>

         {{-- 返却 --}}
        <table border="1">
                <tr><th>書籍ID</th><th>タイトル</th><th>貸出日</th><th>返却日</th></tr>
            <form action="{{ route('borrows.destroy')}}" method="post">
                
                @foreach ($borrows as $borrow)
                    <p>
                        <tr><td>{{ $borrow->book_id}}</td><td>{{ $borrow->catalog->title }}</td><td><input type="checkbox" name="" id=""></td></tr>
                    </p>
                @endforeach
    
            </form>
        </table>
    