<nav class="app-header navbar navbar-expand bg-white border-bottom shadow-xs py-2 sticky-top">
    <div class="container-fluid px-3">
        <!-- Left Side Items -->
        <ul class="navbar-nav align-items-center">
            <!-- Sidebar Toggle Button -->
            <li class="nav-item">
                <a class="nav-link btn-action-circle rounded-circle d-flex align-items-center justify-content-center text-secondary shadow-none" 
                   data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list fs-5"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block ms-2">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link fw-semibold text-secondary px-3 py-1.5 rounded-3 nav-link-custom">Home</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ url('/developer-contact') }}" class="nav-link fw-semibold text-secondary px-3 py-1.5 rounded-3 nav-link-custom">Technical Support</a>
            </li>
        </ul>

        <!-- Right Side Items -->
        <ul class="navbar-nav ms-auto align-items-center gap-2">
            
            <!-- Search Icon -->
            <li class="nav-item">
                <a class="nav-link btn-action-circle text-secondary rounded-circle d-flex align-items-center justify-content-center" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search fs-6"></i>
                </a>
            </li>

            <!-- Messages Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link btn-action-circle text-secondary rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-chat-left-text fs-6"></i>
                    <span class="badge-indicator bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end border-0 shadow-lg rounded-4 mt-2 p-2 dropdown-animation" style="width: 320px;">
                    <div class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom mb-1">
                        <span class="text-dark fw-bold" style="font-size: 0.85rem;">Recent Messages</span>
                        <span class="badge bg-primary-soft text-primary rounded-pill px-2 py-1" style="font-size: 0.68rem;">3 New</span>
                    </div>
                    
                    <a href="#" class="dropdown-item rounded-3 p-2 mb-1">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 position-relative">
                                <img src="{{ asset('/admin/assets/img/user1-128x128.jpg') }}" alt="User Avatar" class="rounded-circle border" style="width: 38px; height: 38px; object-fit: cover;" />
                                <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" style="width: 8px; height: 8px;"></span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="mb-0 text-dark fw-semibold" style="font-size: 0.85rem;">Brad Diesel</h6>
                                    <small class="text-muted" style="font-size: 0.68rem;">4h ago</small>
                                </div>
                                <p class="text-muted mb-0 text-truncate" style="font-size: 0.78rem; max-width: 190px;">Call me whenever you can...</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="dropdown-item rounded-3 p-2 mb-1">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 position-relative">
                                <img src="{{ asset('/admin/assets/img/user8-128x128.jpg') }}" alt="User Avatar" class="rounded-circle border" style="width: 38px; height: 38px; object-fit: cover;" />
                                <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" style="width: 8px; height: 8px;"></span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="mb-0 text-dark fw-semibold" style="font-size: 0.85rem;">John Pierce</h6>
                                    <small class="text-muted" style="font-size: 0.68rem;">6h ago</small>
                                </div>
                                <p class="text-muted mb-0 text-truncate" style="font-size: 0.78rem; max-width: 190px;">I got your message bro</p>
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-divider my-1 opacity-50"></div>
                    <a href="#" class="dropdown-item text-center text-primary fw-semibold py-2 rounded-3" style="font-size: 0.82rem;">
                        See All Messages <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </li>

            <!-- Notifications Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link btn-action-circle text-secondary rounded-circle d-flex align-items-center justify-content-center position-relative" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-bell fs-6"></i>
                    <span class="badge-indicator bg-warning"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end border-0 shadow-lg rounded-4 mt-2 p-2 dropdown-animation" style="width: 290px;">
                    <div class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom mb-1">
                        <span class="text-dark fw-bold" style="font-size: 0.85rem;">Notifications</span>
                        <span class="badge bg-warning-soft text-warning-emphasis rounded-pill px-2 py-1" style="font-size: 0.68rem;">15 Pending</span>
                    </div>
                    
                    <a href="#" class="dropdown-item rounded-3 d-flex align-items-center py-2 px-3 mb-1">
                        <div class="bg-primary-soft text-primary rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <i class="bi bi-envelope fs-7"></i>
                        </div>
                        <div class="flex-grow-1">
                            <span class="text-dark d-block fw-medium" style="font-size: 0.82rem;">4 new messages</span>
                            <small class="text-muted" style="font-size: 0.7rem;">3 mins ago</small>
                        </div>
                    </a>
                    
                    <a href="#" class="dropdown-item rounded-3 d-flex align-items-center py-2 px-3 mb-1">
                        <div class="bg-success-soft text-success rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <i class="bi bi-person-plus fs-7"></i>
                        </div>
                        <div class="flex-grow-1">
                            <span class="text-dark d-block fw-medium" style="font-size: 0.82rem;">8 friend requests</span>
                            <small class="text-muted" style="font-size: 0.7rem;">12 hours ago</small>
                        </div>
                    </a>

                    <div class="dropdown-divider my-1 opacity-50"></div>
                    <a href="#" class="dropdown-item text-center text-primary fw-semibold py-2 rounded-3" style="font-size: 0.82rem;">
                        See All Notifications <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </li>

            <!-- Fullscreen Toggle -->
            <li class="nav-item">
                <a class="nav-link btn-action-circle text-secondary rounded-circle d-flex align-items-center justify-content-center" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen fs-6"></i>
                </a>
            </li>

            <!-- User Menu Dropdown -->
            <li class="nav-item dropdown user-menu ms-1">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2 p-1.5 pe-3 rounded-pill bg-body-tertiary border shadow-2xs text-decoration-none" data-bs-toggle="dropdown">
                    <img src="{{ asset('/admin/assets/img/user2-160x160.jpg') }}" class="rounded-circle shadow-xs" style="width: 28px; height: 28px; object-fit: cover;" alt="User Image" />
                    <span class="d-none d-md-inline fw-semibold text-dark" style="font-size: 0.84rem;">Sakil Ahmed</span>
                    <i class="bi bi-chevron-down small text-muted" style="font-size: 0.65rem;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end border-0 shadow-lg rounded-4 mt-2 overflow-hidden dropdown-animation p-0" style="width: 270px;">
                    <!-- Dropdown Header -->
                    <li class="p-4 text-center d-flex flex-column align-items-center justify-content-center" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
                        <div class="position-relative mb-2">
                            <img src="{{ asset('/admin/assets/img/user2-160x160.jpg') }}" class="rounded-circle border border-2 border-white shadow-sm" style="width: 65px; height: 65px; object-fit: cover;" alt="User Image" />
                            <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1" style="width: 12px; height: 12px;"></span>
                        </div>
                        <h6 class="text-white mb-0 fw-bold" style="font-size: 0.95rem;">Alexander Pierce</h6>
                        <span class="badge bg-white bg-opacity-10 text-info border border-info border-opacity-25 rounded-pill px-2.5 py-0.5 mt-1" style="font-size: 0.68rem;">Web Developer</span>
                    </li>
                    <!-- Dropdown Footer -->
                    <li class="bg-white p-3 d-flex justify-content-between align-items-center border-top">
                        <a href="#" class="btn btn-sm btn-light border px-3 fw-semibold rounded-3 text-secondary" style="font-size: 0.8rem;">Profile</a>
                        <a href="{{ url('/admin/logout') }}" class="btn btn-sm btn-danger px-3 fw-semibold rounded-3 text-white shadow-sm" style="font-size: 0.8rem;">Sign out</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>

