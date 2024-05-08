<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin-top: 0.5cm;
            margin-bottom: 14.3cm;
            margin-left: 1.5cm;
            margin-right: 0.5cm;
        }

        body {

            margin-left: 0cm;
            margin-right: 0cm;
            margin-bottom: 1cm;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 9px;
            color: #353535;
        }


        /* Estilo para los bordes de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        fieldset{
            margin: 0rem;
            border-radius: 0.5rem;
        }

        .head th,
        .head td {
            border: 1px solid black;
        }

        .cuerpo {
            font-size: 0.7rem;
        }

        .cuerpo th,
        .cuerpo td {
            padding: 0.1rem 0.2rem;
            width: 15px;

        }

        .cel-img img {
            width: 100%;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
        }

        .cont_div {
            font-size: 0.7rem;
        }
    </style>
    <style>
        header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }



        /*header*/
        .header-table {
            width: 100%;
            border-collapse: collapse;

        }

        .header-td1 {
            width: 20%;
            text-align: left;
            vertical-align: middle;
            background-color: white;
        }

        .header-td2 {
            width: 60%;
            text-align: center;
            font-size: 13px;
            vertical-align: middle;
            background-color: white;
            font-weight: bold;
        }

        .header-td3 {
            width: 20%;
            text-align: right;
            font-size: 10px;
            vertical-align: middle;
            background-color: white;
        }

        /*cuerpo tabla*/
        .contenido table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }


        .contenido th {
            color: #fff;
            background-color: #5e5d5d;
        }

        .contenido tr:nth-child(odd) td {
            background-color: #eee;
        }


        /*para firmas*/
        .signatures {
            width: 100%;
            margin-top: 60px;
            align-items: center;
        }

        .signature-row {
            clear: both;
            align-items: center;
            /* Forzar un salto de línea después de cada fila */
        }

        .signature {
            width: 33%;
            /* Ancho de cada columna de firma con un margen para evitar desbordamientos */
            float: left;
            padding: 5px;
            margin: 5px;
            align-items: center;
            /* Margen entre las firmas */
            text-align: center;
            border-top: 1px solid #000;
            /* Borde alrededor de cada firma */
            font-size: 10px;
            margin-bottom: 40px;
        }

        .signature p {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <head>
        <table class="head" style="border: 1px solid black;font-size: 0.8rem; margin-bottom: 0.2rem">
            <tr>
                <th class="cel-img" style="width: 25%;"><img src="img/logo/logocompleto.png" alt=""></th>
                <th style="width: 50%;">REGISTRO</th>
                <th style="width: 25%; font-size: 0.8rem">MAN-REG-07 <br> Versión 001 <br> Página 1 de 1 </th>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; padding: 0.3rem 0">ORDEN DE TRABAJO MANTENIMIENTO </td>
            </tr>
        </table>
    </head>

    <fieldset>
        <div class="cont_div">
            <table class="general">
                <tr>
                    <td style="width: 14rem">
                        <p><b>Numero de OT: </b> {{$data->numero_orden}}</p>
                        <p><b>Tipo: </b> Correctivo</p>
                        <p><b>Solicitante: </b> {{$data->solicitud->user->nombre}} {{$data->solicitud->user->apellido}}
                        </p>
                        <p><b>Tecnico: </b> {{$data->user->nombre}} {{$data->user->apellido}}</p>
                    </td>
                    <td>
                        <p><b>Solicitud:</b> {{$data->solicitud->descripcion}}</p>
                        <p><b>Localizacion:</b> {{$data->solicitud->ubicacion->codigo}} -
                            {{$data->solicitud->ubicacion->nombre}}</p>
                        <p><b>Maquina o Equipo:</b> {{$data->solicitud->maquina->codigo}} -
                            {{$data->solicitud->maquina->nombre}}</p>
                    </td>
                </tr>
            </table>
        </div>
    </fieldset>

    <fieldset>
        <div class="cont_div">
            <table class="general">
                <tr>
                    <td>
                        <p><b>Descripcion y diagnostico: </b>{{$data->diagnostico}}.</p>
                        <p><b>Accion Realizada: </b>{{$data->accionTomada}}.</p>
                    </td>
                </tr>
            </table>
        </div>
    </fieldset>

    <table>
        <tr>
            <td style="width: 60%; vertical-align: top">
                <fieldset>
                    <div class="cont_div">
                        <b>Repuestos Usados:</b>
                        <table class="general">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Detalle</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item )
                                <tr>
                                    <td>{{$item->repuestos->numero}}</td>
                                    <td>{{$item->repuestos->nombre}}</td>
                                    <td>{{$item->cantidad}} {{$item->repuestos->unidad}}.</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </div>
                </fieldset>
            </td>
            <td style="width: 40%; vertical-align: top">
                <fieldset>
                    <div class="cont_div">
                        <b>Tiempo Empleado:</b>
                        <table class="general">
                            <thead>
                                <tr>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiempos as $tiempo)
                                    <tr>
                                        <td>{{$tiempo->tiempo_inicio}}</td>
                                        <td>{{$tiempo->tiempo_fin}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </fieldset>
            </td>
        </tr>
    </table>

    <div class="signatures">
        <div class="signature-row">
            <div class="signature">
                <p>Solicitante</p>
                <p>{{$data->solicitud->user->nombre}} {{$data->solicitud->user->apellido}} </p>
            </div>

            <div class="signature">
                <p>Jefe de Mantenimiento</p>
                <p>T.S. Felix Tancaea</p>
            </div>

            
        </div>
        
    </div>
</body>

</html>