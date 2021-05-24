<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link elevation-4" >
      <!-- SidebarSearch Form -->
      <div class="form-inline" >
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" > 
          <div class="input-group-append">
            <button class="btn btn-sidebar" >
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
	<br/>
      

      
                <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
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

                            
                            {{-- reports --}}
                            <li class="nav-item {{ set_active('alert.report') }}">
                                <a href="#" class="nav-link {{ set_active('alert.report') }}">
                                    <i class="fas fa-fw fa-file"></i>
                                    <p>
                                        Alert Report
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item {{ set_active('alert.report') }}">
                                        <a href="{{ route('alert.report') }}"
                                            class="nav-link {{ set_active('alert.report') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Alert View By AGE</p>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ set_active('alert.witel') }}">
                                        <a href="{{ route('alert.witel') }}"
                                            class="nav-link {{ set_active('alert.witel') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Alert View By WITEL</p>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ set_active('alert.index') }}">
                                        <a href="{{ route('alert.index') }}"
                                            class="nav-link {{ set_active('alert.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Alert Update</p>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ set_active('summary.index') }}">
                                        <a href="{{ route('summary.index') }}"
                                            class="nav-link {{ set_active('summary.index') }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Summary</p>
                                        </a>
                                    </li>
                                    
                                    
                                </ul>
                            </li>

                            
                            <li class="nav-item {{ set_active('sales') }}">
                                <a href="{{ route('sales') }}" class="nav-link {{ set_active('sales') }}">
                                    {{-- <i class="nav-icon fas fa-th"></i> --}}
                                    <i class="fas fa-fw fa-database"></i>
                                    <p>
                                        Quality Of Sales
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-fw fa-archive"></i>
                                    <p>
                                        Profile
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('leveraging') }}"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Leveraging</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('retention') }}"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Retention</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('kw') }}"
                                            class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>LIS & KWADRAN</p>
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
