<header class="header header-sticky customer-header p-0 mb-4">

    <!-- =====================================================
         TOP HEADER
    ====================================================== -->

    <div class="container-fluid customer-header-inner px-3 px-md-4">


        <!-- SIDEBAR TOGGLE -->

        <button class="customer-header-toggler"
                type="button"
                onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
                aria-label="Toggle sidebar">

            <i class="bi bi-list"></i>

        </button>



        <!-- LEFT NAVIGATION -->

        <ul class="customer-header-nav d-none d-lg-flex">

            <li class="customer-nav-item">

                <a class="customer-nav-link active"
                   href="{{ url('/customer/dashboard') }}">

                    <i class="bi bi-grid me-2"></i>

                    Dashboard

                </a>

            </li>


            <li class="customer-nav-item">

                <a class="customer-nav-link"
                   href="{{ url('/customer/profile-view') }}">

                    <i class="bi bi-person me-2"></i>

                    Profile

                </a>

            </li>


            <li class="customer-nav-item">

                <a class="customer-nav-link"
                   href="{{ url('/customer/cradential') }}">

                    <i class="bi bi-shield-lock me-2"></i>

                    Security

                </a>

            </li>

        </ul>



        <!-- RIGHT AREA -->

        <div class="customer-header-right ms-auto">


            <!-- Orders -->

            <a href="{{ url('/customer/orders') }}"
               class="header-action-btn d-none d-sm-flex"
               title="My Orders">

                <i class="bi bi-receipt"></i>

            </a>



            <!-- Divider -->

            <span class="header-divider d-none d-sm-block"></span>



            <!-- Theme -->

            <div class="dropdown">

                <button class="header-action-btn"
                        type="button"
                        data-coreui-toggle="dropdown"
                        aria-expanded="false"
                        title="Theme">

                    <i class="bi bi-circle-half"></i>

                </button>


                <ul class="dropdown-menu dropdown-menu-end customer-dropdown-menu">


                    <li>

                        <button class="dropdown-item customer-theme-item d-flex align-items-center"
                                type="button"
                                data-coreui-theme-value="light">

                            <i class="bi bi-sun me-3"></i>

                            <span>
                                Light
                            </span>

                        </button>

                    </li>


                    <li>

                        <button class="dropdown-item customer-theme-item d-flex align-items-center"
                                type="button"
                                data-coreui-theme-value="dark">

                            <i class="bi bi-moon me-3"></i>

                            <span>
                                Dark
                            </span>

                        </button>

                    </li>


                    <li>

                        <button class="dropdown-item customer-theme-item d-flex align-items-center active"
                                type="button"
                                data-coreui-theme-value="auto">

                            <i class="bi bi-circle-half me-3"></i>

                            <span>
                                Auto
                            </span>

                        </button>

                    </li>


                </ul>

            </div>



            <!-- Divider -->

            <span class="header-divider"></span>



            <!-- PROFILE -->

            <div class="dropdown">

                <button class="customer-profile-btn"
                        type="button"
                        data-coreui-toggle="dropdown"
                        aria-expanded="false">


                    <div class="customer-avatar-small">

                        @php

                            $authuserimage = Auth::user()->image;

                        @endphp


                        @if ($authuserimage != null)

                            <img src="{{ asset($authuserimage) }}"
                                 alt="User">

                        @else

                            <img src="{{ asset('Customer/Image/Logo.png') }}"
                                 alt="User">

                        @endif

                    </div>


                    <div class="customer-profile-info d-none d-md-flex">

                        <span class="customer-profile-name">

                            {{ Auth::user()->name ?? 'Customer' }}

                        </span>


                        <span class="customer-profile-label">

                            Customer Account

                        </span>

                    </div>


                    <i class="bi bi-chevron-down customer-profile-arrow d-none d-md-block"></i>

                </button>



                <!-- PROFILE DROPDOWN -->

                <div class="dropdown-menu dropdown-menu-end customer-profile-menu p-0">


                    <!-- Account Header -->

                    <div class="profile-menu-header">

                        <div class="profile-menu-avatar">

                            @if ($authuserimage != null)

                                <img src="{{ asset($authuserimage) }}"
                                     alt="User">

                            @else

                                <img src="{{ asset('Customer/Image/Logo.png') }}"
                                     alt="User">

                            @endif

                        </div>


                        <div class="profile-menu-user">

                            <div class="profile-menu-name">

                                {{ Auth::user()->name ?? 'Customer' }}

                            </div>


                            <div class="profile-menu-email">

                                {{ Auth::user()->email ?? '' }}

                            </div>

                        </div>

                    </div>



                    <!-- Menu -->

                    <div class="profile-menu-body">


                        <a class="profile-menu-item"
                           href="{{ url('/customer/profile-view') }}">

                            <span class="profile-menu-icon profile-icon-blue">

                                <i class="bi bi-person"></i>

                            </span>


                            <span class="profile-menu-text">

                                <strong>
                                    My Profile
                                </strong>

                                <small>
                                    View & update information
                                </small>

                            </span>


                            <i class="bi bi-chevron-right profile-menu-arrow"></i>

                        </a>



                        <a class="profile-menu-item"
                           href="{{ url('/customer/cradential') }}">

                            <span class="profile-menu-icon profile-icon-orange">

                                <i class="bi bi-shield-lock"></i>

                            </span>


                            <span class="profile-menu-text">

                                <strong>
                                    Security
                                </strong>

                                <small>
                                    Password & credentials
                                </small>

                            </span>


                            <i class="bi bi-chevron-right profile-menu-arrow"></i>

                        </a>


                    </div>



                    <!-- Logout -->

                    <div class="profile-menu-footer">

                        <a class="profile-logout"
                           href="{{ url('/customer/logout') }}">

                            <span class="profile-logout-icon">

                                <i class="bi bi-box-arrow-right"></i>

                            </span>


                            <span>
                                Logout
                            </span>

                        </a>

                    </div>


                </div>

            </div>


        </div>

    </div>



    <!-- =====================================================
         BREADCRUMB
    ====================================================== -->

    <div class="container-fluid px-3 px-md-4">

        <div class="customer-breadcrumb-wrapper">

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb customer-breadcrumb mb-0">

                    <li class="breadcrumb-item">

                        <a href="{{ url('/customer/dashboard') }}">

                            <i class="bi bi-house-door me-1"></i>

                            Home

                        </a>

                    </li>


                    <li class="breadcrumb-item active"
                        aria-current="page">

                        Dashboard

                    </li>

                </ol>

            </nav>

        </div>

    </div>

