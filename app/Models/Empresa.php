<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'id_empresa';
    protected $fillable = [
        'nombre_empresa',
        'direccion'
        
    ];
 
    
    // public function usuarios()
    // {
    //     return $this->hasMany(User::class);
    // }

}
