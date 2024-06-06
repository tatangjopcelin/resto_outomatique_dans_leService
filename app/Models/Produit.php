<?php

namespace App\Models;

use App\Models\Cathegorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_du_produit',
        'prix_du_produit',
        'uri_image_produit',
        'id_cathegories',
        'status_du_produit',
    ];

    public function cathegorie(): BelongsTo
    {
        return $this->belongsTo(Cathegorie::class);
    }

    public function produitCommande():belongsTo{
        return $this->belongsTo(ProduitCommande::class);
    }

}