</header>



<style>

/* =========================================================
   CUSTOMER HEADER
========================================================= */

.customer-header {

    background: #171d27 !important;

    border-bottom: 1px solid rgba(255,255,255,.055);

    box-shadow: none !important;

}


/* =========================================================
   HEADER INNER
========================================================= */

.customer-header-inner {

    min-height: 64px;

    display: flex;

    align-items: center;

    gap: 18px;

}


/* =========================================================
   SIDEBAR TOGGLE
========================================================= */

.customer-header-toggler {

    width: 38px;

    height: 38px;

    flex-shrink: 0;

    border: 1px solid transparent;

    border-radius: 8px;

    background: transparent;

    color: #64748b;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 19px;

    transition: all .18s ease;

}


.customer-header-toggler:hover {

    background: #242b38;

    border-color: #334155;

    color: #cbd5e1;

}


/* =========================================================
   LEFT NAV
========================================================= */

.customer-header-nav {

    display: flex;

    align-items: center;

    gap: 3px;

    list-style: none;

    padding: 0;

    margin: 0;

}


.customer-nav-item {

    display: flex;

    align-items: center;

}


.customer-nav-link {

    position: relative;

    display: inline-flex;

    align-items: center;

    padding: 8px 12px;

    border-radius: 7px;

    color: #64748b !important;

    font-size: 11px;

    font-weight: 600;

    text-decoration: none;

    transition: all .18s ease;

}


.customer-nav-link i {

    font-size: 12px;

}


.customer-nav-link:hover {

    background: #202733;

    color: #cbd5e1 !important;

}


.customer-nav-link.active {

    background: rgba(59,130,246,.09);

    color: #60a5fa !important;

}


/* =========================================================
   RIGHT AREA
========================================================= */

.customer-header-right {

    display: flex;

    align-items: center;

    gap: 7px;

}


/* =========================================================
   HEADER ACTION
========================================================= */

.header-action-btn {

    width: 34px;

    height: 34px;

    border: 1px solid transparent;

    border-radius: 8px;

    background: transparent;

    color: #64748b;

    display: flex;

    align-items: center;

    justify-content: center;

    text-decoration: none;

    font-size: 14px;

    transition: all .18s ease;

}


.header-action-btn:hover {

    color: #cbd5e1;

    background: #242b38;

    border-color: #334155;

}


.header-divider {

    width: 1px;

    height: 22px;

    background: rgba(255,255,255,.07);

    margin: 0 4px;

}


/* =========================================================
   PROFILE BUTTON
========================================================= */

.customer-profile-btn {

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 4px 5px 4px 4px;

    border: 1px solid transparent;

    border-radius: 9px;

    background: transparent;

    color: #cbd5e1;

    transition: all .18s ease;

}


.customer-profile-btn:hover,

.customer-profile-btn[aria-expanded="true"] {

    background: #242b38;

    border-color: #334155;

}


.customer-avatar-small {

    width: 34px;

    height: 34px;

    flex-shrink: 0;

    border-radius: 9px;

    overflow: hidden;

    background: #29313e;

    border: 1px solid rgba(96,165,250,.2);

}


.customer-avatar-small img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;

}


.customer-profile-info {

    flex-direction: column;

    align-items: flex-start;

    line-height: 1.2;

}


.customer-profile-name {

    max-width: 125px;

    overflow: hidden;

    text-overflow: ellipsis;

    white-space: nowrap;

    color: #cbd5e1;

    font-size: 10px;

    font-weight: 700;

}


