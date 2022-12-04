<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgreementStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'b_id' => 'string|required',
            's_id' => 'string|required',
            'amount' => 'integer|required',
            'sh_id' => 'string|required',
            'complete_by' => 'string|required',
        ];
    }
}
