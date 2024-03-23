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

<body style="background-image: url('{{ asset("aset/gambar/slide2.jpg") }}');
background-size: cover;">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                <div class="box">
                    <div class="cond mt-5 kiri">
                        <div class="top-header" >
                            <header class="header fw-bold">Daftar!</header>
                            <p class="mt-1 mb-2">Silahkan masukkan data diri anda dengan benar untuk masuk kedalam
                                aplikasi</p>
                        </div>
                        <form action="{{ route('daftar') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="inputfield">
                                <i class="ff fa-solid fa-phone"></i>
                                <input type="text" class="input" id="telp" name="telp" placeholder="Nomor telepon" required>
                            </div>
                            <div class="inputfield">
                                <i class="ff fa-regular fa-user"></i>
                                <input type="text" class="input" id="nama" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="inputfield">
                                <input type="hidden" name="role" id="role" value="1">
                                <i class="ff fa-solid fa-lock"></i>
                                <input type="password" class="input" id="password2" name="password2" placeholder="Password" required>
                            </div>
                            <div class="inputfield">
                                <i class="ff fa-solid fa-lock"></i>
                                <input type="password" class="input" id="password" name="password" placeholder="Confirm Password" required>
                            </div>
                            <div class="inputfield mt-3">
                                <input type="submit" class="submit fw-bold" value="Daftar">
                            </div>
                            <div class="text-center mt-3">
                                <label> <a href="/login"><b class="text-warning">Masuk</b></a></label>
                            </div>
                        </form>
                        <div>
                            <p class="mt-3">Dengan masuk atau mendaftar, Anda menyetujui Ketentuan Layanan dan
                                Kebijakan Privasi</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-6 kanan">
                <div class="text-center box">
                    <img src="{{ asset('aset/gambar/logo.png') }}" style="width: 450px" alt="">
                </div>
            </div>
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
