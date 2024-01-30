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
               
            }
    </style>
</head>
<body>
    
    <div class="container-fluid" style="width:100%;">
       <div style="width:35%; height:auto; float:left;">
        {{-- <p style="font-size: 40px;font-weight: bold;font-family: font-family: 'Work Sans', sans-serif;">MageBuddy</p>
        <p style="font-size: 20px;font-weight: bold;font-family: font-family: 'Work Sans', sans-serif;">Connecting Ecommerce</p> --}}
        <h1 style="font-weight: bold;font-family: font-family: 'Work Sans', sans-serif" class="text-primary">MageBuddy</h1>
        <h2 style="margin-top: -20px;">Connecting Ecommerce</h2>

       </div>
       <div style="padding-left:7%;width:35%; height:auto; float:left; position:relative; ">
         <p>Magebuddy Commerce<br>
            M401, Shri Mahaganesh<br>
            Nagari, Mundhawa,Pune<br>
            411036,India</p>
       </div>
           
       <div style="width:30%; height:auto; float:right; position:relative;">
        
        <p> T +918237275700<br>
            E info@magebuddy.com<br>
            www.magebuddy.com</p>
    </div>

    </div>
    <br><br><br><br><br><br>
    <div class="container-fluid">
        <div style="width:100%; height:auto; top:90%;">
            <hr style="height:2px;border-width:3px;color:black;background-color:black">
        </div>
    </div>
    <div class="container-fluid">
    <div class="one">
    <div class="card-body">
       
            <h2>{{ $bill->company->name }}</h2>
    
            @if ($bill->company->address_line_1)
            <span>{{ $bill->company->address_line_1 }}</span><br>
            @endif
            
            @if ($bill->company->address_line_2)
            <span>{{ $bill->company->address_line_2 }}</span><br>
            @endif
            
            @if ($bill->company->city)
            <span>{{ $bill->company->city }}, </span>
            @endif
            
            @if ($bill->company->state)
            <span>{{ $bill->company->state }}</span>
            @endif

            @if ($bill->company->pin_code)
            <span>- {{ $bill->company->pin_code }}</span><br><br>
            @endif
            
            @if ($bill->company->gst_no)
            <span style="font-weight: bold">GST No : {{ $bill->company->gst_no }}</span>
            @endif
            
        </div>

    </div>
   
    <div class="two" >
        <div class="card-header">
            <h2 style="padding-left: 70%;font-weight: bold;font-family: font-family: 'Work Sans', sans-serif; color: #879df4">
                INVOICE
            </h2>               
        </div>
        <div class="card-body">
            <table class="table" style="padding-left: 30%;width:100%;">
     
                <tr>
                    <td style="padding: 6px;">Invoice No</td>
                    <td style="padding: 6px;">{{ $bill->invoice_no }}</td>
                </tr>
                <tr>
                    <td style="padding: 6px;">Invoice Date</td>
                    <td style="padding: 6px;">{{ $bill->invoice_date }}</td>
                </tr>
    
                @if ($bill->reference_no)
                    <tr>
                        <td style="padding: 6px;">PO No</td>
                        <td style="padding: 6px;">{{ $bill->reference_no }}</td>
                    </tr>
                @endif
    
                @if ($bill->reference_date)
                    <tr>
                        <td style="padding: 6px;">PO Date</td>
                        <td style="padding: 6px;">{{ $bill->reference_date }}</td>
                    </tr>
                @endif
    
              </table>

        </div>

    </div>
    </div>
    <div class="container-fluid"style="position:relative; top:9%;">
    
        <div class="card" style="position:relative; top:15%; left: 0; width:100%;">
            <div class="card-body">
                <table class="table" style="width: 100%;">
                    <tr style="background-color: #b7d6f0;">
                        <th colspan="2" style="width:30%;padding: 10px;">Description</th>
                        <th style="width:10%;padding: 10px;">Quantity/Hrs</th>
                        <th style="width:10%;padding: 10px;">Amount(Rs)</th>
                    </tr>
                    @foreach ($bill->invoiceItems as $item)
                        <tr class="bg-blue"> 
                            <td colspan="2" style="padding: 10px;">{{ $item->description }}</td>

                            <td style="padding: 10px;margin:0%">
                                @if ($item->qty)
                                    {{ $item->qty }}
                                @endif
                            </td>
                            <td style="padding: 10px;">{{ $item->amount }}</td>
                        </tr>
                    @endforeach
                    @if($bill->company->country == "India")
                    <tr>
                        <?php
                        if($bill->cgst_rate){
                            $rows=3;
                        }
                        else {
                            $rows =2;
                        }
                        ?>

                        <td rowspan="{{$rows}}" colspan="2"
                            style="padding: 20px;font-weight: bold;font-family: font-family: 'Work Sans', sans-serif">Thank you
                            for your
                            buisness!!</td>
                        @if($bill->company->country == "India")
                            @if ($bill->cgst_rate)                    
                        <td style="padding: 10px;font-weight: bold">CGST 9%</td>
                        <td>{{ $bill->cgst_rate }}</td>
                        @endif 
                        @if ($bill->igst_rate) 
                        <td style="padding: 10px;font-weight: bold">IGST 18%</td>
                        <td>{{ $bill->igst_rate }}</td>
                        @endif                  
                    </tr>
                    @if( $bill->sgst_rate)
                    <tr>
                        <td style="padding: 10px;font-weight: bold">SGST 9%</td>
                        <td>{{ $bill->sgst_rate }}</td>
                    </tr>
                    @endif
                    @endif
                    <tr>
                        <td style="padding: 10px;font-weight: bold">Total</td>
                        <td>{{ $bill->total_gst }}</td>
                    </tr>
                @else
                <tr>
                    <td rowspan="" colspan="2"
                    style="padding: 20px;font-weight: bold;font-family: font-family: 'Work Sans', sans-serif">Thank you
                    for your
                    buisness!!</td> <td style="padding: 10px;font-weight: bold">Total</td>
                    <td>{{ $bill->total_gst }}</td>
                </tr>
                @endif


                </table>
            </div>
        </div>
    </div>
    
    <div class="container-fluid" style="position:relative; top:25%; border:2px solid rgb(32, 29, 29);width:70%;height:auto">
        <div class="card">
            <div class="card-header">
                <h3 style="font-weight: bold;font-family: 'Work Sans', sans-serif;padding-left:2%;">Account Details</h3>
            </div>
            <div class="card-body" style="padding-left:2%;">

                    <span>Account Holder name : {{ isset($accountDetail->account_holder_name)?$accountDetail->account_holder_name:'' }}<span><br>
                    
                    <span>Account Number : {{ isset($accountDetail->account_number)?$accountDetail->account_number:'' }}</span><br>
                   
                    <span>IFSC : {{ isset($accountDetail->ifsc_code)?$accountDetail->ifsc_code:'' }}</span><br>
                  
                    <span>Branch : {{ isset($accountDetail->branch)?$accountDetail->branch:'' }}</span><br>
                  
                    <span>Account Type : {{ isset($accountDetail->account_type)?$accountDetail->account_type:'' }}</span><br>
                   
                    <span>PAN No : {{isset($accountDetail->pan_no)?$accountDetail->pan_no:"" }}</span><br>
                   
                    <span>Bank Address : {{ isset($accountDetail->bank_address)?$accountDetail->bank_address:'' }}</span><br>
                    
                    <span>Swift Code : {{ isset($accountDetail->swift_code)?$accountDetail->swift_code:'' }}</span><br>
                    
                    <span style="font-weight: bold">GST No : {{isset($accountDetail->gst_no)?$accountDetail->gst_no:'' }}</span><br><br>
                   
                    

            </div>
        </div>
    </div>

   </body>
</html>