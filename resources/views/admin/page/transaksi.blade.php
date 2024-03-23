@extends('admin.layout.index')
@section('home')
    <br><br>
    <h5 class="mt-5 atas" style="text-align: center;">Status Transaksi</h5>
    <div class="mt-3 d-flex gap-4 justify-content-lg-center atas">
        <div>
            <div class="card n text-center {{ Request::path() == 'antrian' ? 'active' : '' }}"
                style="border-radius:18px; width: 80px; height:80px;">
                <a href="/antrian" style="width: 80px; height:100px;"><i class="fa-solid fa-hourglass-half fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Antrian</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'delivery' ? 'active' : '' }}"
                style="border-radius:18px; width: 80px; height:80px;">
                <a href="/delivery" style="width: 80px; height:100px;"><i class="fa-solid fa-truck fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Delivery</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'selesai' ? 'active' : '' }}"
                style="border-radius:18px; width: 80px; height:80px;">
                <a href="/selesai" style="width: 80px; height:100px;"><i class="fa-solid fa-check-to-slot fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Selesai</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'return' ? 'active' : '' }}"
                style="border-radius:18px; width: 80px; height:80px;">
                <a href="/return" style="width: 80px; height:100px;"><i
                        class="fa-solid fa-arrow-right-arrow-left fa-2x mt-4" style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Pengembalian</p>
        </div>
        <div class="">
            <div class="card n text-center {{ Request::path() == 'fail' ? 'active' : '' }}"
                style="border-radius:18px; width: 80px; height:80px;">
                <a href="/fail" style="width: 80px; height:100px;"><i class="fa-solid fa-rectangle-xmark fa-2x mt-4"
                        style="color: #ffffff"></i></a>
            </div>
            <p class="mt-1 fw-bold text-center" style="font-size: 12px;">Fail</p>
        </div>
    </div>

    <div class="container">
        @yield('stts')
    </div>
@endsection
