<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\UsuariosFactory;

class Usuario extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->hasOne(User::class, 'id_usuario', 'id');
    }
    
    protected $table = 'usuarios';
    
    protected static function newFactory()
    {
        return UsuariosFactory::new();
    }
}
