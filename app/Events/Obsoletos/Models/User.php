<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Usuario;
use App\Models\Grupo;
use App\Models\Recurso;
use App\Models\Archivo;
use App\Models\Mensaje;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }
    
     public function arrendados()
    {
        return $this->hasMany(Recurso::class, 'id_arrendatario', 'id');
    }
    
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_autor', 'id');
    }
    
    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'id_autor', 'id');
    }
    
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'users_grupos', 'id_user', 'id_grupo');
    }
    
    public function gruposACargo()
    {
        return $this->hasMany(Grupo::class, 'id_encargado', 'id');
    }
    
    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'id_dueno', 'id');
    }
    
    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'id_user', 'id');
    }
    
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class, 'id_autor', 'id');
    }
    
    public function conversacionesA()
    {
        return $this->hasMany(Conversacion::class, 'interlocutorx', 'id');
    }
    
    public function conversacionesB()
    {
        return $this->hasMany(Conversacion::class, 'interlocutory', 'id');
    }
    
    public function solicitudesRecursos()
    {
        return $this->hasMany(SolicitudesRecursos::class, 'id_solicitante', 'id');
    }
    
    protected $table = 'users';
}
