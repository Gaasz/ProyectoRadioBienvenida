<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaCotizacion extends Model
{
    use HasFactory;

    protected $table = 'respuesta_cotizacion';
    protected $primaryKey = 'id_respuesta_cotizacion';
    protected $fillable = [
        'id_respuesta_cotizacion',
        'cotizacion_id',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'horarios',
        'cantidad',
        'valor',
        'precio',
        'frases_extras',
<<<<<<< HEAD
        'audio_muestra'
=======
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0
    ];

    //relacion uno a uno con modelo cotizacion
    public function cotizacion()
    {
        return $this->belongsTo('App\Models\Cotizacion', 'cotizacion_id');
    }

}
