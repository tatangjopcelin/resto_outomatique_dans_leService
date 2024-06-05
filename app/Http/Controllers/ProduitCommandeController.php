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
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitCommande $produitCommande)
    {
        //
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
    public function update(UpdateProduitCommandeRequest $request, ProduitCommande $produitCommande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitCommande  $produitCommande
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitCommande $produitCommande)
    {
        //
    }
}
