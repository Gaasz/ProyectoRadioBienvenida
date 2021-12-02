<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubroEmpresa extends Model
{
    use HasFactory;
    protected $table = 'rubro_empresa';
    protected $primaryKey = 'id_rubro_empresa';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function empresa()
    {
        return $this->hasMany(Empresa::class, 'id_rubro_empresa');
    }
}
