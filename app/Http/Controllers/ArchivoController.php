<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;

class ArchivoController extends Controller
{
    public function descargar($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $archivo = $anuncio->archivo_texto;
        return response()->download('storage/'.$archivo);
    }
}
