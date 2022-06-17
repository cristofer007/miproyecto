<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publicacion;
use App\Models\User;
use Database\Factories\ComentariosFactory;

class Comentario extends Model
{
    use HasFactory;
    
    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class, 'id_publicacion', 'id');
    }
    
    public function autor()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
    protected $table = 'comentarios';
    
    protected static function newFactory()
    {
        return ComentariosFactory::new();
    }
}
