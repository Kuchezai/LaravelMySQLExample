<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        //$companies = DB::select('SELECT * FROM companies');
        $companies = Company::paginate(15);     //!!!Eloquent

        return view('companies/index', ['companies' => $companies]);
    }

    public function create()
    {
        return view('companies/create');
    }

    public function show($company)
    {
        $c_id = $company;

        $company = DB::select('SELECT * FROM companies WHERE id = ?', [$c_id]);
        //$company = Company::where('id', $company)->get();;     //!!!Eloquent

        //$shipments = DB::select('SELECT shipments.* FROM companies, shipments  WHERE companies.id = ? AND companies.id = shipments.c_id', [$c_id]);
        $shipments = Company::find($c_id)->shipments()->paginate(15);     //!!!Eloquent

        //$agreements = DB::select('SELECT agreements.* FROM agreements WHERE (s_id = ? or b_id = ?)', [$c_id, $c_id]);
        $agreements = Company::find($c_id)->asSeller()->get()->merge(Company::find($c_id)->asBuyer()->get());  //!!!Eloquent

        return view('companies/show', ['company' => $company, 'shipments' => $shipments, 'agreements' => $agreements]);
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->validated();

        //DB::insert('INSERT INTO companies (name, requisites) VALUES (?,?)', [$data['name'], $data['requisites']]);
        $company = Company::create($data);

        return redirect()->route('companies.show', ['company' => $company->id]);
    }
}
