@extends('customer.master')

@section('content')

<div class="body flex-grow-1 customer-dashboard">

    <div class="container-fluid px-3 px-md-4 py-4">

        <!-- =====================================================
             PAGE HEADER
        ====================================================== -->

        <div class="dashboard-header mb-4">

            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">

                <div>

                    <div class="dashboard-eyebrow">
                        CUSTOMER PORTAL
                    </div>

                    <h4 class="dashboard-title mb-1">
                        My Dashboard
                    </h4>

                    <p class="dashboard-subtitle mb-0">
                        Manage your account, orders and personal information.
                    </p>

                </div>


                <div class="d-flex gap-2">

                    <a href="{{ url('/customer/profile-view') }}"
                       class="dashboard-btn dashboard-btn-secondary">

                        <i class="bi bi-person me-2"></i>

                        My Profile

                    </a>


                    <a href="{{ url('/') }}"
                       target="_blank"
                       class="dashboard-btn dashboard-btn-primary">

                        <i class="bi bi-shop me-2"></i>

                        Visit Store

                    </a>

                </div>

            </div>

        </div>


        <!-- =====================================================
             ORDER STATISTICS
        ====================================================== -->

        <div class="row g-3 mb-4">


            <!-- Total Orders -->
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Total Orders
                            </div>

                            <div class="stat-value">
                                {{ $allorders }}
                            </div>

                        </div>


                        <div class="stat-icon stat-blue">

                            <i class="bi bi-bag-check"></i>

                        </div>

                    </div>


                    <div class="stat-meta">

                        <i class="bi bi-layers"></i>

                        All time orders

                    </div>

                </div>

            </div>


            <!-- Processing -->
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Processing
                            </div>

                            <div class="stat-value">
                                {{$pendingorders}}
                            </div>

                        </div>


                        <div class="stat-icon stat-orange">

                            <i class="bi bi-box-seam"></i>

                        </div>

                    </div>


                    <div class="stat-meta">

                        <i class="bi bi-clock"></i>

                        Currently processing

                    </div>

                </div>

            </div>


            <!-- Delivered -->
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Delivered
                            </div>

                            <div class="stat-value">
                                {{$deliveredorders}}
                            </div>

                        </div>


                        <div class="stat-icon stat-green">

                            <i class="bi bi-truck"></i>

                        </div>

                    </div>


                    <div class="stat-meta">

                        <i class="bi bi-check2-circle"></i>

                        Successfully delivered

                    </div>

                </div>

            </div>


            <!-- Cancelled -->
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="stat-card">

                    <div class="stat-card-top">

                        <div>

                            <div class="stat-label">
                                Cancelled
                            </div>

                            <div class="stat-value">
                                {{$canceledorders}}
                            </div>

                        </div>


                        <div class="stat-icon stat-red">

                            <i class="bi bi-x-circle"></i>

                        </div>

                    </div>


                    <div class="stat-meta">

                        <i class="bi bi-info-circle"></i>

                        Cancelled orders

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             PROFILE + RECENT ORDERS
        ====================================================== -->

        <div class="row g-3">


            <!-- CUSTOMER PROFILE -->

            <div class="col-12 col-xl-4">

                <div class="dashboard-card profile-card h-100">


                    <div class="card-header-custom">

                        <div>

                            <div class="card-eyebrow">
                                MY ACCOUNT
                            </div>

                            <div class="card-heading">
                                Customer Information
                            </div>

                        </div>


                        <a href="{{ url('/customer/profile-view') }}"
                           class="header-icon-btn">

                            <i class="bi bi-pencil"></i>

                        </a>

                    </div>


                    <div class="profile-body">


                        <!-- Avatar -->

                        <div class="customer-avatar">

                            {{ strtoupper(substr(Auth::user()->name ?? 'C', 0, 1)) }}

                        </div>


                        <h5 class="customer-name">

                            {{ Auth::user()->name ?? 'Customer' }}

                        </h5>


                        <div class="customer-status">

                            <span class="status-indicator"></span>

                            Active Customer

                        </div>


                        <div class="profile-separator"></div>


                        <!-- Email -->

                        <div class="customer-detail">

                            <div class="detail-icon">

                                <i class="bi bi-envelope"></i>

                            </div>


                            <div class="detail-content">

                                <div class="detail-label">
                                    EMAIL ADDRESS
                                </div>

                                <div class="detail-value">

                                    {{ Auth::user()->email ?? 'Not available' }}

                                </div>

                            </div>

                        </div>


                        <!-- Phone -->

                        <div class="customer-detail">

                            <div class="detail-icon">

                                <i class="bi bi-telephone"></i>

                            </div>


                            <div class="detail-content">

                                <div class="detail-label">
                                    PHONE NUMBER
                                </div>

                                <div class="detail-value">

                                    {{ Auth::user()->phone ?? 'Not added' }}

                                </div>

                            </div>

                        </div>


                        <a href="{{ url('/customer/profile-view') }}"
                           class="update-profile-btn">

                            <i class="bi bi-pencil-square me-2"></i>

                            Update Information

                        </a>

                    </div>

                </div>

            </div>


            <!-- RECENT ORDERS -->

            <div class="col-12 col-xl-8">

                <div class="dashboard-card orders-card h-100">


                    <div class="card-header-custom">

                        <div>

                            <div class="card-eyebrow">
                                ORDER ACTIVITY
                            </div>

                            <div class="card-heading">
                                Recent Orders
                            </div>

                        </div>


                        <a href="{{ url('/customer/orders') }}"
                           class="view-orders-btn">

                            View All

                            <i class="bi bi-arrow-right ms-1"></i>

                        </a>

                    </div>


                    <div class="orders-table-wrap">

                        <div class="table-responsive">

                            <table class="customer-table">

                                <thead>

                                    <tr>

                                        <th>
                                            ORDER
                                        </th>

                                        <th>
                                            DATE
                                        </th>

                                        <th>
                                            AMOUNT
                                        </th>

                                        <th>
                                            STATUS
                                        </th>

                                        <th>
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>


                                    <!-- ORDER 1 -->

                                    <tr>

                                        <td>

                                            <div class="order-id">
                                                #INV-2026-8942
                                            </div>

                                            <div class="order-product">
                                                Smart Bluetooth Headset
                                            </div>

                                        </td>


                                        <td>

                                            <span class="order-date">
                                                14 Aug, 2026
                                            </span>

                                        </td>


                                        <td>

                                            <span class="order-amount">
                                                ৳1,850
                                            </span>

                                        </td>


                                        <td>

                                            <span class="order-badge processing">

                                                <span></span>

                                                Processing

                                            </span>

                                        </td>


                                        <td class="text-end">

                                            <a href="#"
                                               class="order-view-btn">

                                                <i class="bi bi-chevron-right"></i>

                                            </a>

                                        </td>

                                    </tr>


                                    <!-- ORDER 2 -->

                                    <tr>

                                        <td>

                                            <div class="order-id">
                                                #INV-2026-7811
                                            </div>

                                            <div class="order-product">
                                                Mobile Accessories
                                            </div>

                                        </td>


                                        <td>

                                            <span class="order-date">
                                                02 Aug, 2026
                                            </span>

                                        </td>


                                        <td>

                                            <span class="order-amount">
                                                ৳980
                                            </span>

                                        </td>


                                        <td>

                                            <span class="order-badge delivered">

                                                <span></span>

                                                Delivered

                                            </span>

                                        </td>


                                        <td class="text-end">

                                            <a href="#"
                                               class="order-view-btn">

                                                <i class="bi bi-chevron-right"></i>

                                            </a>

                                        </td>

                                    </tr>


                                    <!-- ORDER 3 -->

                                    <tr>

                                        <td>

                                            <div class="order-id">
                                                #INV-2026-7420
                                            </div>

                                            <div class="order-product">
                                                Wireless Mouse
                                            </div>

                                        </td>


                                        <td>

                                            <span class="order-date">
                                                26 Jul, 2026
                                            </span>

                                        </td>


                                        <td>

                                            <span class="order-amount">
                                                ৳750
                                            </span>

                                        </td>


                                        <td>

                                            <span class="order-badge delivered">

                                                <span></span>

                                                Delivered

                                            </span>

                                        </td>


                                        <td class="text-end">

                                            <a href="#"
                                               class="order-view-btn">

                                                <i class="bi bi-chevron-right"></i>

                                            </a>

                                        </td>

                                    </tr>


                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             ORDER SUMMARY + QUICK ACTIONS
        ====================================================== -->

        <div class="row g-3 mt-0">


            <!-- ORDER SUMMARY -->

            <div class="col-12 col-lg-7">

                <div class="dashboard-card">


                    <div class="card-header-custom">

                        <div>

                            <div class="card-eyebrow">
                                ORDER SUMMARY
                            </div>

                            <div class="card-heading">
                                Your Order Activity
                            </div>

                        </div>

                    </div>


                    <div class="summary-wrapper">


                        <!-- Pending -->

                        <div class="summary-box">

                            <div class="summary-icon summary-blue">

                                <i class="bi bi-hourglass-split"></i>

                            </div>


                            <div>

                                <div class="summary-label">
                                    Pending
                                </div>

                                <div class="summary-value">
                                    00
                                </div>

                            </div>

                        </div>


                        <!-- Confirmed -->

                        <div class="summary-box">

                            <div class="summary-icon summary-orange">

                                <i class="bi bi-box-seam"></i>

                            </div>


                            <div>

                                <div class="summary-label">
                                    Confirmed
                                </div>

                                <div class="summary-value">
                                    01
                                </div>

                            </div>

                        </div>


                        <!-- Delivered -->

                        <div class="summary-box">

                            <div class="summary-icon summary-green">

                                <i class="bi bi-check2-circle"></i>

                            </div>


                            <div>

                                <div class="summary-label">
                                    Delivered
                                </div>

                                <div class="summary-value">
                                    10
                                </div>

                            </div>

                        </div>


                        <!-- Cancelled -->

                        <div class="summary-box">

                            <div class="summary-icon summary-red">

                                <i class="bi bi-x-circle"></i>

                            </div>


                            <div>

                                <div class="summary-label">
                                    Cancelled
                                </div>

                                <div class="summary-value">
                                    01
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>


            <!-- QUICK ACTIONS -->

            <div class="col-12 col-lg-5">

                <div class="dashboard-card h-100">


                    <div class="card-header-custom">

                        <div>

                            <div class="card-eyebrow">
                                ACCOUNT
                            </div>

                            <div class="card-heading">
                                Quick Actions
                            </div>

                        </div>

                    </div>


                    <div class="quick-actions">


                        <!-- Profile -->

                        <a href="{{ url('/customer/profile-view') }}"
                           class="quick-action">

                            <div class="quick-icon quick-blue">

                                <i class="bi bi-person"></i>

                            </div>


                            <div class="quick-content">

                                <div class="quick-title">
                                    Update Profile
                                </div>

                                <div class="quick-text">
                                    Change your personal details
                                </div>

                            </div>


                            <i class="bi bi-chevron-right quick-arrow"></i>

                        </a>


                        <!-- Security -->

                        <a href="{{ url('/customer/cradential') }}"
                           class="quick-action">

                            <div class="quick-icon quick-orange">

                                <i class="bi bi-shield-lock"></i>

                            </div>


                            <div class="quick-content">

                                <div class="quick-title">
                                    Password & Security
                                </div>

                                <div class="quick-text">
                                    Manage your account security
                                </div>

                            </div>


                            <i class="bi bi-chevron-right quick-arrow"></i>

                        </a>


                        <!-- Orders -->

                        <a href="{{ url('/customer/orders') }}"
                           class="quick-action">

                            <div class="quick-icon quick-green">

                                <i class="bi bi-receipt"></i>

                            </div>


                            <div class="quick-content">

                                <div class="quick-title">
                                    View All Orders
                                </div>

                                <div class="quick-text">
                                    Check your complete order history
                                </div>

                            </div>


                            <i class="bi bi-chevron-right quick-arrow"></i>

                        </a>


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<style>

