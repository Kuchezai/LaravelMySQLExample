<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    public function index()
    {
        //$agreements = DB::select('SELECT * FROM agreements');
        $agreements = Agreement::all();     //!!!Eloquent

        return view('agreements/index', ['agreements' => $agreements]);
    }

    public function create()
    {
        //$shipments = DB::select('SELECT * FROM shipments');
        //$companies = DB::select('SELECT * FROM companies');
        $shipments = Shipment::all();     //!!!Eloquent
        $companies = Company::all();     //!!!Eloquent
        return view('agreements/create', ['companies' => $companies, 'shipments' => $shipments]);
    }

    public function store(Request $request)
    {
        // здесь всё через Eloquent, чтобы легче организовать переходы и проверки
        $data = $request->validate([
            'b_id' => 'string|required',
            's_id' => 'string|required',
            'amount' => 'integer|required',
            'sh_id' => 'string|required',
            'complete_by' => 'string|required',
        ]);
        $data['b_id'] = Company::where('name', $data['b_id'])->first()->id;
        $data['s_id'] = Company::where('name', $data['s_id'])->first()->id;

        $agreements_seller = Agreement::where('s_id', $data['s_id'])->get();
        foreach ($agreements_seller as $agreements) {
            if ($agreements->shipment()->first()->id == $data['sh_id'])
                if ($agreements->payment()->first()->status == 0)
                    return redirect()->back(); //товар уже есть в незавершенном договоре
        }


        if ((Shipment::where('id', $data['sh_id'])->first()->company()->first()->id == $data['s_id'])) {
            $agreement = Agreement::create($data);
        } else {
            return redirect()->back(); //товар не принадлежит выбранному продавцу
        }


        return redirect()->route('companies.show', ['company' => $agreement->seller()->first()->id]);
    }

    public function paymentEdit(Request $request)
    {
        $data = $request->validate([
            'a_id' => 'string|required',
        ]);
        Payment::where('a_id', $data['a_id'])->update(['status' => true]);

        return redirect()->back();
    }
}
