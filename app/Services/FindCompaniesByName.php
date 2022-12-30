<?php

namespace App\Services;

use App\Models\Company;

class FindCompaniesIDByName
{
    public static function agreements($data) :array{
        $data['b_id'] = Company::where('name', $data['b_name'])->first()->id;
        $data['s_id'] = Company::where('name', $data['s_name'])->first()->id;
        unset($data['s_name']);
        unset($data['b_name']);

        return $data;
    }
    public static function shipments($data) :array{
        $data['c_id'] = Company::where('name', $data['company'])->first()->id;
        unset($data['company']);

        return $data;
    }

}
