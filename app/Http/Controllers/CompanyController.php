<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    # Function to load companies
    public function index()
    {
        // $companies = Company::all();

        $companies = Company::all();

        return view('company.index', compact('companies'));
    }

    # Function to load add company view
    public function addCompany()
    {
        return view('company.add');
    }

    # Function to create/store company
    public function createCompany(Request $request)
    {
        // dd($request);
        // echo "<pre>";
        // print_r($request->all());
        // echo $request->name;

        // $param = array(
        //     [
        //         'name' => $request->name,
        //         'address' => $request->address,
        //         'state' => $request->state,
        //         'city' => $request->city,
        //         'country' => $request->country,
        //         'email' => $request->email,
        //         'contact_no' => $request->contact_no,
        //         'pin_code' => $request->pin_code,
        //         'gst_no' => $request->gst_no,
        //     ]
        // );


        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_no' => 'required|numeric|min:10',
            'pin_code' => 'required|digits:6',
            'gst_no' => 'required|regex:/^\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d[Z]{1}[A-Z\d]{1}$/i',
        ]);

        $param = $request->all();
        // unset($param['_token']);
        Company::create($param);

        // return view('company.create');
        return redirect()->route('manage-companies')->withStatus('Company created successfully!!');
        // return redirect()->route('manage-companies')->with('success','Company created successfully!!');
    }

    public function showCompany($id)
    {
        $company = Company::find($id);
        return view('company.show', compact('company'));
    }

    # Function to load edit company view
    public function editCompany($id)
    {
        $company = Company::find($id);
        // $data['company'] = Company::find($id);
        // dd($company);
        return view('company.edit', compact('company'));
        // return view('company.edit', $data);
    }

    # Function to update company data
    public function updateCompany(Request $request, $id)
    {
        // dd($request);

        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'address_line_1' => 'required',
            'address_line_2' => 'required',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_no' => 'required|numeric|min:10',
            'pin_code' => 'required|digits:6',
            'gst_no' => 'required|regex:/^\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d[Z]{1}[A-Z\d]{1}$/i',
        ]);

        // Company::update($request->all());

        $param = $request->all();
        unset($param['_token']);
        unset($param['_method']);
        Company::where('id', $id)->update($param);

        // echo "<pre>" . $id;
        // print_r(($request->all()));
        // exit;


        return redirect()->route('manage-companies')->withStatus('Company updated successfully!!');


    }

    # Function to delete company
    public function deleteCompany(Company $company)
    {
        $company->delete();
        return redirect()->route('manage-companies')->withStatus('Company deleted successfully!!');
    }



}