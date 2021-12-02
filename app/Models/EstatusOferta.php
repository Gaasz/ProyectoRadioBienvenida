<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Oferta;

class EstatusOferta extends Model
{
    use HasFactory;
    protected $table = 'estatus_oferta';
    protected $primaryKey = 'id_estatus_oferta';
    protected $fillable = [
        'nombre',
    ];

    public function oferta()
    {
        return $this->hasMany(Oferta::class);
    }
}
