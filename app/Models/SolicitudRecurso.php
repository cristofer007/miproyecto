<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudRecurso extends Model
{
    use HasFactory;
    
    public function recurso()
    {
        return $this->belongsTo(Recurso::class, 'id_recurso', 'id');
    }
    
    public function solicitante()
    {
        return $this->belongsTo(User::class, 'id_solicitante', 'id');
    }
    
    protected static function newFactory()
    {
        return SolicitudesRecursosFactory::new();
    }
    
    protected $table = 'solicitudes_recursos';
}
