function calculateNetAmount() {
  var totalAmount = parseFloat(
    document.getElementById("totalAmountInput").value
  );

  if (isNaN(totalAmount)) {
    totalAmount = 0;
  }
  var cgst = parseFloat(document.getElementById("cgst").value) || 0;
  var sgst = parseFloat(document.getElementById("sgst").value) || 0;
  var igst = parseFloat(document.getElementById("igst").value) || 0;

  // parseFloat() The parseFloat() function parses a string argument and returns a floating point number.

  // CGST SGST and IGST teeno value ka code

  var cgstAmt = (cgst / 100) * totalAmount;
  var sgstAmt = (sgst / 100) * totalAmount;
  var igstAmt = (igst / 100) * totalAmount;

  var totalTax = ((cgst + sgst + igst) / 100) * totalAmount;
  var netAmount = totalTax + totalAmount;

  // Adding calculated amounts on fields and display

  document.getElementById("totalAmountDisplay").innerText = totalAmount.toFixed(2);

  document.getElementById("taxDisplay").innerText = totalTax.toFixed(2);
  document.getElementById("taxAmount").value = totalTax.toFixed(2);

  document.getElementById("netAmountDisplay").innerText = netAmount.toFixed(2);
  document.getElementById("netAmount").value = netAmount.toFixed(2);

  document.getElementById("cgstDisplay").innerText = cgstAmt.toFixed(2);
  document.getElementById("cgstAmount").value = cgstAmt.toFixed(2);

  document.getElementById("sgstDisplay").innerText = sgstAmt.toFixed(2);
  document.getElementById("sgstAmount").value = sgstAmt.toFixed(2);

  document.getElementById("igstDisplay").innerText = igstAmt.toFixed(2);
  document.getElementById("igstAmount").value = igstAmt.toFixed(2);
}

function calculateTotalAmount() {
  var oneAmount = parseFloat(document.getElementById("totalInput").value);

  console.log(oneAmount);
  if (isNaN(oneAmount)) {
    oneAmount = 0;
  }
  document.getElementById("totalDisplay").innerText = oneAmount.toFixed(2);
}

/*

<div class="col-md-3 mb-3">
    <input type="text" name="amount[]" placeholder="Enter Amount"
        class="form-control amount-input" required>
</div>

<div class="col-md-3 mb-3">
    <input type="text" name="invoice_amount" placeholder="Invoice Amount"
        class="form-control invoice-amount" readonly>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to calculate invoice amount
        function calculateInvoiceAmount() {
            let totalAmount = 0;
            $('.amount-input').each(function() {
                const amount = parseFloat($(this).val()) || 0;
                totalAmount += amount;
            });
            $('.invoice-amount').val(totalAmount.toFixed(2));
            // Set the calculated value in the invoice amount input
        }

        // Event listener for input changes
        $('.amount-input').on('input', function() {
            calculateInvoiceAmount(); // Recalculate on input change
        });
    });
</script>


*/


/*

function calculateInvoiceAmount() {
  var items = document.getElementsByName('amount[]');
  var totalAmount = 0;
  for (var i = 0; i < items.length; i++) {
    totalAmount += parseFloat(items[i].value) || 0;

    //parseFloat() The parseFloat() function parses a string argument and returns a floating point number.
  }
  return totalAmount;
}

function calculateNetAmount() {
  var totalAmount = calculateInvoiceAmount();

  // Get the state information (inside or outside)
  var state = document.getElementById('stateField').value;

  // var state = $("#state").val();

  var cgstRate = 0;
  var sgstRate = 0;
  var igstRate = 0;

  if (state === 'stateField') {
    cgstRate = 9;
    sgstRate = 9;
  } else {
    igstRate = 18;
  }

  var cgstAmt = (cgstRate / 100) * totalAmount;
  var sgstAmt = (sgstRate / 100) * totalAmount;
  var igstAmt = (igstRate / 100) * totalAmount;

  var totalTax = cgstAmt + sgstAmt + igstAmt;
  var netAmount = totalTax + totalAmount;  //total_gst

  // Set the calculated values in the respective fields
  // document.getElementById("invoiceAmountInput").value = netAmount.toFixed(2);

  document.getElementById("totalAmountDisplay").innerText = totalAmount.toFixed(2);

  document.getElementById("taxDisplay").innerText = totalTax.toFixed(2);
  document.getElementById("taxAmount").value = totalTax.toFixed(2);

  document.getElementById("netAmountDisplay").innerText = netAmount.toFixed(2);
  document.getElementById("netAmount").value = netAmount.toFixed(2);

  document.getElementById("cgstDisplay").innerText = cgstAmt.toFixed(2);
  document.getElementById("cgstAmount").value = cgstAmt.toFixed(2);

  document.getElementById("sgstDisplay").innerText = sgstAmt.toFixed(2);
  document.getElementById("sgstAmount").value = sgstAmt.toFixed(2);

  document.getElementById("igstDisplay").innerText = igstAmt.toFixed(2);
  document.getElementById("igstAmount").value = igstAmt.toFixed(2);

}

// Trigger the calculation initially or based on events like input changes
calculateNetAmount();


*/








