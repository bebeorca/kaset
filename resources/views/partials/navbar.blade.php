<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="#">
            <img width="128" src="https://dev.telkomschools.sch.id/wp-content/uploads/2021/06/ts-logo-2.png" alt="Logo KaSeT">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="#menu">Menu</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="#tentang_kami">Tentang Kami</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Halo, {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="/update-profile" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-person-circle"></i> Profile
                                    </button>
                                </form>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-in-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                <li class="nav-item me-5">
                    <a class="nav-link active" aria-current="page" href="/login"><button id="daftar" class="btn btn-danger text-light py-1 px-3">Login</button></a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>