@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold text-uppercase"> Add Invoice </h4>
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
                        <form method="POST" action="{{ route('create_invoice') }}">
                            @csrf
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Company Name</label>
                                        <select class="form-control border" name="company_id" id="company_id">
                                            <option value="">Please select</option>
                                            @foreach ($invoices as $invoice)
                                                <option value="{{ $invoice->id }}">{{ $invoice->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">State</label>
                                        <input type="text" id="state" name="state" class="form-control border"
                                            placeholder="Enter State">
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Country</label>
                                        <input type="text" name="country" id="country" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Country">
                                    </div>
                                </div> --}}

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom03">Country</label>
                                        <input type="text" id="country" name="country" class="form-control border" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Invoice Date</label>
                                        <input type="date" name="invoice_date" class="form-control border"
                                            id="validationCustom02">
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Invoice Number</label>
                                        <input type="text" name="invoice_no" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Invoice number">
                                    </div>
                                </div> --}}

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>PO Ref No</label>
                                        <input type="text" name="reference_no" class="form-control border"
                                            id="validationCustom02" placeholder="Enter Reference No">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>PO Ref Date</label>
                                        <input type="date" name="reference_date" class="form-control border"
                                            id="validationCustom02">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <h4 class="header-title text-uppercase"> Invoice Item Details</h4>
                            <hr>

                            <div id="show_item">
                                <div class="row show_item">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="description[]" placeholder="Enter Description"
                                            class="form-control" required>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" id="quantity" name="qty[]" placeholder="Enter Quantity"
                                            class="form-control quantity" required>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="amount[]" placeholder="Enter Amount"
                                            class="form-control amount" required>

                                    </div>

                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-success add_item_btn">Add Item</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4 border p-1 text-center">
                                    <b>Invoice AMOUNT</b>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-4 border p-2">
                                    <input class="form-control" type="text" name="invoice_amount"
                                        id="invoiceAmountInput">
                                </div>
                                
                            </div>

                            <div class="row mt-0">
                                
                                <div class="col-md-3">
                                    <label>CGST (9%)</label>
                                    <input type="text" class="form-control border" placeholder="CGST Rate"
                                        name="cgst_rate" id="cgst">

                                </div>

                                <div class="col-md-3">
                                    <label>SGST (9%)</label>
                                    <input type="text" class="form-control border" placeholder="SGST Rate"
                                        name="sgst_rate" id="sgst">

                                </div>

                                <div class="col-md-3">
                                    <label>IGST (18%)</label>
                                    <input type="text" class="form-control border" placeholder="IGST Rate"
                                        name="igst_rate" id="igst">

                                </div>

                                <div class="col-md-3">
                                    <ul style="list-style: none;float: right;">
                                        <li>
                                            <b>Total Amount:</b> ₹ <span type="text" id="totalAmountDisplay">0</span>
                                        </li>
                                        <li>
                                            <b>Tax:</b> ₹ <span type="text" id="taxDisplay">0</span>
                                            <input type="hidden" value="0" name="gst_amount" id="taxAmount">
                                            {{-- <input type="hidden" value="0" name="tax_amount" id="taxAmount"> --}}
                                        </li>
                                        <li>
                                            <b>Net Amount:</b> ₹ <span type="text" id="netAmountDisplay">0</span>
                                            <input type="hidden" value="0" name="total_gst" id="netAmount">
                                            {{-- <input type="hidden" value="0" name="net_amount" id="netAmount"> --}}
                                        </li>
                                    </ul>
                                </div>

                                {{-- <div class="col-md-3">
                                    <ul style="list-style: none;float: right;">
                                        <li><b>Total Amount:</b> ₹ <span id="totalAmountDisplay">0</span></li>

                                        <li><b>Tax:</b> ₹ <span type="text" id="taxDisplay">0</span></li>

                                        <li><b>Net Amount:</b> ₹ <span type="text" id="netAmountDisplay">0</span></li>
                                    </ul>
                                </div> --}}
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

    



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  
    <script>
        $(document).ready(function() {
            $('#company_id').change(function() {
                var companyId = $(this).val();
                // Fetch the state using an AJAX call to the controller
                $.ajax({
                    url: '/get-state/' + companyId, // Define your route for fetching state
                    type: 'GET',
                    success: function(response) {
                        // Assuming 'state' is the ID of your state input field
                        $('#state').val(response.state); // Update the state field value
                        $('#country').val(response.country); // Update the country field value country
                    },
                    error: function(xhr) {
                        // Handle error if any
                        console.log(xhr.responseText);
                    }
                });
            });
            
        });
    </script>

    <script>
        $(document).ready(function() {
            // Function to calculate the total amount
            function calculateTotalAmount() {
                let totalAmount = 0
                
                $('.show_item').each(function() {
        
                var qty = $(this).find('.amount').val();
                var price = $(this).find('.quantity').val();
                var amount1 = (qty*price);
                totalAmount +=amount1;
                //console.log(totalAmount);

            });
         
                var state = $('#state').val();
                var country = $('#country').val();
                
                // Update the invoice amount field
                $("#invoiceAmountInput").val(totalAmount.toFixed(2));

                var cgstRate = 0,
                    sgstRate = 0,
                    igstRate = 0;

                    if (country !== 'India') {

                        // No GST for companies outside India
                        $("#cgst").val('0.00');
                        $("#sgst").val('0.00');
                        $("#igst").val('0.00');

                        // Check if the company is out of the country, set GST rates to 0
                            // cgstRate = 0;
                            // sgstRate = 0;
                            // igstRate = 0;

                            // var totalTax = 0;
                            // var netAmount = totalAmount;

                    } else if (state == 'Maharashtra') {
                            cgstRate = 9;
                            sgstRate = 9;
                            var cgstAmt = (cgstRate / 100) * totalAmount;
                            var sgstAmt = (sgstRate / 100) * totalAmount;
                            $('#cgst').val(cgstAmt.toFixed(2));
                            $('#sgst').val(sgstAmt.toFixed(2));

                            // GST Amount = Original Cost – (Original Cost * (100 / (100 + GST% ) ) ) 
                            // Net Price = Original Cost – GST Amount

                            var totalTax = cgstAmt + sgstAmt;
                            var netAmount = totalTax + totalAmount;

            } else {

                igstRate = 18;
                var igstAmt = (igstRate / 100) * totalAmount;
                $('#igst').val(igstAmt.toFixed(2));
                // var totalTax = igstAmt;
                // var netAmount = totalTax + totalAmount;

            }

                var totalTax = parseFloat($('#cgst').val()) + parseFloat($('#sgst').val()) + parseFloat($('#igst').val());
                var netAmount = totalTax + totalAmount;

                $("#totalAmountDisplay").text(totalAmount.toFixed(2));
                $("#taxDisplay").text(totalTax.toFixed(2));
                $("#taxAmount").val(totalTax.toFixed(2));
                $("#netAmountDisplay").text(netAmount.toFixed(2));
                $("#netAmount").val(netAmount.toFixed(2));

            }

            
            $(".add_item_btn").click(function(e) {
                e.preventDefault();
                $("#show_item").append(`
                <div class="row show_item">
                                    
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="description[]" placeholder="Enter Description"
                                            class="form-control" required>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="qty[]" placeholder="Enter Quantity"
                                            class="form-control quantity" required>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="amount[]" placeholder="Enter Amount"
                                            class="form-control amount" required>

                                    </div>

                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-danger remove_item_btn">Remove</button>
                                    </div>
                                    
                                </div>
            `);
            });

            $(document).on('click', '.remove_item_btn', function(e) {
                e.preventDefault();
                let rowItem = $(this).closest('.row');
                $(rowItem).remove();
                // Recalculate total amount when an item is removed
                calculateTotalAmount();
            });

            // Calculate total amount initially
            calculateTotalAmount();

            // Calculate total amount whenever 'amount' field changes
            $(document).on('input', "input[name='amount[]']", function() {
                calculateTotalAmount();
            });
        });
      
    </script>

@endsection