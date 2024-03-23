@extends('pelanggan.layout.index')

@section('home')
    {{-- halaman awal --}}
    <br><br>
    <div class="container row mt-5 gap-0 ">
        <div class="col-sm-5 col-md-8">
            <div id="carouselExampleCaptions" style="width: 720px;" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active kiri">
                        <img src="{{ asset('aset/gambar/slide1.jpg') }}" class="d-block" style="width: 100%; height:310px;"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('aset/gambar/slide2.jpg') }}" class="d-block" style="width: 100%; height:310px;"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('aset/gambar/slide3.jpg') }}" class="d-block" style="width: 100%; height:310px;"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-sm-5 offset-sm-2 col-md-4 offset-md-0">
            <div class="col-sm-9 mb-2">
                <img src="{{ asset('aset/gambar/slide2.jpg') }}" class="atas" style="width: 350px; height:150px;">
            </div>
            <div class="col-sm-9">
                <img src="{{ asset('aset/gambar/slide3.jpg') }}" class="bawah" style="width: 350px; height:150px;">
            </div>
        </div>
    </div>
    <div class="clearfix row mt-5 align-items-center">
        <div class="col-md-6">
            <div class="content-text kiri">
                Toko bangunan sadar hati putra merupakan sebuah bisnis yang menyediakan perlengkapan bangunan yang terletak
                di Jalan Affandi
                CT, Jl. Deresan I No.55, Karang Gayam, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa
                Yogyakarta 55281.
                Toko bangunan sadar hati putra telah berdiri sejak tahun 1980 an. Pemilik dari toko bangunan sadar hati
                putra saat ini
                yaitu bapak Aris. Toko bangunan sadar hati putra mulai diserahkan penuh kepada bapak Aris sejak tahun 2016
                yang dulunya
                masih dipegang oleh orang tua bapak aris.
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('aset/gambar/logo.png') }}" style="width:100%" alt="" class="kanan">
        </div>
    </div>

    <div class="d-flex justify-content-lg-around mt-5">
        <div class="d-flex align-items-center gap-4 kiri">
            <i class="fa fa-users fa-2x"></i>
            <p class="m-0 fs-5">+ 300 Pelanggan</p>
        </div>
        <div class="d-flex align-items-center gap-4 bawah">
            <i class="fas fa-clock fa-2x"> </i>
            <p class="m-0 fs-5">+ 30 Tahun</p>
        </div>
        <div class="d-flex align-items-center gap-4 kanan">
            <i class="fas fa-hammer fa-2x"></i>
            <p class="m-0 fs-5">+ 300 Produk</p>
        </div>
    </div>
    {{-- Halaman rekomendasi --}}
    <h3 class="mt-5 bawah" style="text-align: center;">Rekomendasi</h3>
    <hr class="mb-3">
    <div class="content mt-2 d-flex flex-lg-wrap justify-content-center gap-4 mb-lg-5 bawah">
        @foreach ($data as $p)
            <a href="{{ route('produk', ['id' => $p->id]) }}" class="text-decoration-none text-dark">
                <div class="card shadow border-black Dbarang" data-id="{{ $p->id }}" style="width: 165px">
                    <div class="card border-0" style="border-radius: 5px; width:163px; height:163px; ">
                        <img src="{{ asset('storage/barang/' . $p->foto) }}" alt="semen gresik"
                            style="width:163px; height:163px;">
                    </div>
                    <div class="card bg-light border-0">
                        <div class="me-3 ms-3">
                            <p class="mb-2 mt-2 text-start">{{ $p->nama_barang }}</p>
                            <div class=" d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex">
                                    <p class="text-warning fw-bold mt-1" style="font-size: 13px;">Rp </p>
                                    <p class="text-warning fw-bold">{{ $p->harga_jual }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    {{-- halaman saran --}}
    <h4 class="text-center mt-md-5 mb-md-2">Contact Us</h4>
    <hr class="mb-3">
    <div class="row  mb-md-5">
        <div class="col-md-7 d-flex gap-3">
            <div>
                <img src="{{ asset('aset/gambar/toko.jpg') }}" alt="" class="kiri"
                    style="width: 425px; height:250px; border-radius:0 15% 0 15%;">
            </div>
            <div>
                <div class="mb-2">
                    <img src="{{ asset('aset/gambar/toko.jpg') }}" alt="" class="atas"
                        style="width: 180px; height:120px; border-radius:15% 0 15% 0;">
                </div>
                <div>
                    <img src="{{ asset('aset/gambar/toko.jpg') }}" alt="" class="bawah"
                        style="width: 180px; height:120px; border-radius:15% 0 15% 0;">
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card shadow mt-3 bawah">
                <div class="card-header text-center bg-warning">
                    <h4 class="text-white fw-semibold">Kritik dan saran</h4>
                </div>
                <div class="card-body bawah">
                    <p class="p-0 mb-4 text-lg-center">Masukan kritik dan saran anda kepada aplikasi kami ini agar kami
                        dapat memberikan
                        apa yang menjadi kebutuhan anda dan kami dapat berkembang lebih baik lagi.
                    </p>
                    <div class="bawah sosmed justify-content-lg-center d-flex gap-4">
                        <i class="fa-brands fa-whatsapp fa-2x"></i>
                        <i class="fa-brands fa-instagram fa-2x"></i>
                        <i class="fa-brands fa-facebook fa-2x"></i>
                        <i class="fa-brands fa-webflow fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
