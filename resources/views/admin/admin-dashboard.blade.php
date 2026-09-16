@extends('admin.master')

@section('maincontent')
<main class="app-main py-4">
    <!--begin::App Content Header-->
    <div class="app-content-header pb-3 mb-4 border-bottom border-light-subtle">
        <div class="container-fluid">
            <div class="row align-items-center g-3">
                
                <!-- Left Title & Greeting -->
                <div class="col-lg-6 col-md-5 col-12">
                    <div class="d-flex align-items-center gap-3">
                        <div class="header-icon-box bg-primary-soft text-primary rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 shadow-2xs">
                            <i class="bi bi-speedometer2 fs-4"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <h3 class="mb-0 fw-bold fs-4 text-dark">Dashboard</h3>
                                <span class="badge bg-success-soft text-success border border-success-subtle rounded-pill px-2 py-0.5 fs-9 fw-semibold">
                                    <span class="live-dot-mini bg-success me-1"></span>Live
                                </span>
                            </div>
                            <p class="text-muted small mb-0 mt-0.5">Overview of your store metrics, shipments & orders</p>
                        </div>
                    </div>
                </div>

                <!-- Right Live Realtime Clock Widget -->
                <div class="col-lg-6 col-md-7 col-12">
                    <div class="d-flex align-items-center justify-content-md-end gap-2.5 flex-wrap">
                        
                        <!-- Realtime Date & Day Badge -->
                        <div class="live-clock-card d-flex align-items-center gap-2 px-3 py-2 rounded-3 bg-white border border-light-subtle shadow-xs">
                            <div class="clock-icon-wrapper bg-primary-soft text-primary rounded-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar3 fs-6"></i>
                            </div>
                            <div class="d-flex flex-column lh-1">
                                <span class="fw-bold text-dark fs-8" id="live-day-text">Loading Day...</span>
                                <span class="text-muted fs-9 mt-1" id="live-date-text">Loading Date...</span>
                            </div>
                        </div>

                        <!-- Realtime Digital Clock Badge -->
                        <div class="live-clock-card d-flex align-items-center gap-2 px-3 py-2 rounded-3 bg-white border border-light-subtle shadow-xs">
                            <div class="clock-icon-wrapper bg-info-soft text-info-emphasis rounded-2 d-flex align-items-center justify-content-center">
                                <i class="bi bi-clock-history fs-6"></i>
                            </div>
                            <div class="d-flex flex-column lh-1">
                                <span class="fw-bold font-monospace text-primary fs-7" id="live-local-time">00:00:00 AM</span>
                                <span class="text-muted fs-9 mt-1 d-flex align-items-center gap-1">
                                    <i class="bi bi-geo-alt-fill text-danger fs-9"></i>
                                    <span id="user-detected-country">Detecting...</span>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <!--begin::Row Stat Cards-->
            <div class="row g-4 mb-4">
                
                <!-- 1. All Orders -->
                <div class="col-xxl-2 col-lg-4 col-sm-6">
                    <div class="custom-stat-card card-gradient-primary shadow-sm rounded-4 position-relative overflow-hidden">
                        <div class="card-body p-3 text-white">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="text-uppercase tracking-wider fs-8 fw-semibold opacity-75 d-block mb-1">Total Orders</span>
                                    <h3 class="fw-bold mb-0">{{$order}}</h3>
                                </div>
                                <div class="stat-icon-wrapper rounded-circle p-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bag-check-fill fs-4"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/order-management/all') }}" class="custom-card-footer px-3 py-2 text-white text-decoration-none d-flex align-items-center justify-content-between">
                            <span class="fs-8 fw-medium">All Orders</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </div>

                <!-- 2. Pending Orders -->
                <div class="col-xxl-2 col-lg-4 col-sm-6">
                    <div class="custom-stat-card card-gradient-warning shadow-sm rounded-4 position-relative overflow-hidden">
                        <div class="card-body p-3 text-white">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="text-uppercase tracking-wider fs-8 fw-semibold opacity-75 d-block mb-1">Pending</span>
                                    <h3 class="fw-bold mb-0">{{ $pendingorder }}</h3>
                                </div>
                                <div class="stat-icon-wrapper rounded-circle p-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-hourglass-split fs-4"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/order-management/pending') }}" class="custom-card-footer px-3 py-2 text-white text-decoration-none d-flex align-items-center justify-content-between">
                            <span class="fs-8 fw-medium">Pending Orders</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </div>

                <!-- 3. Confirmed Orders -->
                <div class="col-xxl-2 col-lg-4 col-sm-6">
                    <div class="custom-stat-card card-gradient-info shadow-sm rounded-4 position-relative overflow-hidden">
                        <div class="card-body p-3 text-white">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="text-uppercase tracking-wider fs-8 fw-semibold opacity-75 d-block mb-1">Confirmed</span>
                                    <h3 class="fw-bold mb-0">{{ $confirmedorder }}</h3>
                                </div>
                                <div class="stat-icon-wrapper rounded-circle p-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-patch-check-fill fs-4"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/order-management/confirmed') }}" class="custom-card-footer px-3 py-2 text-white text-decoration-none d-flex align-items-center justify-content-between">
                            <span class="fs-8 fw-medium">Confirmed Orders</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </div>

                <!-- 4. Delivered Orders -->
                <div class="col-xxl-2 col-lg-4 col-sm-6">
                    <div class="custom-stat-card card-gradient-success shadow-sm rounded-4 position-relative overflow-hidden">
                        <div class="card-body p-3 text-white">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="text-uppercase tracking-wider fs-8 fw-semibold opacity-75 d-block mb-1">Delivered</span>
                                    <h3 class="fw-bold mb-0">{{ $deliveredorder }}</h3>
                                </div>
                                <div class="stat-icon-wrapper rounded-circle p-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-truck fs-4"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/order-management/delivered') }}" class="custom-card-footer px-3 py-2 text-white text-decoration-none d-flex align-items-center justify-content-between">
                            <span class="fs-8 fw-medium">Delivered Orders</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </div>

                <!-- 5. Cancelled Orders -->
                <div class="col-xxl-2 col-lg-4 col-sm-6">
                    <div class="custom-stat-card card-gradient-danger shadow-sm rounded-4 position-relative overflow-hidden">
                        <div class="card-body p-3 text-white">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="text-uppercase tracking-wider fs-8 fw-semibold opacity-75 d-block mb-1">Cancelled</span>
                                    <h3 class="fw-bold mb-0">{{ $cancelledorder }}</h3>
                                </div>
                                <div class="stat-icon-wrapper rounded-circle p-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-circle-fill fs-4"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/order-management/cancel') }}" class="custom-card-footer px-3 py-2 text-white text-decoration-none d-flex align-items-center justify-content-between">
                            <span class="fs-8 fw-medium">Cancel Orders</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </div>

                <!-- 6. Returned Orders -->
                <div class="col-xxl-2 col-lg-4 col-sm-6">
                    <div class="custom-stat-card card-gradient-secondary shadow-sm rounded-4 position-relative overflow-hidden">
                        <div class="card-body p-3 text-white">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="text-uppercase tracking-wider fs-8 fw-semibold opacity-75 d-block mb-1">Returned</span>
                                    <h3 class="fw-bold mb-0">{{ $returnorder }}</h3>
                                </div>
                                <div class="stat-icon-wrapper rounded-circle p-2 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-arrow-counterclockwise fs-4"></i>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/order-management/return') }}" class="custom-card-footer px-3 py-2 text-white text-decoration-none d-flex align-items-center justify-content-between">
                            <span class="fs-8 fw-medium">Return Orders</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </div>
                </div>

            </div>
            <!--end::Row Stat Cards-->

            <!--begin::Row Quick Actions & Overview-->
            <div class="row g-4">
                <!-- Quick Navigation Card -->
                <div class="col-lg-7 col-12">
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden h-100">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1 fw-semibold" style="font-size: 0.75rem;">
                                    Shortcuts
                                </span>
                                <h6 class="card-title mb-0 fw-bold text-dark fs-6">Quick Inventory Operations</h6>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <a href="{{ url('/product/product-add') }}" class="quick-action-box p-3 rounded-3 border border-light-subtle text-decoration-none d-flex align-items-center gap-3">
                                        <div class="quick-action-icon bg-primary-soft text-primary rounded-3 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-plus-circle-fill fs-5"></i>
                                        </div>
                                        <div>
                                            <span class="d-block fw-bold text-dark fs-7">Add Product</span>
                                            <small class="text-muted fs-9">New inventory entry</small>
                                        </div>
                                    </a>
                                </div>
                                 @if(Auth::user()->role == 'admin')
                                <div class="col-md-4 col-sm-6 col-12">
                                    <a href="{{ url('/product/catagory-manage') }}" class="quick-action-box p-3 rounded-3 border border-light-subtle text-decoration-none d-flex align-items-center gap-3">
                                        <div class="quick-action-icon bg-info-soft text-info-emphasis rounded-3 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder-plus fs-5"></i>
                                        </div>
                                        <div>
                                            <span class="d-block fw-bold text-dark fs-7">New Category</span>
                                            <small class="text-muted fs-9">Create primary group</small>
                                        </div>
                                    </a>
                                </div>
                               
                                <div class="col-md-4 col-sm-6 col-12">
                                    <a href="{{ url('/website-settings') }}" class="quick-action-box p-3 rounded-3 border border-light-subtle text-decoration-none d-flex align-items-center gap-3">
                                        <div class="quick-action-icon bg-warning-soft text-warning-emphasis rounded-3 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-sliders fs-5"></i>
                                        </div>
                                        <div>
                                            <span class="d-block fw-bold text-dark fs-7">Site Settings</span>
                                            <small class="text-muted fs-9">Branding & details</small>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live System & Dual Clock Card -->
                <div class="col-lg-5 col-12">
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden h-100">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between">
                            <h6 class="card-title mb-0 fw-bold text-dark fs-6 d-flex align-items-center gap-2">
                                <i class="bi bi-broadcast text-primary"></i> Realtime Clocks & Status
                            </h6>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fs-9 fw-semibold">
                                Connected
                            </span>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-2.5">
                                
                                <!-- User's Current Local Time -->
                                <li class="d-flex align-items-center justify-content-between p-2.5 rounded-3 bg-light-subtle border border-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-globe-americas text-primary fs-6"></i>
                                        <span class="text-dark fw-semibold fs-8" id="local-timezone-label">Local Time</span>
                                    </div>
                                    <span class="fw-bold text-dark font-monospace fs-7" id="live-local-time-card">00:00:00 AM</span>
                                </li>

                                <!-- Bangladesh Standard Time (BDT) -->
                                <li class="d-flex align-items-center justify-content-between p-2.5 rounded-3 bg-light-subtle border border-light-subtle">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="flag-icon-bdt fw-bold text-success fs-8">🇧🇩 BDT Time</span>
                                        <span class="badge bg-secondary-subtle text-secondary fs-9 py-0 px-1.5 rounded">UTC+6</span>
                                    </div>
                                    <span class="fw-bold text-success font-monospace fs-7" id="live-bdt-time-card">00:00:00 AM</span>
                                </li>

                                <!-- Server Environment Info -->
                                <li class="d-flex align-items-center justify-content-between pt-1 px-1">
                                    <span class="text-secondary fs-8">Framework Core</span>
                                    <span class="fw-bold text-dark fs-8">Laravel v11.x</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row Quick Actions & Overview-->

        </div>
    </div>
    <!--end::App Content-->
