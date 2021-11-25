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
    ];

    //relacion uno a uno con modelo cotizacion
    public function cotizacion()
    {
        return $this->belongsTo('App\Models\Cotizacion', 'cotizacion_id');
    }

}
