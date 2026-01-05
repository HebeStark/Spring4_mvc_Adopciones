<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Adopcion;
use Illuminate\Support\Facades\DB;

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

    public function aprobar()
    {
        DB::transaction(function () {
            $this->estado = 'aprobada';

            Adopcion::create([
                'animal_id' => $this->animal_id,
                'adoptante_id' => $this->adoptante_id,
                'fecha_adopcion' => now(),
            ]);

            $this->animal->update(['estado' => 'adoptado']);
        });
    }

    public function rechazar()
    {
        $this->estado = 'rechazada';
    }
}
