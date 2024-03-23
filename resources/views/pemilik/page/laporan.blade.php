@extends('pemilik.layout.index')

@section('home')
    <br><br>
    <h5 class="mt-5 atas" style="text-align: center;">Laporan Penjualan</h5>
    <div class="mt-3 d-flex gap-5 justify-content-lg-center atas">
        <div>
            <a href="/harian" style="text-decoration: none;">
                <div class="card n fw-bold text-white {{ Request::path() == 'harian' ? 'active' : '' }}"
                    style="border-radius:18px; width: 150px; height:45px;">
                    <p class="text-center" style="margin-top: 10px;">Harian</p>
                </div>
            </a>
        </div>
        <div>
            <a href="/bulanan" style="text-decoration: none;">
                <div class="card n fw-bold text-white {{ Request::path() == 'bulanan' ? 'active' : '' }}"
                    style="border-radius:18px; width: 150px; height:45px;">
                    <p class="text-center" style="margin-top: 10px;">Bulanan</p>
                </div>
            </a>
        </div>
        <div>
            <a href="/tahunan" style="text-decoration: none;">
                <div class="card n fw-bold text-white {{ Request::path() == 'tahunan' ? 'active' : '' }}"
                    style="border-radius:18px; width: 150px; height:45px;">
                    <p class="text-center" style="margin-top: 10px;">Tahuan</p>
                </div>
            </a>

        </div>
    </div>
    <div class="container">
        @yield('laporan')
    </div>
@endsection
