<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carpeta;
use App\Models\User;
use Database\Factories\PermisosFactory;

class Permiso extends Model
{
    use HasFactory;
    
    public function carpeta()
    {
        return $this->belongsTo(Carpeta::class, 'id_carpeta', 'id');
    }
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
    protected $table = 'permisos';
    
    protected static function newFactory()
    {
        return PermisosFactory::new();
    }
}
