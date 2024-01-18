<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice #{{ $bill->id }}</title>
{{-- <style>
    table,
        th,
        td {
            border: 1px solid #141313;
            padding: 8px;
            font-size: 14px;
            border-color: black !important;
            /* border: 2px solid black; */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
</style> --}}


<style>
    table,th,td{
         border: 1px solid black;
         border-collapse: collapse;
    }
</style>

</head>

<body>

    <h2 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif">MageBuddy</h2>
    <h3>Connecting Ecommerce</h3>
    <hr style="height:2px;border-width:3px;color:black;background-color:black">
    <div class="row">
        <div class="col-sm-6">
         <h3 style="font-weight: bold">Company Details</h3>
                 <span>Name : {{ $bill->company->name }}<span><br>
                         <span>Email : {{ $bill->company->email }}</span><br>
                         <span>Address Line 1: {{ $bill->company->address_line_1 }}</span><br>
                         <span>Address Line 2: {{ $bill->company->address_line_2 }}</span><br>
                         <span>City : {{ $bill->company->city }}</span><br>
                         <span>State : {{ $bill->company->state }}</span><br>
                         <span>Country : {{ $bill->company->country }}</span><br>
     
                         <span>Contact Number :
                             {{ $bill->company->contact_no }}</span><br>
     
                         <span>Pincode : {{ $bill->company->pin_code }}</span><br>
                         <br>
     
                         <span style="font-weight: bold">GST No : {{ $bill->company->gst_no }}</span>
        </div>
        <div class="col-sm-6">
         <h2 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif; color: #879df4">
             INVOICE
         </h2>
 
         <table>
 
             <tr>
                 <td>Invoice No</td>
                 <td>{{ $bill->invoice_no }}</td>
             </tr>
             <tr>
                 <td>Invoice Date</td>
                 <td>{{ $bill->invoice_date }}</td>
             </tr>
 
             <!-- Check if reference number is present -->
             @if ($bill->reference_no)
                 <tr>
                     <td>Reference No</td>
                     <td>{{ $bill->reference_no }}</td>
                 </tr>
             @endif
 
             <!-- Check if reference date is present -->
             @if ($bill->reference_date)
                 <tr>
                     <td>Reference Date</td>
                     <td>{{ $bill->reference_date }}</td>
                 </tr>
             @endif
 
             {{-- <tr>
                     <td>Reference No</td>
                     <td>{{ $bill->reference_no }}</td>
                 </tr>
                 <tr>
                     <td>Reference Date</td>
                     <td>{{ $bill->reference_date }}</td>
                 </tr> --}}
 
         </table>
 
        </div>
 
     </div>
    <br>

    <table>
        <tr>
            <td rowspan="5"><h3 style="font-weight: bold">Company Details</h3>
                <span>Name : {{ $bill->company->name }}<span><br>
                        <span>Email : {{ $bill->company->email }}</span><br>
                        <span>Address Line 1: {{ $bill->company->address_line_1 }}</span><br>
                        <span>Address Line 2: {{ $bill->company->address_line_2 }}</span><br>
                        <span>City : {{ $bill->company->city }}</span><br>
                        <span>State : {{ $bill->company->state }}</span><br>
                        <span>Country : {{ $bill->company->country }}</span><br>
    
                        <span>Contact Number :
                            {{ $bill->company->contact_no }}</span><br>
    
                        <span>Pincode : {{ $bill->company->pin_code }}</span><br>
                        <br>
    
                        <span style="font-weight: bold">GST No : {{ $bill->company->gst_no }}</span></td>

                        <td colspan="2">
                            <h2 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif; color: #879df4">
                                INVOICE
                            </h2>
                            
                        </td>

        </tr>
        <tr>
            <td>invoice no</td>
            <td>{{ $bill->invoice_no }}</td>
        </tr>

        <tr>
            <td>invoice date</td>
            <td>{{ $bill->invoice_date }}</td>
        </tr>

        <tr>
            <td>Reference No</td>
            <td>{{ $bill->reference_no }}</td>
        </tr>

        <tr>
            <td>Reference Date</td>
            <td>{{ $bill->reference_date }}</td>
        </tr>
    </table>
    
    <div class="row">
        <div class="company-details col-sm-6">
            <!-- Your Company Details Here -->
            <h3 style="font-weight: bold">Company Details</h3>
            <span>Name : {{ $bill->company->name }}<span><br>
                    <span>Email : {{ $bill->company->email }}</span><br>
                    <span>Address Line 1: {{ $bill->company->address_line_1 }}</span><br>
                    <span>Address Line 2: {{ $bill->company->address_line_2 }}</span><br>
                    <span>City : {{ $bill->company->city }}</span><br>
                    <span>State : {{ $bill->company->state }}</span><br>
                    <span>Country : {{ $bill->company->country }}</span><br>

                    <span>Contact Number :
                        {{ $bill->company->contact_no }}</span><br>

                    <span>Pincode : {{ $bill->company->pin_code }}</span><br>
                    <br>

                    <span style="font-weight: bold">GST No : {{ $bill->company->gst_no }}</span>
                    <br>
        </div>
        <div class="invoice-table  col-sm-6">
            <!-- Your Invoice Table Here -->
            <h2 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif; color: #879df4">
                INVOICE
            </h2>

            <table>

                <tr>
                    <td>Invoice No</td>
                    <td>{{ $bill->invoice_no }}</td>
                </tr>
                <tr>
                    <td>Invoice Date</td>
                    <td>{{ $bill->invoice_date }}</td>
                </tr>

                <!-- Check if reference number is present -->
                @if ($bill->reference_no)
                    <tr>
                        <td>Reference No</td>
                        <td>{{ $bill->reference_no }}</td>
                    </tr>
                @endif

                <!-- Check if reference date is present -->
                @if ($bill->reference_date)
                    <tr>
                        <td>Reference Date</td>
                        <td>{{ $bill->reference_date }}</td>
                    </tr>
                @endif

                {{-- <tr>
                        <td>Reference No</td>
                        <td>{{ $bill->reference_no }}</td>
                    </tr>
                    <tr>
                        <td>Reference Date</td>
                        <td>{{ $bill->reference_date }}</td>
                    </tr> --}}

            </table>
        </div>



    </div>
    
    
<?php exit; ?>

   
            <table>
                {{-- <td>

                    @if ($bill->invoiceItems->isNotEmpty())
                        <ul>
                            @foreach ($bill->invoiceItems as $item)
                                <li>{{ $item->description }} <b>- Qty:</b> {{ $item->qty }} <b>-
                                        Amount:</b>
                                    {{ $item->amount }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No items found for this invoice</p>
                    @endif
                </td> --}}


                <tr class="bg-blue">
                    <th colspan="2">Description</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
                @foreach ($bill->invoiceItems as $item)
                    <tr>
                        <td colspan="2">{{ $item->description }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->amount }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td rowspan="4" colspan="2"
                        style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif">Thank you
                        for your
                        buisness!!</td>
                    <td style="font-weight: bold">CGST </td>
                    {{-- <td>{{ $bill->cgst_amount }}</td> --}}
                    <td>{{ $bill->cgstAmt }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">SGST</td>
                    {{-- <td>{{ $bill->sgst_amount }}</td> --}}
                    <td>{{ $bill->sgstAmt }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">IGST</td>
                    {{-- <td>{{ $bill->igst_amount }}</td> --}}
                    <td>{{ $bill->igstAmt }}</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Total</td>
                    <td>{{ $bill->netAmount }}</td>
                </tr>



            </table>
        </body>

        </html>

    </div>
    <br>

    <div class="account-container" style="border: 2px solid black;width=50px;display: inline-block">

        <div class="detail-container" style="margin: 15px;font-family: 'Work Sans', sans-serif">
            <h4 style="font-weight: bold;font-family: 'Work Sans', sans-serif">Account
                Details
            </h4>

            <span>Account Holder name : {{ $accountDetail->account_holder_name }}<span><br>
                    <span>Account Number : {{ $accountDetail->account_number }}</span><br>
                    <span>IFSC : {{ $accountDetail->ifsc_code }}</span><br>
                    <span>Branch : {{ $accountDetail->branch }}</span><br>
                    <span>Account Type : {{ $accountDetail->account_type }}</span><br>
                    <span>PAN No : {{ $accountDetail->pan_no }}</span><br>
                    <br>
                    <span>Bank Address : {{ $accountDetail->bank_address }}</span><br>
                    <br>
                    <span>Swift Code : {{ $accountDetail->swift_code }}</span><br>
                    <br>
                    <span style="font-weight: bold">GST No : {{ $accountDetail->gst_no }}</span>
                    <br>
        </div>

    </div>

<?php exit; ?>

</body>

</html>