.customer-profile-label {

    color: #475569;

    font-size: 8px;

    margin-top: 3px;

}


.customer-profile-arrow {

    color: #475569;

    font-size: 9px;

    margin-left: 2px;

}


/* =========================================================
   DROPDOWN
========================================================= */

.customer-dropdown-menu {

    min-width: 145px;

    padding: 5px;

    background: #202733;

    border: 1px solid #334155;

    border-radius: 9px;

    box-shadow: 0 12px 35px rgba(0,0,0,.35);

}


.customer-theme-item {

    color: #94a3b8;

    border-radius: 6px;

    font-size: 10px;

    padding: 8px 10px;

}


.customer-theme-item:hover {

    background: #29313e;

    color: #e2e8f0;

}


.customer-theme-item.active {

    background: rgba(59,130,246,.1);

    color: #60a5fa;

}


/* =========================================================
   PROFILE MENU
========================================================= */

.customer-profile-menu {

    width: 285px;

    background: #202733;

    border: 1px solid #334155;

    border-radius: 10px;

    overflow: hidden;

    box-shadow: 0 15px 40px rgba(0,0,0,.4);

}


/* PROFILE HEADER */

.profile-menu-header {

    padding: 15px;

    display: flex;

    align-items: center;

    gap: 11px;

    background: #1b222d;

    border-bottom: 1px solid rgba(255,255,255,.055);

}


.profile-menu-avatar {

    width: 40px;

    height: 40px;

    flex-shrink: 0;

    border-radius: 9px;

    overflow: hidden;

    background: #29313e;

}


.profile-menu-avatar img {

    width: 100%;

    height: 100%;

    object-fit: cover;

}


.profile-menu-user {

    min-width: 0;

}


.profile-menu-name {

    color: #f1f5f9;

    font-size: 11px;

    font-weight: 700;

    overflow: hidden;

    text-overflow: ellipsis;

    white-space: nowrap;

}


.profile-menu-email {

    color: #64748b;

    font-size: 9px;

    margin-top: 3px;

    overflow: hidden;

    text-overflow: ellipsis;

    white-space: nowrap;

}


/* MENU BODY */

.profile-menu-body {

    padding: 6px;

}


.profile-menu-item {

    display: flex;

    align-items: center;

    gap: 10px;

    padding: 9px;

    border-radius: 7px;

    color: #cbd5e1;

    text-decoration: none;

    transition: background .18s ease;

}


.profile-menu-item:hover {

    background: #29313e;

    color: #f1f5f9;

}


.profile-menu-icon {

    width: 32px;

    height: 32px;

    flex-shrink: 0;

    border-radius: 7px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 12px;

}


.profile-icon-blue {

    color: #60a5fa;

    background: rgba(59,130,246,.1);

}


.profile-icon-orange {

    color: #fbbf24;

    background: rgba(245,158,11,.1);

}


.profile-menu-text {

    display: flex;

    flex-direction: column;

    flex-grow: 1;

    min-width: 0;

}


.profile-menu-text strong {

    color: #cbd5e1;

    font-size: 10px;

    font-weight: 600;

}


.profile-menu-text small {

    color: #64748b;

    font-size: 8px;

    margin-top: 2px;

}


.profile-menu-arrow {

    color: #475569;

    font-size: 9px;

}


/* LOGOUT */

.profile-menu-footer {

    padding: 7px;

    border-top: 1px solid rgba(255,255,255,.055);

}


.profile-logout {

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 8px 9px;

    border-radius: 7px;

    color: #f87171;

    font-size: 10px;

    font-weight: 600;

    text-decoration: none;

    transition: background .18s ease;

}


.profile-logout:hover {

    background: rgba(239,68,68,.08);

    color: #fca5a5;

}


.profile-logout-icon {

    width: 27px;

    height: 27px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 6px;

    background: rgba(239,68,68,.08);

}


/* =========================================================
   BREADCRUMB
========================================================= */

.customer-breadcrumb-wrapper {

    min-height: 38px;

    display: flex;

    align-items: center;

    border-top: 1px solid rgba(255,255,255,.035);

}


.customer-breadcrumb {

    padding: 9px 0;

}


.customer-breadcrumb .breadcrumb-item {

    color: #475569;

    font-size: 9px;

    font-weight: 500;

}


.customer-breadcrumb .breadcrumb-item a {

    color: #64748b;

    text-decoration: none;

}


.customer-breadcrumb .breadcrumb-item a:hover {

    color: #60a5fa;

}


.customer-breadcrumb .breadcrumb-item.active {

    color: #94a3b8;

}


.customer-breadcrumb .breadcrumb-item + .breadcrumb-item::before {

    color: #334155;

    content: "/";

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 575.98px) {

    .customer-header-inner {

        min-height: 58px;

        gap: 8px;

    }

    .customer-header-right {

        gap: 3px;

    }

    .header-divider {

        margin: 0 2px;

    }

    .customer-profile-btn {

        padding-right: 2px;

    }

    .customer-profile-menu {

        width: min(285px, calc(100vw - 20px));

    }

}

</style>