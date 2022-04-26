<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
        [
            'first_name'    => 'required|string',
            'second_name'   => 'nullable|string',
            'last_name'     => 'required|string',
            'date_of_birth' => 'required|date',
            'height'        => 'required|numeric',
            'weight'        => 'required|numeric',
        ];
    }
}
