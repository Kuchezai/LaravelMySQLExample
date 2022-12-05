<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgreementPaymentEditRequest;
use App\Http\Requests\AgreementStoreRequest;
use App\Models\Agreement;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    public function index()
    {
        //$agreements = DB::select('SELECT * FROM agreements');
        $agreements = Agreement::paginate(15);     //!!!Eloquent

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

    public function store(AgreementStoreRequest $request)
    {
        // здесь всё через Eloquent
        $data = $request->validated();
        $data['b_id'] = Company::where('name', $data['b_id'])->first()->id;
        $data['s_id'] = Company::where('name', $data['s_id'])->first()->id;

        if($data['b_id'] == $data['s_id']){
            return redirect()->back()->withErrors(['message' => 'Для заключение договора требуется 2 компании!']);
        }

        $agreements_seller = Agreement::where('s_id', $data['s_id'])->get();
        foreach ($agreements_seller as $agreements) {
            if ($agreements->shipment()->first()->id == $data['sh_id'])
                if ($agreements->payment()->first()->status == 0)
                    return redirect()->back()->withErrors(['message' => 'Товар уже есть в незавершенном договоре!']);
        }


        if ((Shipment::where('id', $data['sh_id'])->first()->company()->first()->id == $data['s_id'])) {
            $agreement = Agreement::create($data);
        } else {
            return redirect()->back()->withErrors(['message' => 'Товар не принадлежит выбранному продавцу!']);
        }

        return redirect()->route('companies.show', ['company' => $agreement->seller()->first()->id]);
    }

    public function paymentEdit(AgreementPaymentEditRequest $request)
    {
        $data = $request->validated();
        Payment::where('a_id', $data['a_id'])->update(['status' => true]);

        return redirect()->back()->with('message', 'Статус оплаты изменен!');
    }
}
