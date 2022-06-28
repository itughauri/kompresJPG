<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/imges/fav.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jpg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/_compress.scss') }}">
    <title>Compress Your Files here</title>
    <style>
        body {
            position: relative;
            padding-bottom: 300px;
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

    @include('compress.main')
    <!-- footer -->
    @include('layouts.footer')
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @stack('scripts001')
    <script>
        $(document).ready(function() {
            $('.progressValue').html(parseInt(1))
            document.getElementById("myinput").style.background = 'linear-gradient(to right, #28A79E 0%, #28A79E ' +
                0 + '%, #EBF1F8 ' + 0 +
                '%, #EBF1F8 100%)';
            $("#myinput").val(0)
        })

        document.getElementById("myinput").oninput = function() {
            var value = (this.value - this.min) / (this.max - this.min) * 100
            this.style.background = 'linear-gradient(to right, #28A79E 0%, #28A79E ' + value + '%, #EBF1F8 ' + value +
                '%, #EBF1F8 100%)'
            $('.percentage-value').html(parseInt(value));
            // $("#myinput").val(0);
        };

        // dlt file
        // $(document).ready(function() {
        //     $('.cross-btn').on('click', function() {
        //         $(this).parents('.mypreview').remove();
        //     });
        // });
        // show custom size input
        $(function() {
            $("#flexCheckChecked").on("click", function() {
                $(".add-custom-size").slideToggle(this.checked);
            });
        });


        $(function() {
            $("#flexCheckDefault").on("click", function() {
                $(".add-custom-size2").slideToggle(this.checked);
            });
        });


        // img upload
        function previewImages() {

            var preview = document.querySelector('.previewofimg');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...

                var reader = new FileReader();
                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title = file.name;
                    image.src = this.result;
                    preview.appendChild(image);
                });
                reader.readAsDataURL(file);
            }
        }
        document.querySelector('#uploadmore').addEventListener("change", previewImages);
    </script>

</body>

</html>
