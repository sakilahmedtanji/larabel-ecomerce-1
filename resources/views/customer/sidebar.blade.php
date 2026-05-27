<div class="sidebar sidebar-dark sidebar-fixed border-end border-secondary border-opacity-10 shadow-lg" id="sidebar" style="background: #0f172a !important;">
    
    <div class="sidebar-brand d-none d-md-flex align-items-center px-4 py-3.5 border-bottom border-secondary border-opacity-10">
        <div class="d-flex align-items-center gap-2.5">
            <div class="bg-primary rounded-2 p-1.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 32px; height: 32px;">
                <i class="bi bi-person-workspace text-white fs-5"></i>
            </div>
            <span class="sidebar-brand-full fw-bold text-white tracking-wide" style="font-size: 1rem; letter-spacing: 0.5px;">CLIENT PANEL</span>
        </div>
    </div>
    <ul class="sidebar-nav px-2 py-3" data-coreui="navigation" data-simplebar="">
        
        <li class="nav-title text-uppercase text-muted fw-bold mb-2 tracking-wider ps-3" style="font-size: 0.65rem; opacity: 0.5; list-style: none;">
            Main Console
        </li>

        <li class="nav-item mb-1">
            <a class="nav-link d-flex align-items-center rounded-2 px-3 py-2.5 transition-all {{ Request::is('customer/dashboard') ? 'active bg-primary text-white shadow-sm' : 'text-secondary-light' }}" 
               href="{{ url('/customer/dashboard') }}">
                <i class="bi bi-speedometer2 fs-5 me-3 opacity-75"></i>
                <span class="fw-medium fs-6 flex-grow-1">Dashboard</span>
                <span class="badge badge-sm bg-gradient bg-info text-dark fw-bold tracking-wide shadow-sm px-2 py-1" style="font-size: 0.65rem; border-radius: 4px;">NEW</span>
            </a>
        </li>

        <li class="nav-title text-uppercase text-muted fw-bold my-2 tracking-wider ps-3" style="font-size: 0.65rem; opacity: 0.5; list-style: none;">
            Account Directory
        </li>

        <li class="nav-group mb-1 {{ Request::is('customer/pages*') ? 'show' : '' }}">
            <a class="nav-link nav-group-toggle d-flex align-items-center rounded-2 px-3 py-2.5 text-secondary-light" href="#">
                <i class="bi bi-layers-half fs-5 me-3 opacity-75"></i>
                <span class="fw-medium fs-6">Authentication</span>
            </a>
            
            <ul class="nav-group-items compact list-unstyled ps-4 mt-1">
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center rounded-2 px-3 py-2 text-secondary-light transition-all" 
                       href="#" style="font-size: 0.88rem;">
                        <i class="bi bi-box-arrow-in-right fs-6 me-2.5 opacity-75"></i>
                        <span>Login Account</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <div class="sidebar-footer border-top border-secondary border-opacity-10 d-none d-md-flex p-2" style="background-color: #0b0f19;">
        <button class="sidebar-toggler btn btn-link w-100 text-secondary border-0 shadow-none py-2 d-flex align-items-center justify-content-center hover-bg-trans" 
                type="button" 
                data-coreui-toggle="unfoldable">
            <i class="bi bi-chevron-left"></i>
        </button>
    </div>
    </div>

<style>
    /* Custom CSS Overrides for CoreUI Layout Enhancements */
    .text-secondary-light { color: #94a3b8 !important; }
    .gap-2.5 { gap: 0.65rem !important; }
    .transition-all { transition: all 0.2s ease-in-out; }
    
    #sidebar .nav-link {
        color: #94a3b8 !important;
        transition: all 0.2s ease-in-out;
    }
    #sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.04) !important;
        color: #f1f5f9 !important;
    }
    #sidebar .nav-link.active {
        background-color: #0d6efd !important;
        color: #ffffff !important;
    }
    .hover-bg-trans:hover {
        background-color: rgba(255, 255, 255, 0.02) !important;
    }
</style>