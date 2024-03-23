@extends('pelanggan.layout.index')

@section('home')
    {{-- halaman keranjang --}}
    <br><br>
    <form action="{{ route('co') }}" style="width: 750px;" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="container mt-5 d-flex gap-3 mb-5">
            <div>
                @forelse ($data as $k)
                    <div class="card-body border-0 rounded-4 d-flex gap-3 mb-3 shadow atas"
                        style="background-color:white; width: 600px;">
                        <img src="{{ asset('storage/barang/' . $k->barang->foto) }}" alt=""
                            style="width:130px; height:138px; border-radius:10px;">
                        <div class="desc row w-100 ms-3">
                            <div class="col-md-5">
                                <input type="hidden" value="{{ $k->id }}">
                                <p class="mt-3 mb-0" style="font-size: 18px; font-weight:700;">{{ $k->barang->nama_barang }}
                                </p>
                                <div class="d-flex align-content-between">
                                    <h6 class="mt-2">Rp.</h6>
                                    <input type="number" class="form-control border-0 fs-6 mt-2" id="harga"
                                        value="{{ $k->barang->harga_jual }}" style="width: 100px; height: 20px;"
                                        readonly></input>
                                </div>
                                <div class="row mb-2">
                                    <p>Jumlah : {{ $k->qty }}</p>
                                </div>
                            </div>
                            <div class="col-md-7 d-flex">
                                <div class="d-flex ms-3 mt-3">
                                    <div class="text-start mt-4 mb-0">
                                        <label for="price" class="me-2 fs-6">SubTotal</label><br>
                                        <label class="text-warning text-center">Rp. {{ $k->subtotal }}</label>
                                    </div>
                                </div>
                                <div class="mt-5 text-center" style="margin-left: 80px;">
                                    <a href="{{ route('deletekrj', ['id' => $k->id]) }}">
                                        <i class="fa-solid fa-trash-can fa-lg mt-3 hk"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Tampilkan pesan jika keranjang kosong -->
                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="blur text-center mt-5" style="margin-left: 410px;">
                            <img src="aset/gambar/krj.png" style="width:100px; height:100px;" class="mx-auto mb-2">
                            <h6 class="mb-2 ms-3 fw-semibold">Keranjang Belanja Anda Kosong</h6>
                            <a href="{{ route('produk') }}" class=" atas btn btn-warning text-white ms-3">Belanja
                                Sekarang</a>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- halaman data pengiriman --}}
            @if ($data->isNotEmpty())
                <div class=" col-sm-4 border-1 kanan" style="width: 450px; height: 300px; border-radius:15px;">
                    <div class="mb-3">
                        <p class="text-warning mb-1">
                            <i class="fa-solid fa-location-dot me-1 text-warning"></i>
                            Alamat Pengiriman
                        </p>
                        <input type="text" class="form-control border-0 mt-0" id="alamat" name="alamat"
                            placeholder="Alamat" aria-label="alamat" aria-describedby="basic-addon1" style="height: 50px"
                            value="{{ Auth::user()->nama }}, {{ Auth::user()->telp }}, {{ Auth::user()->detail }}, {{ Auth::user()->kec }}, {{ Auth::user()->kab }}, {{ Auth::user()->prov }}">
                    </div>
                    <textarea class="form-control" id="catatan" name="catatan" aria-label="With textarea" style="height: 110px;"
                        placeholder="(Opsional) Tinggalkan pesan ke penjual">
                    </textarea>
                    <div class="form-control border-0 mt-2">
                        <div class="row" style=" height: 60px; width:450px;">
                            <div class=" col-4 bg-primary rounded-start">
                                <p class="mb-0 mt-1 fs-6 ms-4">Total Bayar</p>
                                <input type="text" class="border-0 fw-bold fs-5 ms-4 bg- bg-primary text-light"
                                    id="totalbayar" name="totalbayar" value="{{ $total }}">
                            </div>
                            <div class="col-8 rounded-end bg-warning">
                                <button class="border-0 bg-warning" style="height: 55px; width:280px;">
                                    <p class="text-center mt-3 fs-5 fw-bold text-light">Buat Pesanan</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endif
    </form>
@endsection
