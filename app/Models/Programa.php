<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dia;

class Programa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'programas';
    protected $fillable = [
        'nombre_programa',
        'descripcion_programa',
        'imagen_programa',
        'precio_auspicio',
        'dias_id',
        'derechos_publicitarios'
    ];

    //relacion programa-dia   
    public function dias()
    {
        return $this->belongsToMany(Dia::class);
    }

    
}
