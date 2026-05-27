<nav class="app-header navbar navbar-expand bg-white border-bottom shadow-sm py-2">
    <div class="container-fluid">
        <ul class="navbar-nav align-items-center">
            <li class="nav-item">
                <a class="nav-link btn btn-light rounded-circle p-2 d-flex align-items-center justify-content-center text-secondary shadow-none" 
                   data-lte-toggle="sidebar" href="#" role="button" style="width: 38px; height: 38px;">
                    <i class="bi bi-list fs-5"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block ms-2">
                <a href="{{url('/admin/dashboard')}}" class="nav-link fw-medium text-secondary px-3 py-2 rounded-2 hover-bg-light">Home</a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link fw-medium text-secondary px-3 py-2 rounded-2 hover-bg-light">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto align-items-center gap-1">
            
            <li class="nav-item">
                <a class="nav-link text-secondary p-2 hover-icon-effect" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search fs-5"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-secondary p-2 position-relative hover-icon-effect" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-chat-text fs-5"></i>
                    <span class="position-absolute top-1 start-75 translate-middle badge rounded-pill bg-danger" style="font-size: 0.65rem; padding: 0.25em 0.45em;">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end border-0 shadow-lg rounded-3 mt-2 p-2" style="width: 320px;">
                    <div class="px-3 py-2 text-muted fw-bold border-bottom mb-1" style="font-size: 0.85rem;">Recent Messages</div>
                    
                    <a href="#" class="dropdown-item rounded-2 p-2 mb-1">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('/admin/assets/img/user1-128x128.jpg') }}" alt="User Avatar" class="rounded-circle border" style="width: 40px; height: 40px; object-fit: cover;" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="mb-0 text-dark fw-semibold" style="font-size: 0.9rem;">Brad Diesel</h6>
                                    <small class="text-muted" style="font-size: 0.7rem;">4h ago</small>
                                </div>
                                <p class="text-muted mb-0 text-truncate" style="font-size: 0.8rem; max-width: 200px;">Call me whenever you can...</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="dropdown-item rounded-2 p-2 mb-1">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('/admin/assets/img/user8-128x128.jpg') }}" alt="User Avatar" class="rounded-circle border" style="width: 40px; height: 40px; object-fit: cover;" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="mb-0 text-dark fw-semibold" style="font-size: 0.9rem;">John Pierce</h6>
                                    <small class="text-muted" style="font-size: 0.7rem;">6h ago</small>
                                </div>
                                <p class="text-muted mb-0 text-truncate" style="font-size: 0.8rem; max-width: 200px;">I got your message bro</p>
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-divider opacity-50"></div>
                    <a href="#" class="dropdown-item text-center text-primary fw-medium py-2 rounded-2" style="font-size: 0.85rem;">See All Messages</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-secondary p-2 position-relative hover-icon-effect" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-bell fs-5"></i>
                    <span class="position-absolute top-1 start-75 translate-middle badge rounded-pill bg-warning text-dark" style="font-size: 0.65rem; padding: 0.25em 0.45em;">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end border-0 shadow-lg rounded-3 mt-2 p-2" style="width: 280px;">
                    <span class="dropdown-item dropdown-header text-start fw-bold text-muted border-bottom pb-2 mb-1" style="font-size: 0.85rem;">Notifications Panel</span>
                    
                    <a href="#" class="dropdown-item rounded-2 d-flex align-items-center py-2 mb-1">
                        <div class="bg-primary-soft text-primary rounded-circle p-1.5 me-3 d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                            <i class="bi bi-envelope small"></i>
                        </div>
                        <span class="text-secondary fs-7 flex-grow-1">4 new messages</span>
                        <small class="text-muted fs-8">3 mins</small>
                    </a>
                    
                    <a href="#" class="dropdown-item rounded-2 d-flex align-items-center py-2 mb-1">
                        <div class="bg-success-soft text-success rounded-circle p-1.5 me-3 d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                            <i class="bi bi-people small"></i>
                        </div>
                        <span class="text-secondary fs-7 flex-grow-1">8 friend requests</span>
                        <small class="text-muted fs-8">12 hours</small>
                    </a>

                    <div class="dropdown-divider opacity-50"></div>
                    <a href="#" class="dropdown-item text-center text-primary fw-medium py-2 rounded-2" style="font-size: 0.85rem;">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary p-2 hover-icon-effect" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                </a>
            </li>
            <li class="nav-item dropdown user-menu ms-2">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2 p-1 pe-2 rounded-pill border bg-light" data-bs-toggle="dropdown">
                    <img src="{{ asset('/admin/assets/img/user2-160x160.jpg') }}" class="rounded-circle" style="width: 28px; height: 28px; object-fit: cover;" alt="User Image" />
                    <span class="d-none d-md-inline fw-medium text-dark" style="font-size: 0.85rem;">Sakil Ahmed</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end border-0 shadow-lg rounded-3 mt-2 overflow-hidden" style="width: 280px;">
                    <li class="user-header bg-dark p-4 text-center d-flex flex-column align-items-center justify-content-center" style="background: linear-gradient(135deg, #1e293b, #0f172a) !important;">
                        <img src="{{ asset('/admin/assets/img/user2-160x160.jpg') }}" class="rounded-circle border border-2 border-secondary shadow mb-2" style="width: 75px; height: 75px; object-fit: cover;" alt="User Image" />
                        <h5 class="text-white mb-0 fw-semibold" style="font-size: 1rem;">Alexander Pierce</h5>
                        <small class="text-secondary-light opacity-75 fs-8">Web Developer</small>
                    </li>
                    <li class="user-footer bg-light p-3 d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-outline-secondary px-3 fw-medium rounded-2">Profile</a>
                        <a href="{{ url('/admin/logout') }}" class="btn btn-sm btn-danger px-3 fw-medium rounded-2 text-white">Sign out</a>
                    </li>
                    </ul>
            </li>
            </ul>
        </div>
    </nav>

<style>
    /* Utility & Micro-interaction Addons */
    .bg-primary-soft { background-color: rgba(13, 110, 253, 0.1); }
    .bg-success-soft { background-color: rgba(25, 135, 84, 0.1); }
    .hover-bg-light:hover { background-color: #f8fafc; color: #1e293b !important; }
    
    .fs-8 { font-size: 0.72rem; }
    .text-secondary-light { color: #94a3b8; }
    
    .hover-icon-effect i {
        transition: transform 0.2s ease, color 0.2s ease;
    }
    .hover-icon-effect:hover i {
        transform: scale(1.08);
        color: #0d6efd !important;
    }
    .dropdown-item {
        transition: background-color 0.15s ease-in-out;
    }
</style>