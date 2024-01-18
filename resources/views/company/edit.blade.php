@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold text-uppercase"> Edit Company </h4>
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
                        <form class="needs-validation" method="post" action="{{ route('update-company', $company->id) }}">
                            @csrf
                            {{-- directive --}}
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Name</label>
                                        <input type="text" name="name" value="{{ $company->name }}"
                                            class="form-control border" id="validationCustom01"
                                            placeholder="Enter Company name">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Address L1</label>
                                        <input type="text" name="address_line_1" value="{{ $company->address_line_1 }}"
                                            class="form-control border" id="validationCustom03"
                                            placeholder="Enter Address L1">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Address L2</label>
                                        <input type="text" name="address_line_2" value="{{ $company->address_line_2 }}"
                                            class="form-control border" id="validationCustom03"
                                            placeholder="Enter Address L2">
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Address L1</label>
                                        <input type="text" name="address_line_1"
                                            value="{{ $company->address_line_1 }} class="form-control border"
                                            id="validationCustom03" placeholder="Enter Address L1">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Address L2</label>
                                        <input type="text" name="address_line_2"
                                            value="{{ $company->address_line_2 }} class="form-control border"
                                            id="validationCustom03" placeholder="Enter Address L2">
                                    </div>
                                </div> --}}






                            </div>


                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">State</label>
                                        <input type="text" name="state" value="{{ $company->state }}"
                                            class="form-control border" id="validationCustom03" placeholder="Enter State">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">City</label>
                                        <input type="text" name="city" value="{{ $company->city }}"
                                            class="form-control border" id="validationCustom01" placeholder="Enter City">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Country</label>
                                        <input type="text" name="country" value="{{ $company->country }}"
                                            class="form-control border" id="validationCustom02" placeholder="Enter Country">
                                    </div>
                                </div>







                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Email</label>
                                        <input type="text" name="email" value="{{ $company->email }}"
                                            class="form-control border" id="validationCustom02" placeholder="Enter Email">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom01">Contact Number</label>
                                        <input type="text" name="contact_no" value="{{ $company->contact_no }}"
                                            class="form-control border" id="validationCustom01"
                                            placeholder="Enter Contact Number">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Pincode</label>
                                        <input type="text" name="pin_code" value="{{ $company->pin_code }}"
                                            class="form-control border" id="validationCustom02" placeholder="Enter Pincode">
                                    </div>
                                </div>





                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Gst Number</label>
                                        <input type="text" name="gst_no" value="{{ $company->gst_no }}"
                                            class="form-control border" id="validationCustom02"
                                            placeholder="Enter Gst Number">
                                    </div>
                                </div>
                            </div>


                            <br>

                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('manage-companies') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
