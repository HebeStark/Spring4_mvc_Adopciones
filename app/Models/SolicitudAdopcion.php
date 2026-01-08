<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SolicitudAdopcion extends Model
{
    use HasFactory;
    protected $table = 'solicitud_adopciones';
    protected $fillable = [
        'animal_id',
        'adoptante_id',
        'estado',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class);
    }

    public function aprobar()
    {
        $this->update(['estado' => 'aprobada']);
    }

    public function rechazar()
    {
        $this->update(['estado' => 'rechazada']);
    }
}
