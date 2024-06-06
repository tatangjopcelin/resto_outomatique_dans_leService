<?php

namespace App\Http\Controllers;

use App\Models\Cathegorie;
use App\Http\Requests\StoreCathegorieRequest;
use App\Http\Requests\UpdateCathegorieRequest;

class CathegorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cathegorie=Cathegorie::orderBy("id","desc")->get();
        $message="";
        if(is_null($cathegorie)){
            $message.= "aucune cathegorie trouve";
        return response(["message"=> $message],200);
        }else{
            $message.= "en total ".$cathegorie->count();

            return response([
                "reponse"=> $cathegorie,
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
     * @param  \App\Http\Requests\StoreCathegorieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCathegorieRequest $request)
    {
        $cathegorie = $request->validated();
        $StoreCathegorie=Cathegorie::create($cathegorie);
        return response(["reponse"=> $StoreCathegorie],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cathegorie  $cathegorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cathegorie=Cathegorie::find($id);
        if ($cathegorie)
        return response(["reponse"=> $cathegorie],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cathegorie  $cathegorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Cathegorie $cathegorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCathegorieRequest  $request
     * @param  \App\Models\Cathegorie  $cathegorie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCathegorieRequest $request, $id)
    {
        $data = $request->validated();
        $cathegorie=Cathegorie::find($id);
        $valeur=$cathegorie->update($data);
        return response(["response"=>$valeur],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cathegorie  $cathegorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cathegorie=Cathegorie::find($id);
        if ($cathegorie && $cathegorie->delete()) {
            return response(["response"=>"delete"]);
        }
        return response(["response"=>false]);
    }
}
