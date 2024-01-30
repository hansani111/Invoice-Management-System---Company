@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="page-title-box">
                    <h2 class="page-title font-weight-bold text-uppercase">Manage Account Details</h2>
                </div>
            </div>

        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <!--Include alert file-->
                @include('include.alert')
                <div style="overflow-x: auto;" class="card-box">
                    <a href="{{ route('account-detail') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                        <i class="mdi mdi-plus-circle"></i> Add Account Detail
                    </a>
                    <h4 class="header-title mb-4 text-uppercase">Manage Account Details</h4>
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                        id="tickets-table">
                        <thead>
                            <tr>


                                <th>Sno.</th>
                                <th>Company Name</th>
                                <th>Account Holder Name</th>
                                {{-- <th>Account Detail</th> --}}
                                <th>Account Number</th>
                                <th>IFSC Code</th>
                                <th>Branch</th>
                                <th>Account Type</th>
                                {{-- <th>Detail</th> --}}
                                <th>Pan No</th>
                                <th>Gst No</th>
                                <th>Bank Address</th>
                                <th>Swift Code</th>
                                <th>Created At</th>

                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($accountDetails))
                                @foreach ($accountDetails as $index => $accountDetail)
                                    <tr>
                                        <td><b>{{ $index + 1 }}</b></td>
                                        <td>{{ $accountDetail->company_id }}</td>
                                        {{-- <td>{{ $accountDetail->company_name }}</td> --}}
                                        <td>{{ $accountDetail->account_holder_name }}</td>
                                        <td>{{ $accountDetail->account_number }}</td>
                                        <td>{{ $accountDetail->ifsc_code }}</td>
                                        <td>{{ $accountDetail->branch }}</td>
                                        <td>{{ $accountDetail->account_type }}</td>
                                        <td>{{ $accountDetail->pan_no }}</td>
                                        <td>{{ $accountDetail->gst_no }}</td>
                                        <td>{{ $accountDetail->bank_address }}</td>
                                        <td>{{ $accountDetail->swift_code }}</td>
                                        <!-- Check if reference date is present -->
                                        {{-- @if ($accountDetail->swift_code)
                                    <tr>

                                        <td>{{ $accountDetail->swift_code }}</td>
                                    </tr>
                                @endif --}}




                                        {{-- <td>
                                            <ul class="list-unstyled">
                                                <li><b>Account Number :</b><span>{{ $accountDetail->account_number }}
                                                    </span></li>
                                                <li><b>IFSC Code :</b><span>{{ $accountDetail->ifsc_code }}</span></li>
                                                <li><b>Branch :</b> <span>{{ $accountDetail->branch }}</span></li>
                                            </ul>
                                        </td>
                                        <td>{{ $accountDetail->account_type }}</td>
                                        <td>
                                            <ul class="list-unstyled">
                                                <li><b>Pan No :</b> <span>{{ $accountDetail->pan_no }}</span></li>
                                                <li><b>Gst No :</b> <span>{{ $accountDetail->gst_no }}</span></li>
                                                <li><b>Bank Address :</b> <span>{{ $accountDetail->bank_address }}</span>
                                                </li>
                                            </ul>
                                        </td> --}}

                                        <td>{{ date('d-m-Y', strtotime($accountDetail->created_at)) }}</td>


                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="javascript: void(0);"
                                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit-account-detail', $accountDetail->id) }}"><i
                                                            class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('show-account-detail', $accountDetail->id) }}"><i
                                                            class="fas fa-eye mr-2 text-muted font-18 vertical-middle"></i>View</a>


                                                    <form method="post"
                                                        action="{{ route('delete-account-detail', $accountDetail) }}">
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
