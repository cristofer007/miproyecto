<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publicacion;
use Database\Factories\ImagenesFactory;

class Imagen extends Model
{
    use HasFactory;
    
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_publicacion', 'id');
    }
    
    protected $table = 'imagenes';
    
    protected static function newFactory()
    {
        return ImagenesFactory::new();
    }
}
