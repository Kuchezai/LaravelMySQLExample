<?php

namespace App\Http\Requests;

use App\Rules\BelongsToSeller;
use App\Rules\IdNotEqualToId;
use App\Rules\NotYetInSellersAgreements;
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
            'amount' => 'integer|required',
            'b_name' => 'string|required',
            'complete_by' => 'string|required',
            's_name' => ['bail','string', 'required', new IdNotEqualToId('b_name')],
            'sh_id' => ['bail','integer', 'required', new NotYetInSellersAgreements('s_name'), new BelongsToSeller('s_name')],
        ];
    }
}
