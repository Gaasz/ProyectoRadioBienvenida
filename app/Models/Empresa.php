<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Empresa extends Model
{   
    use softDeletes;
    use HasFactory;

    protected $softDelete = true;
    protected $table = 'empresas';
    protected $primaryKey = 'id_empresa';
    protected $fillable = [
        'id_empresa',
        'nombre_empresa',
        'direccion'
        
    ];
 
    
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
    

}
