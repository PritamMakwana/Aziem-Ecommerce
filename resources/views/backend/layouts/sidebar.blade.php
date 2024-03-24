<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('home') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aziem Web App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('list-categories') }}"
                        class="nav-link {{ Request::is('list-categories') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Categories
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                @php
                $shops_count = App\Models\Shop::count();
                $shops_num = App\Models\Notification::where('section','shops')->first();
                @endphp
                <li class="nav-item">
                    <a href="{{ url('list-shops') }}" class="nav-link {{ Request::is('list-shops') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Shops
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                        @if($shops_count > $shops_num->number)
                    <span class="badge badge-info right">
                        {{$shops_count - $shops_num->number}}</span>
                    @endif
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ url('list-products') }}"
                        class="nav-link {{ Request::is('list-products') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Products
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('list-offers') }}"
                        class="nav-link {{ Request::is('list-offers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Offers
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>

                @php
                $receipts_count = App\Models\UploadReceipts::count();
                $receipts_num = App\Models\Notification::where('section','receipts')->first();
                @endphp

                <li class="nav-item">
                    <a href="{{ url('list-receipts') }}"
                        class="nav-link {{ Request::is('list-receipts') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            Receipts
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                        @if($receipts_count > $receipts_num->number)
                        <span class="badge badge-info right">
                            {{$receipts_count - $receipts_num->number}}</span>
                        @endif
                    </a>
                </li>

                @php
                $customers_count = App\Models\Customer::count();
                $customers_num = App\Models\Notification::where('section','customers')->first();
                @endphp

                <li class="nav-item">
                    <a href="{{ url('list-customers') }}"
                        class="nav-link {{ Request::is('list-customers') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                        @if($customers_count > $customers_num->number)
                        <span class="badge badge-info right">
                            {{$customers_count - $customers_num->number}}</span>
                        @endif
                    </a>
                </li>

                @php
                $shop_owners_count = App\Models\ShopOwner::count();
                $shop_owners_num = App\Models\Notification::where('section','shop_owners')->first();
                @endphp

                <li class="nav-item">
                    <a href="{{ url('list-shop_owners') }}"
                        class="nav-link {{ Request::is('list-shop_owners') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Shop Owners
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                        @if($shop_owners_count > $shop_owners_num->number)
                        <span class="badge badge-info right">
                            {{$shop_owners_count - $shop_owners_num->number}}</span>
                        @endif
                    </a>
                </li>

            @php
            $job_registration_count = App\Models\JobRegistration::count();
            $job_registration_num = App\Models\Notification::where('section','job_registration')->first();
            @endphp
                <li class="nav-item">
                    <a href="{{ url('job') }}" class="nav-link {{ Request::is('list-job') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Job Registrations
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                        @if($job_registration_count > $job_registration_num->number)
                        <span class="badge badge-info right">
                            {{$job_registration_count - $job_registration_num->number}}</span>
                        @endif
                    </a>
                </li>

                @php
                $orders_count = App\Models\ConfirmedOrders::count();
                $orders_num = App\Models\Notification::where('section','orders')->first();
                @endphp
                <li class="nav-item">
                    <a href="{{ url('list-confirm-order') }}"
                        class="nav-link {{ Request::is('list-confirm-order') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-list-alt" ></i>
                        <p>
                            Orders
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                        @if($orders_count > $orders_num->number)
                        <span class="badge badge-info right">
                            {{$orders_count - $orders_num->number}}</span>
                        @endif
                    </a>
                </li>


                @php
                $enquiry_count = App\Models\Enquiry::count();
                $enquiry_num = App\Models\Notification::where('section','enquiry')->first();
                @endphp
                <li class="nav-item">
                    <a href="{{ route('enquiry.show') }}"
                        class="nav-link @if (str_starts_with(Route::currentRouteName(), 'enquiry.')) active @endif">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Enquiry
                        </p>
                        @if($enquiry_count > $enquiry_num->number)
                        <span class="badge badge-info right">
                            {{$enquiry_count - $enquiry_num->number}}</span>
                        @endif
                    </a>
                </li>

            </ul>

            <!-- Logout Link -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
