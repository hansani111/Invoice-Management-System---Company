@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold text-uppercase"> Edit Invoice Item </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- Start Form  -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!--Include alert file-->
                        @include('include.alert')

                        <h4 class="header-title text-uppercase"> Basic Info</h4>
                        <hr>
                        <form class="needs-validation" method="post"
                            action="{{ route('update-invoice-item', $invoiceItem->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="invoice_id">Invoice Id</label>
                                        <select class="form-control border" name="invoice_id" id="invoice_id">
                                            @foreach ($invoices as $invoice)
                                                <option value="{{ $invoice->id }}"
                                                    {{ $invoiceItem->invoice_id == $invoice->id ? 'selected' : '' }}>
                                                    {{ $invoice->invoice_no }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="invoice_id">Invoice Id</label>
                                        <select name="invoice_id" id="invoice_id">
                                            @foreach ($invoices as $invoice)
                                                <option value="{{ $invoice->id }}"
                                                    {{ $invoiceItem->invoice_id == $invoice->id ? 'selected' : '' }}>
                                                    {{ $invoice->invoice_no }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- $invoiceItem = InvoiceItem::find($id);
                                $invoices = Invoice::find($id);
                        
                                // $invoices = Invoice::findOrFail($id);
                                // $companies = Company::all(); --}}
                                {{-- <div class="form-group">
                                    <label for="company_id">Company Id</label>
                                    <select name="company_id" id="company_id">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}" {{ $invoices->company_id == $company->id ? 'selected' : '' }}>
                                                {{ $company->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Description</label>
                                        <input type="text" name="description" value="{{ $invoiceItem->description }}"
                                            class="form-control border" id="validationCustom03"
                                            placeholder="Enter Description">
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Quantity</label>
                                        <input type="text" name="qty" value="{{ $invoiceItem->qty }}"
                                            class="form-control border" id="validationCustom03"
                                            placeholder="Enter Quantity">
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Amount</label>
                                        <input type="text" name="amount" value="{{ $invoiceItem->amount }}"
                                            class="form-control border" id="validationCustom02" placeholder="Enter Amount">
                                    </div>
                                </div>
                            </div>




                            <br>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('manage-invoice-items') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
