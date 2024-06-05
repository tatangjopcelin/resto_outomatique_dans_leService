<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillables = [
        'nom_utilisateur',
        'mot_de_pass',
        'email',
        'role',

    ];
}
