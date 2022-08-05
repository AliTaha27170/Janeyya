<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirmRequest extends FormRequest
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
            'name' => 'required|String',
            'address' => 'required|String',
            'phone1' => 'required|String',
            'phone2' => 'required|String',
            'phone3' => 'required|String',
            'logo' => 'nullable',
            'link_map' => 'required|String',
            'tax_reg_number'    => 'required',
        ];
    }
}
