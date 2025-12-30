<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adopcion extends Model
{
    use HasFactory;
    protected $table = 'adopciones';
    
    protected $fillable = [
        'animal_id',
        'adoptante_id',
        'fecha_adopcion',
    ];
    protected $casts = ['fecha_adopcion' => 'date',];

    public function adoptante()
    {
        return $this->belongsTo(Adoptante::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
