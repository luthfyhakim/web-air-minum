<style>
    body {
        padding-top: 60px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light px-4 shadow-sm"
    style="background: rgba(245, 245, 245, 0.95); position: fixed; top: 0; width: 100%; z-index: 1030;">
    <a class="navbar-brand d-flex align-items-center" href="/">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" width="32" height="32" class="me-2">
        SWA Air Minum
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto" style="margin-right: 30px;">
            <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link" href="/product">Produk</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Kontak Kami</a></li>
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Halo, {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.index') }}">Profil</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0 m-0">
                                @csrf
                                <button type="submit" class="btn btn-link dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary ms-2">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
