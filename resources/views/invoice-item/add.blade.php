@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold text-uppercase"> Add Invoice Item </h4>
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
                        <form class="needs-validation" method="post" action="{{ route('create-invoice-item') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Invoice Id</label>
                                        <select class="form-control border" name="invoice_id" id="validationCustom01">
                                            <option value="">Please select</option>
                                            @foreach ($invoices as $invoice)
                                                <option value="{{ $invoice->id }}">{{ $invoice->invoice_no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Description</label>
                                        <input type="text" name="description" class="form-control border"
                                            id="validationCustom03" placeholder="Enter Description">
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Quantity</label>
                                        <input type="text" name="qty" class="form-control border"
                                            id="validationCustom03" placeholder="Enter Quantity">
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Amount</label>
                                        <input type="text" name="amount" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Amount">
                                    </div>
                                </div>
                            </div>




                            <br>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
