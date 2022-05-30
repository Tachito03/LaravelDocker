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

        .space-observaciones{
            height: 30px;
        }

        .detalles-equipo{
            height: 50px;;
        }

        .header-seccion-bck{
            background: #aaaaaa;
        }

        .divider{
            height: 30px;
        }

        .thfooter{
            height: 60px;;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td colspan="2" rowspan="1"></td>
                <td colspan="2"></td>
                <td colspan="2" style="text-align: right ;"><span>CYP-AAL-FORM-01</span></td>
            </tr>
            <tr>
                <td colspan="2"> Aqui va el logo</td>
                <td colspan="4"><h3></strong><strong style="color: #aaaaaa">REPORTE DE DAÑO, ROBO, EXTRAVÍO O BAJA</strong></h3></td>
            </tr>
            <tr>
                <td colspan="6" class="space-observaciones"></td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="1" style="text-align: center ;"><strong>Folio: </strong></td>
                <td colspan="1">{{ $reporte_detalle[0]->folio }}<hr></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Reporte de:</strong> </td>
                <td colspan="2"> {{ $reporte_detalle[0]->reporte }}<hr></td>
                <td colspan="1" style="text-align: center;"><strong>Fecha</strong></td>
                <td colspan="1">{{ $reporte_detalle[0]->fecha }}<hr></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Proyecto en el cual surgió el evento:</strong> </td>
                <td colspan="2">{{ $reporte_detalle[0]->id_proyecto }}<hr></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Ciudad:</strong> </td>
                <td colspan="2">{{ $reporte_detalle[0]->ciudad }}<hr></td>
            </tr>
        </thead>
        <tbody>
            <tr><td class="divider"></td></tr>
            <tr><td style="border-top: 2px solid #000" colspan="6"></td></tr>
            <tr>
                <td style="border-left: 2px solid #000; border-right: 2px solid #000;" colspan="6" class="header-seccion-bck space-observaciones"><strong>Datos del equipo o material extraviado</strong></td>
            </tr>
            <tr class="detalles-equipo">
                <td style="border-left: 2px solid #000;"><strong>Nombre</strong></td>
                <td>{{ $reporte_detalle[0]->nombre }}</td>
                <td><strong>Marca:</strong> </td>
                <td>{{ $reporte_detalle[0]->marca }}</td>
                <td><strong>Modelo:</strong></td>
                <td style="border-right: 2px solid #000;">{{ $reporte_detalle[0]->modelo }}</td>
            </tr>
            <tr class="detalles-equipo">
                <td style="border-left: 2px solid #000;"><strong>No. de serie</strong></td>
                <td>{{ $reporte_detalle[0]->no_serie }}</td>
                <td><strong>Código de barras:</strong> </td>
                <td style="border-right: 2px solid #000;" colspan="3">{{ $reporte_detalle[0]->cod_barra }}</td>
                
            </tr>
            <tr><td style="border-top: 2px solid #000" colspan="6"></td></tr>
            <tr><td class="divider"></td></tr>
            <!-- Detalles-->
            <tr><td style="border-top: 2px solid #000" colspan="6"></td></tr>
                <tr>
                    <td style="border-left: 2px solid #000; border-right: 2px solid #000;" colspan="6" class="space-observaciones header-seccion-bck"><strong>Reporte de lo sucedido</strong></td>
                </tr>
                <tr>
                    <td style="border-left: 2px solid #000; border-right: 2px solid #000;" colspan="6" class="space-observaciones"><strong>Relato</strong></td>
                </tr>
                <tr>
                    <td style="border-left: 2px solid #000; border-right: 2px solid #000;" colspan="6" class="detalles-equipo">{{ $reporte_detalle[0]->relato }}</td>
                </tr>
                <tr>
                    <td style="border-left: 2px solid #000; border-right: 2px solid #000;" colspan="6" class="space-observaciones space-observaciones"><strong>Recomendación</strong></td>
                </tr>
                <tr>
                    <td style="border-left: 2px solid #000; border-right: 2px solid #000;" colspan="6" class="detalles-equipo">{{ $reporte_detalle[0]->recomendacion }}</td>
                </tr>
            <tr><td style="border-top: 2px solid #000" colspan="6"></td></tr>
            <!--end detalles-->

            <tr><td class="divider"></td></tr>
            
            <!-- Acciones a seguir-->
            <tr><td style="border-top: 2px solid #000" colspan="6"></td></tr>
                <tr>
                    <td style="border-left: 2px solid #000; border-right: 2px solid #000;" colspan="6" class="space-observaciones header-seccion-bck"><strong>Acciones a seguir</strong></td>
                </tr>
                <tr>
                    <td style="border-left: 2px solid #000;" class="space-observaciones space-observaciones"><strong>Reponer equipo:</strong></td>
                    <td class="space-observaciones space-observaciones">{{ $reporte_detalle[0]->reponer_equipo }} &nbsp;&nbsp;&nbsp; ${{ $reporte_detalle[0]->reponer_equipo_costo }}</td>
                    <td class="space-observaciones space-observaciones"><strong>Descontar vía nómina:</strong></td>
                    <td class="space-observaciones space-observaciones">{{ $reporte_detalle[0]->descontar_nomina }} &nbsp;&nbsp;&nbsp; ${{ $reporte_detalle[0]->descontar_nomina_costo }}</td>
                    <td class="space-observaciones space-observaciones"><strong>Otro:</strong></td>
                    <td style="border-right: 2px solid #000;" class="space-observaciones space-observaciones">{{ $reporte_detalle[0]->otro }} &nbsp;&nbsp;&nbsp; ${{ $reporte_detalle[0]->otro_costo }}</td>
                </tr>
            <tr><td style="border-top: 2px solid #000" colspan="6"></td></tr>
            <!-- end acciones a seguir-->
        </tbody>
        <tfoot>
            <tr><td class="thfooter"></td></tr>
            <tr>
                <td></td>
                <td style="text-align: center; height: 50px;"><strong>Responsable del evento</strong></td>
                <td colspan="2"></td>
                <td style="text-align: center; height: 50px;"><strong>Responsable del almacén</strong></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $reporte_detalle[0]->renponsable_evento }}<hr></hr></td>
                <td colspan="2"></td>
                <td>{{ $reporte_detalle[0]->responsable_almacen }}<hr></hr></td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2"></td>
                <td style="text-align: center; height: 50px;" colspan="2"><strong>Nombre y firma de quién autoriza la baja</strong></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td style="text-align: center;" colspan="2">{{ $reporte_detalle[0]->responsable_baja }}<hr></hr></td>
                <td colspan="2"></td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
