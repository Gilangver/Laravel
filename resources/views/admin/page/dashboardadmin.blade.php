@extends('admin.layout.index')

@section('home')
    {{-- halaman awal --}}
    <br><br>
    <div class="d-flex flex-wrap mt-5 mb-5 justify-content-evenly">
        <div class="card border-0 shadow border-start border-danger border-5" style="width:300px;">
            <div class="car-body m-auto ">
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

        <div class="card border-0 shadow border-start border-warning border-5" style="width:300px;">
            <div class="car-body m-auto">
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

        <div class="card border-0 shadow border-start border-success border-5" style="width:300px;">
            <div class="car-body m-auto">
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
    <div class="card border-start border-5 border-success  border-0 mt-5  bawah">
        <table class="table table-responsive mt-2 align-middle ">
            <thead>
                <tr>
                    <th class="ps-5" class="text-center" scope="col" colspan="3">Nama Pelanggan</th>
                    <th scope="col" colspan="3" class="text-center">Total</th>
                    <th scope="col" colspan="3" class="text-end me-5">Riwayat Transaksi Hari ini</th>
                </tr>
            </thead>
            <tbody class="table-group-divider align-middle">
                {{-- @foreach ($data as $y => $x) --}}
                <tr>
                    <td class=" ps-5" colspan="3">paidi</td>
                    <th class=" text-center" colspan="3">10000000 </th>
                    <th class="text-end">
                        <button class="me-5 btn btn-danger detailadmin"
                            data-nama="Orang Ngawi">
                            <i class="fa-solid fa-eye me-2" colspan="3" > </i>Detail
                        </button>
                    </th>

                </tr>
                {{-- @endforeach --}}
            </tbody>
            <tbody class="table-group-divider align-middle">
                <tr>
                    <td class=" ps-5" colspan="3"></td>
                    <th class=" text-center" colspan="3"> </th>
                    <th class="text-end">
                        <p class="me-3">Total Pendapatan: Rp.500.000.000</p>
                    </th>
                </tr>
            </tbody>
        </table>
        {{-- <div class="pagination d-flex flex-row justify-content-between kiri">
                <div class="showData ms-2">
                    Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                </div>
                <div class="me-3">
                    {{ $data->links() }}
                </div>
            </div> --}}
    @endsection
