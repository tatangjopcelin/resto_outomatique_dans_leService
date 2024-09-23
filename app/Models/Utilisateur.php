<?php
namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nom_utilisateur',
        'mot_de_pass',
        'email',
        'role',
    ];

    protected $hidden = [
        'mot_de_pass', // Masquer le mot de passe 
    ];
}
