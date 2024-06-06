<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Requests\SavePoductRequest;
use App\Http\Resources\ProductResources;
use App\Models\Cathegorie;
=======
use App\Models\Cathegorie;
use App\Http\Requests\SavePoductRequest;
>>>>>>> origin/brole
use App\Models\Produit;
use Illuminate\Http\Request;

use App\Http\Controllers\StatusMessage;

class ProduitController extends Controller
{

    public function get_all_cathegory_products(Request $request)
    {

        $produits = Produit::all();
        $msg = '';

        if ($request->cathegorie) {
            $c = Cathegorie::where('nom_cathegorie', $request->cathegorie)
                ->get();
            if (is_null($c)) {
                $msg .= 'Cette cathegorie n\'existe pas.';
                return response()
                    ->json([
                        'status' => StatusMessage::STATUS_MESSSAGE_FAILED,
                        'message' => $msg,
                    ], 400);
            }

            $produits = Produit::where('id_cathegories', $c[0]['id'])
                ->get();
        }

        return response()
            ->json([
                'status' => StatusMessage::STATUS_MESSSAGE_OK,
                'produits' => ProductResources::collection($produits),
            ], 200);
    }

    public function save_product_by_cathegory(SavePoductRequest $request)
    {

        $c = Cathegorie::where('nom_cathegorie', $request->nom_cathegorie)
            ->first();

        if (is_null($c)) {
            return response()
                ->json([
                    'status' => StatusMessage::STATUS_MESSAGE_BAD_REQUEST,
                    'message' => 'Cette cathegorie de produit n\'existe pas',
                ], 400);
        }

        $produit_enregistre = Produit::create([
            'nom_du_produit' => $request->nom_du_produit,
            'prix_du_produit' => $request->prix_du_produit,
            'uri_image_produit' => $request->uri_image_produit,
            'status_du_produit' => $request->status_du_produit,
            'id_cathegories' => $c[0]['id'],
        ]);

        return response()
            ->json([
                'status' => StatusMessage::STATUS_MESSAGE_CREATED,
                'message' => 'Produit enregistré avec success',
                'produit' => new ProductResources($produit_enregistre),
            ], 201);
    }
<<<<<<< HEAD
=======

>>>>>>> origin/brole
}
