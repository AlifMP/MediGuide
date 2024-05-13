<header>
    <a href="/" class="logo-medic"><img src="../assets/mediguide.png" alt="logo_picture"></a>

    <ul class="navlist">
        <li><a href="/" class="active">Beranda</a></li>
        <li><a href="/blogs">Info Kesehatan</a></li>
        <li><a href="/chat">Chat Dokter</a></li>
    </ul>
    @guest()
        <li><a href="/login" class="btn-login">Masuk / Daftar</a></li>
    @else
        <li>
            <div class="logout">
                <a href="/logout" class="btn-logout">{{ auth()->user()->name }}</a><img
                    src="../assets/{{ auth()->user()->pfp }}" alt="profile_picture" class="pfp">
            </div>
        </li>
    @endguest
</header>
