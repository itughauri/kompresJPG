<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/imges/fav.png') }}">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jpg.css') }}">
    <title>Compress Your Files here</title>
    <style>
        .jpg-form {
            border: 1px solid #F6F6F6;
            background-color: #F6F6F6;
        }

        .contactis-header {
            background-color: #EBF1F8;
        }

        #ordrform label {
            font-size: 18px;
            font-weight: 500;
            color: #404040;
        }

        .myform {
            border: 1px solid #28A79E;
            border-radius: 8px;
            box-shadow: 0px 0px 6px #00000017;
        }

        ::placeholder {
            color: #BCBCBC !important;
            font-size: 12px;
        }

        .jpgcontactus-btn {
            background-color: #28A79E !important;
            font-size: 18px;
            color: #fff !important;
        }

        body {
            position: relative;
            padding-bottom: 297px;
        }

        #footer {
            position: absolute;
            bottom: 0px;
            left: 0px;
            width: 100%;
        }

        @media (max-width:992px) {
            body {
                padding-bottom: 558px;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->
    @include('layouts.navbar')

    @include('contactus.main')

    <!-- footer -->
    @include('layouts.footer')
    <!-- js -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js') }}" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $('#ordrform').submit(function(e) {
        //         var thiss = $(this);
        //         e.preventDefault();
        //         if (thiss[0].checkValidity() === true) {
        //             e.stopPropagation();
        //             thiss.find('.form-control:invalid').first().focus();
        //         } else {
        //             e.preventDefault();
        //         }
        //         thiss.addClass('was-validated');
        //     });
        // });
    </script>
    @stack('scripts')

</body>

</html>
