<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #FFA41B">
    <div class="container">
        <img src="{{ asset('aset/gambar/icon.png') }}" alt="" style="width: 50px; height:50;">
        <a class="navbar-brand fw-bold text-white ms-4 me-4" href="#">Sadar Hati Putra</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'dashboardpelanggan' ? 'active' : '' }} " style="font-size: 14px"
                    aria-current="page" href="/dashboardpelanggan"><i
                        class="fa-solid icon-nav fa-house fa-lg"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'produk' ? 'active' : '' }}" style="font-size: 14px"
                    aria-current="page" href="/produk"><i class="fa-solid icon-nav fa-boxes-stacked fa-lg me-1"></i>
                    Produk</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'belumbayar' ? 'active' : '' }}" style="font-size: 14px"
                        aria-current="page" href="/belumbayar"><i
                            class="fa-solid icon-nav fa-cash-register fa-lg me-1"></i> Pesanan</a>
                </li>
        </ul>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item d-flex">
                    <p class="mt-2 me-2 fw-semibold text-white">{{ Auth::user()->nama }}</p>
                    <a class="nav-link p-0 " href="/profilpelanggan" aria-expanded="false">
                        <img src="{{ asset('storage/user/' . Auth::user()->foto) }}" alt="profil"
                            class="img img-thumbnail rounded-circle border-0 mb-2 me-2" style="width: 40px;">
                    </a>
                </li>
                <li class="nav-item mt-1">
                    <a class="nav-link {{ Request::path() == 'keranjang' ? 'active' : '' }}" style="font-size: 14px"
                        aria-current="page" href="/keranjang"><i
                            class="fa-solid icon-nav fa-cart-shopping fa-lg"></i></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link ms-3 {{ Request::path() == 'profil' ? 'active' : '' }}" style="font-size: 14px"
                        aria-current="page" href="/profilpelanggan"><i class="fa-solid icon-nav fa-user fa-lg"></i></a>
                </li> --}}
            </ul>
        </div>
    @else
        <li class="nav-item">
            <a class="nav-link {{ Request::path() == 'login' ? 'active' : '' }} p-0 ms-4" style="font-size: 14px"
                aria-current="page" href="/login">
                <button class="btn btn-success fw-semibold">
                    Login
                </button>
            </a>
        </li>
        @endif
    </div>
</nav>
