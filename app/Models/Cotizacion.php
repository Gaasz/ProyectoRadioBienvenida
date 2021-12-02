<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
use App\Models\Anuncio;

class Cotizacion extends Model
{
    use HasFactory;
    
    protected $table = 'cotizaciones';

    protected $primaryKey = 'id_cotizacion';

    protected $fillable = [
        'id_cotizacion',
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'empresa_id',
        'estatus_id',
        'horarios',
        'valor',
        'cantidad',
        'extra',
        'archivo',

    ];

    //relacion uno a uno con modelo respuestaCotizacion
    public function respuestaCotizacion()
    {
        return $this->belongsTo('App\Models\RespuestaCotizacion', 'id_cotizacion');
    }

    //relacion uno a uno con modelo empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }   

    //relacion uno a uno con modelo aunucio
    public function anuncio()
    {
        return $this->hasOne(Anuncio::class);
    }
    
}
