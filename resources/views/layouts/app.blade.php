<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="Kompres JPG Online - Kompresor Gambar Online Gratis" />
    <meta name="description" content="kompres jpg online dengan kompresor foto gratis ini. Cukup unggah gambar dan kurangi ukuran jpg tanpa kehilangan kualitas dengan satu klik." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/imges/fav.png') }}">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/jpg.css') }}" />
    <title>Home</title>
    <style>
        body {
            position: relative;
            padding-bottom: 299px;
        }

        #footer {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
        }

        @media (max-width:992px) {
            body {
                padding-bottom: 560px;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')
    <!-- upload area -->
    @include('layouts.upload')
    <!-- the best -->
    @include('layouts.best')
    <!-- how -->
    @include('layouts.how')
    <!-- features -->
    @include('layouts.features')
    <!-- faq -->
    @include('layouts.faq')
    <!-- blogs -->
    @include('layouts.blogs')
    <!-- footer -->
    @include('layouts.footer')
    <!-- js -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('script.js') }}"></script>

    @yield('scripts')

</body>

</html>
