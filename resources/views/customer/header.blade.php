<header class="header header-sticky p-0 mb-4">

    <div class="container-fluid border-bottom px-4">

        <!-- Sidebar Toggle -->
        <button class="header-toggler" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
            style="margin-inline-start: -14px;">

            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>

        </button>

        <!-- Left Menu -->
        <ul class="header-nav d-none d-lg-flex">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/customer/dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    Users
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    Settings
                </a>
            </li>

        </ul>

        <!-- Right Icons -->
        <ul class="header-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}">
                        </use>
                    </svg>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}">
                        </use>
                    </svg>
                </a>
            </li>

        </ul>

        <!-- Theme + Profile -->
        <ul class="header-nav">

            <!-- Divider -->
            <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>

            <!-- Theme Dropdown -->
            <li class="nav-item dropdown">

                <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button"
                    data-coreui-toggle="dropdown" aria-expanded="false">

                    <svg class="icon icon-lg theme-icon-active">
                        <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
                    </svg>

                </button>

                <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">

                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button"
                            data-coreui-theme-value="light">

                            <svg class="icon icon-lg me-3">
                                <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-sun') }}">
                                </use>
                            </svg>

                            Light

                        </button>
                    </li>

                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button"
                            data-coreui-theme-value="dark">

                            <svg class="icon icon-lg me-3">
                                <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-moon') }}">
                                </use>
                            </svg>

                            Dark

                        </button>
                    </li>

                    <li>
                        <button class="dropdown-item d-flex align-items-center active" type="button"
                            data-coreui-theme-value="auto">

                            <svg class="icon icon-lg me-3">
                                <use
                                    xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}">
                                </use>
                            </svg>

                            Auto

                        </button>
                    </li>

                </ul>

            </li>

            <!-- Divider -->
            <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>

            <!-- Profile Dropdown -->
            <li class="nav-item dropdown">

                <a class="nav-link py-0 pe-0" href="#" role="button" data-coreui-toggle="dropdown"
                    aria-expanded="false">

                    <div class="avatar avatar-md">
                        @php
                            $authuserimage = Auth::user()->image;
                        @endphp

                        @if ($authuserimage != null)
                            <img class="avatar-img rounded-circle" src="{{ asset($authuserimage) }}" alt="User"
                                style="width:40px; height:40px; object-fit:cover;">
                        @else
                            <img class="avatar-img rounded-circle" src="{{ asset('Customer/Image/Logo.png') }}"
                                alt="User" style="width:40px; height:40px; object-fit:cover;">
                        @endif

                    </div>

                </a>

                <!-- Dropdown Menu -->
                <div class="dropdown-menu dropdown-menu-end pt-0">

                    <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2">
                        Account
                    </div>

                    <a class="dropdown-item" href="{{url('/customer/profile-view')}}">

                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                            </use>
                        </svg>

                        Profile

                    </a>

                    <a class="dropdown-item" href="#">

                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-settings') }}">
                            </use>
                        </svg>

                        Settings

                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ url('/customer/logout') }}">

                        <svg class="icon me-2">
                            <use
                                xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                            </use>
                        </svg>

                        Logout

                    </a>

                </div>

            </li>

        </ul>

    </div>

    <!-- Breadcrumb -->
    <div class="container-fluid px-4">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb my-0">

                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>

                <li class="breadcrumb-item active">
                    Dashboard
                </li>

            </ol>

        </nav>

    </div>

</header>