/* =========================================================
   CUSTOMER DASHBOARD THEME
========================================================= */

.customer-dashboard {
    color: #cbd5e1;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.dashboard-eyebrow {
    color: #60a5fa;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.3px;
    margin-bottom: 5px;
}

.dashboard-title {
    color: #f8fafc !important;
    font-size: 24px;
    font-weight: 700;
}

.dashboard-subtitle {
    color: #64748b !important;
    font-size: 12px;
}

.dashboard-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    padding: 9px 15px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all .18s ease;
}

.dashboard-btn-primary {
    background: #2563eb;
    border: 1px solid #2563eb;
    color: #ffffff;
}

.dashboard-btn-primary:hover {
    background: #1d4ed8;
    border-color: #1d4ed8;
    color: #ffffff;
}

.dashboard-btn-secondary {
    background: #242b38;
    border: 1px solid #334155;
    color: #cbd5e1;
}

.dashboard-btn-secondary:hover {
    background: #2b3442;
    border-color: #475569;
    color: #ffffff;
}


/* =========================================================
   STAT CARDS
========================================================= */

.stat-card {
    position: relative;
    background: #202733;
    border: 1px solid rgba(255,255,255,.055);
    border-radius: 10px;
    padding: 19px;
    min-height: 140px;
    overflow: hidden;
    transition: border-color .18s ease,
                transform .18s ease;
}

