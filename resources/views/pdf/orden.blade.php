<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>LA AGENCIA - {{$orden->id}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body {
        font-family:  Arial,sans-serif;
        font-size: 14px;
        line-height: 20px;
        max-height: 100%;
        width: 100%;
        max-width: 100%;
    }
    .field {
        font-size: 15px;
    }
    .text-data{
        font-size: 14px;
    }
    @page {
        margin-top: 0.5cm;
        margin-bottom: 2cm;
        margin-left: 2cm;
        margin-right: 1cm;
    }

    .separador {
        border-bottom: #3f9ae5;
        border-bottom-width: thick;
    }
    .layer1{
        margin-top: 10px;
    }
    .layer2{
        margin-top: 20px;
    }
    .bg-azul{
        background: #483d8b;
        height:3px;
    }
    #watermark {
        position: fixed;
        bottom:   10cm;
        opacity: 0.3;
        left:     3cm;
        width:    12cm;
        height:   8cm;
        z-index:  -1000;
    }
    footer {
        position: fixed;
        bottom: -55px;
        left: 0px;
        right: 0px;
        height: 175px;
    }
</style>
<body>
<div class="row">
    <div class="col-xs-2">
        <img src="https://pg.syscastillo.com/dist/img/LogoAgencia.jpg" style="height: 80px; width: 100%; margin-top: 5px; line-height: 5px;margin-bottom: 0;" />
    </div>
    <div class="col-xs-4">
        <p>
            <h4>Orden de Servicio</h4>
            23 y 24 Calle, Ruta Principal <br>
            Puerto Barrios, Izabal, Guatemala <br>
            Tel: 7942-9747 - Fax: 7942-9746
        </p>
    </div>
    <div class="col-xs-4">
        <div>
            Fecha Recepcion {{\Carbon\Carbon::create($orden->fecha_recepcion)->format('d-m-Y')}}
        </div>
    </div>
</div>
<br>
<table class="table table-bordered">
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    </tbody>
</table>
<footer>
    <div class="row" style="margin-bottom: 25px!important;">
        <div class="col-xs-5" style="line-height: 15px">
            f/<br>
            ______________________________________ <br>
            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; MECANICO
        </div>
        <div class="col-xs-6" style="line-height: 15px">
            f/<br>
            ______________________________________ <br>
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; CLIENTE
        </div>
    </div>
    <div class="row" style="margin-bottom: 15px!important;">
        <div class="col-xs-9" style="margin-left: 20px; margin-top:40px; text-align: justify; font-size: 10px">
            <p>
                <b>IMPORTANTE: </b> Sugerimos asegurar su mercadería en la compañia aseguradora de su confianza,
                ya que aún teiendo el mayor cuidado en su manejo, no estamos excentos de un siniestro, en cuyo caso
                las mercaderías viajan por su cuenta y riesgo. No se aceptan reclamos después de recibida su mercaderia.
            </p>
        </div>
    </div>
</footer>
</body>
</html>
