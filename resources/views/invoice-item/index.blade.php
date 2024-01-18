@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="page-title-box">
                    <h2 class="page-title font-weight-bold text-uppercase">Manage Invoice Items</h2>
                </div>
            </div>

        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <!--Include alert file-->
                @include('include.alert')
                <div class="card-box">
                    <a href="{{ route('add-invoice-item') }}"
                        class="btn btn-sm btn-blue waves-effect waves-light float-right">
                        <i class="mdi mdi-plus-circle"></i> Add Invoice Items
                    </a>
                    <h4 class="header-title mb-4 text-uppercase">Manage Invoice Items</h4>
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                        id="tickets-table">
                        <thead>
                            <tr>

                                <th>S.No.</th>
                                <th>Invoice Id</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @if (count($invoiceItems))
                                @foreach ($invoiceItems as $index => $invoiceItem)
                                    <tr>
                                        <td><b>{{ $index + 1 }}</b></td>
                                        <td><span class="badge badge-info">{{ $invoiceItem->invoice_id }}</span></td>

                                        <td>{{ $invoiceItem->description }}</td>
                                        <td>{{ $invoiceItem->qty }}</td>
                                        <td>{{ $invoiceItem->amount }}</td>

                                        <td>{{ date('d-m-Y', strtotime($invoiceItem->created_at)) }}</td>


                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="javascript: void(0);"
                                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit-invoice-item', $invoiceItem->id) }}"><i
                                                            class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('show-invoice-item', $invoiceItem->id) }}"><i
                                                            class="fas fa-eye mr-2 text-muted font-18 vertical-middle"></i>View</a>

                                                    <form method="post"
                                                        action="{{ route('delete-invoice-item', $invoiceItem) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="dropdown-item"><i
                                                                class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
