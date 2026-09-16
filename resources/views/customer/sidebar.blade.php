<div class="sidebar sidebar-dark sidebar-fixed client-sidebar"
     id="sidebar">

    <!-- =====================================================
         BRAND
    ====================================================== -->

    <div class="client-sidebar-brand">

        <a href="{{ url('/customer/dashboard') }}"
           class="client-brand-link">

            <div class="client-brand-icon">

                <i class="bi bi-grid-1x2-fill"></i>

            </div>


            <div class="client-brand-text">

                <span class="client-brand-name">

                    Client<span>Hub</span>

                </span>

                <small>
                    Customer Portal
                </small>

            </div>

        </a>

    </div>



    <!-- =====================================================
         NAVIGATION
    ====================================================== -->

    <ul class="sidebar-nav client-sidebar-nav"
        data-coreui="navigation"
        data-simplebar="">


        <!-- =================================================
             MAIN
        ================================================== -->

        <li class="client-nav-title">
            Main
        </li>


        <!-- Dashboard -->

        <li class="nav-item client-nav-item">

            <a class="nav-link client-nav-link
                {{ Request::is('customer/dashboard*') ? 'active' : '' }}"
               href="{{ url('/customer/dashboard') }}">

                <span class="client-nav-icon">

                    <i class="bi bi-grid-1x2"></i>

                </span>


                <span class="client-nav-text">
                    Dashboard
                </span>

            </a>

        </li>



        <!-- =================================================
             SHOPPING
        ================================================== -->

        <li class="client-nav-title client-nav-title-space">
            Shopping
        </li>


        <!-- My Orders -->

        <li class="nav-group client-nav-group
            {{ Request::is('order-manage*') || Request::is('customer/orders*') ? 'show' : '' }}">


            <a class="nav-link nav-group-toggle client-nav-link"
               href="#">

                <span class="client-nav-icon">

                    <i class="bi bi-bag-check"></i>

                </span>


                <span class="client-nav-text">
                    My Orders
                </span>


                <span class="client-group-arrow">

                    <i class="bi bi-chevron-right"></i>

                </span>

            </a>



            <!-- Order Submenu -->

            <ul class="nav-group-items client-subnav">


                <!-- All Orders -->

                <li class="nav-item">

                    <a class="nav-link client-subnav-link
                        {{ Request::is('order-manage/all*') ? 'active' : '' }}"
                       href="{{ url('/order-manage/all') }}">

                        <span class="client-subnav-dot"></span>

                        <span>
                            All Orders
                        </span>

                    </a>

                </li>


                <!-- Pending -->

                <li class="nav-item">

                    <a class="nav-link client-subnav-link
                        {{ Request::is('order-manage/pending*') ? 'active' : '' }}"
                       href="{{ url('/order-manage/pending') }}">

                        <span class="client-subnav-dot"></span>

                        <span>
                            Pending Orders
                        </span>

                    </a>

                </li>


                <!-- Confirmed -->

                <li class="nav-item">

                    <a class="nav-link client-subnav-link
                        {{ Request::is('order-manage/confirm*') ? 'active' : '' }}"
                       href="{{ url('/order-manage/confirm') }}">

                        <span class="client-subnav-dot"></span>

                        <span>
                            Confirmed Orders
                        </span>

                    </a>

                </li>


                <!-- Delivered -->

                <li class="nav-item">

                    <a class="nav-link client-subnav-link
                        {{ Request::is('order-manage/delivered*') ? 'active' : '' }}"
                       href="{{ url('/order-manage/delivered') }}">

                        <span class="client-subnav-dot"></span>

                        <span>
                            Delivered Orders
                        </span>

                    </a>

                </li>


                <!-- Cancelled -->

                <li class="nav-item">

                    <a class="nav-link client-subnav-link
                        {{ Request::is('order-manage/cancel*') ? 'active' : '' }}"
                       href="{{ url('/order-manage/cancel') }}">

                        <span class="client-subnav-dot"></span>

                        <span>
                            Cancelled Orders
                        </span>

                    </a>

                </li>


                <!-- Returned -->

                <li class="nav-item">

                    <a class="nav-link client-subnav-link
                        {{ Request::is('order-manage/return*') ? 'active' : '' }}"
                       href="{{ url('/order-manage/return') }}">

                        <span class="client-subnav-dot"></span>

                        <span>
                            Returned Orders
                        </span>

                    </a>

                </li>


            </ul>

        </li>



        <!-- =================================================
             ACCOUNT
        ================================================== -->

        <li class="client-nav-title client-nav-title-space">
            Account
        </li>


        <!-- Profile -->

        <li class="nav-item client-nav-item">

            <a class="nav-link client-nav-link
                {{ Request::is('customer/profile*') ? 'active' : '' }}"
               href="{{ url('/customer/profile-view') }}">

                <span class="client-nav-icon">

                    <i class="bi bi-person-circle"></i>

                </span>


                <span class="client-nav-text">
                    My Profile
                </span>

            </a>

        </li>



        <!-- Security -->

        <li class="nav-item client-nav-item">

            <a class="nav-link client-nav-link
                {{ Request::is('customer/cradential*') ? 'active' : '' }}"
               href="{{ url('/customer/cradential') }}">

                <span class="client-nav-icon">

                    <i class="bi bi-shield-lock"></i>

                </span>


                <span class="client-nav-text">
                    Password & Security
                </span>

            </a>

        </li>



        <!-- Visit Store -->

        <li class="nav-item client-nav-item">

            <a class="nav-link client-nav-link"
               href="{{ url('/') }}"
               target="_blank">

                <span class="client-nav-icon client-store-icon">

                    <i class="bi bi-shop"></i>

                </span>


                <span class="client-nav-text flex-grow-1">
                    Visit Store
                </span>


                <i class="bi bi-box-arrow-up-right client-external-icon"></i>

            </a>

        </li>


    </ul>



    <!-- =====================================================
         SIDEBAR FOOTER
    ====================================================== -->

    <div class="client-sidebar-footer d-none d-md-flex">

        <button class="client-sidebar-toggler"
                type="button"
                data-coreui-toggle="unfoldable"
                aria-label="Collapse sidebar">

            <i class="bi bi-chevron-left"></i>

            <span>
                Collapse
            </span>

        </button>

    </div>

