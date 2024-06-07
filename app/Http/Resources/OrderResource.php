<?php

namespace App\Http\Resources;

use App\Models\Table;
use App\Models\ProduitCommande;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = [
            "id" => $this->id,
            "total" => $this->total,
            "table" => Table::find($this->tables_id)->first()->numero_table,
            "produit_commandes" => ProduitCommande::find($this->produit_commandes_id)->first(),
            "heure_commande" => $this->created_at->format('H:m'),
        ];

        return $response;
    }
}
