@extends('pemilik.page.laporan')

@section('laporan')
    <div class="card border-0 mt-4 atas">
        <div class="d-flex justify-content-between">
            <div class="mt-3 ms-5">
                <p class="mb-1 fw-bold fs-4">{{ $title }}</p>
                <button class="btn btn-primary fw-bold text-white rounded-3 me-3">
                    <i class="fa-solid me-2 fa-print"></i>
                    Cetak
                </button>
            </div>
            <div class="mt-4 me-5 text-end">
                <label for="tanggal">Pilih Bulan:</label>
                <input class="border-1 ms-2" style="width:150px; height:38px; border-radius:10px;" type="month" id="tanggal" name="tanggal">
                <button class="btn btn-warning fw-bold text-white rounded-3 ms-2">
                    Tampilkan
                </button>
            </div>
        </div>
        <table class="table table-responsive mt-2 align-middle">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Tanggal</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Tejual</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody class="table-group-divider align-middle">
                @foreach ($data as $y => $x)
                    <tr>
                        <th class="ps-5">{{ $x->id }}</th>
                        <td>
                            <img src="{{ asset('storage/user/' . $x->foto) }}" alt="gambar" style="width: 50px;">
                        </td>
                        <th>{{ $x->nama }}</th>
                        <th style="max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $x->password }}</th>
                        <td>{{ $x->telp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="pagination d-flex flex-row justify-content-between">
            <div class="showData ms-2">
                Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
            </div>
            <div class="me-3">
                {{ $data->links() }}
            </div>
        </div> --}}
    </div>
@endsection
