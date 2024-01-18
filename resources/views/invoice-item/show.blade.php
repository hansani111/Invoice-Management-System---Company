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



            <span>Invoice Id : {{ $invoiceItem->invoice_id }}<span><br>
                    <span>Description : {{ $invoiceItem->description }}</span><br>
                    <span>Quantity : {{ $invoiceItem->qty }}</span><br>
                    <span>Amount : {{ $invoiceItem->amount }}</span><br>


                    <br>

        </div>

    </div>
@endsection
