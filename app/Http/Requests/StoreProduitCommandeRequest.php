<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduitCommandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "quantite_produit"=>["required","integer","max:128"],
            "prix_unitaire"=>["required","integer","max:255"],
            "prix_total"=>["required","integer","max:255"],
            "produit_id"=>["required","integer","min:1","max:200"],

        ];
    }
}
