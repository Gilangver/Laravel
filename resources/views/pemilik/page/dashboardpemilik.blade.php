@extends('pemilik.layout.index')

@section('home')
    {{-- halaman awal --}}
    <br><br>
    <div class="d-flex flex-wrap mt-5 mb-5 justify-content-evenly">
        <div class="card border-0 shadow border-start border-danger border-5 kiri" style="width:300px;">
            <div class="car-body m-auto  ">
                <div class="d-flex gap-5">
                    <div class="me-3 mt-3 mb-3">
                        <p class="text-danger fw-bold">Pemasukan Harian</p>
                        <p class="fw-bold">Rp. 500.000.000</p>
                    </div>
                    <div>
                        <i class="fa-regular fa-clipboard fa-2x mt-4" style="color: rgb(71, 71, 71);"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow border-start border-warning border-5 atas" style="width:300px;">
            <div class="car-body m-auto ">
                <div class="d-flex gap-3">
                    <div class="me-3 mt-3 mb-3">
                        <p class="text-warning fw-bold">Jumlah Transaksi Hari ini
                        <p class="fw-bold">Rp. 500.000.000</p>
                    </div>
                    <div>
                        <i class="fa-regular fa-clipboard fa-2x mt-4" style="color: rgb(71, 71, 71);"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow border-start border-success border-5 kanan" style="width:300px;">
            <div class="car-body m-auto ">
                <div class="d-flex gap-5">
                    <div class="me-3 mt-3 mb-3">
                        <p class="text-success fw-bold">Barang Terlaris</p>
                        <p class="fw-bold">Rp. 500.000.000</p>
                    </div>
                    <div>
                        <i class="fa-regular fa-clipboard fa-2x mt-4" style="color: rgb(71, 71, 71);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
