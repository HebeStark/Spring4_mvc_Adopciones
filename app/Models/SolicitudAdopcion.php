<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudAdopcion extends Model
{
    protected $table = 'solicitud_adopcion';
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'adoptante_id',
        'estado',
    ];
    


    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class);
    }
    
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
