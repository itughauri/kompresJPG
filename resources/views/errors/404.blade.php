<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jpg.css') }}">
    <title>Opps!</title>
    <style>
        .goback-home {
            background-color: #28A79E !important;
            color: #fff !important;
            border-radius: 30px;
            padding: 15px 58px;
            font-size: 20px;
        }

        body {
            position: relative;
            padding-bottom: 500px;
        }

        #footer {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
        }

        @media (max-width:992px) {
            body {
                padding-bottom: 700px;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')
    {{-- Main section --}}
    @include('errors.main')
    <!-- footer -->
    @include('layouts.footer')
    <!-- js -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js') }}" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
