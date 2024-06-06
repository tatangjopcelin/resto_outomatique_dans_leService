<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class ProduitCommande extends Model
{
    protected $fillable = [
        "quantite_produit",
        "prix_unitaire",
        "prix_total",
        "produit_id",
    ];
    use HasFactory;

    public function produit(): HasOne
    {
        return $this->hasOne(Produit::class);
    }

}

