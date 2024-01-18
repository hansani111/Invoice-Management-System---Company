<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Pdf</title>
    {{-- <link rel="stylesheet" href="{{asset('assets/bootstrap.css')}}">    
    <script src="{{asset('assets/bootstrap.js')}}"></script>
    <script src="{{asset('assets/jquery.js')}}"></script> --}}

    <style>    
        table,th,td{
                 border: 1px solid black;
                 border-collapse: collapse;
               
            }
            td{

                padding-left:5%;
            }
            .one{
                float: left;
                height:auto; width:50%; 
            }
            .two{
                float:right;
                height: auto; width:50%; 
                /* padding-left: 50%; */
                /* margin-left: 10%; */
            }
    </style>
</head>
<body>
    
    <div class="container-fluid" style="width:100%;">
       <div style="width:35%; height:auto; float:left;">
        <h2 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif" class="text-primary">MageBuddy</h2>
        <h3>Connecting Ecommerce</h3>

       </div>
       <div style="width:35%; height:auto; float:left; position:relative; ">
         <p>Magebuddy Commerce<br>
            M401, Shri Mahaganesh<br>
            Nagari, Mundhawa,Pune<br>
            411036,India</p>
       </div>
           
       <div style="width:30%; height:auto; float:right; position:relative;">
        {{-- <h3>Connecting Ecommerce</h3> --}}
        <p> T +918237275700<br>
            E info@magebuddy.com<br>
            www.magebuddy.com</p>
    </div>

    </div>
    <br><br><br><br><br><br>
    <div class="container-fluid">
        <div style="width:100%; height:auto; top:70%;">
            <hr style="height:2px;border-width:3px;color:black;background-color:black">
        </div>
    </div>
    <div class="container-fluid">
    <div class="one">
    <div class="card-body">
       
            <h3>{{ $bill->company->name }}</h3>
            {{-- <span style="font-weight: bold">{{ $bill->company->name }}<span><br> --}}
            {{-- <span>Email : {{ $bill->company->email }}</span><br> --}}
            <span>{{ $bill->company->address_line_1 }}</span><br>
            <span>{{ $bill->company->address_line_2 }}</span><br>
            <span>{{ $bill->company->city }}, </span>
            <span>{{ $bill->company->state }}</span>
                {{-- <span>Country : {{ $bill->company->country }}</span><br> --}}

                {{-- <span>Contact Number : $bill->company->contact_no</span><br> --}}

              <span>- {{ $bill->company->pin_code }}</span><br><br>
            

            <span style="font-weight: bold">GST No : {{ $bill->company->gst_no }}</span>
            
        </div>

    </div>
   
    <div class="two" >
        <div class="card-header">
            <h2 style="padding-left: 30%;font-weight: bold;font-family: font-family: 'Work Sans', sans-serif; color: #879df4">
                INVOICE
            </h2>               
        </div>
        <div class="card-body">
            <table class="table" style="padding-left: 30%;">
     
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
    </div>
    <div class="container-fluid"style="position:relative; top:8%;">
    
        <div class="card" style="position:relative; top:15%; left: 0; width:100%; height:auto">
            <div class="card-body">
                <table class="table" style="width: 100%; height:auto;">
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

                    @if ($bill->cgst_rate)
                    <tr>
                        <td rowspan="4" colspan="2"
                            style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif">Thank you
                            for your
                            buisness!!</td>
                        <td style="font-weight: bold">CGST 9%</td>
                        <td>{{ $bill->cgst_rate }}</td>
                    </tr>
                    @endif


                    {{-- <tr>
                        <td rowspan="4" colspan="2"
                            style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif">Thank you
                            for your
                            buisness!!</td>
                        <td style="font-weight: bold">CGST 9%</td>
                        <td>{{ $bill->cgst_rate }}</td>
                    </tr> --}}

                    @if ($bill->sgst_rate)
                    <tr>
                        <td style="font-weight: bold">SGST 9%</td>
                        <td>{{ $bill->sgst_rate }}</td>
                    </tr>
                    @endif

                    {{-- <tr>
                        <td style="font-weight: bold">SGST 9%</td>
                       <td>{{ $bill->sgst_rate }}</td>
                    </tr> --}}

                    @if ($bill->igst_rate)
                    <tr>
                        <td rowspan="4" colspan="2"
                            style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif">Thank you
                            for your
                            buisness!!</td>
                        <td style="font-weight: bold">IGST 18%</td>
                        <td>{{ $bill->igst_rate }}</td>
                    </tr>
                    @endif

                    {{-- <tr>
                        <td style="font-weight: bold">IGST 18%</td>
                        <td>{{ $bill->igst_rate }}</td>
                    </tr> --}}

                    <tr>
                        <td style="font-weight: bold">Total</td>
                        <td>{{ $bill->total_gst }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="position:relative; top:23%; border:2px solid rgb(32, 29, 29);width:50%;height:auto">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;font-family: 'Work Sans', sans-serif;padding-left:10%;">Account
                    Details
                </h4>
            </div>
            <div class="card-body" style="padding-left:10%;">
                <span>Account Holder name : {{ $accountDetail->account_holder_name }}<span><br>
                    <span>Account Number : {{ $accountDetail->account_number }}</span><br>
                    <span>IFSC : {{ $accountDetail->ifsc_code }}</span><br>
                    <span>Branch : {{ $accountDetail->branch }}</span><br>
                    <span>Account Type : {{ $accountDetail->account_type }}</span><br>
                    <span>PAN No : {{ $accountDetail->pan_no }}</span><br>
                    
                    <span>Bank Address : {{ $accountDetail->bank_address }}</span><br>
                    
                    <span>Swift Code : {{ $accountDetail->swift_code }}</span><br>
                    
                    <span style="font-weight: bold">GST No : {{ $accountDetail->gst_no }}</span>
                    

            </div>
        </div>
    </div>
   </body>
</html>