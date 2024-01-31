<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boleto</title>
    <link rel="icon" href="img/logo.svg" type="image/x-icon">
    <!-- Styles -->
</head>
<body style="width: 100%; height:100%; margin: 0 auto; font-family:cursive;">
    <div class="img-fluid text-center" style="text-align: center;">
        <p style="font-weight:bold;">Universidad Juárez del Estado de Durango</p>
        <p style="font-weight:bold;">Direccion de Difusión Cultural</p>
        <p style="font-weight:bold;">Presentan</p>
        <div class="row img-fluid">
            <p style="background-color: #b11830;color: white; font-weight:bold;">EVENTO</p>
            <p style="text-transform: uppercase;">{{$reservation->event->nombre}}</p>
        </div>
        <table style="width:100%; text-align:center;">
            <tr>
                <td style="width:50%;">
                    <p style="background-color: #b11830;color: white; margin-right:2%; font-weight:bold;">FECHA</p>
                    <p style="margin-right:2%;text-transform: uppercase;">{{$reservation->event->fecha_inicio}}</p>
                </td>
                <td style="width:50%;">
                    <p style="background-color: #b11830;color: white; margin-left:2%; font-weight:bold;">HORA</p>
                    <p style="margin-left:2%;text-transform: uppercase;">{{$reservation->event->hora}}</p>
                </td>
            </tr>
        </table>
        <div class="row img-fluid">
            <p style="background-color: #b11830;color: white; margin-right:5%; margin-left:5%; font-weight:bold;">LUGAR</p>
            <p style="text-transform: uppercase;">{{$reservation->event->estate->nombre}}</p>
        </div>
        <table style="width:100%; text-align:center;">
            <tr>
                <td style="width:50%;">
                    <p style="background-color: #b11830;color: white; margin-right:2%; font-weight:bold;">COOPERACIÓN</p>
                    <p style="margin-right:2%;text-transform: uppercase;">${{$reservation->event->precio}}</p>
                </td>
                <td style="width:50%;">
                    <p style="background-color: #b11830;color: white; margin-left:2%; font-weight:bold;">SECCIÓN</p>
                    <p style="margin-left:2%;text-transform: uppercase;">General</p>
                </td>
            </tr>
        </table>
        <table style="width: 100%; text-align:center;">
            <tr>
                <td style="width: 50%;">
                    <p style="font-weight:bold; padding-bottom:2%;">FOLIO: 00{{$reservation->id}}</p>
                </td>
            </tr>
        </table>
        <div class="row img-fluid" style="border-bottom-style: dashed; padding-bottom:5%; border-bottom-width:0.17rem;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Logo_de_la_Universidad_Ju%C3%A1rez_del_Estado_de_Durango.svg" alt="" width="10%">
        </div>
        <div class="row img-fluid">
            <p style="background-color: #b11830;color: white; font-weight:bold; margin-top:5%;">EVENTO</p>
            <p style="text-transform: uppercase;">{{$reservation->event->nombre}}</p>
        </div>
        <table style="width:100%; text-align:center;">
            <tr>
                <td style="width:50%;">
                    <p style="background-color: #b11830;color: white; margin-right:2%; font-weight:bold;">FECHA</p>
                    <p style="margin-right:2%;text-transform: uppercase;">{{$reservation->event->fecha_inicio}}</p>
                </td>
                <td style="width:50%;">
                    <p style="background-color: #b11830;color: white; margin-left:2%; font-weight:bold;">HORA</p>
                    <p style="margin-left:2%;text-transform: uppercase;">{{$reservation->event->hora}}</p>
                </td>
            </tr>
        </table>
        <table style="width:100%; text-align:center;">
            <tr>
                <td style="width:50%;">
                    <p style="font-weight:bold; padding-bottom: 2%;">FOLIO: 00{{$reservation->id}}</p>
                </td>
            </tr>
        </table>
        <div class="row img-fluid">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Logo_de_la_Universidad_Ju%C3%A1rez_del_Estado_de_Durango.svg" alt="" width="10%" style="margin-bottom: 1%;">
        </div>
    </div>
</body>
</html>