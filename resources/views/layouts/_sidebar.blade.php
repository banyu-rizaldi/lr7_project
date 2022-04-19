<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link elevation-4">
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
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <br />



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                {{-- master --}}
                <li class="nav-item {{ set_active('dashboard') }}">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ set_active('dashboard') }}">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="fas fa-fw fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item {{ request()->is('profil*') ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('profil*') ? 'active menu-open' : '' }}">
                        <i class="fas fa-fw fa-users"></i>
                        <p>
                            Profile
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item {{ set_active('profilLoss') }}">
                            <a href="{{ route('profilLoss') }}" class="nav-link {{ set_active('profilLoss') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>LOSS</p>
                            </a>
                        </li>

                        <li class="nav-item {{ set_active('profilCust') }}">
                            <a href="{{ route('profilCust') }}" class="nav-link {{ set_active('profilCust') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>CUSTOMER</p>
                            </a>
                        </li>

                        <li class="nav-item {{ set_active('profilleveraging') }}">
                            <a href="{{ route('profilleveraging') }}"
                                class="nav-link {{ set_active('profilleveraging') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>Leveraging</p>
                            </a>
                        </li>
                        <li class="nav-item {{ set_active('profilretention') }}">
                            <a href="{{ route('profilretention') }}"
                                class="nav-link {{ set_active('profilretention') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>Retention</p>
                            </a>
                        </li>
                        <li class="nav-item {{ set_active('profilkw') }}">
                            <a href="{{ route('profilkw') }}" class="nav-link {{ set_active('profilkw') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>LIS & Kwadran</p>
                            </a>
                        </li>

                        <li class="nav-item {{ set_active('profilchurn') }}">
                            <a href="{{ route('profilchurn') }}" class="nav-link {{ set_active('profilchurn') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>Churn to Sales Witel</p>
                            </a>
                        </li>

                        <li class="nav-item {{ set_active('profilkwg') }}">
                            <a href="{{ route('profilkwg') }}" class="nav-link {{ set_active('profilkwg') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>Kuadran Granular</p>
                            </a>
                        </li>

                    </ul>
                </li>



                {{-- reports --}}
                <li class="nav-item {{ request()->is('alert*') ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('alert*') ? 'active menu-open' : '' }}">

                        <i class="fas fa-fw fa-exclamation-triangle"></i>
                        <p>
                            Alert Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ set_active('alert.report') }}">
                            <a href="{{ route('alert.report') }}"
                                class="nav-link {{ set_active('alert.report') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>Alert View By AGE</p>
                            </a>
                        </li>
                        <li class="nav-item {{ set_active('alert.witel') }}">
                            <a href="{{ route('alert.witel') }}" class="nav-link {{ set_active('alert.witel') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>Alert View By WITEL</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item {{ set_active('alert.index') }}">
                                        <a href="{{ route('alert.index') }}"
                                            class="nav-link {{ set_active('alert.index') }}">
                                            <i class="fas fa-fw fa-caret-right"></i>
                                            <p>Alert Update</p>
                                        </a>
                                    </li> --}}
                        <li class="nav-item">
                            <a href="http://10.32.100.15/alertsummary" class="nav-link">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>Alert Update</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item {{ set_active('summary.index') }}">
                                        <a href="{{ route('summary.index') }}"
                                            class="nav-link {{ set_active('summary.index') }}">
                                            <i class="fas fa-fw fa-caret-right"></i>
                                            <p>Summary</p>
                                        </a>
                                    </li> --}}


                    </ul>
                </li>



                <li class="nav-item {{ request()->is('qostr2*') ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('qostr2*') ? 'active menu-open' : '' }}">
                        <i class="fas fa-fw fa-funnel-dollar"></i>
                        <p>
                            Quality Of Sales
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ set_active('qostr2bulan') }}">
                            <a href="{{ route('qostr2bulan') }}" class="nav-link {{ set_active('qostr2bulan') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>QoS by Bulan Sales</p>
                            </a>
                        </li>
                        <li class="nav-item {{ set_active('qostr2witel') }}">
                            <a href="{{ route('qostr2witel') }}" class="nav-link {{ set_active('qostr2witel') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>QoS by Witel</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item {{ request()->is('qostr6*') ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('qostr6*') ? 'active menu-open' : '' }}">
                        <i class="fas fa-fw fa-funnel-dollar"></i>
                        <p>
                            Quality Of Sales TR6
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ set_active('qostr6bulan') }}">
                            <a href="{{ route('qostr6bulan') }}" class="nav-link {{ set_active('qostr6bulan') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>QoS by Bulan Sales</p>
                            </a>
                        </li>
                        <li class="nav-item {{ set_active('qostr6witel') }}">
                            <a href="{{ route('qostr6witel') }}" class="nav-link {{ set_active('qostr6witel') }}">
                                <i class="fas fa-fw fa-caret-right"></i>
                                <p>QoS by Witel</p>
                            </a>
                        </li>

                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
