<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillables = [
        'nom_du_produit',
        'prix_du_produi',
        'uri_image_produit',
        'status_du_produit',
    ];
}
