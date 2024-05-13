<header>
    <a href="/" class="logo-medic"><img src="/assets/mediguide.png" alt="logo_picture"></a>

    <ul class="navlist">
        <li><a href="/dashboard" class="active">Dashboard</a></li>
        <li><a href="/articles">Data Articles</a></li>
        <li><a href="/users">Data User</a></li>
    </ul>
    <li>
        <div class="logout">
            <a href="/logout" class="btn-logout">{{ auth()->user()->name }}</a><img
                src="/assets/{{ auth()->user()->pfp }}" alt="profile_picture" class="pfp">
        </div>
    </li>
</header>
