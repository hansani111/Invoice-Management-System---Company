@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold text-uppercase"> Add Company Account Details </h4>
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
                        <form class="needs-validation" method="post" action="{{ route('create-account-detail') }}">
                            @csrf

                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Company Name</label>
                                        <select class="form-control border" name="company_address_id"
                                            id="validationCustom01">
                                            <option value="">Please select</option>
                                            @foreach ($invoices as $invoice)
                                                <option value="{{ $invoice->id }}">{{ $invoice->address }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Company Name</label>
                                        <input type="text" name="company_name" class="form-control border"
                                            id="validationCustom01" placeholder="Enter Company Name">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Account Holder Name</label>
                                        <input type="text" name="account_holder_name" class="form-control border"
                                            id="validationCustom03" placeholder="Enter Account Holder Name">
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Account Number</label>
                                        <input type="text" name="account_number" class="form-control border"
                                            id="validationCustom03" placeholder="Enter Account Number">
                                    </div>
                                </div>



                            </div>


                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">IFSC Code</label>
                                        <input type="text" name="ifsc_code" class="form-control border"
                                            id="validationCustom01" placeholder="Enter IFSC Code">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Branch</label>
                                        <input type="text" name="branch" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Branch">
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Account Type</label>
                                        <input type="text" name="account_type" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Account Type">
                                    </div>
                                </div>



                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Pan Number</label>
                                        <input type="text" name="pan_no" class="form-control border"
                                            id="validationCustom01" placeholder="Enter Pan Number">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Gst Number</label>
                                        <input type="text" name="gst_no" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Gst Number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Swift Code</label>
                                        <input type="text" name="swift_code" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Swift Code">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Bank Address</label>
                                        <input type="text" name="bank_address" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Bank Address">
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
