<nav class="navbar navbar-expand-lg bg-primary sticky-top" data-bs-theme='dark'>
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('menu.index') }}">SPW</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @guest
                    <a class="nav-link {{ Route::is('menu.index') ? 'active' : '' }}" aria-current="page"
                        href="/">Beranda</a>
                    <a class="nav-link {{ Route::is('login') ? 'active ' : '' }}" aria-current="page"+
                        href="login">Masuk</a>
                    <a class="nav-link {{ Route::is('register') ? 'active ' : '' }}" aria-current="page"
                        href="register">Daftar</a>
                @endguest
                @auth
                    @if (!Route::is('admin') && !Route::is('admin.jurusan') && !Route::is('admin.kelas'))
                        <a class="nav-link {{ Route::is('menu.index') ? 'active' : '' }}" aria-current="page"
                            href="/">Beranda</a>
                        <a class="nav-link {{ Route::is('boot.index') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('boot.index') }}">Boot saya</a>
                        <a class="nav-link {{ Route::is('boot.index') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('boot.index') }}">Tambah Boot</a>
                    @endif
                    @if (Route::is('admin') || Route::is('admin.jurusan') || Route::is('admin.kelas'))
                        <a class="nav-link {{ Route::is('admin') || Route::is('admin.jurusan') || Route::is('admin.kelas') ? 'active' : '' }}"
                            href=""data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">Menu Admin</a>
                    @endif
                    <form action="{{ route('logout') }}" method="post">
                        @method('POST')
                        @csrf
                        <button class="btn btn-danger" type="submit"
                            onclick="return confirm('Apakah anda yakin ingin logout?')">Logout</button>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</nav>
