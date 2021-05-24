@if (Auth::check())
<div class="navigation_wrapper">
    <a class="nav_top" href="/"><i class="fas fa-book"></i><span class="nav_top_text">図書管理システム</span></a>
    <a class="nav_logout" href="" onclick="logout()"><i class="fas fa-sign-out-alt"></i></a>
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