<style>
    /* Navbar Custom Micro-styling */
    .app-header {
        border-color: rgba(0, 0, 0, 0.06) !important;
        backdrop-filter: blur(12px);
    }

    .btn-action-circle {
        width: 36px;
        height: 36px;
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-action-circle:hover {
        background-color: #f1f5f9;
        color: #2563eb !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }

    .nav-link-custom {
        transition: all 0.2s ease;
    }

    .nav-link-custom:hover {
        background-color: #f1f5f9;
        color: #0f172a !important;
    }

    /* Soft Color Badges */
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }
    .bg-success-soft { background-color: rgba(16, 185, 129, 0.1) !important; }
    .bg-warning-soft { background-color: rgba(245, 158, 11, 0.15) !important; }

    /* Indicator Dots */
    .badge-indicator {
        position: absolute;
        top: 6px;
        right: 6px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        border: 2px solid #ffffff;
    }

    /* Dropdown Animation & Styles */
    .dropdown-animation {
        animation: dropdownFadeIn 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(0, 0, 0, 0.07) !important;
    }

    @keyframes dropdownFadeIn {
        from {
            opacity: 0;
            transform: translateY(8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-item {
        transition: all 0.15s ease;
    }

    .dropdown-item:hover {
        background-color: #f8fafc;
    }

    .fs-7 { font-size: 0.8rem; }
    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05); }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03); }
</style>