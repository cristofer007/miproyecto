<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conversacion;
use App\Models\User;
use Database\Factories\MensajesFactory;

class Mensaje extends Model
{
    use HasFactory;
    
    public function conversacion()
    {
        return $this->belongsTo(Conversacion::class, 'id_conversacion', 'id');
    }
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_autor', 'id');
    }
    
    protected $table = 'mensajes';
    
    protected static function newFactory()
    {
        return MensajesFactory::new();
    }
}
