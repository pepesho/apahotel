@if (Auth::check())
<a class="brand" href="/"><i class="fas fa-book"></i></a>
<a href="" onclick="logout()">
    <i class="fas fa-sign-out-alt"></i>
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
@endif
