<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/customer/dashboard') }}">

                <svg class="nav-icon">
                    <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg>

                Dashboard

                <span class="badge badge-sm bg-info ms-auto">NEW</span>

            </a>
        </li>

        <li class="nav-group">

            <a class="nav-link nav-group-toggle" href="#">

                <svg class="nav-icon">
                    <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                </svg>

                Pages

            </a>

            <ul class="nav-group-items compact">

                <li class="nav-item">
                    <a class="nav-link" href="#">

                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('Customer/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                        </svg>

                        Login

                    </a>
                </li>

            </ul>

        </li>

    </ul>

    <div class="sidebar-footer border-top d-none d-md-flex">

        <button class="sidebar-toggler"
            type="button"
            data-coreui-toggle="unfoldable">
        </button>

    </div>

</div>