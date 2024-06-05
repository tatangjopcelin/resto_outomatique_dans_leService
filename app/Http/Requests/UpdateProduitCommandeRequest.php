<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduitCommandeRequest extends FormRequest
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
            "quantite_produit"=>["nullable","integer","max:128"],
            "prix_unitaire"=>["nullable","integer","max:255"],
            "prix_total"=>["nullable","integer","max:255"],
        ];
    }
}
