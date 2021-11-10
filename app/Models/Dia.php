<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programa;

class Dia extends Model
{
    use HasFactory;
    protected $table = 'dias';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    //relacion programa-dia
    public function programas()
    {
        return $this->belongsToMany(Programa::class);
    }
}
