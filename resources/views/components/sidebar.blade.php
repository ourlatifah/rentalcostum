
<div id="app">
            <div id="sidebar" class="active">
                <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a class="auth-title">Rental Costum</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                <ul class="menu">
                <li class="sidebar-title">Menu</li> 
                        @if (Auth::user()->role_id == 1)
                        <li class="sidebar-item  ">
                            <a href="dashboard" @if (request()->is('dashboard')) class='active' @endif class='sidebar-link'>
                                <i class="bi bi-house-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                         <li
                            class="sidebar-item  ">
                            <a href="costums" @if (request()->is('costums')) class='active' @endif class='sidebar-link'>
                                <i class="bi bi-ui-checks-grid"></i>
                                <span>Costums</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-hdd-stack"></i>
                                <span>Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Client List</span>
                            </a>
                        </li>
                         <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-ui-radios"></i>
                                <span>Rent Log</span>
                            </a>
                        </li>
                        @endif

                        @if (Auth::user()->role_id == 2)
                        <li class="sidebar-item  ">
                            <a href="profile" class='sidebar-link'>
                                <i class="bi bi-person-square"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('logout') }}" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                        @endif
                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>