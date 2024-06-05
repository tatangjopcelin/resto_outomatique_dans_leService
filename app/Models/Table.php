<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;



class Table extends Model
{
    protected $fillable =[
"numero_table"
    ];
    use HasFactory;
    public function commande():hasMany{
        return $this->hasMany(Commande::class);
    }
}
