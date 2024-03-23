<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #FFA41B">
    <div class="container">
        <img src="{{ asset('aset/gambar/icon.png') }}" alt="" style="width: 50px; height:50;">
        <a class="navbar-brand fw-bold text-white ms-2" href="#">Sadar Hati Putra</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'dashboardadmin' ? 'active' : '' }} " aria-current="page"
                        href="/dashboardadmin"><i class="fa-solid icon-nav fa-house fa-lg"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'transaksi' ? 'active' : '' }}" aria-current="page" href="/transaksi"><i
                            class="fa-solid icon-nav fa-money-bill-1-wave fa-lg"></i> Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'barang' ? 'active' : '' }}" aria-current="page" href="/barang"><i
                            class="fa-solid icon-nav fa-boxes-stacked fa-lg"></i> Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'pelanggan' ? 'active' : '' }}" aria-current="page" href="/pelanggan"><i
                            class="fa-solid icon-nav fa-users fa-lg"></i> Pelanggan</a>
                </li>
                <li class="nav-item ms-4 d-flex">
                    <p class="mt-2 me-2 fw-semibold text-white">{{ Auth::user()->nama }}</p>
                    <a class="nav-link p-0 {{ Request::path() == 'profiladmin' ? 'active' : '' }}" href="/profiladmin" aria-expanded="false">
                        <img src="{{ asset('storage/user/' . Auth::user()->foto) }}" alt="profil"
                            class="img img-thumbnail rounded-circle border-0 mb-2 me-2" style="width: 40px;">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
