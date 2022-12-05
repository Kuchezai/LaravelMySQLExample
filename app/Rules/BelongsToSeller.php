<?php

namespace App\Rules;

use App\Models\Agreement;
use App\Models\Company;
use App\Models\Shipment;
use Illuminate\Contracts\Validation\Rule;

class BelongsToSeller implements Rule
{
    private string $referredCompany;

    public function __construct(string $referredCompany){
        $this->referredCompany = $referredCompany;
    }

    public function passes($attribute, $value){

        $seller_id = Company::where('name',  request()->input($this->referredCompany))->first()->id;
        return (Shipment::find($value)->company()->first()->id == $seller_id);
    }

    public function message(){
        return 'Товар не принадлежит выбранному продавцу!';
    }
}
