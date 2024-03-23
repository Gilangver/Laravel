@extends('pelanggan.layout.index')

@section('home')
    <br><br>
    <h5 class="mt-5" style="text-align: center;">Status Transaksi</h5>
    <div class="mt-3 d-flex gap-3 justify-content-lg-center">
        <div>
            <div class="card n text-center {{ Request::path() == 'belumbayar' ? 'active' : '' }}" style="border-radius:18px; width: 80px; height:80px;">
                <a href="/belumbayar" style="width: 80px; height:100px;"><i class="fa-solid fa-hourglass-half fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Belum Bayar</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'diproses' ? 'active' : '' }}" style="border-radius:18px; width: 80px; height:80px;">
                <a href="/diproses" style="width: 80px; height:100px;"><i class="fa-solid fa-spinner fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Diproses</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'dikirim' ? 'active' : '' }}" style="border-radius:18px; width: 80px; height:80px;">
                <a href="/dikirim" style="width: 80px; height:100px;"><i class="fa-solid fa-truck fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Dikirim</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'diterima' ? 'active' : '' }}" style="border-radius:18px; width: 80px; height:80px;">
                <a href="/diterima" style="width: 80px; height:100px;"><i class="fa-solid fa-check-to-slot fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Diterima</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'retur' ? 'active' : '' }}" style="border-radius:18px; width: 80px; height:80px;">
                <a href="/retur" style="width: 80px; height:100px;"><i
                        class="fa-solid fa-arrow-right-arrow-left fa-2x mt-4" style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Pengembalian</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'batal' ? 'active' : '' }}" style="border-radius:18px; width: 80px; height:80px;">
                <a href="/batal" style="width: 80px; height:100px;"><i class="fa-solid fa-rectangle-xmark fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Batal</p>
        </div>
    </div>

    <div class="container">
        @yield('hom')
    </div>
@endsection
