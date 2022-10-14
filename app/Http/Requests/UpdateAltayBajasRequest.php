<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAltayBajasRequest extends FormRequest
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


    public function rules()
    {
        return [
            'ticket'=>['string','required'],
            'servername'=>['string','required'],
            'ipaddress'=>['required','string',],
            'status'=>['required','string',],
            'created_by'=>['string',]
        ];
    }
}
