<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentEditRequest;
use App\Http\Requests\ShipmentStoreRequest;
use App\Models\Agreement;
use App\Models\Company;
use App\Models\Shipment;
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

        //$c_id = DB::select('SELECT id FROM companies WHERE name = ? LIMIT 1',[$data['company']]);
        //DB::insert('INSERT INTO shipments (name, description, c_id)  VALUES (?,?,?)', [$data['name'], $data['description'], $c_id]);

        $data['c_id'] = Company::where('name', $data['company'])->first()->id;
        unset($data['company']);
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
