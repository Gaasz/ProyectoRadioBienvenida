<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;

class PdfController extends Controller
{
    public function showPdf($id)
    {
       
        $archivo = Cotizacion::findOrFail($id);
        
        
        //eliminar ordenesCompra/ del nombre del archivo
        
        $archivo = $archivo->archivo;
       

        // return $archivo;



        return response()->download('storage/'.$archivo);
    }
}
