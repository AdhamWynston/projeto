<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191|min:3',
            'document' => 'required|max:20|min:10',
            'state'=> 'required|max:2',
            'city'=> 'required',
            'zip_code'=> 'required',
            'street'=> 'required',
            'neighborhood'=> 'required',
            'number'=> 'required',
            'complement'=> 'required',
            'phone'=> 'required',
            'email'=> 'email',
        ];
    }
}
