<?php

namespace App\Http\Controllers;

use App\Models\ProduitCommande;
use App\Http\Requests\StoreProduitCommandeRequest;
use App\Http\Requests\UpdateProduitCommandeRequest;

class ProduitCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produitCommande = ProduitCommande::orderBy("id","desc")->get();
        $message="";
        if(is_null($produitCommande)){
            $message.= "aucune produitCommander trouve";
        return response(["message"=> $message],200);
        }else{
            $message.= "en total ".$produitCommande->count();

            return response([
                "reponse"=> $produitCommande,
                "message"=> $message,
            ],200);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduitCommandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduitCommandeRequest $request)
    {
        $data = $request->validated();
        $data['prix_total']=$request->prix_unitaire*$request->quantite_produit;

        $storeProduitCommande=ProduitCommande::create($data);
        return response(["reponse"=>$storeProduitCommande],201);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produitCommande = ProduitCommande::find($id);
        if($produitCommande)
        return response(["reponse"=>$produitCommande],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function edit(ProduitCommande $produitCommande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduitCommandeRequest  $request
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduitCommandeRequest $request, $id)
    {
        $data = $request->validated();
        $produitCommande=ProduitCommande::find($id);
        $val=$produitCommande->update($data);
        return response(["response"=>$val]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produitCommande=ProduitCommande::find($id);
        if ($produitCommande && $produitCommande->delete()) {
            return response(["response"=>"delete"]);
        }
        return response(["response"=>false]);
    }


}
