<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentEditRequest;
use App\Http\Requests\ShipmentStoreRequest;
use App\Models\Agreement;
use App\Models\Company;
use App\Models\Shipment;
use App\Services\FindCompaniesByName;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    public function create()
    {
        $companies = DB::select('SELECT * FROM companies');
        //$companies = Company::all();     //!!!Eloquent

        return view('create_shipment', ['companies' => $companies]);
    }

    public function store(ShipmentStoreRequest $request)
    {
        $data = $request->validated();

        $data = FindCompaniesByName::shipments($data);
        $shipment = Shipment::create($data);

        return redirect()->route('companies.show', ['company' => $shipment->company()->first()->id]);
    }

    public function edit(ShipmentEditRequest $request)
    {
        $data = $request->validated();

        DB::unprepared('call isDone(' . $data["a_id"] . ');');
        //can be sql-injection

        $new_company = Agreement::find($data["a_id"])->b_id;

        return redirect()->route('companies.show', ['company' => $new_company]);
    }
}
