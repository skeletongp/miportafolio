<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;

        }

        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
            color: #000;
        }

        table {
            border-spacing: 0;

        }

        table td {
            border-collapse: collapse;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .ReadMsgBody {
            width: 100%;
            background-color: #ebebeb;
        }

        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        .yshortcuts a {
            border-bottom: none !important;
        }

        @media only screen and (max-width: 600px) {
            *[class="gmail-fix"] {
                display: none !important;
            }
        }

        @media screen and (max-width: 599px) {

            table[class="force-row"],
            table[class="container"] {
                width: 100% !important;
                max-width: 100% !important;
            }

            table[class="force-row two"] {
                width: 50% !important;
                max-width: 50% !important;
            }
        }

        @media screen and (max-width: 400px) {
            td[class*="container-padding"] {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
        }

        .ios-footer a {
            color: #aaaaaa !important;
            text-decoration: underline;
        }

        @media screen and (max-width: 599px) {
            td[class="col"] {
                width: 50% !important;
                text-align: center;
            }

            td[class="cols-wrapper"] {
                padding-top: 18px;
            }

            img[class="image"] {
                padding-bottom: 10px;
            }

            div[class="subtitle"] {
                margin-top: 0 !important;
            }
        }



        .bg-image {
            position: relative;
            /* Full height */
            height: 250px;
            width: 100%;
            top: 0;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Position text in the middle of the page/image */
        .bg-text {

            color: rgb(0, 0, 0);
            font-weight: bold;
            top: 0;
            z-index: 2;
            font-size: large;
            text-align: center;
        }

        @media screen and (max-width: 400px) {
            td[class="cols-wrapper"] {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            td[class="content-wrapper"] {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }
        }

    </style>

</head>

<body style="margin:0; padding:0;" bgcolor="#e1e1e1" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

    <!-- 100% background wrapper (grey background) -->
    <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#e1e1e1">
        <tr>
            <td align="center" valign="top" bgcolor="#e1e1e1" style="background-color: #e1e1e1;">

                <br>

                <!-- 600px container (white background) -->
                <table border="0" width="600" cellpadding="0" cellspacing="0" class="container"
                    style="width:600px;max-width:600px">
                    <tr class="gmail-fix">
                        <td>
                            <table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
                                <tr>
                                    <td cellpadding="0" cellspacing="0" border="0" height="1" ;
                                        style="line-height: 1px; min-width: 600px;">
                                        <img src="http://coloredge.com/newsletters/2015/06/images/spacer.gif"
                                            width="600" height="1"
                                            style="display: block; max-height: 1px; min-height: 1px; min-width: 600px; width: 600px;" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="content" align="left" style="background-color:#ffffff">

                            <table width="600" border="0" cellpadding="0" cellspacing="0" class="force-row"
                                style="width: 600px;">
                                <tr>
                                    <td style="position: relative !important">
                                        <a href="{{ route('show', $post) }}">
                                            <div class="bg-image" style="background-image:url('{{ str_replace(' ', '%20', $post->image) }}')">
                                            </div>

                                            <div class="bg-text">

                                                <h2 style="padding: 15px 25px; width: 500px !important">
                                                    {{ $post->title }}</h2>
                                            </div>
                                        </a>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-wrapper"
                                        style="padding-left:24px;padding-right:24px;text-align: center;">
                                        <p
                                            style=";font-family:sans-serif;font-size: 24px !important;margin-top: 15px; margin-bottom: 15px;">
                                            <b style="text-transform: uppercase">Hola, {{ $visitor->name }}</b><br>Hemos
                                            subido un post que tal vez te interese
                                        </p>
                                        <p
                                            style="font-size: 16px !important;margin-top: 26px; margin-bottom: 15px;line-height: 1.4 !important;">
                                            {{ $post->extract }}
                                        </p>

                                        <hr style="border-bottom: solid 1px #000; border-top: 0;">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-wrapper" style="padding-left:12px;padding-right:12px">
                                        <br>
                                        <p
                                            style="text-transform:uppercase;font-family:sans-serif;font-size: 18px !important;margin-top: 15px; margin-bottom: 15px;text-align: center;">
                                            También puede que te interesen:</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="" style="">

                                        <div class="grid-3-3" style="width:600px; text-align:center">
                                            @foreach ($posts as $singlepost)
                                                <a href="{{ route('show', $singlepost) }}"
                                                    style="text-decoration: none; color:#000; margin:auto; text-align:center">
                                                    <div style="text-align: center">
                                                        <img src="{{ $singlepost->image }}"
                                                            style="width: 500px; height:230px" alt="Trulli"> <br>
                                                        <span style="width: 245px; text-align:center; font-size:large">
                                                            {{ $singlepost->title }}</figcaption>
                                                    </div> <br><br>
                                                </a>

                                            @endforeach
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td style="background:#fff;text-align:center;width:100%;height:15px;"></td>
                                </tr>
                                <tr>
                                    <td class="content-wrapper"
                                        style="padding-left:24px;padding-right:24px;text-align: center;" align="center">
                                        <hr style="border-bottom: solid 1px #000; border-top: 0;">
                                        <br>
                                        <p
                                            style="font-weight:bold;font-family:sans-serif;font-size: 14px !important;margin-top:0; margin-bottom: 15px;text-align: center;">
                                            Recuerda que puedes ver este y otros temas en nuestro blog.</p>
                                        <div>

                                            <a href="{{ route('blog') }}"
                                                style="background-color:#304eaf;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:13px;font-weight:bold;line-height:47px;text-align:center;text-decoration:none;width:124px;-webkit-text-size-adjust:none;">VER
                                                BLOG</a>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background:#fff;text-align:center;width:100%;height:25px;"></td>
                                </tr>

                                <tr>
                                    <td style="background:#e1e1e1;text-align:center;width:100%;height:15px;"></td>
                                </tr>
                                <tr>

                                    <div style="text-align: center; ">
                                        <a href="https://www.facebook.com/Ismael-Digitador-105508274847069"
                                            target="_blank" title="Facebook"><img
                                                src="https://res.cloudinary.com/dboafhu31/image/upload/v1628035272/imagen_2021-08-03_200112_pvxcmb.png"
                                                width="42" height="38" alt="Facebook"></a>
                                        <a href="https://api.whatsapp.com/send?phone=18493153337&text=." target="_blank"
                                            title="Twitter"><img
                                                src="https://res.cloudinary.com/dboafhu31/image/upload/v1628035253/imagen_2021-08-03_200052_mdorej.png"
                                                width="50" height="46" alt="WhatsApp"></a>
                                        <a href="https://www.linkedin.com/in/ismael-contreras-michel-77b190211/"
                                            target="_blank" title="LinkedIn"><img
                                                src="https://res.cloudinary.com/dboafhu31/image/upload/v1628035294/imagen_2021-08-03_200134_rovoq3.png"
                                                width="50" height="46" alt="LinkedIn"></a>
                                    </div>
                                </tr>
                                <tr>
                                    <td style="background:#e1e1e1;text-align:center;width:100%;height:5px;"></td>
                                </tr>
                                <tr>
                                    <td style="background:#e1e1e1;text-align:center;">
                                        <div
                                            style="font-family:Helvetica, Arial, sans-serif;font-size:14px !important;color:#000000;text-align: center;line-height:1.4;">
                                            Has recibido este correo porque te has suscrito a nuestro newsletter. <br>
                                            Si ya no quieres recibir más correo, puedes <a href="{{route('unsuscribe', $visitor->id)}}">cancelar tu
                                                suscripción</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background:#e1e1e1;text-align:center;width:100%;height:30px;"></td>
                                </tr>

                            </table>

                        </td>
                    </tr>


                </table><br><br><br><br>
                <!--/600px container -->


            </td>
        </tr>
    </table>


</body>

</html>