</main>

<style>
    /* Card Gradients */
    .card-gradient-primary { background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); }
    .card-gradient-warning { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
    .card-gradient-info { background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); }
    .card-gradient-success { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
    .card-gradient-danger { background: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%); }
    .card-gradient-secondary { background: linear-gradient(135deg, #64748b 0%, #475569 100%); }

    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }
    .bg-info-soft { background-color: rgba(6, 182, 212, 0.12) !important; }
    .bg-warning-soft { background-color: rgba(245, 158, 11, 0.15) !important; }
    .bg-success-soft { background-color: rgba(16, 185, 129, 0.1) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    .header-icon-box {
        width: 44px;
        height: 44px;
    }

    /* Live Clock Widget */
    .clock-icon-wrapper {
        width: 32px;
        height: 32px;
    }

    .live-clock-card {
        transition: all 0.2s ease;
    }

    .live-clock-card:hover {
        border-color: #2563eb !important;
        transform: translateY(-1px);
    }

    /* Pulsing Mini Dot */
    .live-dot-mini {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: pulseDot 1.8s infinite;
    }

    @keyframes pulseDot {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 4px rgba(16, 185, 129, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }

    /* Stat Cards */
    .custom-stat-card {
        border: 1px solid rgba(255, 255, 255, 0.15);
        transition: all 0.25s ease-in-out;
    }

    .custom-stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px -6px rgba(0, 0, 0, 0.2) !important;
    }

    .stat-icon-wrapper {
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(8px);
        width: 44px;
        height: 44px;
        transition: transform 0.25s ease;
    }

    .custom-stat-card:hover .stat-icon-wrapper {
        transform: scale(1.08) rotate(4deg);
    }

    .custom-card-footer {
        background: rgba(0, 0, 0, 0.15);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        transition: background 0.2s ease;
    }

    .custom-card-footer:hover {
        background: rgba(0, 0, 0, 0.25);
    }

    .custom-card-footer i {
        transition: transform 0.2s ease;
    }

    .custom-card-footer:hover i {
        transform: translateX(4px);
    }

    /* Quick Action Shortcuts */
    .quick-action-box {
        background-color: #f8fafc;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .quick-action-box:hover {
        background-color: #ffffff;
        border-color: #2563eb !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
    }

    .quick-action-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
    }

    .fs-7 { font-size: 0.85rem; }
    .fs-8 { font-size: 0.75rem; letter-spacing: 0.5px; }
    .fs-9 { font-size: 0.68rem; }
</style>

<!-- Pure JavaScript Live Realtime Multi-Clock Engine -->
<script>
    function updateLiveClocks() {
        const now = new Date();

        // 1. Day of Week & Full Date (Based on visitor's device location)
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const currentDay = days[now.getDay()];
        
        const dateOptions = { day: '2-digit', month: 'short', year: 'numeric' };
        const formattedDate = now.toLocaleDateString('en-GB', dateOptions);

        document.getElementById('live-day-text').textContent = currentDay;
        document.getElementById('live-date-text').textContent = formattedDate;

        // 2. User's Local Time
        const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
        const localTimeStr = now.toLocaleTimeString('en-US', timeOptions);

        document.getElementById('live-local-time').textContent = localTimeStr;
        if(document.getElementById('live-local-time-card')) {
            document.getElementById('live-local-time-card').textContent = localTimeStr;
        }

        // 3. User's Timezone / Country Detection
        try {
            const userTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            const regionCity = userTimeZone.replace('_', ' ').split('/').pop();
            document.getElementById('user-detected-country').textContent = regionCity || userTimeZone;
            if(document.getElementById('local-timezone-label')) {
                document.getElementById('local-timezone-label').textContent = 'Local (' + (regionCity || userTimeZone) + ')';
            }
        } catch(e) {
            document.getElementById('user-detected-country').textContent = 'Local Time';
        }

        // 4. Bangladesh Standard Time (BDT / UTC+6)
        try {
            const bdtTimeStr = now.toLocaleTimeString('en-US', {
                timeZone: 'Asia/Dhaka',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });
            if(document.getElementById('live-bdt-time-card')) {
                document.getElementById('live-bdt-time-card').textContent = bdtTimeStr;
            }
        } catch(e) {
            console.error('BDT Time calculation fallback');
        }
    }

    // Run clock immediately and refresh every 1000ms
    document.addEventListener('DOMContentLoaded', function() {
        updateLiveClocks();
        setInterval(updateLiveClocks, 1000);
    });
</script>
@endsection