.stat-card:hover {
    border-color: rgba(96,165,250,.22);
    transform: translateY(-1px);
}

.stat-card-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}

.stat-label {
    color: #94a3b8;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 8px;
}

.stat-value {
    color: #f8fafc;
    font-size: 26px;
    line-height: 1;
    font-weight: 700;
}

.stat-icon {
    width: 43px;
    height: 43px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
}

.stat-blue {
    color: #60a5fa;
    background: rgba(59,130,246,.11);
}

.stat-orange {
    color: #fbbf24;
    background: rgba(245,158,11,.11);
}

.stat-green {
    color: #34d399;
    background: rgba(16,185,129,.11);
}

.stat-red {
    color: #f87171;
    background: rgba(239,68,68,.11);
}

.stat-meta {
    color: #64748b;
    font-size: 10px;
    margin-top: 24px;
}

.stat-meta i {
    margin-right: 5px;
}


/* =========================================================
   GENERAL CARD
========================================================= */

.dashboard-card {
    background: #202733;
    border: 1px solid rgba(255,255,255,.055);
    border-radius: 10px;
    overflow: hidden;
}

.card-header-custom {
    min-height: 68px;
    padding: 15px 19px;
    border-bottom: 1px solid rgba(255,255,255,.055);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-eyebrow {
    color: #64748b;
    font-size: 8px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 3px;
}

.card-heading {
    color: #f1f5f9;
    font-size: 13px;
    font-weight: 650;
}


/* =========================================================
   HEADER ICON BUTTON
========================================================= */

.header-icon-btn {
    width: 31px;
    height: 31px;
    border: 1px solid #334155;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
    text-decoration: none;
    font-size: 11px;
    transition: all .18s ease;
}

.header-icon-btn:hover {
    color: #60a5fa;
    border-color: #3b82f6;
    background: rgba(59,130,246,.06);
}


/* =========================================================
   PROFILE
========================================================= */

.profile-body {
    padding: 25px 21px 20px;
    text-align: center;
}

.customer-avatar {
    width: 68px;
    height: 68px;
    margin: 0 auto;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(145deg,#29356b,#202945);
    border: 1px solid rgba(96,165,250,.24);
    color: #7c9cff;
    font-size: 23px;
    font-weight: 700;
}

.customer-name {
    color: #f8fafc;
    font-size: 16px;
    font-weight: 700;
    margin: 12px 0 6px;
}

.customer-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #34d399;
    background: rgba(16,185,129,.09);
    border: 1px solid rgba(16,185,129,.13);
    border-radius: 20px;
    padding: 4px 9px;
    font-size: 9px;
    font-weight: 600;
}

.status-indicator {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #34d399;
}

.profile-separator {
    height: 1px;
    background: rgba(255,255,255,.055);
    margin: 21px 0;
}

.customer-detail {
    display: flex;
    align-items: center;
    text-align: left;
    margin-bottom: 15px;
}

.detail-icon {
    width: 35px;
    height: 35px;
    flex-shrink: 0;
    margin-right: 10px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #29313e;
    color: #60a5fa;
    font-size: 13px;
}

.detail-content {
    min-width: 0;
}

.detail-label {
    color: #64748b;
    font-size: 8px;
    font-weight: 700;
    letter-spacing: .7px;
    margin-bottom: 3px;
}

.detail-value {
    color: #cbd5e1;
    font-size: 11px;
    font-weight: 600;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 250px;
}

.update-profile-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 9px;
    margin-top: 5px;
    border-radius: 7px;
    background: #252d39;
    border: 1px solid #334155;
    color: #cbd5e1;
    font-size: 11px;
    font-weight: 600;
    text-decoration: none;
    transition: all .18s ease;
}

