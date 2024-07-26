<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Utilisateurs';

    protected $primaryKey = 'id_client';

    protected $fillable = [
        'prenom',
        'nom',
        'telephone',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
    ];


    // Return the user's rôle
    public function getUserRole()
    {
        return $this->belongsTo(RoleUtilisateur::class, 'role_id', 'id_role');
    }
}
