<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Cathegorie extends Model
{
    protected $fillable = [
        "nom_cathegorie"
    ];
    use HasFactory;
    // cathegorie hasMany produit
     public function produit():hasMany{
        return $this->hasMany(Produit::class);
     }
}