.update-profile-btn:hover {
    color: #60a5fa;
    background: #293548;
    border-color: #3b82f6;
}


/* =========================================================
   ORDERS TABLE
========================================================= */

.orders-table-wrap {
    width: 100%;
}

.customer-table {
    width: 100%;
    margin: 0;
    border-collapse: collapse;
}

.customer-table thead {
    background: #1b222d;
}

.customer-table th {
    color: #64748b;
    font-size: 8px;
    font-weight: 700;
    letter-spacing: .8px;
    padding: 11px 13px;
    border-bottom: 1px solid rgba(255,255,255,.055);
    white-space: nowrap;
}

.customer-table th:first-child {
    padding-left: 19px;
}

.customer-table th:last-child {
    padding-right: 19px;
}

.customer-table td {
    padding: 14px 13px;
    border-bottom: 1px solid rgba(255,255,255,.045);
    background: #202733;
    vertical-align: middle;
}

.customer-table td:first-child {
    padding-left: 19px;
}

.customer-table td:last-child {
    padding-right: 19px;
}

.customer-table tbody tr:last-child td {
    border-bottom: 0;
}

.customer-table tbody tr:hover td {
    background: #242c38;
}

.order-id {
    color: #e2e8f0;
    font-size: 11px;
    font-weight: 700;
}

