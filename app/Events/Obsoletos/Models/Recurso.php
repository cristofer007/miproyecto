<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Grupo;
use App\Models\EstadoRecurso;
use Database\Factories\RecursosFactory;

class Recurso extends Model
{
    use HasFactory;
    
    public function dueno()
    {
        return $this->belongsTo(User::class, 'id_dueno', 'id');
    }
    
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id');
    }
    
    public function estadorecurso()
    {
        return $this->belongsTo(EstadoRecurso::class, 'id_estado', 'id');
    }
    
    public function arrendatario()
    {
        return $this->belongsTo(User::class, 'id_arrendatario', 'id');
    }
    
    public function solicitudes()
    {
        return $this->hasMany(Recurso::class, 'id_recurso', 'id');
    }
    
    protected $table = 'recursos';
    
    protected static function newFactory()
    {
        return RecursosFactory::new();
    }
}
