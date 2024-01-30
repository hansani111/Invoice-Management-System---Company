<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $invoiceItems = InvoiceItem::all();
        return view('invoice-item.index', compact('invoiceItems'));
    }

    public function addInvoiceItem()
    {
        $invoices = Invoice::all();
        return view('invoice-item.add', compact('invoices'));
    }

    // public function createInvoiceItem(Request $request)
    // {
    //     $request->validate([
    //         'invoice_id' => 'required',
    //         'description' => 'required',
    //         'qty' => 'required',
    //         'amount' => 'required',
    //     ]);
    //     $param = $request->all();
    //     // unset($param['_token']);
    //     InvoiceItem::create($param);
    //     return redirect()->route('manage-invoice-items')->withStatus('Invoice Item created successfully!!');
    // }

    public function createInvoiceItem(Request $request)
    {
        $request->validate([
            // 'invoice_id' => 'required',
            // 'description' => 'required',
            // 'qty' => 'required',
            // 'amount' => 'required',
        ]);

        $param = $request->all();
        // Create the invoice item
        $invoiceItem = InvoiceItem::create($param);

        // Calculate total amount for the invoice
        $totalAmount = InvoiceItem::where('invoice_id', $param['invoice_id'])->sum('amount');

        // Update the corresponding invoice's invoice_amount
        $invoice = Invoice::find($param['invoice_id']);
        $invoice->invoice_amount = $totalAmount;
        $invoice->save();

        return redirect()->route('manage-invoice-items')->withStatus('Invoice Item created successfully!!');
    }


    public function showInvoiceItem($id)
    {
        $invoiceItem = InvoiceItem::find($id);
        return view('invoice-item.show', compact('invoiceItem'));
    }

    public function editInvoiceItem($id)
    {
        $invoiceItem = InvoiceItem::find($id);
        $invoices = Invoice::all();

        // $invoices = Invoice::findOrFail($id);
        // $companies = Company::all(); // Retrieve all companies to populate the dropdown


        return view('invoice-item.edit', compact('invoiceItem', 'invoices'));
    }
    public function updateInvoiceItem(Request $request, $id)
    {
        $request->validate([
            // 'invoice_id' => 'required',
            // 'description' => 'required',
            // 'qty' => 'required',
            // 'amount' => 'required',

        ]);

        $param = $request->all();
        unset($param['_token']);
        unset($param['_method']);
        InvoiceItem::where('id', $id)->update($param);

        return redirect()->route('manage-invoice-items')->withStatus('Invoice Item updated successfully!!');

    }

    public function deleteInvoiceItem($id)
    {
        $invoiceItem = InvoiceItem::findOrFail($id);
        $invoiceItem->delete();
        return redirect()->route('manage-invoice-items')->withStatus('Invoice Item deleted successfully!!');
    }
}