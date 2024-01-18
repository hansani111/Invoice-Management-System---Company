@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="page-title-box">
                    <h2 class="page-title font-weight-bold text-uppercase">Manage Invoices</h2>
                </div>
            </div>

        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <!--Include alert file-->
                @include('include.alert')

                <div style="overflow-x: auto;" class="card-box">


                    <a href="{{ route('add-invoice') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                        <i class="mdi mdi-plus-circle"></i> Create New Invoice
                    </a>

                    <h4 class="header-title mb-4 text-uppercase">Manage Invoices</h4>

                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                        id="tickets-table">
                        <thead>
                            <tr>


                                <th>S.No.</th>
                                <th>Invoice No</th>
                                <th>Invoice Date</th>

                                <th>Reference No</th>
                                <th>Reference Date</th>
                                <th>Invoice Amount</th>

                                <th>Invoice Items</th>

                                {{-- <th>Description</th> --}}
                                {{-- <th>Quantity</th>
                                <th>Amount</th> --}}

                                <th>CGST Rate</th>
                                <th>SGST Rate</th>
                                <th>IGST Rate</th>

                                <th>CGST Amount</th>
                                <th>SGST Amount</th>
                                <th>IGST Amount</th>

                                <th>GST Amount</th>
                                <th>Total Gst</th>

                                <th>Invoice Date</th>
                                {{-- <th>Action</th> --}}



                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($bills))
                                @foreach ($bills as $index => $bill)
                                    <tr>
                                        <td><b>{{ $index + 1 }}</b></td>
                                        <td>#{{ $bill->invoice_no }}</td>
                                        <td>#{{ $bill->invoice_date }}</td>
                                        <td>#{{ $bill->reference_no }}</td>
                                        <td>#{{ $bill->reference_date }}</td>
                                        <td>#{{ $bill->invoice_amount }}</td>

                                        {{-- <td>#{{ $bill->description }}</td>
                                        <td>#{{ $bill->qty }}</td>
                                        <td>#{{ $bill->amount }}</td> --}}

                                        <td>

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
                                        </td>

                                        <td>#{{ $bill->cgst_rate }}</td>
                                        <td>#{{ $bill->sgst_rate }}</td>
                                        <td>#{{ $bill->igst_rate }}</td>

                                        <td>#{{ $bill->cgst_amount }}</td>
                                        <td>#{{ $bill->sgst_amount }}</td>
                                        <td>#{{ $bill->igst_amount }}</td>

                                        <td>#{{ $bill->gst_amount }}</td>

                                        <td>#{{ $bill->total_gst }}</td>


                                        {{-- <td>

                                            @if ($bill->invoiceItems->isNotEmpty())
                                                <h5>Invoice Items:</h5>
                                                <ul>
                                                    @foreach ($bill->invoiceItems as $item)
                                                        <li>{{ $item->description }} - Qty: {{ $item->qty }} - Amount:
                                                            {{ $item->amount }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>No items found for this invoice</p>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-unstyled">
                                                <li><b>Name:</b> <span> {{ $bill->company->name ?? 'none' }}</span></li>
                                                <li><b>Phone:</b> <span> {{ $bill->company->contact_no ?? 'none' }}</span>
                                                </li>
                                            </ul>
                                        </td> --}}




                                        <td>{{ date('d-m-Y', strtotime($bill->invoice_date)) }}</td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="javascript: void(0);"
                                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit-invoice', $bill->id) }}"><i
                                                            class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                    {{-- <a class="dropdown-item"
                                                        href="{{ route('download-invoice', $bill->id) }}"><i
                                                            class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>download</a> --}}

                                                    <a class="dropdown-item"
                                                        href="{{ route('delete-invoice', ['invoices', $bill->id]) }}"><i
                                                            class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('print-invoice', $bill->id) }}"><i
                                                            class="mdi mdi-printer mr-2 text-muted font-18 vertical-middle"></i>
                                                        Print</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('download-invoice', $bill->id) }}"><i
                                                            class="mdi mdi-printer mr-2 text-muted font-18 vertical-middle"></i>
                                                        Download</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No record found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- end col -->
            </div>
        </div>
        <!-- end row -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>

@endsection
