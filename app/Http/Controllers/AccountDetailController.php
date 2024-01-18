<?php

namespace App\Http\Controllers;

use App\Models\AccountDetail;
use App\Models\Company;
use Illuminate\Http\Request;

class AccountDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $accountDetails = AccountDetail::all();
        return view('company-account-details.index', compact('accountDetails'));
    }

    public function addCompanyAccountDetail()
    {
        $invoices = Company::all();
        return view('company-account-details.add', compact('invoices'));
    }

    public function createCompanyAccountDetail(Request $request)
    {
        // dd($request);

        $request->validate([


            'company_name' => 'required|string|min:2|max:255',
            'account_holder_name' => 'required|string|min:2|max:255',
            'account_number' => 'required',
            'ifsc_code' => 'required',
            'branch' => 'required',
            'account_type' => 'required',
            'pan_no' => 'required',
            'gst_no' => 'required',
            'bank_address' => 'required',
        ]);

        $param = $request->all();
        // unset($param['_token']);
        AccountDetail::create($param);

        return redirect()->route('manage-account-details')->withStatus('Account Detail created successfully!!');
    }

    public function showCompanyAccountDetail($id)
    {
        $accountDetail = AccountDetail::find($id);
        return view('company-account-details.show', compact('accountDetail'));
    }

    public function editCompanyAccountDetail($id)
    {
        $accountDetail = AccountDetail::find($id);
        $companies = Company::all();
        return view('company-account-details.edit', compact('accountDetail', 'companies'));
    }

    public function updateCompanyAccountDetail(Request $request, $id)
    {
        // dd($request);

        $request->validate([
            'company_name' => 'required|string|min:2|max:255',

            'account_holder_name' => 'required|string|min:2|max:255',
            'account_number' => 'required',
            'ifsc_code' => 'required',
            'branch' => 'required',
            'account_type' => 'required',
            'pan_no' => 'required',
            'gst_no' => 'required',
            'swift_code' => 'required',
            'bank_address' => 'required',
        ]);

        // Company::update($request->all());

        $param = $request->all();
        unset($param['_token']);
        unset($param['_method']);
        AccountDetail::where('id', $id)->update($param);

        // echo "<pre>" . $id;
        // print_r(($request->all()));
        // exit;


        return redirect()->route('manage-account-details')->withStatus('Account Detail updated successfully!!');


    }

    public function deleteCompanyAccountDetail($id)
    {
        $accountDetail = AccountDetail::findOrFail($id);
        $accountDetail->delete();
        return redirect()->route('manage-account-details')->withStatus('Account Detail deleted successfully!!');
    }


}