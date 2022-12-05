<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgreementPaymentEditRequest;
use App\Http\Requests\AgreementStoreRequest;
use App\Models\Agreement;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Shipment;
use App\Services\FindCompaniesByName;
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
        $data = FindCompaniesByName::agreements($data);

        $agreement = Agreement::create($data);
        return redirect()->route('companies.show', ['company' => $agreement->seller()->first()->id]);
    }

    public function paymentEdit(AgreementPaymentEditRequest $request)
    {
        $data = $request->validated();
        Payment::where('a_id', $data['a_id'])->update(['status' => true]);

        return redirect()->back()->with('message', 'Статус оплаты изменен!');
    }
}
