<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing: 0px!important;
            width: 100%;
        }

        .space-observaciones{
            height: 20px;
        }

        .thfooter{
            height: 40px;;
        }
        .descripcion-body td{
            border: 1px solid #000;
            text-align: center;
            width: 10%;
            font-size: 12px;
        }

        .observaciones{
            height: 80px;
        }

        td{
            font-size: 12px;
        }

        td h3{
            font-size: 22px;
        }

        .border1{
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
        }

        .border2{
            border-left: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
        }

        .border-t1{
            border-left: 1px solid #000;
            border-right: 1px solid #000;
        }

        .border-t2{
            border-right: 1px solid #000;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td colspan="8"><span>Logo Aquí</span></td>
                <td colspan="4" style="text-align: right;"><p style="color: #aaaaaa">{{ $epp_detalle[0]->nomenclatura_documento }}</p></td>
            </tr>
            <tr>
                <td colspan="8"></td>
                <td colspan="1">Año: {{ $epp_detalle[0]->anio }}</td>
                <td colspan="1">Mes: {{ $epp_detalle[0]->mes }}</td>
                <td colspan="1">Folio Solicitud</td>
                <td colspan="1" style="text-align: right;">{{ $epp_detalle[0]->folio_solicitud }}</td>
            </tr>
            <tr>
                <td colspan="10"></td>
                <td colspan="1">Folio Solicitud</td>
                <td colspan="1" style="text-align: right;">{{ $epp_detalle[0]->folio_entrega }}</td>
            </tr>
            <tr>
                <td class="space-observaciones" colspan="12"></td>
            </tr>
            <tr><td colspan="12" style="border-top: 2px solid #000"></td></tr>
            <tr>
                <td colspan="12" style="border-left: 2px solid #000; border-right: 2px solid #000;">
                    <h3></strong><strong style="color: #aaaaaa">SOLICITUD, EPP</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="1" style="border-left: 2px solid #000 ;" ><strong>Nombre del solicitante: </strong></td>
                <td colspan="7">{{ $epp_detalle[0]->id_solicitante }}<hr></td>
                <td colspan="1"></td>
                <td colspan="1"><strong>Fecha: </strong></td>
                <td colspan="2" style="border-right: 2px solid #000 ;">{{ $epp_detalle[0]->fecha }}<hr></td>
            </tr>
           <tr>
                <td colspan="1" style="border-left: 2px solid #000 ;"><strong>Nombre del proyecto: </strong></td>
                <td colspan="7">{{ $epp_detalle[0]->id_proyecto }}<hr></td>
                <td colspan="1"></td>
                <td colspan="1"><strong>Fecha Requerida: </strong></td>
                <td colspan="2" style="border-right: 2px solid #000 ;">{{ $epp_detalle[0]->fecha_creado }}<hr></td>
            </tr>
            <tr>
                <td colspan="1" style="border-left: 2px solid #000 ;"><strong>Lugar: </strong></td>
                <td colspan="7">{{ $epp_detalle[0]->lugar }}<hr></td>
                <td colspan="1"></td>
                <td colspan="1"><strong>Área Solicitante: </strong></td>
                <td colspan="2" style="border-right: 2px solid #000 ;">{{ $epp_detalle[0]->id_area }}<hr></td>
            </tr>
            <tr>
                <td colspan="1" style="border-left: 2px solid #000 ;"><strong>Duración: </strong></td>
                <td colspan="7">{{ $epp_detalle[0]->duracion }}<hr></td>
                <td colspan="1"></td>
                <td colspan="1"><strong>Gerente Responsable: </strong></td>
                <td colspan="2" style="border-right: 2px solid #000 ;">{{ $epp_detalle[0]->id_gerente_responsable }}<hr></td>
            </tr>
            <tr><td colspan="12" style="border-top: 2px solid #000"></td></tr>
            <tr>
                <td class="space-observaciones" colspan="12"></td>
            </tr> 
        </thead>
        <tbody>
            <tr><td class="space-observaciones"></td></tr>
            <tr class="descripcion-body">
                <td colspan="1"><strong>Partida</strong></td>
                <td colspan="7"><strong>Descripción</strong></td>
                <td colspan="1"><strong>Solicitado</strong></td>
                <td colspan="1"><strong>Entregado</strong></td>
                <td colspan="2"><strong>Fecha de entrega</strong></td>
            </tr>
            @foreach ($epp_detalle as $detalle)
                <tr class="descripcion-body">
                    <td colspan="1">{{ $detalle->id }}</td>
                    <td colspan="7">{{ $detalle->descripcion }}</td>
                    <td colspan="1">{{ $detalle->solicitado }}</td>
                    <td colspan="1">{{ $detalle->entregado }}</td>
                    <td colspan="2">{{ $detalle->fecha_entrega }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr><td class="thfooter"></td></tr>
            <tr>
                <td class="space-observaciones" colspan="12"></td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="10"><p><strong>Observaciones salida</strong></p></td>
                <td colspan="1"></td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="10" style="border: 1px solid #000" class="observaciones">
                    {{ $epp_detalle[0]->observaciones }}
                </td>
                <td colspan="1"></td>
            </tr>
            <tr><td class="thfooter"></td></tr>

            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="4" style="text-align: center; border: 1px solid #000"><strong>Equipo de protección personal</strong></td>
                <td colspan="2"></td>
                <td colspan="2"></td>               
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2" class="border-t1" style="text-align: center;"><strong>Entregó</strong></td>
                <td colspan="2" class="border-t2" style="text-align: center;"><strong>Recibió</strong></td>
                <td colspan="2"></td>
                <td colspan="2"></td>               
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2" class="observaciones border1" style="text-align: center ;"></td>
                <td colspan="2" class="observaciones border2" style="text-align: center;"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>               
            </tr>
        </tfoot>
    </table>

</body>
</html>
