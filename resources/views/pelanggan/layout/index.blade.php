<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/custome.css') }}">
    <title>SIP | {{ $title }}</title>
</head>

<body>
    <main>
        <header>
            @include('pelanggan.componen.navbar')
        </header>
        <section>
            <div class="container">
                @yield('home')
            </div>
        </section>
        <footer>
            <div class="container">
                @include('pelanggan.componen.footer')
            </div>
        </footer>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
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

</html>
