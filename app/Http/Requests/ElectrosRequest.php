<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElectrosRequest extends FormRequest
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
            "name" => "required|string",
            "description" => "string",
            "voltage" => "required|string:110,220,110v,220v,115v,115,Bi-volt,bi-volt,Bivolt,bivolt,100-240v",
            "brand" => "required|string:Electrolux,Brastemp,Fischer,Samsung,LG",
        ];
    }
}
