<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;
use App\Models\Publicacion;
use Database\Factories\CanalesFactory;

class Canal extends Model
{
    use HasFactory;
    
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id');
    }
    
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'id_canal', 'id');
    }
    
    protected $table = 'canales';
    
    protected static function newFactory()
    {
        return CanalesFactory::new();
    }
}
