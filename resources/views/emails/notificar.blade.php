<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>    <style type="text/css">    a {text-decoration: none;}    </style>    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if !mso]><!-- hh-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <!--<![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#f6f6f6"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings st-br" valign="top">
                        <table cellpadding="0" cellspacing="0" class="esd-footer-popover es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe esd-checked" align="center" style="background-image: url(https://hpy.stripocdn.email/content/guids/CABINET_0185ec3caf0610f4b9817aa1405149a0/images/31751560930679125.jpg); background-position: center center; background-repeat: no-repeat;" background="https://hpy.stripocdn.email/content/guids/CABINET_0185ec3caf0610f4b9817aa1405149a0/images/31751560930679125.jpg">
                                        <table bgcolor="rgba(0, 0, 0, 0)" class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p30r es-p30l" style="background-color: #ffffff;" align="left" bgcolor="#ffffff">
                                                        <!--[if mso]><table width="540" cellpadding="0" cellspacing="0"><tr><td width="387" valign="top"><![endif]-->
                                                        <table cellspacing="0" cellpadding="0" align="left" class="es-left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame es-m-p20b" width="387" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text es-p10b">
                                                                                        <h2>Solicitud Rechazada</h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text es-p5b">
                                                                                        <p style="color: #060606;">Señor(a) {{$union->nombres}} {{ $union->apellidos}} su solicitud para la fecha del
                                                                                        <?php
                                                                                                    setlocale(LC_TIME, 'es');
                                                                                                echo \Carbon\Carbon::parse($union->fecha)->formatLocalized('%A %d de %B de %Y')?> con horario de 
                                                                                                {{date('g:i A',strtotime($union->hora_inicio))}} a {{date('g:i A',strtotime($union->hora_fin))}} 
                                                                                                en la {{$union->sede}} ha sido rechazada por los siguientes motivos:</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text">
                                                                                        <p><span style="font-family:merriweather,georgia,'times new roman',serif;"></span>{{$request->mensaje}}</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="133" valign="top"><![endif]-->
                                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="133" align="left" class="esd-container-frame">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image" style="font-size: 0px;"><a target="_blank"><img class="adapt-img" src="https://demo.stripocdn.email/content/guids/2b2967dc-9fa5-4700-909c-cfa92b6f6894/images/5611588214747666.jpg" alt style="display: block;" width="133"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>