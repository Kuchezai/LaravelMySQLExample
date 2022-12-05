<?php

namespace App\Rules;

use App\Models\Company;
use Illuminate\Contracts\Validation\Rule;

class IdNotEqualToId implements Rule
{
    private string $referredCompany;

    public function __construct(string $referredCompany){
        $this->referredCompany = $referredCompany;
    }

    public function passes($attribute, $value){
        $buyer_id = Company::where('name', $value)->first()->id;
        $seller_id = Company::where('name', request()->input($this->referredCompany))->first()->id;
        return !($buyer_id == $seller_id);
    }

    public function message(){
        return 'Для заключение договора требуется 2 разные компании!';
    }
}
