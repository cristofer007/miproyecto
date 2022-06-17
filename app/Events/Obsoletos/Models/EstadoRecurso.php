<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recurso;
use Database\Factories\EstadosRecursoFactory;

class EstadoRecurso extends Model
{
    use HasFactory;
    
    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'id_estado', 'id');
    }
    
    protected $table = 'estados_recurso';
    
    protected static function newFactory()
    {
        return EstadosRecursoFactory::new();
    }
}
