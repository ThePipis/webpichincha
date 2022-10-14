<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreAltayBajasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('registrar-altasybajas');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ticket'=>[
                'string','required',
            ],
            'servername'=>[
                'required','string',
            ],
            'ipaddress'=>[
                'required','string',
            ],
            'status'=>[
                'required','string',
            ],
            'created_by'=>[
                 'string',
            ]
        ];
    }
}
