<?php

namespace App\Http\Controllers;

use App\Models\Cathegorie;
use App\Http\Requests\SavePoductRequest;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function get_all_cathegory_products(Request $request)
    {
        $response = Cathegorie::where('nom_cathegorie', $request->cathegorie)
            ->produit();

        return response()
            ->json([
                'produits' => $response,
            ], 200);
    }

    public function save_product_by_cathegory(SavePoductRequest $request)
    {


        $c = Cathegorie::where('nom_cathegorie', $request->nom_cathegorie)
            ->get();
        if (is_null($c)) {
            return response()
                ->json([
                    'status' => 'failed',
                    'message' => 'Cette cathegorie de produit n\'existe pas',
                ], 401);
        }
        $produit_enregistre = Produit::create([
            'nom_du_produit' => $request->nom_du_produit,
            'prix_du_produit' => $request->prix_du_produit,
            'uri_image_produit' => $request->uri_image_produit,
            'status_du_produit' => $request->status_du_produit,
            'id_cathegories' => $c->id,
        ]);

        return response()
            ->json([
                'status' => 'ok',
                'message' => 'Produit enregistré avec success',
                'produit' => $produit_enregistre,
            ], 401);
    }

}
