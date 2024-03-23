@extends('pelanggan.layout.index')

@section('home')
    <br>
    <div class="container mt-5">
        <div class="me-4 mb-3 text-center atas" style="border-radius: 5px">
            <img src="{{ asset('aset/gambar/logo.png') }}" alt="semen gresik" style="width:130px;">
        </div>
        <div class="row justify-content-center atas">
            <div class="col-md-6 mb-3">
                <form action="/produk" class="d-flex" role="search">
                    <input class="form-control me-1" type="text" placeholder="Cari produk yang anda butuhkan!"
                        name="search" value="{{ request('search') }}" style="width: 850px; height:35px;" autofocus>
                    <button class="btn btn-warning text-light" style="height:35px;" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    @if (!request('search'))
        <div class="container row mt-3 gap-0 ">
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
                    <div class="carousel-inner kiri">
                        <div class="carousel-item active">
                            <img src="{{ asset('aset/gambar/slide1.jpg') }}" class="d-block"
                                style="width: 100%; height:310px;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('aset/gambar/slide2.jpg') }}" class="d-block"
                                style="width: 100%; height:310px;" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('aset/gambar/slide3.jpg') }}" class="d-block"
                                style="width: 100%; height:310px;" alt="...">
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
        <h5 class="mt-3 mb-0 bawah" style="text-align: center;">Rekomendasi</h5>
        <hr class="mb-3 text-warning bawah">
    @endif
    <div class="content mt-2 d-flex flex-lg-wrap gap-4 mb-lg-5 kiri">
        @foreach ($data as $p)
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
                            @if (Auth::check())
                                <button class="btn btn-outline-primary btn-sm mb-2" data-id="{{ $p->id }}"
                                    style="font-size: 14px">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="tampildata" style="display: none;"></div>

    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        //jika barang di klik maka muncul modal yang di direct ke addcart
        $('.Dbarang').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ route('detail', ['id' => ':id']) }}".replace(':id', id),
                success: function(response) {
                    $('.tampildata').html(response).show();
                    $('#detbarang').modal("show");
                }
            });
        });

        // Fungsi untuk menyembunyikan carousel
        function hideCarousel() {
            var carousel = document.getElementById('carouselExampleCaptions');
            carousel.style.display = 'none';
        }

        // Panggil fungsi hideCarousel() saat melakukan pencarian
        document.querySelector('form').addEventListener('submit', function() {
            hideCarousel();
        });
    </script>
@endsection