</div>



<style>

/* =========================================================
   CLIENT SIDEBAR
========================================================= */

.client-sidebar {

    background: #0f1623 !important;

    border-right: 1px solid rgba(255,255,255,.055) !important;

    box-shadow: none !important;

}


/* =========================================================
   BRAND
========================================================= */

.client-sidebar-brand {

    height: 68px;

    padding: 0 17px;

    display: flex;

    align-items: center;

    border-bottom: 1px solid rgba(255,255,255,.055);

}


.client-brand-link {

    width: 100%;

    display: flex;

    align-items: center;

    gap: 10px;

    text-decoration: none;

}


.client-brand-icon {

    width: 35px;

    height: 35px;

    flex-shrink: 0;

    border-radius: 9px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: linear-gradient(
        145deg,
        #2563eb,
        #1d4ed8
    );

    color: #fff;

    font-size: 14px;

    box-shadow: 0 4px 12px rgba(37,99,235,.18);

}


.client-brand-text {

    min-width: 0;

    display: flex;

    flex-direction: column;

}


.client-brand-name {

    color: #f8fafc;

    font-size: 14px;

    line-height: 1.1;

    font-weight: 750;

    letter-spacing: -.2px;

}


.client-brand-name span {

    color: #60a5fa;

}


.client-brand-text small {

    color: #475569;

    font-size: 8px;

    margin-top: 3px;

    letter-spacing: .2px;

}


/* =========================================================
   NAVIGATION
========================================================= */

.client-sidebar-nav {

    padding: 14px 10px 18px !important;

}


.client-nav-title {

    padding: 0 11px;

    margin-bottom: 7px;

    color: #475569;

    font-size: 8px;

    line-height: 1;

    font-weight: 700;

    letter-spacing: 1.1px;

    text-transform: uppercase;

}


.client-nav-title-space {

    margin-top: 20px;

}


/* =========================================================
   NAV ITEM
========================================================= */

.client-nav-item {

    margin-bottom: 3px;

}


.client-nav-link {

    min-height: 38px;

    padding: 8px 10px !important;

    border-radius: 8px !important;

    display: flex !important;

    align-items: center;

    color: #718096 !important;

    background: transparent !important;

    font-size: 10px;

    font-weight: 600;

    text-decoration: none;

    transition:
        background .18s ease,
        color .18s ease;

}


.client-nav-link:hover {

    color: #cbd5e1 !important;

    background: rgba(255,255,255,.035) !important;

}


.client-nav-link.active {

    color: #60a5fa !important;

    background: rgba(59,130,246,.10) !important;

}


.client-nav-link.active .client-nav-icon {

    color: #60a5fa;

}


