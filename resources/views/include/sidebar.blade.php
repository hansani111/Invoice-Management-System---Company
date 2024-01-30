<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="h-100" data-simplebar>


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Company </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add-company') }}"><i data-feather="plus" class="pr-0 mr-1"></i>Add
                                    New</a>
                            </li>
                            <li>
                                <a href="{{ route('manage-companies') }}"><i data-feather="list"
                                        class="pr-0 mr-1"></i>Manage
                                    Companies</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEcomme" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Company A/c Detail </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcomme">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('account-detail') }}"><i data-feather="plus" class="pr-0 mr-1"></i>Add
                                    New</a>
                            </li>
                            <li>
                                <a href="{{ route('manage-account-details') }}"><i data-feather="list"
                                        class="pr-0 mr-1"></i>Manage
                                    Companies A/c Detail</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCrm" data-toggle="collapse">
                        <i data-feather="edit"></i>
                        <span> Invoice </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add-invoice') }}"><i data-feather="plus" class="pr-0 mr-1"></i>Create
                                    Invoice</a>
                            </li>
                            <li>
                                <a href="{{ route('manage-invoices') }}"><i data-feather="list"
                                        class="pr-0 mr-1"></i>Manage all Invoices</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li>
                    <a href="#sidebarCr" data-toggle="collapse">
                        <i data-feather="edit"></i>
                        <span> Invoice Items </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCr">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add-invoice-item') }}"><i data-feather="plus"
                                        class="pr-0 mr-1"></i>Create Invoice Item</a>
                            </li>
                            <li>
                                <a href="{{ route('manage-invoice-items') }}"><i data-feather="list"
                                        class="pr-0 mr-1"></i>Manage all Invoice
                                    Items</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
