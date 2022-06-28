<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $details['title'] }}</title>



    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">



    <style>
        @media only screen and (min-width: 620px) {



            .mail-body {

                width: 600px;

                margin-left: auto;

                margin-right: auto;

            }

        }



        @media only screen and (min-width: 568px) {

            .msg-body {

                width: 568px;

                margin-left: auto;

                margin-right: auto;

            }

        }



        .msg-body {

            background-color: white;

            padding: 16px;

            border-radius: 4px;

        }



        .mail-body {

            background-color: #2F86A6;

            padding: 16px;

        }



        body {

            margin: 0;

            padding: 0;

        }

        #footer a {

            text-decoration: none;

            color: white;

        }

        p#footer {

            color: white !important;

        }



        h1,

        h2,

        h3,

        h4,

        h5,

        h6,

        p {

            margin-top: 0;

        }



        table,

        tr,

        td {

            vertical-align: top;

            border-collapse: collapse;

        }



        h1 {

            font-family: 'Roboto', sans-serif;

            font-weight: bold;

            color: #054064;

            margin-bottom: 16px;

        }



        p {

            font-family: 'Roboto', sans-serif;

            font-size: 16px;

            font-weight: normal;

            color: #3d4246;

            margin: 0;

            margin-bottom: 4px;

            line-height: 26px;

        }



        a {

            font-family: 'Roboto', sans-serif;

            color: #054064;

        }



        a[x-apple-data-detectors='true'] {

            color: inherit !important;

            text-decoration: none !important;

        }



        .container {

            width: 100%;

        }



        :root {

            --primary: #089f81;

            --dark: #020c16;

            --dark2: #414850;

            --dark3: #7f858b;

            --primarylight: #e4efff;

            --greenlight: #eaf0f2;



            --success: #198754;

            --danger: #dc3545;

            --warning: #ffc107;

        }

        .restatrt-btn {
            background-color: $them !important;
            color: #fff !important;
            border-radius: 35px;
            padding: 12px 35px;
            font-size: 15px;
            font-weight: 500;
            margin-top: 20px;
            margin-left: 27px;
        }

    </style>

</head>


<body>


    <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;

    vertical-align: top;min-width: 320px;Margin: 0 auto;width:100%;" cellpadding="0" cellspacing="0">

        <tbody>

            <tr style="vertical-align: top;">

                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">

                    <div class="container">

                        <div class="mail-body">

                            <div class="row">

                                <div style="border-collapse: collapse;display: table;width: 100%;text-align: center;">

                                    <div style="display: table-cell;border: none;padding-bottom: 10px;vertical-align: middle;text-align: left;">

                                        <a href="{{ route('index') }}" style="display: inline-block;">
                                            <img src="{{ asset('assets/imges/404.png') }}" alt="logo" height="38.8">
                                        </a>


                                    </div>

                                </div>

                            </div>

                            <div class="msg-body d-flex justify-content-center ">
                                <p>Unduh disini</p>
                                <a class="" href="{{ isset($details['zip']) ? asset($details['zip']) : asset($details['img'][0]) }}">Download</a>
                            </div>

                            <div class="row">

                                <div style="border-collapse: collapse;display: table;width: 100%;text-align: center;">

                                    <div style="display: table-cell;border: none;">

                                        <p id="footer" style="margin-top: 16px;font-size: 14px;color: #414850;font-family: 'Roboto', sans-serif;">

                                            Copyright © {{ date('Y') }},

                                            <span>

                                                <a href="{{ URL('/') }}" style="text-decoration: none; font-family: 'Roboto', sans-serif;">{{ env('APP_NAME') }}</a>

                                            </span>

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </td>

            </tr>

        </tbody>

    </table>

</body>



</html>
