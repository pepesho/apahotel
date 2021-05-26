@if (Auth::check())
<div class="navigation_wrapper">
    <a class="nav_top" href="/" title="ホームへ"><i class="fas fa-book"></i></a>
    <a class="nav_logout" href="" onclick="logout()" title="ログアウト"><i class="fas fa-sign-out-alt"></i></a>
</div>
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
