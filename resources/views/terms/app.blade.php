<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="title" content="Syarat dan Ketentuan | KompresJPG" />
    <meta name="description" content="Baca Syarat dan Ketentuan kami sebelum menggunakan Kompres jpg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/imges/fav.png') }}">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jpg.css') }}">
    <title>privacy</title>
    <style>
        .top-banner {
            background-color: #EBF1F8;
        }

        .section-title {
            color: #28A79E !important;
        }

        .termc P,
        li {
            color: #404040 !important;
        }

    </style>
</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')
    @include('terms.main')

    <!-- footer -->
    @include('layouts.footer')
    <!-- js -->
    @push('scripts')
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js') }}" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="{{ asset('script.js') }}"></script>
    @endpush
</body>

</html>
