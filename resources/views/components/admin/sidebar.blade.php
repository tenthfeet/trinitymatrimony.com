<aside class="main-sidebar sidebar-light-primary elevation-4 " jstyle="background: #dbaef7e8">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-info" jstyle="background: #c483ece8">
        <img src="{{ asset('images/trinitylogo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold text-white">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/tmadmin/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role =="superadmin")
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <!-- <i class="nav-icon fas fa-poll"></i> -->
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/tmadmin/register') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Add Administrator
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/tmadmin/adminlist') }}" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            List of Administrators
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('/tmadmin/register_user') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <!-- <i class="nav-icon fas fa-poll"></i> -->
                        <p>
                            Add User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/tmadmin/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <!-- <i class="nav-icon fas fa-poll"></i> -->
                        <p>
                            User Approval
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/tmadmin/userlist') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <!-- <i class="nav-icon fas fa-poll"></i> -->
                        <p>
                            All Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/tmadmin/testimonial') }}" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Testimonial
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
