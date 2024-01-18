@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Invoice</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @if ($bill)
                <div class="col-12">
                    <div class="card-box">
                        <!-- Company Info -->
                        <div class="clearfix">
                            <div class="text-center">
                                <h1>ABC Company</h1>
                            </div>
                            <div class="text-center">
                                <span>Bikaner-334001 (Raj.) India</span><br>
                                <span><b>Email:</b> abc@gmail.com | <b>Web:</b> www.abc.com | <b>Mob:</b>
                                    +919601230111</span>
                            </div>
                            <div class="row pb-1">
                                <div class="col-6 text-right">
                                    <span class="text-right"><b>PAN NO:</b> TEST02984</span>
                                </div>
                                <div class="col-6">
                                    <span>
                                        <b>GSTIN NO:</b> TEST92895C0DE3</span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12 text-center border">
                                <b>
                                    <h3 class="m-1">INVOICE </h3>
                                </b>
                            </div>
                        </div>
                        <div class="row text-center ">
                            <div class="col-md-6 border p-0">
                                <b>
                                    <div class="border-bottom">
                                        <h5>Company Details</h5>
                                    </div>
                                </b>
                                <div class="row pl-2 pt-1">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>Name:</label>
                                        <span class="ml-1">{{ $bill->company->name }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>Phone:</label>
                                        <span class="ml-1">{{ $bill->company->contact_no }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>Address:</label>
                                        <span class="ml-1">{{ $bill->company->address }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>State:</label>
                                        <span class="ml-1">{{ $bill->company->state }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>PinCode:</label>
                                        <span class="ml-1">{{ $bill->company->pin_code }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border p-0">
                                <b>
                                    <div class="border-bottom">
                                        <h5>Invoice Details</h5>
                                    </div>
                                </b>
                                <div class="row pl-2 pt-1">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>Invoice Number:</label>
                                        <span class="ml-1">{{ $bill->invoice_no }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>Invoice Date:</label>
                                        <span class="ml-1">{{ date('d-m-Y', strtotime($bill->invoice_date)) }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>Reference No:</label>
                                        <span class="ml-1">{{ date('d-m-Y', strtotime($bill->reference_no)) }}</span>
                                    </div>
                                </div>
                                <div class="row pl-2">
                                    <div class="col-12 d-flex justiy-content-start">
                                        <label>Reference Date:</label>
                                        <span class="ml-1">{{ date('d-m-Y', strtotime($bill->reference_date)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="table-responsive table-bordered">
                                    <table class="table mt-4 table-centered border">
                                        <thead>
                                            <tr>
                                                <th style="width: 15%; background-color: rgb(130, 210, 241); color: black;"
                                                    class="text-center py-1">
                                                    S.No
                                                </th>
                                                <th class="py-0"
                                                    style="background-color: rgb(130, 210, 241); color: black;">
                                                    DESCRIPTION</th>
                                                <th style="width: 15%; background-color: rgb(130, 210, 241); color: black;"
                                                    class="text-center py-1">
                                                    Quantity
                                                </th>
                                                <th style="width: 15%; background-color: rgb(130, 210, 241); color: black;"
                                                    class="text-center py-1">
                                                    AMOUNT
                                                </th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody>
                                            @if ($invoiceItem->count() > 0)
                                                <!-- Check if $invoiceItem is not empty -->
                                                @foreach ($invoiceItem as $index => $invoiceItems)
                                                    <tr>
                                                        <td><b>{{ intval($index) + 1 }}</b></td>
                                                        <td><b>{{ $invoiceItems->description }}</b></td>
                                                        <td>{{ $invoiceItems->qty }}</td>
                                                        <td class="text-center">₹{{ $invoiceItems->amount }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center">No invoice items found</td>
                                                </tr>
                                            @endif
                                        </tbody> --}}
                                        {{-- <tbody>
                                            @if (count($invoiceItem))
                                                @foreach ($invoiceItem as $index => $invoiceItems)
                                                    <tr>

                                                        <td><b>{{ $index + 1 }}</b></td>
                                                        <td>
                                                            <b>{{ $invoiceItems->description }}</b>
                                                        </td>
                                                        <td>{{ $invoiceItems->qty }}</td>
                                                        <td class="text-center">₹{{ $invoiceItems->amount }}</td>

                                                    </tr>
                                                @endforeach
                                            @endif
                                        <tbody> --}}
                                        <tbody>
                                            <tr>
                                                <td>1</td>

                                                <td>
                                                    <b>{{ $invoiceItem->description }}</b>
                                                </td>
                                                <td>{{ $invoiceItem->qty }}</td>
                                                <td class="text-center">₹{{ $invoiceItem->amount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row border">
                            <div class="col-sm-6 col-lg-9 p-0">
                                <div class="clearfix pt-2 pb-2 mt-1 mb-1 ml-1 text-center"
                                    style="background-color: rgba(218, 218, 218, 0.37); border-radius: 5px;">
                                    <h5><b>Company Account Details</b></h5>
                                    {{-- <p><b>UCO BANK - ACCOUNT NO: 180011220011012 - IFSC: UCBA0001011</b></p> --}}
                                    <div class="container">
                                        <span><b>Account Holder Name :
                                                {{ $accountDetail->account_holder_name }}</b><span><br>
                                                <span><b>Account Number :
                                                        {{ $accountDetail->account_number }}</b><span><br>
                                                        <span><b>IFSC : {{ $accountDetail->ifsc_code }}</b><span><br>
                                                                <span><b>Branch :
                                                                        {{ $accountDetail->branch }}</b><span><br>
                                                                        <span><b>Account Type :
                                                                                {{ $accountDetail->account_type }}</b><span><br>
                                                                                <span><b>Pan No :
                                                                                        {{ $accountDetail->pan_no }}</b><span><br>
                                                                                        <span><b>Gst No :
                                                                                                {{ $accountDetail->gst_no }}</b><span><br>
                                                                                                <span><b>Bank Address :
                                                                                                        {{ $accountDetail->bank_address }}</b><span><br>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6 col-lg-3 mt-1">
                                <ul class="list-unstyled">
                                    <li><b>Total :</b> <span class="float-right"><i class="fas fa-rupee-sign"></i>
                                            {{ $invoiceItem->amount }}</span></li>
                                    <li><b>CGST :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                            {{ $bill->cgst_amount }}</span></li>
                                    <li><b>SGST :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                            {{ $bill->sgst_amount }}</span></li>
                                    <li><b>IGST :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                            {{ $bill->igst_amount }}</span></li>
                                    <li><b>Total Tax :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                            {{ $bill->gst_amount }}</span></li>
                                    <li><b>Net Amount :</b><span class="float-right"><i class="fas fa-rupee-sign"></i>
                                            {{ $bill->total_gst }}</span></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="mt-4 mb-1">
                            <div class="text-right d-print-none">
                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light">Print
                                    <i class="mdi mdi-printer mr-1"></i></a>
                                <a href="{{ route('manage-invoices') }}"
                                    class="btn btn-danger waves-effect waves-light">All
                                    Invoices <i class="fas fa-rupee-sign"></i></a>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div>
            @else
                <div class="col-12">
                    <div class="alert alert-danger">Invoice not found</div>
                </div>
            @endif
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection
