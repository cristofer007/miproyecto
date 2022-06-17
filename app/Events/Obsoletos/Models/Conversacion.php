<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Mensaje;
use Database\Factories\ConversacionesFactory;

class Conversacion extends Model
{
    use HasFactory;
    
    public function usuario1()
    {
        return $this->belongsTo(User::class, 'interlocutorx', 'id');
    }
    
    public function usuario2()
    {
        return $this->belongsTo(User::class, 'interlocutory', 'id');
    }
    
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class, 'id_conversacion', 'id');
    }
    
    protected $table = 'conversaciones';
    
    protected static function newFactory()
    {
        return ConversacionesFactory::new();
    }
}
