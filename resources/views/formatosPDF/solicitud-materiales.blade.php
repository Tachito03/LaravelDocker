<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header-body td {
            width: 10%;
            font-size: 12px;
            text-align: center;
        }

        table{
            border-spacing: 0px!important;
            width: 100%;
        }

        .footer{
            margin-top: 20px;
        }

        .observaciones{
            height: 50px;
        }
        .space-observaciones{
            height: 20px;
        }

        .firma-user{
            border-left: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            height: 80px;
        }

        .border-top{
            border-top: 2px solid #000;
        }

        .border-bottom{
            border-bottom: 2px solid #000;
        }

        .border-left{
            border-left: 2px solid #000;
        }

        .border-right{
            border-right: 2px solid #000;
        }
    </style>
</head>
<body>
    <table>
        <!--<thead>-->
            <tr>
                <td rowspan="3"><span>Logo Aquí</span></td>
                <td colspan="4"></td>
                <td colspan="6" style="text-align: right;">
                    <p> {{ $almacen[0]->nomenclatura_documento; }} </p>
                </td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="1">Año:  {{ $almacen[0]->anio; }} </td>
                <td colspan="1">Mes:   {{ $almacen[0]->mes; }} </td>
                <td colspan="2">Folio Solicitud</td>
                <td colspan="2" style="text-align: right;"> {{ $almacen[0]->folio_solicitud; }} </td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
                <td colspan="2">Folio Entrega</td>
                <td colspan="2" style="text-align: right;"> {{ $almacen[0]->folio_entrega; }} </td>
            </tr>

            <tr>
                <td class="space-observaciones" colspan="12"></td>
            </tr>
            <tr><td colspan="12" class="border-top"></td></tr>
            <tr>
                <td colspan="12" class="border-left border-right">
                    <p>SOLICITUD, SALIDA Y RETORNO DE MATERIAL Y EQUIPO DE ALMACEN</p>
                </td>
            </tr>
            <tr>
                <td class="border-left" colspan="2"><strong>Nombre del solicitante: </strong></td>
                <td colspan="3"> {{ $almacen[0]->id_solicitante; }} <hr> </td>
                <td colspan="1"></td>
                <td colspan="2"><strong>Fecha: </strong></td>
                <td  class="border-right" colspan="4"> {{ $almacen[0]->fecha; }} <hr></hr></td>
            </tr>
            <tr>
                <td class="border-left" colspan="2"><strong>Nombre del proyecto: </strong></td>
                <td colspan="3"> {{ $almacen[0]->id_proyecto; }} <hr> </td>
                <td colspan="1"></td>
                <td colspan="2"><strong>Fecha Requerida: </strong></td>
                <td class="border-right" colspan="4"> {{ $almacen[0]->fecha_requerida; }} <hr></hr></td>
            </tr>
            <tr>
                <td class="border-left" colspan="2"><strong>Lugar: </strong></td>
                <td colspan="3"> {{ $almacen[0]->lugar; }} <hr></hr></td>
                <td colspan="1"></td>
                <td colspan="2"><strong>Área Solicitante: </strong></td>
                <td class="border-right" colspan="4"> {{ $almacen[0]->id_area; }} <hr></hr></td>
            </tr>
            <tr>
                <td class="border-left" colspan="2"><strong>Duración: </strong></td>
                <td colspan="3"> {{ $almacen[0]->duracion; }} <hr></hr></td>
                <td colspan="1"></td>
                <td colspan="2"><strong>Gerente Responsable: </strong></td>
                <td class="border-right" colspan="4"> {{ $almacen[0]->id_gerente_responsable; }} <hr></hr></td>
            </tr>
            <tr><td colspan="12" class="border-bottom"></td></tr>
            <tr>
                <td class="space-observaciones" colspan="12"></td>
            </tr>
        <!--</thead> -->
        <tbody>
            <tr class="header-body">
                <td style="border: 1px solid #000"><strong>Partida</strong></td>
                <td style="border: 1px solid #000"><strong>Material Equipo</strong></td>
                <td style="border: 1px solid #000"><strong>Descripción</strong></td>
                <td style="border: 1px solid #000"><strong>Serie</strong></td>
                <td style="border: 1px solid #000"><strong>Solicitado</strong></td>
                <td style="border: 1px solid #000"><strong>Entregado</strong></td>
                <td style="border: 1px solid #000"><strong>Fecha Entrega</strong></td>
                <td style="border: 1px solid #000"><strong>Certificado, fecha<br> y vencimiento <br> de calibración <br> de equipo </strong></td>
                <td style="border: 1px solid #000"><strong>Devuelto </strong></td>
                <td style="border: 1px solid #000"><strong>Fecha </strong></td>
                <td style="border: 1px solid #000"><strong>Quien devuelve </strong></td>
            </tr>
            @foreach ($almacen as $detalle)
                <tr>
                    <td style="border: 1px solid #000">{{ $detalle->partida }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->material_equipo }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->descripcion }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->serie }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->solicitado }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->entregado }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->fecha_entregado }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->certificado_fecha_vencimiento }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->devuelto }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->fecha_material }}</td>
                    <td style="border: 1px solid #000">{{ $detalle->quien_devuelve }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="footer">
            <tr>
                <td class="space-observaciones" colspan="12"></td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="7"><p><strong>Observaciones</strong></p></td>
                <td colspan="1"></td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="9" style="border: 1px solid #000" class="observaciones">
                   {{ $almacen[0]->observaciones }}
                </td>
                <td colspan="1"></td>
            </tr>
            <tr>
                <td class="space-observaciones" colspan="12"></td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="4" style="text-align: center; border: 1px solid #000;"><strong>Salida de Producto y Materiales</strong></td>
                <td colspan="1"></td>
                <td colspan="4" style="text-align: center; border: 1px solid #000;"><strong>Devolución de Producto y Materiales</strong></td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="2" class="firma-user" style="text-align: center;"></td>
                <td colspan="2" class="firma-user" style="text-align: center;"></td>
                <td colspan="1"></td>
                <td colspan="2" class="firma-user" style="text-align: center;"></td>
                <td colspan="2" class="firma-user" style="text-align: center;"></td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
