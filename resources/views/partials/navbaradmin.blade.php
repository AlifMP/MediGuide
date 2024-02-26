<header>
    <a href="/" class="logo-medic"><img src="../assets/mediguide.png" alt="logo_picture"></a>

    <ul class="navlist">
        <li><a href="/dashboard" class="active">Beranda</a></li>
        <li><a href="/articles">Info Kesehatan</a></li>
        <li><a href="/users">Data User</a></li>
    </ul>
    @guest()
        <li><a href="/login" class="btn-login">Masuk / Daftar</a></li>
    @else
        <li><a href="/logout" class="btn-logout">{{ auth()->user()->name }} | Logout</a></li>
    @endguest
</header>
