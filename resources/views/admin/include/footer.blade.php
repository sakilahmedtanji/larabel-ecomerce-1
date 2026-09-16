<footer class="app-footer bg-white border-top py-3 mt-auto shadow-xs">
    <div class="container-fluid px-3 d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2">
        
        <!-- Left Copyright Info -->
        <div class="text-secondary text-center text-sm-start d-flex align-items-center flex-wrap justify-content-center justify-content-sm-start" style="font-size: 0.85rem;">
            <span class="fw-medium text-dark">&copy; {{ date('Y') }}</span> 
            <a href="https://adminlte.io" target="_blank" class="footer-brand-link fw-bold text-decoration-none ms-1.5 me-1">
                AdminSAKIL<span class="text-primary">.io</span>
            </a>
            <span class="d-none d-sm-inline-block text-muted opacity-50 mx-1.5">•</span> 
            <span class="text-muted">All rights reserved.</span>
        </div>

        <!-- Right Version & Status Tag -->
        <div class="d-flex align-items-center gap-2">
            <span class="status-indicator-badge d-none d-md-flex align-items-center gap-1.5 px-2.5 py-1 rounded-pill bg-success-soft text-success fw-medium" style="font-size: 0.75rem;">
                <span class="live-dot bg-success"></span> System Active
            </span>
            <div class="badge-version bg-body-tertiary border rounded-pill px-3 py-1 text-secondary fw-semibold d-flex align-items-center gap-1" style="font-size: 0.78rem;">
                <i class="bi bi-terminal-fill text-primary" style="font-size: 0.7rem;"></i>
                <span>v4.0.0</span>
            </div>
        </div>

    </div>
</footer>

<style>
    /* Footer Modern Styling */
    .app-footer {
        border-color: rgba(0, 0, 0, 0.06) !important;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    }

    .footer-brand-link {
        color: #0f172a;
        transition: all 0.2s ease;
    }

    .footer-brand-link:hover {
        color: #2563eb;
        transform: translateY(-1px);
    }

    .bg-success-soft {
        background-color: rgba(16, 185, 129, 0.1) !important;
    }

    /* Pulsing Green Live Dot */
    .live-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        animation: pulseLive 1.8s infinite;
    }

    @keyframes pulseLive {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        }
        70% {
            transform: scale(1);
            box-shadow: 0 0 0 5px rgba(16, 185, 129, 0);
        }
        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
        }
    }

    .badge-version {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
        transition: all 0.2s ease;
    }

    .badge-version:hover {
        background-color: #f1f5f9 !important;
        border-color: #cbd5e1 !important;
    }

    .shadow-xs {
        box-shadow: 0 -1px 3px 0 rgba(0, 0, 0, 0.02);
    }
</style>