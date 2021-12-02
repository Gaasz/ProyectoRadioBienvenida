<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cotizacion;

class Anuncio extends Model
{
    use HasFactory;
    protected $table = 'anuncios';
    protected $primaryKey = 'id_anuncio';
    protected $fillable = ['id_anuncio'
    , 'id_usuario', 
    'archivo_audio',
    'archivo_texto ',
    'cotizacion_id',
    'estado',
    'audio_muestra',];


    //relacion uno a uno con modelo cotizacion
    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }
}
