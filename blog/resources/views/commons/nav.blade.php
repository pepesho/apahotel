@if (Auth::check())
    <ul class="navigation">
        <li>
            <a href="{{ route('home') }}">マイページ</a>
        </li>
        <li>
            <a href="{{ route('books.index') }}">みんなの蔵書</a>
        </li>
        <li>
            <a href="{{ route('likes.index') }}">お気に入り</a>
        </li>
        <li>
            <a href="" onclick="logout()">
                ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
            <script type="text/javascript">
                function logout() {
                    event.preventDefault();
                    if (window.confirm('ログアウトしますか？')) {
                        document.getElementById('logout-form').submit();
                    }
                }
            </script>
        </li>
    </ul>
@endif
