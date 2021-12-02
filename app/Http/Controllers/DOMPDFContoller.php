<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Cotizacion;
use App\Models\Empresa;

class DOMPDFContoller extends Controller
{
    public function PDF($id){

        $cotizacion = Cotizacion::find($id);

        $pdf = \PDF::loadView('pdf.test', compact('cotizacion'))->setPaper('a4', 'landscape');;
        
       
        return  $pdf->download('prueba.pdf');
    }

    public function mostrarPDF($id){
        $cotizacion = Cotizacion::findOrFail($id);
        $empresa = $cotizacion->empresa_id;
        $empresa = Empresa::findOrFail($empresa);
        
        $año = $cotizacion->fecha_inicio;
        $año = substr($año, 0, 4);
        $mes = $cotizacion->fecha_inicio;
        $mes = substr($mes, 5, 2);

        $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $año);

        
        


        $pdf = \PDF::loadView('pdf.test', compact('cotizacion', 'año', 'mes' ,'dias'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
