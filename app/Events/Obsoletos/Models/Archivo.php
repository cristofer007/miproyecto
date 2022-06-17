<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carpeta;
use App\Models\User;
use Database\Factories\ArchivosFactory;

class Archivo extends Model
{
    use HasFactory;
    
    public function subidor()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
    public function carpeta()
    {
        return $this->belongsTo(Carpeta::class, 'id_carpeta', 'id');
    }
    
    protected $table = 'archivos';
    
    protected static function newFactory()
    {
        return ArchivosFactory::new();
    }
}
