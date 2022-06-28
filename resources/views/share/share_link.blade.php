<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="title" content="Kompres JPG Online - Kompresor Gambar Online Gratis" />
        <meta name="description"
            content="kompres jpg online dengan kompresor foto gratis ini. Cukup unggah gambar dan kurangi ukuran jpg tanpa kehilangan kualitas dengan satu klik." />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="{{ asset('assets/imges/fav.png') }}">
        <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/jpg.css') }}" />
        <title>Download</title>
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
                    padding-bottom: 1000px;
                }
            }
        </style>
    </head>
<body>
    @include('layouts.navbar')
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('assets/share-icons/download.svg') }}" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center align-items-center ">
                    <div class="" style="padding-bottom: 160px " >
                        <a class="btn download-btn text-white restatrt-btn mt-md-4" href="{{ $img }}" download>Unduh</a>
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footer')
</body>
</html>
