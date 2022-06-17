<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;
use App\Models\Permiso;
use App\Models\Carpeta;
use Database\Factories\CarpetasFactory;


class Carpeta extends Model
{
    use HasFactory;
    
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id');
    }
    
    public function permisos()
    {
        return $this->hasMany(Permiso::class, 'id_carpeta', 'id');
    }
    
    public function supercarpeta()
    {
        return $this->belongsTo(Carpeta::class, 'id_supercarpeta', 'id');
    }
    
    public function subcarpetas()
    {
        return $this->hasMany(Carpeta::class, 'id_supercarpeta', 'id');
    }
    
    protected $table = 'carpetas'; 
    
    protected static function newFactory()
    {
        return CarpetasFactory::new();
    }
}
