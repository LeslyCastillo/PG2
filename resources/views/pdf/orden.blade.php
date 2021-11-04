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
            <h4>ORDEN DE TRABAJO</h4>
            23 y 24 Calle, Ruta Principal <br>
            Puerto Barrios, Izabal, Guatemala <br>
            Tel.: 7942-9747 - Fax: 7942-9746
        </p>
    </div>
    <div class="col-xs-4">
        <div>
            Fecha De Recepción {{\Carbon\Carbon::create($orden->fecha_recepcion)->format('d-m-Y')}}

        </div>
    </div>
</div>
<br>
<style>
    table{border-radius: 10px 10px 0 0 ; border-collapse: collapse; overflow: hidden}
</style>
<table class="table table-bordered">
    <tbody>
    <tr>
        <th colspan="6" class="text-center" style=" background: #d9dcd9; ">DATOS DEL VEHICULO</th>
    </tr>
    <tr>
        <td class="text-center" scope="row"><b>PLACA:</b> <br> {{$orden->placa}}</td>
        <td class="text-center" scope="row"><b>MARCA:</b> <br> {{$orden->marca}}</td>
        <td class="text-center"><b>LÍNEA:</b> <br> {{$orden->linea}}</td>
        <td class="text-center"><b>MODELO:</b> <br> {{$orden->modelo}}</td>
        <td class="text-center"><b>COLOR:</b> <br> {{$orden->color}}</td>
        <td class="text-center"><b>TIPO DE VEHICULO:</b> <br> {{$orden->descripcion}}</td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <tbody>
    <tr>
        <th colspan="5" class="text-center" style=" background: #d9dcd9; ">DATOS DEL CLIENTE</th>
    </tr>
    <tr>
        <td class="text-center"><b>NOMBRE:</b> <br> {{$orden->nombre}}</td>
        <td class="text-center"><b>NIT:</b> <br> {{$orden->nit}}</td>
        <td class="text-center"><b>DIRECCIÓN:</b> <br> {{$orden->direccion}}</td>
        <td class="text-center"><b>CORREO:</b> <br> {{$orden->correo}}</td>
        <td class="text-center"><b>TELÉFONO:</b> <br> {{$orden->telefono}}</td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered">
    <tbody>
    <tr>
        <th colspan="3" class="text-center" style=" background: #d9dcd9; ">SERVICIOS SOLICITADOS</th>
    </tr>
    <tr>
        <th><b>SERVICIO:</b> </th>
        <th><b>OBSERVACIONES:</b></th>
        <th><b>PRECIO:</b> </th>
    </tr>
    @foreach($detalle as $servicio)

    <tr>
        <td class="text-center">{{$servicio->servicio}}</td>
        <td class="text-center">{{$servicio->observaciones}}</td>
        <td class="text-center">{{$servicio->total}}</td>
    </tr>
    @endforeach
    <tr>
        <td></td>
        <td class="text-right">
            <b>TOTAL:</b>
        </td>
        <td class="text-center">{{$detalle->sum('total')}}</td>
    </tr>
    </tbody>
</table>
<footer>
    <div class="row" style="margin-bottom: 25px!important;">
        <div class="col-xs-5" style="line-height: 15px">
            f/<br>
            ______________________________________ <br>
            &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; FIRMA DEL MECÁNICO
        </div>
        <div class="col-xs-6" style="line-height: 15px">
            f/<br>
            ______________________________________ <br>
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;FIRMA DEL CLIENTE
        </div>
    </div>
    <div class="row" style="margin-bottom: 15px!important;">
        <div class="col-xs-10" style="margin-left: 20px; margin-top:40px; text-align: justify; font-size: 10px">
            <p>
                <b>CONDICIONES ACEPTADAS POR EL CLIENTE: </b>
                <br>
                <b>1.</b> Autorizo para que mi vehículo sea probado fuera de las instalaciones.
                <br>
                <b>2.</b> Ningún vehículo será entregado sin antes cancelar.
                <br>
                <b>3.</b> La empresa no se hace responsable por daños al vehículo debido a causas naturales o de fuerza mayor,
                ni por objetos olvidados dentro del mismo.
            </p>
        </div>
    </div>
</footer>
</body>
</html>