.client-nav-icon {

    width: 25px;

    height: 25px;

    flex-shrink: 0;

    margin-right: 9px;

    display: flex;

    align-items: center;

    justify-content: center;

    color: #64748b;

    font-size: 14px;

    transition: color .18s ease;

}


.client-nav-text {

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


/* =========================================================
   ORDERS GROUP
========================================================= */

.client-nav-group {

    margin-bottom: 3px;

}


.client-nav-group > .client-nav-link {

    cursor: pointer;

}


.client-group-arrow {

    margin-left: auto;

    color: #475569;

    font-size: 9px;

    display: flex;

    transition: transform .2s ease;

}


.client-nav-group.show > .client-nav-link .client-group-arrow {

    transform: rotate(90deg);

}


.client-nav-group.show > .client-nav-link {

    color: #cbd5e1 !important;

    background: rgba(255,255,255,.025) !important;

}


/* =========================================================
   SUB NAVIGATION
========================================================= */

.client-subnav {

    position: relative;

    margin: 3px 0 4px 21px !important;

    padding: 3px 0 3px 13px !important;

    border-left: 1px solid #263244;

}


.client-subnav-link {

    min-height: 31px;

    padding: 6px 9px !important;

    border-radius: 6px !important;

    display: flex !important;

    align-items: center;

    gap: 8px;

    color: #59677b !important;

    background: transparent !important;

    font-size: 9px;

    font-weight: 500;

    text-decoration: none;

    transition: all .18s ease;

}


.client-subnav-link:hover {

    color: #cbd5e1 !important;

    background: rgba(255,255,255,.03) !important;

}


.client-subnav-link.active {

    color: #60a5fa !important;

    background: rgba(59,130,246,.07) !important;

}


.client-subnav-dot {

    width: 4px;

    height: 4px;

    flex-shrink: 0;

    border-radius: 50%;

    background: #475569;

}


.client-subnav-link.active .client-subnav-dot {

    background: #60a5fa;

    box-shadow: 0 0 0 3px rgba(96,165,250,.08);

}


/* =========================================================
   STORE
========================================================= */

.client-store-icon {

    color: #34d399;

}


.client-nav-link:hover .client-store-icon {

    color: #6ee7b7;

}


.client-external-icon {

    color: #475569;

    font-size: 9px;

    margin-left: 5px;

}


/* =========================================================
   SIDEBAR FOOTER
========================================================= */

.client-sidebar-footer {

    min-height: 50px;

    padding: 7px 10px;

    align-items: center;

    border-top: 1px solid rgba(255,255,255,.055);

}


.client-sidebar-toggler {

    width: 100%;

    min-height: 34px;

    border: 1px solid transparent;

    border-radius: 7px;

    background: transparent;

    color: #475569;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    font-size: 10px;

    font-weight: 600;

    transition: all .18s ease;

}


.client-sidebar-toggler:hover {

    color: #94a3b8;

    background: rgba(255,255,255,.035);

    border-color: #263244;

}


.client-sidebar-toggler i {

    font-size: 10px;

}


/* =========================================================
   UNFOLDABLE STATE
========================================================= */

.sidebar-unfoldable .client-brand-text,

.sidebar-unfoldable .client-nav-title,

.sidebar-unfoldable .client-nav-text,

.sidebar-unfoldable .client-group-arrow,

.sidebar-unfoldable .client-external-icon,

.sidebar-unfoldable .client-sidebar-toggler span {

    display: none;

}


.sidebar-unfoldable .client-sidebar-brand {

    justify-content: center;

    padding-left: 0;

    padding-right: 0;

}


.sidebar-unfoldable .client-brand-link {

    width: auto;

}


.sidebar-unfoldable .client-sidebar-nav {

    padding-left: 8px !important;

    padding-right: 8px !important;

}


.sidebar-unfoldable .client-nav-link {

    justify-content: center;

    padding-left: 8px !important;

    padding-right: 8px !important;

}


.sidebar-unfoldable .client-nav-icon {

    margin-right: 0;

}


.sidebar-unfoldable .client-subnav {

    display: none;

}


.sidebar-unfoldable .client-sidebar-toggler {

    justify-content: center;

}


/* =========================================================
   SCROLLBAR
========================================================= */

.client-sidebar .simplebar-scrollbar::before {

    background: #334155;

    opacity: .5;

}


.client-sidebar .simplebar-track {

    background: transparent;

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767.98px) {

    .client-sidebar-brand {

        height: 62px;

    }

}

</style>