// // function calculateNetAmount() {
// //   var totalAmount = 0;

// //   // Iterate through each invoice item and calculate total amount
// //   $(".form-control[name='amount[]']").each(function () {
// //     var itemAmount = parseFloat($(this).val()) || 0;
// //     totalAmount += itemAmount;
// //   });


// //   var state = $('#stateField').val(); // Get the selected state value

// //   //Logic to determine tax rates based on state
// //   var cgst = 0;
// //   var sgst = 0;
// //   var igst = 0;

// //   // var cgstRate = isInsideState ? 9 : 0;
// //   // var sgstRate = isInsideState ? 9 : 0;
// //   // var igstRate = isInsideState ? 0 : 18;

// //   if (state === '#stateField') {
// //     cgst = 9;
// //     sgst = 9;
// //   } else if (state === '#stateField') {
// //     igst = 18;
// //   }

// //   // Calculate CGST, SGST, IGST based on rates
// //   var cgstAmt = (cgstRate / 100) * totalAmount;
// //   var sgstAmt = (sgstRate / 100) * totalAmount;
// //   var igstAmt = (igstRate / 100) * totalAmount;

// //   var totalTax = cgstAmt + sgstAmt + igstAmt;
// //   var netAmount = totalTax + totalAmount;

// //   $("#totalAmountDisplay").text(totalAmount.toFixed(2));
// //   $("#totalAmountInput").val(totalAmount.toFixed(2));
// // }




// function calculateNetAmount() {
//   var totalAmount = parseFloat(
//     document.getElementById("totalAmountInput").value
//   );

//   $(".form-control[name='amount[]']").each(function () {
//     var itemAmount = parseFloat($(this).val()) || 0;
//     totalAmount += itemAmount;
//   });

//   if (isNaN(totalAmount)) {
//     totalAmount = 0;
//   }
//   // var cgst = parseFloat(document.getElementById("cgst").value) || 0;
//   // var sgst = parseFloat(document.getElementById("sgst").value) || 0;
//   // var igst = parseFloat(document.getElementById("igst").value) || 0;

//   var cgst = 0;
//   var sgst = 0;
//   var igst = 0;

//   if (state === '#stateField') {
//     cgst = 9;
//     sgst = 9;
//   } else if (state === '#stateField') {
//     igst = 18;
//   }

//   // CGST SGST and IGST teeno value ka code

//   var cgstAmt = (cgst / 100) * totalAmount;
//   var sgstAmt = (sgst / 100) * totalAmount;
//   var igstAmt = (igst / 100) * totalAmount;

//   var totalTax = ((cgst + sgst + igst) / 100) * totalAmount;
//   var netAmount = totalTax + totalAmount;

//   // Adding calculated amounts on fields and display
//   document.getElementById("totalAmountDisplay").innerText =
//     totalAmount.toFixed(2);
//   document.getElementById("taxDisplay").innerText = totalTax.toFixed(2);
//   document.getElementById("taxAmount").value = totalTax.toFixed(2);

//   document.getElementById("netAmountDisplay").innerText = netAmount.toFixed(2);
//   document.getElementById("netAmount").value = netAmount.toFixed(2);

//   document.getElementById("cgstDisplay").innerText = cgstAmt.toFixed(2);
//   document.getElementById("cgstAmount").value = cgstAmt.toFixed(2);

//   document.getElementById("sgstDisplay").innerText = sgstAmt.toFixed(2);
//   document.getElementById("sgstAmount").value = sgstAmt.toFixed(2);

//   document.getElementById("igstDisplay").innerText = igstAmt.toFixed(2);
//   document.getElementById("igstAmount").value = igstAmt.toFixed(2);
// }

// function calculateTotalAmount() {
//   var oneAmount = parseFloat(document.getElementById("totalInput").value);

//   console.log(oneAmount);
//   if (isNaN(oneAmount)) {
//     oneAmount = 0;
//   }
//   document.getElementById("totalDisplay").innerText = oneAmount.toFixed(2);
// }
