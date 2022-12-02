<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    public function create()
    {
        $companies = DB::select('SELECT * FROM companies');
        //$companies = Company::all();     //!!!Eloquent
        return view('create_shipment', ['companies' => $companies]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'string|required',
            'description' => 'string|required',
            'company' => 'string|required'
        ]);
        //$c_id = DB::select('SELECT id FROM companies WHERE name = ? LIMIT 1',[$data['company']]);
        //DB::insert('INSERT INTO shipments (name, description, c_id)  VALUES (?,?,?)', [$data['name'], $data['description'], $c_id]);

        $data['c_id'] = Company::where('name', $data['company'])->first()->id;
        unset($data['company']);
        $shipment = Shipment::create($data);
        $payment = Shipment::where('c_id', $shipment->id)->first();
        return redirect()->route('companies.show', ['company' => $shipment->company()->first()->id]);
    }

    public function edit(Request $request)
    {
        $data = $request->validate([
            'a_id' => 'integer|required',
        ]);
        DB::unprepared('call isDone('.$data["a_id"].');');
        return redirect()->back();
    }
}
