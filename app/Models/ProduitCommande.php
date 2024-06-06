<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;


class ProduitCommande extends Model
{
    protected $fillable = [
        "quantite_produit",
        "prix_unitaire",
        "prix_total",
        "produit_id",
    ];
    use HasFactory;
    public function produits():hasOne{
        return $this->hasOne(Produit::class);
    }
}

