<?php

namespace App\Http\Controllers;

use App\Models\AccountDetail;
use App\Models\Company;
use App\Models\Invoice;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $bills = Invoice::with('invoiceItems')->where('is_deleted', 0)->with('company')->get();

        // $bills = Invoice::where('is_deleted', 0)->with('company')->get();

        $bills = Invoice::with('invoiceItems')->where('is_deleted',null)->get();

        // dd($bills);
        // $item = InvoiceItem::all();
        $party = Company::all();
        return view('invoice.index', compact('bills', 'party'));
    }

    public function addInvoice()
    {
        
        $invoices = Company::all();

        return view('invoice.add', ['invoices' => $invoices]);
    }
//  public function istore(Request $request){
//     dd($request);

//  }
    public function createInvoice(Request $request)
    {

        // dd($request);
        $request->validate([
            // 'company_id' => 'required|exists:companies,id',
            // 'invoice_no' => 'required|string|max:255',
            // 'invoice_date' => 'required|date',

            // 'reference_no' => 'required',
            // 'reference_date' => 'required|date',

            // 'description' => 'required',
            // 'qty' => 'required|numeric',
            // 'amount' => 'required|numeric',

            // 'invoice_amount' => 'required|numeric', //total amount
            // 'cgst_rate' => 'nullable|min:0|max:100',
            // 'cgst_amount' => 'numeric|min:0',
            // 'sgst_rate' => 'nullable|min:0|max:100',
            // 'sgst_amount' => 'numeric|min:0',
            // 'igst_rate' => 'nullable|min:0|max:100',
            // 'igst_amount' => 'numeric|min:0',
            // 'gst_amount' => 'numeric|min:0', // tax amount
            // 'total_gst' => 'required|numeric|min:0', // net amount
            // 'company_address_id' => 'required',
        ]);

        // Calculate cgst_amount, sgst_amount, igst_amount
            $totalAmount = $request->input('invoice_amount');

            $cgstRate = $request->input('cgst_rate');
            $sgstRate = $request->input('sgst_rate');
            $igstRate = $request->input('igst_rate');

            $cgstAmount = ($cgstRate / 100) * $totalAmount;
            $sgstAmount = ($sgstRate / 100) * $totalAmount;
            $igstAmount = ($igstRate / 100) * $totalAmount;

        // Store values in the request data
            $request->merge([
                'cgst_amount' => $cgstAmount,
                'sgst_amount' => $sgstAmount,
                'igst_amount' => $igstAmount,
            ]);

        // Store the invoice
        // $invoice = Invoice::create($request->all());

        $param = $request->all();

        // Generate the invoice number based on the financial year
        $invoiceNumber = $this->generateInvoiceNumber();


        $param['invoice_no'] = $invoiceNumber;

        

        $invoice = Invoice::create($param);
        // $invoice = Invoice::with('invoiceItems')->get();


        if ($request->filled('description') && $request->filled('qty') && $request->filled('amount')) {
            foreach ($request->description as $key => $description) {
                $invoice->invoiceItems()->create([
                    'description' => $description,
                    'qty' => $request->qty[$key],
                    'amount' => $request->amount[$key],
                    // Other fields related to the InvoiceItem model
                ]);
            }
        }
        // Invoice::create($param);

        // return redirect()->route('manage-invoices')->withStatus('Invoice created successfully!!');
        return redirect()->route('manage-invoices', ['invoice' => $invoice])->withStatus('Invoice created successfully!!');

    }


    private function generateInvoiceNumber()
    {
        // dd($request->invoice_no);
        $currentDate = Carbon::now();
        $financialYearStart = Carbon::create($currentDate->year, 4, 1); // Start of financial year on April 1st
        $nextFinancialYearStart = $financialYearStart->copy()->addYear();
        
        if ($currentDate->greaterThanOrEqualTo($nextFinancialYearStart)) {
            // If the current date is after the start of the next financial year,
            // reset the financial year start to the next year
            $financialYearStart = $nextFinancialYearStart;
        }
        
        // Generate the invoice number format
        $financialYearStartFormatted = $financialYearStart->format('Y');
        
        $nextFinancialYearFormatted = $financialYearStart->copy()->addYear()->format('Y');

        // Fetch the count of invoices for the current financial year
        $invoiceCount = Invoice::whereBetween('invoice_date', [
            $financialYearStart->toDateString(),
            
            $nextFinancialYearStart->subDay()->toDateString() // End of the current financial year (one day before next start)
        ])->count();
        // dd($invoiceCount);
        
        // Increment the invoice count and format it to pad with zeros
        $paddedInvoiceCount = str_pad($invoiceCount + 1, 5, '0', STR_PAD_LEFT);

        // Construct the invoice number
        $invoiceNumber = "R{$financialYearStartFormatted}/{$nextFinancialYearFormatted}-{$paddedInvoiceCount}";
        
        return $invoiceNumber;
    }



    public function editInvoice($id)
    {
        // $invoice = Invoice::find($id);
        $invoice = Invoice::with('invoiceItems')->with('company')->find($id);
       // dd( $invoice);
        // $invoiceItem = InvoiceItem::find($id);
        $companies = Company::all();
        return view('invoice.edit', compact('invoice', 'companies'));
    }

    public function updateInvoice(
        Request $request,
        $id
    ) {
     //dd($request);
        $request->validate([
            // 'company_id' => 'required|exists:companies,id',
            // 'invoice_no' => 'required|string|max:255',
            // 'invoice_date' => 'required|date',
            // 'reference_no' => 'required',
            // 'reference_date' => 'required|date',
            // 'description' => 'required',
            // 'qty' => 'required',
            // 'amount' => 'required',
            // 'invoice_amount' => 'required|numeric', //total amount
            // 'cgst_rate' => 'nullable|min:0|max:100',
            // 'cgst_amount' => 'numeric|min:0',
            // 'sgst_rate' => 'nullable|min:0|max:100',
            // 'sgst_amount' => 'numeric|min:0',
            // 'igst_rate' => 'nullable|min:0|max:100',
            // 'igst_amount' => 'numeric|min:0',
            // 'gst_amount' => 'numeric|min:0', // tax amount
            // 'total_gst' => 'required|numeric|min:0', // net amount

        ]);

        $invoice = Invoice::find($id)->update([
            'company_id'=>$request->company_id,
            'invoice_no'=>$request->invoice_no,
            'invoice_date'=>$request->invoice_date,
            'reference_no'=>$request->reference_no,
            'reference_date'=>$request->reference_date,
            'invoice_amount'=>$request->invoice_amount,
            'cgst_rate'=>$request->cgst_rate,
            'sgst_rate'=>$request->sgst_rate,
            'igst_rate'=>$request->igst_rate,
            'cgst_amount'=>$request->cgst_amount,
            'sgst_amount'=>$request->sgst_amount,
            'igst_amount'=>$request->igst_amount,
            'gst_amount'=>$request->gst_amount,
            'total_gst'=>$request->total_gst,
        ]);

        InvoiceItem::where('invoice_id',$id)->delete();
        $count = count($request->amount);
        $des = $request->description;
        $quantity = $request->qty;
        $amt = $request->amount;
       
        for($i=0;$i<$count;$i++){
            
            InvoiceItem::create([
                'invoice_id'=>$id,
                'description'=>$des[$i],
                'qty'=>$quantity[$i],
                'amount'=>$amt[$i],
            ]);
        }
        
        
        return redirect()->route('manage-invoices')->withStatus('Invoice updated successfully!!');

    }

    public function printInvoice($id)
    {
        // $bills = Invoice::findOrFail($id);
        $bill = Invoice::where('id', $id)->with('company')->first();
        // dd($bill);
        $accountDetail = AccountDetail::first();
        // $companies = Company::findOrFail($id);
        $invoiceItem = InvoiceItem::where('invoice_id', $bill->id)->first();
        // dd($invoiceItem);

        return view("invoice.print", compact('bill', 'accountDetail', 'invoiceItem'));
    }
    public function downloadInvoice($id)
    {


        $bill = Invoice::where('id', $id)->with('company')->first();
        $accountDetail = AccountDetail::first();

        $invoiceItem = InvoiceItem::where('invoice_id', $bill->id)->first();

        // return view("invoice.print", compact('bill', 'accountDetail', 'invoiceItem'));

        $data = ['bill' => $bill];

        $pdf = PDF::loadView('invoice.new-download', compact('bill', 'accountDetail', 'invoiceItem', 'data'));

        $todayDate = Carbon::now()->format('d-m-y');
        return $pdf->download('Invoice-' . $bill->id . '-' . $todayDate . '.pdf');
    }
    
    
    public function getState($companyId)
    {
        
        $state = Company::where('id', $companyId)->value('state');

        return response()->json(['state' => $state]);
    }


    // public function fetchState(Request $request)
    // {
    //     $company = Company::findOrFail($request->company_id);
    //     return response()->json(['state' => $company->state]);
    // }

    // public function calculateInvoiceAmount(Request $request)
    // {
    //     $totalAmount = 0;

    //     // Calculate total amount from invoice items
    //     if ($request->filled('amount')) {
    //         $totalAmount = array_sum($request->amount);
    //     }

    //     return response()->json(['invoice_amount' => $totalAmount]);
    // }

    // public function deleteInvoice($id)
    // {
    //     $invoice = Invoice::findOrFail($id);
    //     $invoice->delete();
    //     return redirect()->route('manage-invoices')->withStatus('Invoice deleted successfully!!');
    // }

}