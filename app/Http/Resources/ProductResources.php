<?php

namespace App\Http\Resources;

use App\Models\Cathegorie;
use App\Models\Produit;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
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
            "nom" => $this->nom_du_produit,
            "prix" => $this->prix_du_produit,
            "image" => $this->uri_image_produit,
            "status" => $this->status_du_produit,
            "type_de_produit" => Cathegorie::find($this->id_cathegories)->first()->nom_cathegorie,
            'cree_le' => $this->created_at->isoFormat('LL'),
        ];
        return $response;
    }
}
