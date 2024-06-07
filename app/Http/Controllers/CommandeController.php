<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Commande;
use App\Models\ProduitCommande;
use App\Models\Table;

class CommandeController extends Controller
{
    public function get_orders()
    {

        return response()
            ->json(OrderResource::collection(Commande::all()), 200);
    }
    public function save_order(SaveOrderRequest $saveOrderRequest)
    {

        $pc = ProduitCommande::find($saveOrderRequest->id_produit_commande);
        $table = Table::where('numero_table', $saveOrderRequest->table);

        if (is_null($pc)) {
            return response()
                ->json([
                    'status' => StatusMessage::STATUS_MESSAGE_BAD_REQUEST,
                    'message' => 'Vous voulez passer une commande avec aucun produit sélectioné.',
                ], 400);
        }
        if (is_null($table)) {
            return response()
                ->json([
                    'status' => StatusMessage::STATUS_MESSAGE_BAD_REQUEST,
                    'message' => 'Vous voulez passer une commande sur une table non enregistrée.',
                ], 400);
        }


        $pc = $pc->first();
        $table = $table->get();

        $commande = Commande::create([
            'total' => $pc->sum('prix_total'),
            'tables_id' => $table[0]['id'],
            'produit_commandes_id' => $pc[0]['id'],
        ]);

        return response()
            ->json([
                'status' => StatusMessage::STATUS_MESSAGE_CREATED,
                'commande' => $commande,
            ], 201);
    }
}
