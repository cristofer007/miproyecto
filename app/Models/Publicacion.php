<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Canal;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Imagen;
use Database\Factories\PublicacionesFactory;

class Publicacion extends Model
{
    use HasFactory;
    
    public function canal()
    {
        return $this->belongsTo(Canal::class, 'id_canal', 'id');
    }
    
    public function autor()
    {
        return $this->belongsTo(User::class, 'id_autor', 'id');
    }
    
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_publicacion', 'id');
    }
    
    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'id_publicacion', 'id');
    }
    
    protected $table = 'publicaciones';
    
    protected static function newFactory()
    {
        return PublicacionesFactory::new();
    }
}
