<?php

namespace App\Http\Controllers;

use App\Models\DetalleOrdenes;
use App\Models\OrdenTrabajo;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function streamPDF($id){
        $orden = OrdenTrabajo::join('vehiculos', 'vehiculos.id', '=', 'orden_de_trabajo.vehiculos_id')
            ->join('clientes', 'clientes.id', '=', 'orden_de_trabajo.clientes_id')
            ->join('marcas', 'marcas.id', '=', 'vehiculos.marcas_id')
            ->join('lineas', 'lineas.id', '=', 'vehiculos.lineas_id')
            ->join('tipo_vehiculos', 'tipo_vehiculos.id', '=', 'vehiculos.tipo_vehiculos_id')
            ->where('orden_de_trabajo.id', $id)
            ->select('orden_de_trabajo.fecha_recepcion', 'clientes.nombre', 'clientes.nit',
                'clientes.direccion',
                'clientes.correo',
                'clientes.telefono',
                'vehiculos.placa',
                'vehiculos.color',
                'vehiculos.modelo',
                'marcas.marca',
                'lineas.linea',
                'tipo_vehiculos.descripcion',
                'orden_de_trabajo.estatus',
                'orden_de_trabajo.id'
            )->first();
        $detalle = DetalleOrdenes::where('orden_de_trabajo_id',$orden->id)
            ->join('servicios', 'servicios.id', '=', 'detalle_ordenes_trabajo.servicios_id')
            ->get();


        $vista = view('pdf.orden', compact('orden','detalle'));
        return PDF::loadHTML($vista)
            ->setPaper('letter')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->stream('La Agencia - '.$orden->id.'.pdf');
    }
}
