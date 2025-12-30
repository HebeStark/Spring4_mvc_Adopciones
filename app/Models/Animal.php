<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

    protected $fillable = [
        'nombre',
        'tipo',
        'edad',
        'estado',
    ];
 
    public function solicitudesAdopcion()
    {
        return $this->hasMany(SolicitudAdopcion::class);
    }
    public function adopcion()
    {
        return $this->hasOne(Adopcion::class);
    }
}