<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/logindaftar.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body style="background-image: url('{{ asset('aset/gambar/slide2.jpg') }}');
background-size: cover;">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-5 col-md-6 kiri">
                <div class="box">
                    <div class="con mt-4">
                        <form action="{{ route('validasilogin') }}" method="POST">
                            @csrf
                            <div class="top-header">
                                <header class="header fw-bold">Selamat Datang!</header>
                                <p class="mt-1 mb-1 ">Silahkan masukkan Nomor Telepon dan Password untuk masuk kedalam
                                    aplikasi</p>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $item)
                                        <strong> {{ $item }}</strong> Silahkan Login Ulang
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="inputfield">
                                <i class="ms-3 fa-solid fa-phone"></i>
                                <input type="text" class="input" id="telp" name="telp"
                                    placeholder="Nomor telepon" autofocus required>
                            </div>
                            <div class="inputfield">
                                <i class="ms-3 fa-solid fa-lock"></i>
                                <input type="password" class="input" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div>
                                <label class="daftar text-light">Apakah sudah punya akun?
                                    <a href="/daftar"><b class="text-warning">DAFTAR</b></a></label>
                            </div>
                            <div class="inputfield ">
                                <input type="submit" class="submit fw-bold" value="Masuk">
                            </div>
                            <div>
                                <p class="mt-3 mb-2">Dengan masuk atau mendaftar, Anda menyetujui Ketentuan Layanan dan
                                    Kebijakan Privasi</b></p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 bawah">
                <div class="text-center box">
                    <img src="{{ asset('aset/gambar/logo.png') }}" style="width: 450px" alt="">
                </div>
            </div>
            </form>
        </div>
</body>

</html>
<script src="{{ asset('js/custome.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
@include('sweetalert::alert')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.querySelectorAll('.atas');

        function checkViewport() {
            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var positionFromTop = element.getBoundingClientRect().top;

                if (positionFromTop - window.innerHeight <= 0) {
                    element.classList.add('show');
                }
            }
        }

        // Panggil fungsi untuk memeriksa elemen saat memuat dan saat melakukan scroll
        checkViewport();
        window.addEventListener('scroll', checkViewport);
    });

    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.querySelectorAll('.bawah');

        function checkViewport() {
            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var positionFromTop = element.getBoundingClientRect().top;

                if (positionFromTop - window.innerHeight <= 0) {
                    element.classList.add('show');
                }
            }
        }

        // Panggil fungsi untuk memeriksa elemen saat memuat dan saat melakukan scroll
        checkViewport();
        window.addEventListener('scroll', checkViewport);
    });

    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.querySelectorAll('.kiri');

        function checkViewport() {
            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var positionFromTop = element.getBoundingClientRect().top;

                if (positionFromTop - window.innerHeight <= 0) {
                    element.classList.add('show');
                }
            }
        }

        // Panggil fungsi untuk memeriksa elemen saat memuat dan saat melakukan scroll
        checkViewport();
        window.addEventListener('scroll', checkViewport);
    });

    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.querySelectorAll('.kanan');

        function checkViewport() {
            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var positionFromTop = element.getBoundingClientRect().top;

                if (positionFromTop - window.innerHeight <= 0) {
                    element.classList.add('show');
                }
            }
        }

        // Panggil fungsi untuk memeriksa elemen saat memuat dan saat melakukan scroll
        checkViewport();
        window.addEventListener('scroll', checkViewport);
    });

    $(document).ready(function() {
        $('.blur').addClass(
            'show'); // Menambahkan kelas 'show' saat dokumen siap, yang memicu efek transisi
    });
</script>
