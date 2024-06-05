<?php

namespace App\Http\Controllers;

use App\Models\Cathegorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function get_all_cathegory_product(Request $request)
    {
        $response = Cathegorie::where('nom_cathegorie', $request->cathegorie)
            ->produit();

        return response()
            ->json([
                'produits' => $response,
            ], 200);
    }
}
