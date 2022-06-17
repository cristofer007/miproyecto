<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Canal;
use App\Models\User;
use App\Models\Carpeta;
use App\Models\Recurso;
use Database\Factories\GruposFactory;

class Grupo extends Model
{
    use HasFactory;
    
    public function canales()
    {
        return $this->hasMany(Canal::class, 'id_grupo', 'id');
    }
    
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'users_grupos', 'id_grupo', 'id_user');
    }
    
    public function encargado()
    {
        return $this->belongsTo(User::class, 'id_encargado', 'id');
    }
    
    public function carpetas()
    {
        return  $this->hasMany(Carpeta::class, 'id_grupo', 'id');
    }
    
    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'id_grupo', 'id');
    }
    
    protected $table = 'grupos';
    
    protected static function newFactory()
    {
        return GruposFactory::new();
    }
}
