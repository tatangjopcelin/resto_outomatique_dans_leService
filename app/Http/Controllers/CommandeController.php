<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveOrderRequest;
use App\Models\Commande;
use App\Models\ProduitCommande;

class CommandeController extends Controller
{
    public function get_orders()
    {

        return response()
            ->json(Commande::all(), 200);
    }
    public function save_order(SaveOrderRequest $saveOrderRequest)
    {

        $pc = ProduitCommande::find($saveOrderRequest->id_produit_commande)
            ->first();

        if (is_null($pc)) {
            return response()
                ->json([
                    'status' => StatusMessage::STATUS_MESSAGE_BAD_REQUEST,
                    'message' => 'Vous voulez passer une commande avec aucun produit sélectioné.',
                ], 400);
        }
     $pc = $pc->get();
        $commande = Commande::create([
            'total' => $pc->sum('prix_total'),
            'tables_id' => $saveOrderRequest->table,
            'produit_commandes_id' => $pc[0]['id'],
        ]);
    }
}
