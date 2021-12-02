<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empresa;
<<<<<<< HEAD
use App\Models\Anuncio;
=======
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0

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
<<<<<<< HEAD

    //relacion uno a uno con modelo aunucio
    public function anuncio()
    {
        return $this->hasOne(Anuncio::class);
    }
    
=======
>>>>>>> 01fa2ca914a289a145b5ee0fc2b793feaecc94a0
}
