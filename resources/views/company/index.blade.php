@extends('layout.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="page-title-box">
                    <h2 class="page-title font-weight-bold text-uppercase">Manage Companies</h2>
                </div>
            </div>

        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <!--Include alert file-->
                @include('include.alert')
                <div style="overflow-x: auto; border-right-width: 100px " class="card-box">
                    <a href="{{ route('add-company') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                        <i class="mdi mdi-plus-circle"></i> Add Company
                    </a>
                    <h4 class="header-title mb-4 text-uppercase">Manage Companies</h4>
                    <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                        id="tickets-table">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Address Line 1</th>
                                <th>Address Line 2</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Pincode</th>
                                <th>Gst No</th>
                                <th>Created At</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($companies))
                                @foreach ($companies as $index => $company)
                                    <tr>
                                        <td><b>{{ $index + 1 }}</b></td>
                                        <td><span class="badge badge-info">{{ $company->name }}</span></td>
                                        {{-- <td>
                                            <ul class="list-unstyled">
                                                <li><b>Address L1:</b> <span> {{ $company->address_line_1 }}</span></li>
                                                <li><b>Address L2:</b> <span> {{ $company->address_line_2 }}</span></li>
                                                <li><b>City:</b> <span> {{ $company->city }}</span></li>
                                                <li><b>State:</b> <span> {{ $company->state }}</span></li>
                                                <li><b>Country:</b> <span> {{ $company->country }}</span></li>
                                                <li><b>Pincode:</b> <span> {{ $company->pin_code }}</span></li>
                                                <li><b>Contact Number:</b> <span> {{ $company->contact_no }}</span></li>
                                            </ul>
                                        </td> --}}
                                        <td>{{ $company->address_line_1 }}</td>
                                        <td>{{ $company->address_line_2 }}</td>
                                        <td>{{ $company->state }}</td>
                                        <td>{{ $company->city }}</td>
                                        <td>{{ $company->country }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->contact_no }}</td>
                                        <td>{{ $company->pin_code }}</td>
                                        <td>{{ $company->gst_no }}</td>
                                        <td>{{ date('d-m-Y', strtotime($company->created_at)) }}</td>



                                        <td>
                                            <div class="btn-group dropdown">
                                                <a href="javascript: void(0);"
                                                    class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit-company', $company->id) }}"><i
                                                            class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('show-company', $company->id) }}"><i
                                                            class="fas fa-eye mr-2 text-muted font-18 vertical-middle"></i>View</a>

                                                    <form method="post" action="{{ route('delete-company', $company) }}">
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
