<!-- Main Sidebar Container -->
@php
$re = Route::current()->getName();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
{{--        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <h5 class="brand-text font-weight-light text-center">{{ config('settings.app_name') }}</h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(auth()->user())
            <div class="image">
                <img src="{{ auth()->user()->getAvatar() }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->getFulName() }}</a>
            </div>
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{route('home')}}" class="nav-link {{ $re === 'home' || $re == 'main' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @role('student')
                <li class="nav-item has-treeview">
                    <a href="{{ route('editProfile') }}" class="nav-link {{ $re === 'editProfile' ? 'active' : '' }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                @endrole
                @role('admin')
                <li class="nav-item has-treeview">
                    <a href="{{ route('student.list') }}" class="nav-link {{ $re === 'student.list' ? 'active' : '' }}">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Students</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('settings.index') }}" class="nav-link {{ $re == 'settings.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>
                @endrole
                <li class="nav-item has-treeview {{ $re == 'changePassword' || $re == 'new_user' ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User Settings<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        @role('admin')
                        <li class="nav-item">
                            <a href="{{ route('new_user') }}" class="nav-link {{ $re == 'new_user'  ? 'active' : '' }}">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a href="{{ route('changePassword') }}" class="nav-link {{ $re == 'changePassword'  ? 'active' : '' }}">
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                        <form action="{{route('logout')}}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
