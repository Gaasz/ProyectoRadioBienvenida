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
        
        //name of each $dia en español
        

        $dias_nombre = array();
        for($i=1; $i<=$dias; $i++){
            $dias_nombre[$i] = date('D', strtotime($año.'-'.$mes.'-'.$i));
        }
        for($i=1; $i<=$dias; $i++){
            if($dias_nombre[$i] == 'Mon'){
                $dias_nombre[$i] = 'L';
            }elseif($dias_nombre[$i] == 'Tue'){
                $dias_nombre[$i] = 'M';
            }elseif($dias_nombre[$i] == 'Wed'){
                $dias_nombre[$i] = 'M';
            }elseif($dias_nombre[$i] == 'Thu'){
                $dias_nombre[$i] = 'J';
            }elseif($dias_nombre[$i] == 'Fri'){
                $dias_nombre[$i] = 'V';
            }elseif($dias_nombre[$i] == 'Sat'){
                $dias_nombre[$i] = 'S';
            }elseif($dias_nombre[$i] == 'Sun'){
                $dias_nombre[$i] = 'D';
            }
        }

        $dias_nombre = array_values($dias_nombre);
        
        

        
        


        // $pdf = \PDF::loadView('pdf.test', compact('cotizacion', 'año', 'mes' ,'dias'))->setPaper('a4', 'landscape');
        // return $pdf->stream();
       return view ('pdf.test', compact('cotizacion', 'año', 'mes' ,'dias','dias_nombre', 'empresa'));
        
    }
}
