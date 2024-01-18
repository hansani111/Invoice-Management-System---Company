@extends('layout.app')

@section('content')
    <div style="margin:20px;" class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning btn-sm"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>
    <div class="account-container" style="margin:20px; border: 2px solid black;width=50px;display:inline-block">

        <div class="detail-container" style="margin: 15px;font-family: 'Work Sans', sans-serif">
            <h4 style="font-weight: bold;font-family: 'Work Sans', sans-serif">Company
                Details
            </h4>

            <span>Name : {{ $company->name }}<span><br>
                    <span>Address : {{ $company->address_line_1 }}</span><br>
                    <span>Address : {{ $company->address_line_2 }}</span><br>
                    <span>State : {{ $company->state }}</span><br>
                    <span>City : {{ $company->city }}</span><br>
                    <span>Country : {{ $company->country }}</span><br>
                    <span>Email : {{ $company->email }}</span><br>
                    <span>Contact No : {{ $company->contact_no }}</span><br>
                    <span>Pin Code : {{ $company->pin_code }}</span><br>

                    <br>
                    <span style="font-weight: bold">GST Number : {{ $company->gst_no }}</span>
                    <br>
        </div>

    </div>
@endsection
