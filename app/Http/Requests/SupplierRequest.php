<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'name' => 'required|string|alpha:ascii',
            'mobile' =>  'required|numeric|unique:suppliers',
            'email' => 'required|string|unique:suppliers',
            'address' => 'string',
            'landphone' => 'numeric',
            'contact_person' => 'string',
            'contact_person_mobile' => 'numeric',
            'contact_person_email' => 'string|email' 
        ];
    }
}
