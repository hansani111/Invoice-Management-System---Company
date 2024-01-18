@extends('layout.app')

@section('content')
    <div style="margin:20px;" class="container">
        <a href="{{ url()->previous() }}" class="btn btn-warning btn-sm"><i class="fa fa-angle-left"></i> <b>Go Back</b></a>
    </div>
    <br>
    <div class="account-container" style="margin:20px; border: 2px solid black;width=50px;display:inline-block">

        <div class="detail-container" style="margin: 15px;font-family: 'Work Sans', sans-serif">
            <h4 style="font-weight: bold;font-family: 'Work Sans', sans-serif">Company Account
                Details
            </h4>

            <span>Company Address Id : {{ $accountDetail->company_name }}<span><br>
                    <span>Account Holder Name : {{ $accountDetail->account_holder_name }}</span><br>
                    <span>Account Number : {{ $accountDetail->account_number }}</span><br>
                    <span>IFSC Code : {{ $accountDetail->ifsc_code }}</span><br>
                    <span>Branch : {{ $accountDetail->branch }}</span><br>
                    <span>Account Type : {{ $accountDetail->account_type }}</span><br>
                    <span>Pan No : {{ $accountDetail->pan_no }}</span><br>
                    <span>Gst No : {{ $accountDetail->gst_no }}</span><br>
                    <span>Bank Address : {{ $accountDetail->bank_address }}</span><br>

                    <br>

        </div>

    </div>
@endsection
