<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePoductRequest extends FormRequest
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
            'nom_du_produit' => 'required',
            'prix_du_produit' => 'required',
            'uri_image_produit' => 'required',
            'status_du_produit' => 'required',
            'nom_cathegorie' => 'required',
        ];
    }
}
