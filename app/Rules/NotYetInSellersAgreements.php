<?php

namespace App\Rules;

use App\Models\Agreement;
use App\Models\Company;
use Illuminate\Contracts\Validation\Rule;

class NotYetInSellersAgreements implements Rule
{
    private string $referredCompany;

    public function __construct(string $referredCompany){
        $this->referredCompany = $referredCompany;
    }

    public function passes($attribute, $value){
        $seller_id = Company::where('name', request()->input($this->referredCompany))->first()->id;
        $agreements_seller = Agreement::where('s_id', $seller_id)->get();
        foreach ($agreements_seller as $agreements)
            if ($agreements->shipment()->first()->id == $value)
               return !($agreements->payment()->first()->status == 0);
        return true;
    }

    public function message(){
        return 'Товар уже есть в незавершенном договоре!';
    }
}
