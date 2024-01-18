<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>    
    table,th,td{
             border: 1px solid black;
             border-collapse: collapse;
        }
</style>
</head>
<body>
   <div class="container-fluid">
    <h2 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif" class="text-primary">MageBuddy</h2>
    <h3>Connecting Ecommerce</h3>
    <hr style="height:2px;border-width:3px;color:black;background-color:black">
   </div>
    
   
    <div class="container-fluid">
        {{-- <h3 style="font-weight: bold">Company Details</h3> --}}
        <div style="width:50%; height:50%; float:left;">
            <h4>Name : {{ $bill->company->name }}<h4><br>
            <h4>Email : {{ $bill->company->email }}</h4><br>
            <h4>Address Line 1: {{ $bill->company->address_line_1 }}</h4><br>
            <h4>Address Line 2: {{ $bill->company->address_line_2 }}</h4><br>
            <h4>City : {{ $bill->company->city }}</h4><br>
            <h4>State : {{ $bill->company->state }}</h4><br>
            <h4>Country : {{ $bill->company->country }}</h4><br>

            <h4>Contact Number :
                {{ $bill->company->contact_no }}</h4><br>

            <h4>Pincode : {{ $bill->company->pin_code }}</h4><br>
            

            <h4 style="font-weight: bold">GST No : {{ $bill->company->gst_no }}</h4>
            
        </div>
        <div style="width:50%; height:50%;float:right">
            <h2 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif; color: #879df4">
             INVOICE
         </h2>
            
          <table class="table">
 
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

          </table>
        </div>
    </div>
        <div class="container-fluid" style="width:100%; height:auto;">
            <table>

                <tr class="bg-blue">
                    <th colh4="2">Description</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
        
                @foreach ($bill->invoiceItems as $item)
                    <tr>
                        <td colh4="2">{{ $item->description }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->amount }}</td>
                    </tr>
                @endforeach
        
                <tr>
                    <td rowh4="4" colh4="2"
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

        </div>
      
        
       
<?php exit; ?>
</body>
</html>