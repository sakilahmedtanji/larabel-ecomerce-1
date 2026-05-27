<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <aside class="app-sidebar bg-dark border-end border-secondary border-opacity-10 shadow" data-bs-theme="dark" style="background: #1e293b !important;">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand d-flex align-items-center px-3 py-3 border-bottom border-secondary border-opacity-10">
            <!--begin::Brand Link-->
            <a href="{{url('/admin/dashboard')}}" class="brand-link d-flex align-items-center gap-2 text-decoration-none">
                <!--begin::Brand Image-->
                <div class="bg-primary rounded-2 p-1.5 d-flex align-items-center justify-content-center shadow-sm" style="width: 32px; height: 32px;">
                    <img src="{{ asset('/admin/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-fluid" style="max-height: 24px;">
                </div>
                <!--end::Brand Image-->
                <!--begin::Brand Text-->
                <span class="brand-text fw-bold text-white tracking-wide fs-6">WORKSPACE v4</span>
                <!--end::Brand Text-->
            </a>
            <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->

        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper px-2 py-3">
            <nav class="mt-1">
                <!--begin::Sidebar Menu-->
                <ul class="nav sidebar-menu flex-column" data-coreui="navigation" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
                    
                    <!-- Section Title Info -->
                    <li class="nav-header text-uppercase text-muted fw-bold mb-2 tracking-wider ps-3" style="font-size: 0.65rem; opacity: 0.5; list-style: none;">
                        Inventory Core
                    </li>

                    <!-- 1. Category Dropdown Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/catagory-manage*') ? 'menu-open active' : '' }}">
                        <a href="#" class="nav-link d-flex align-items-center rounded-2 px-3 py-2.5 {{ Request::is('product/catagory-manage*') ? 'active bg-primary text-white shadow-sm' : 'text-secondary' }}">
                            <i class="nav-icon bi bi-grid-fill fs-5 me-2 opacity-75"></i>
                            <p class="mb-0 fw-medium fs-6 flex-grow-1">
                                Category
                            </p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/catagory-manage/post/store') }}" class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/catagory-manage/post/store') ? 'active bg-secondary bg-opacity-25 text-white fw-semibold' : 'text-secondary' }}">
                                    <i class="nav-icon bi bi-dot fs-4 me-1"></i>
                                    <p class="mb-0 fs-7">Category List</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/catagory-manage') }}" class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/catagory-manage') ? 'active bg-secondary bg-opacity-25 text-white fw-semibold' : 'text-secondary' }}">
                                    <i class="nav-icon bi bi-dot fs-4 me-1"></i>
                                    <p class="mb-0 fs-7">Add New</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 2. Sub-Category Dropdown Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/subcatagory-manage*') ? 'menu-open active' : '' }}">
                        <a href="#" class="nav-link d-flex align-items-center rounded-2 px-3 py-2.5 {{ Request::is('product/subcatagory-manage*') ? 'active bg-primary text-white shadow-sm' : 'text-secondary' }}">
                            <i class="nav-icon bi bi-tags-fill fs-5 me-2 opacity-75"></i>
                            <p class="mb-0 fw-medium fs-6 flex-grow-1">
                                Sub Category
                            </p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/subcatagory-manage/post/store') }}" class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/subcatagory-manage/post/store') ? 'active bg-secondary bg-opacity-25 text-white fw-semibold' : 'text-secondary' }}">
                                    <i class="nav-icon bi bi-dot fs-4 me-1"></i>
                                    <p class="mb-0 fs-7">Sub-Category List</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/subcatagory-manage') }}" class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/subcatagory-manage') ? 'active bg-secondary bg-opacity-25 text-white fw-semibold' : 'text-secondary' }}">
                                    <i class="nav-icon bi bi-dot fs-4 me-1"></i>
                                    <p class="mb-0 fs-7">Add New</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 3. Product Dropdown Group -->
                    <li class="nav-item mb-1 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'menu-open active' : '' }}">
                        <a href="#" class="nav-link d-flex align-items-center rounded-2 px-3 py-2.5 {{ Request::is('product/product-add*') || Request::is('product/product-manage*') ? 'active bg-primary text-white shadow-sm' : 'text-secondary' }}">
                            <i class="nav-icon bi bi-box-seam-fill fs-5 me-2 opacity-75"></i>
                            <p class="mb-0 fw-medium fs-6 flex-grow-1">
                                Product
                            </p>
                            <i class="nav-arrow bi bi-chevron-right ms-auto small transition-transform"></i>
                        </a>
                        <ul class="nav nav-treeview list-unstyled ps-3 mt-1">
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/product-manage/post/store') }}" class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/product-manage/post/store') ? 'active bg-secondary bg-opacity-25 text-white fw-semibold' : 'text-secondary' }}">
                                    <i class="nav-icon bi bi-dot fs-4 me-1"></i>
                                    <p class="mb-0 fs-7">Product List</p>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ url('/product/product-add') }}" class="nav-link d-flex align-items-center rounded-2 px-3 py-2 {{ Request::is('product/product-add') ? 'active bg-secondary bg-opacity-25 text-white fw-semibold' : 'text-secondary' }}">
                                    <i class="nav-icon bi bi-dot fs-4 me-1"></i>
                                    <p class="mb-0 fs-7">Add Product</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Section Title Support -->
                    <li class="nav-header text-uppercase text-muted fw-bold my-2 tracking-wider ps-3" style="font-size: 0.65rem; opacity: 0.5; list-style: none;">
                        Support
                    </li>

                    <!-- Nav Link: FAQ -->
                    <li class="nav-item mb-1">
                        <a href="{{ url('/docs/faq.html') }}" class="nav-link d-flex align-items-center rounded-2 px-3 py-2.5 {{ Request::is('docs/faq.html') ? 'active bg-primary text-white' : 'text-secondary' }}">
                            <i class="nav-icon bi bi-question-circle-fill fs-5 me-2 opacity-75"></i>
                            <p class="mb-0 fw-medium fs-6">FAQ Docs</p>
                        </a>
                    </li>
                    
                </ul>
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>

    <style>
        /* Premium CSS Modifications for Native Feel */
        .app-sidebar .nav-link {
            color: #94a3b8 !important;
            transition: all 0.2s ease-in-out;
        }
        .app-sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.04) !important;
            color: #f1f5f9 !important;
        }
        .app-sidebar .nav-link.active {
            background-color: #0d6efd !important;
            color: #ffffff !important;
        }
        .app-sidebar .nav-treeview .nav-link {
            color: #cbd5e1 !important;
        }
        .app-sidebar .nav-treeview .nav-link.active {
            background-color: rgba(255, 255, 255, 0.08) !important;
            color: #38bdf8 !important; /* Sky Blue accent color for nested active lists */
        }
        .fs-7 { font-size: 0.88rem; }
    </style>