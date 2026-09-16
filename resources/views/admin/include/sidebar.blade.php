<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <aside class="app-sidebar border-end" data-bs-theme="dark" style="background: #090e1a !important; border-color: rgba(255, 255, 255, 0.06) !important;">
        
        <!--begin::Sidebar Brand Header-->
        <div class="sidebar-brand-wrapper px-3 py-3 border-bottom" style="border-color: rgba(255, 255, 255, 0.06) !important; min-height: 68px;">
            <a href="{{ url('/admin/dashboard') }}" class="d-flex align-items-center gap-3 text-decoration-none w-100 h-100 my-auto">
                
                <!-- Ultra Modern SaaS Gradient Vector Logo -->
                <div class="brand-logo-glow position-relative flex-shrink-0">
                    <div class="brand-logo-card rounded-3 d-flex align-items-center justify-content-center">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="url(#logo-grad-1)"/>
                            <path opacity="0.85" d="M2 17L12 22V12L2 7V17Z" fill="url(#logo-grad-2)"/>
                            <path opacity="0.6" d="M22 17L12 22V12L22 7V17Z" fill="url(#logo-grad-3)"/>
                            <defs>
                                <linearGradient id="logo-grad-1" x1="2" y1="2" x2="22" y2="12" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#38bdf8"/>
                                    <stop offset="1" stop-color="#2563eb"/>
                                </linearGradient>
                                <linearGradient id="logo-grad-2" x1="2" y1="7" x2="12" y2="22" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#1d4ed8"/>
                                    <stop offset="1" stop-color="#0284c7"/>
                                </linearGradient>
                                <linearGradient id="logo-grad-3" x1="12" y1="7" x2="22" y2="22" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#60a5fa"/>
                                    <stop offset="1" stop-color="#1e40af"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>

                <!-- Brand Typography -->
                <div class="d-flex flex-column justify-content-center">
                    <div class="d-flex align-items-center gap-1.5">
                        <span class="fw-bold text-white tracking-wide lh-1" style="font-size: 1.02rem; letter-spacing: 0.3px;">Admin<span class="text-primary">Panel</span></span>
                        <span class="badge bg-primary bg-opacity-20 text-info border border-info border-opacity-25 rounded-pill px-1.5 py-0.5" style="font-size: 0.6rem; letter-spacing: 0.5px;">PRO</span>
                    </div>
                    <span class="fw-medium text-muted lh-1 mt-1" style="font-size: 0.70rem; letter-spacing: 0.3px; color: #94a3b8 !important;">All Services Control</span>
                </div>
            </a>
        </div>
        <!--end::Sidebar Brand Header-->

        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper px-2 py-3">
            <nav>
                <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-coreui="navigation" data-lte-toggle="treeview"
                    role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">

                    <!-- Section: Inventory Core -->
                    <li class="nav-header text-uppercase text-muted fw-bold mb-2 tracking-wider ps-3"
                        style="font-size: 0.65rem; opacity: 0.5; letter-spacing: 1.2px; list-style: none;">
                        Inventory Core
                    </li>

                    <!-- 1. Category Dropdown Group -->
                   @if (Auth::user()->role == 'admin')
                    <li class="nav-item mb-1 {{ Request::is('product/catagory-manage*') ? 'menu-open active' : '' }}">
                        <a href="#"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('product/catagory-manage*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-grid-fill fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium flex-grow-1">Category</p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1 custom-treeview">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/catagory-manage/post/store') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/catagory-manage/post/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Category List</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/catagory-manage') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/catagory-manage') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Add New</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 2. Sub-Category Dropdown Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/subcatagory-manage*') ? 'menu-open active' : '' }}">
                        <a href="#"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('product/subcatagory-manage*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-tags-fill fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium flex-grow-1">Sub Category</p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1 custom-treeview">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/subcatagory-manage/post/store') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/subcatagory-manage/post/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Sub-Category List</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/subcatagory-manage') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/subcatagory-manage') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Add New</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 3. General settings Dropdown Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/subcatagory-manage*') ? 'menu-open active' : '' }}">
                        <a href="#"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('product/subcatagory-manage*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-gear-wide-connected fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium flex-grow-1">General settings</p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1 custom-treeview">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/website-settings') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/subcatagory-manage/post/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Website settings</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/Policy-settings') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/subcatagory-manage') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Policy settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                   @endif
                    

                    <!-- 4. Product Dropdown Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'menu-open active' : '' }}">
                        <a href="#"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-box-seam-fill fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium flex-grow-1">Product</p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1 custom-treeview">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/product-manage/post/store') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/product-manage/post/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Product List</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/product-add') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/product-add') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Add Product</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 5. Product Review Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'menu-open active' : '' }}">
                        <a href="#"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-star-half fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium flex-grow-1">Product review</p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1 custom-treeview">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/review-add') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review-add') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Add review</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/review/storage') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Review store</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 6. Product Order Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'menu-open active' : '' }}">
                        <a href="#"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-cart-check-fill fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium flex-grow-1">Product Order</p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1 custom-treeview">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/order-management/all') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review-add') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">All Orders</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/order-management/pending') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Pending Orders</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/order-management/confirmed') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Confirmed Orders</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/order-management/delivered') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Delivered Orders</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/order-management/cancel') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Cancelled Orders</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/order-management/return') }}"
                                    class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('/review/store') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle-fill dot-icon me-2"></i>
                                    <p class="mb-0 fs-7">Returned Orders</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 7. Customer Message -->
                    <li class="nav-item mb-1">
                        <a href="{{ url('/customer-massage') }}"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('/customer-massage') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-chat-dots-fill fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium">Customer Message</p>
                        </a>
                    </li>

                    <!-- Section: Support -->
                    <li class="nav-header text-uppercase text-muted fw-bold my-2 tracking-wider ps-3"
                        style="font-size: 0.65rem; opacity: 0.5; letter-spacing: 1.2px; list-style: none;">
                        Support
                    </li>

                    <!-- Nav Link: FAQ Docs -->
                    <li class="nav-item mb-1">
                        <a href="{{ url('/docs/faq.html') }}"
                            class="nav-link d-flex align-items-center rounded-3 px-3 py-2.5 {{ Request::is('docs/faq.html') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-question-diamond-fill fs-5 me-2.5"></i>
                            <p class="mb-0 fw-medium">FAQ Docs</p>
                        </a>
                    </li>

                </ul>
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>

    <style>
        /* Pro SaaS Dark Theme Stylesheet */
        .app-sidebar {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        /* Modern Vector Logo Card with Ambient Glow */
        .brand-logo-card {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.25) 0%, rgba(15, 23, 42, 0.9) 100%);
            border: 1px solid rgba(56, 189, 248, 0.3);
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.25);
            backdrop-filter: blur(8px);
            transition: all 0.25s ease;
        }

        .brand-logo-card:hover {
            border-color: rgba(56, 189, 248, 0.6);
            box-shadow: 0 4px 20px rgba(56, 189, 248, 0.35);
            transform: scale(1.04);
        }

        /* Top-Level Menu Items */
        .app-sidebar .nav-link {
            color: #94a3b8 !important;
            font-size: 0.88rem;
            font-weight: 500;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .app-sidebar .nav-link .nav-icon {
            color: #64748b;
            transition: color 0.2s ease;
        }

        /* Hover State */
        .app-sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: #ffffff !important;
        }

        .app-sidebar .nav-link:hover .nav-icon {
            color: #38bdf8;
        }

        /* Active State with Gradient & Glowing Pill */
        .app-sidebar .nav-item > .nav-link.active {
            background: linear-gradient(90deg, rgba(37, 99, 235, 0.25) 0%, rgba(37, 99, 235, 0.05) 100%) !important;
            color: #ffffff !important;
            font-weight: 600;
            border-left: 3px solid #38bdf8;
        }

        .app-sidebar .nav-item > .nav-link.active .nav-icon {
            color: #38bdf8 !important;
        }

        /* Submenu Container (Treeview) */
        .custom-treeview {
            border-left: 1px solid rgba(255, 255, 255, 0.08);
            margin-left: 1.45rem;
            padding-left: 0.65rem !important;
        }

        /* Submenu Items */
        .custom-treeview .nav-link {
            color: #94a3b8 !important;
            font-size: 0.82rem;
            padding-top: 0.45rem !important;
            padding-bottom: 0.45rem !important;
        }

        .custom-treeview .nav-link .dot-icon {
            font-size: 0.35rem !important;
            opacity: 0.4;
            transition: all 0.2s ease;
        }

        .custom-treeview .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.03) !important;
            color: #f1f5f9 !important;
        }

        .custom-treeview .nav-link:hover .dot-icon {
            opacity: 1;
            color: #38bdf8;
            transform: scale(1.3);
        }

        /* Submenu Active State */
        .custom-treeview .nav-link.active {
            background: rgba(56, 189, 248, 0.1) !important;
            color: #38bdf8 !important;
            font-weight: 600 !important;
            border-left: none !important;
        }

        .custom-treeview .nav-link.active .dot-icon {
            opacity: 1;
            color: #38bdf8 !important;
            box-shadow: 0 0 8px #38bdf8;
            border-radius: 50%;
        }

        /* Smooth Chevron Animation */
        .nav-arrow {
            transition: transform 0.25s ease;
        }

        .menu-open > .nav-link .nav-arrow {
            transform: rotate(90deg);
            color: #38bdf8;
        }

        .fs-7 {
            font-size: 0.83rem;
        }
    </style>