.order-product {
    color: #64748b;
    font-size: 9px;
    margin-top: 3px;
}

.order-date {
    color: #94a3b8;
    font-size: 10px;
    white-space: nowrap;
}

.order-amount {
    color: #e2e8f0;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
}

.order-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 8px;
    border-radius: 20px;
    font-size: 8px;
    font-weight: 700;
    white-space: nowrap;
}

.order-badge span {
    width: 5px;
    height: 5px;
    border-radius: 50%;
}

.order-badge.processing {
    color: #fbbf24;
    background: rgba(245,158,11,.09);
}

.order-badge.processing span {
    background: #fbbf24;
}

.order-badge.delivered {
    color: #34d399;
    background: rgba(16,185,129,.09);
}

.order-badge.delivered span {
    background: #34d399;
}

.order-view-btn {
    width: 28px;
    height: 28px;
    border-radius: 7px;
    border: 1px solid #334155;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
    text-decoration: none;
    font-size: 10px;
    transition: all .18s ease;
}

.order-view-btn:hover {
    color: #60a5fa;
    border-color: #3b82f6;
    background: rgba(59,130,246,.06);
}

.view-orders-btn {
    color: #60a5fa;
    font-size: 10px;
    font-weight: 600;
    text-decoration: none;
}

.view-orders-btn:hover {
    color: #93c5fd;
}


/* =========================================================
   SUMMARY
========================================================= */

.summary-wrapper {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 9px;
    padding: 16px;
}

.summary-box {
    min-width: 0;
    background: #252d39;
    border: 1px solid rgba(255,255,255,.045);
    border-radius: 8px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 9px;
}

.summary-icon {
    width: 33px;
    height: 33px;
    flex-shrink: 0;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
}

.summary-blue {
    color: #60a5fa;
    background: rgba(59,130,246,.1);
}

.summary-orange {
    color: #fbbf24;
    background: rgba(245,158,11,.1);
}

.summary-green {
    color: #34d399;
    background: rgba(16,185,129,.1);
}

.summary-red {
    color: #f87171;
    background: rgba(239,68,68,.1);
}

.summary-label {
    color: #64748b;
    font-size: 9px;
}

.summary-value {
    color: #e2e8f0;
    font-size: 15px;
    font-weight: 700;
    margin-top: 2px;
}


/* =========================================================
   QUICK ACTIONS
========================================================= */

.quick-actions {
    padding: 5px 12px 8px;
}

.quick-action {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 10px 8px;
    border-bottom: 1px solid rgba(255,255,255,.045);
    text-decoration: none;
    border-radius: 7px;
    transition: background .18s ease;
}

.quick-action:last-child {
    border-bottom: 0;
}

.quick-action:hover {
    background: #252d39;
}

.quick-icon {
    width: 35px;
    height: 35px;
    flex-shrink: 0;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
}

.quick-blue {
    color: #60a5fa;
    background: rgba(59,130,246,.1);
}

.quick-orange {
    color: #fbbf24;
    background: rgba(245,158,11,.1);
}

.quick-green {
    color: #34d399;
    background: rgba(16,185,129,.1);
}

.quick-content {
    flex-grow: 1;
    min-width: 0;
}

.quick-title {
    color: #cbd5e1;
    font-size: 10px;
    font-weight: 600;
}

.quick-text {
    color: #64748b;
    font-size: 8px;
    margin-top: 2px;
}

.quick-arrow {
    color: #475569;
    font-size: 10px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991.98px) {

    .summary-wrapper {
        grid-template-columns: repeat(2,1fr);
    }

}


@media (max-width: 575.98px) {

    .dashboard-title {
        font-size: 21px;
    }

    .dashboard-btn {
        flex: 1;
    }

    .summary-wrapper {
        grid-template-columns: 1fr;
    }

    .customer-table th,
    .customer-table td {
        padding-left: 9px;
        padding-right: 9px;
    }

    .customer-table th:first-child,
    .customer-table td:first-child {
        padding-left: 12px;
    }

    .customer-table th:last-child,
    .customer-table td:last-child {
        padding-right: 12px;
    }

}

</style>

@endsection