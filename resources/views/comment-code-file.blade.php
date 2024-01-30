<tr>
    <td>Reference No</td>
    <td>{{ $bill->reference_no }}</td>
</tr>
<tr>
    <td>Reference Date</td>
    <td>{{ $bill->reference_date }}</td>
</tr>

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

                                

                                {{-- <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Company Name</label>
                                        <select class="form-control border" name="company_name" id="company_name">
                                            <option value="">Please select</option>
                                            @foreach ($invoices as $invoice)
                                                <option value="{{ $invoice->id }}">{{ $invoice->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}




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

// if (state == 'Maharashtra') {
    //     cgstRate = 9;
    //     sgstRate = 9;

    //     var cgstAmt = (cgstRate / 100) * totalAmount;
    //     var sgstAmt = (sgstRate / 100) * totalAmount;
    //     $('#cgst').val(cgstAmt);
    //     $('#sgst').val(sgstAmt);

    // } else {
    //     igstRate = 18;
    //     var igstAmt = (igstRate / 100) * totalAmount;
    //     $('#igst').val(igstAmt);
    // }

//     if (state == 'Maharashtra') {
//     var cgstRate = 9;
//     var sgstRate = 9;

//     cgst = (cgstRate / 100) * totalAmount;
//     sgst = (sgstRate / 100) * totalAmount;

//     $('#cgst').val(cgst.toFixed(2));
//     $('#sgst').val(sgst.toFixed(2));
// } else {
//     var igstRate = 18;
//     igst = (igstRate / 100) * totalAmount;
//     $('#igst').val(igst.toFixed(2));
// }

    // var totalTax = ((cgst + sgst + igst) / 100) * totalAmount;
    // var netAmount = totalTax + totalAmount;

    // Adding calculated amounts on fields and display

    // document.getElementById("totalAmountDisplay").innerText = totalAmount.toFixed(2);

    // document.getElementById("taxDisplay").innerText = totalTax.toFixed(2);
    // document.getElementById("taxAmount").value = totalTax.toFixed(2);

    // document.getElementById("netAmountDisplay").innerText = netAmount.toFixed(2);
    // document.getElementById("netAmount").value = netAmount.toFixed(2);


    // -----------------



//     if (state == 'Maharashtra') {
    //     var cgstRate = 9;
    //     var sgstRate = 9;

    //     cgst = (cgstRate / 100) * totalAmount;
    //     sgst = (sgstRate / 100) * totalAmount;

    //     $('#cgst').val(cgst.toFixed(2));
    //     $('#sgst').val(sgst.toFixed(2));
    // } else {
    //     var igstRate = 18;
    //     igst = (igstRate / 100) * totalAmount;
    //     $('#igst').val(igst.toFixed(2));
    // }


<div class="col-md-3">
    <label>IGST (%)</label>
    <input type="text" class="form-control border" placeholder="IGST Rate"
        name="igst_rate" id="igst" oninput="calculateNetAmount()">

</div>




{{-- <div class="col-md-4 border p-2">
                                    <input class="form-control" type="text" name="invoice_amount" id="totalAmountInput"
                                        oninput="calculateNetAmount()">
                                </div> --}}

{{-- <div class="col-md-3">
                                    <label>CGST (%)</label>
                                    <input type="text" class="form-control border" placeholder="CGST Rate"
                                        name="cgst_rate" id="cgst" oninput="calculateNetAmount()">
                                    <span class="float-right gststyle" id="cgstDisplay"></span>
                                    <input type="hidden" id="cgstAmount" name="cgst_amount" value="0">
                                </div> --}}

{{-- <div class="col-md-3">
                                    <label>SGST (%)</label>
                                    <input type="text" class="form-control border" placeholder="SGST Rate"
                                        name="sgst_rate" id="sgst" oninput="calculateNetAmount()">
                                    <span class="float-right gststyle" id="sgstDisplay"></span>
                                    <input type="hidden" id="sgstAmount" name="sgst_amount" value="0">
                                </div> --}}

{{-- <div class="col-md-3">
                                    <label>IGST (%)</label>
                                    <input type="text" class="form-control border" placeholder="IGST Rate"
                                        name="igst_rate" id="igst" oninput="calculateNetAmount()">
                                    <span class="float-right gststyle" id="igstDisplay"></span>
                                    <input type="hidden" id="igstAmount" name="igst_amount" value="0">
                                </div> --}}

 {{-- <script>
        $(document).ready(function() {
            // alert("hello")
            $(".add_item_btn").click(function(e) {
                e.preventDefault();
                $("#show_item").append(`
                
                                    <div class="row">
                                    
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="description[]" placeholder="Enter Description"
                                            class="form-control" required>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="qty[]" placeholder="Enter Quantity"
                                            class="form-control" required>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="amount[]" placeholder="Enter Amount"
                                            class="form-control" required>

                                    </div>

                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-danger remove_item_btn">Remove</button>
                                    </div>
                                    
                                </div>`);
            });
            $(document).on('click', '.remove_item_btn', function(e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });
        });
    </script> --}}