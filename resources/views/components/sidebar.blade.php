
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
                @if (Auth::user())
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
                                <i class="bi bi-ui-checks"></i>
                                <span>Costums List</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/" @if (request()->is('/')) class='active' @endif class='sidebar-link'>
                                <i class="bi bi-ui-checks-grid"></i>
                                <span>Costums</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-item  ">
                            <a href="categories" @if (request()->is('categories', 'add-category', 'edit-category/*')) class='active' @endif  class='sidebar-link'>
                                <i class="bi bi-hdd-stack"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="users"  @if (request()->is('users', 'registered-users', 'users-detail/*')) class='active' @endif class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Client List</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="costums-rent" @if (request()->is('costums-rent')) class='active' @endif class='sidebar-link'>
                               <i class="bi bi-card-checklist"></i>
                                <span>Costums Rent</span>
                            </a>
                        </li>
                         <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-bar-chart-line"></i>
                                <span>Rent Log</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item  ">
                            <a href="profile" @if (request()->is('profile')) class='active' @endif class='sidebar-link'>
                                <i class="bi bi-person-square"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="/" @if (request()->is('/')) class='active' @endif class='sidebar-link'>
                                <i class="bi bi-ui-checks-grid"></i>
                                <span>Costums</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('logout') }}" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="sidebar-item  ">
                            <a href="{{ route('login') }}" class='sidebar-link'>
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Login</span>
                            </a>
                        </li>
                       @endif 
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>