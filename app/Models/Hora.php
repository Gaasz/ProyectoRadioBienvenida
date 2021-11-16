<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dia;

class Hora extends Model
{
    use HasFactory;
    protected $table = 'horas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    //relacion hora-dia
    public function dia()
    {
        return $this->belongsToMany(Dia::class);
    }
}
