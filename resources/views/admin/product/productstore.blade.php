@extends('admin.master')

@section('maincontent')
<main class="app-main py-4">
    <!--begin::App Content Header-->
    <div class="app-content-header pb-3 mb-4 border-bottom border-light-subtle">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-2">
                        <div class="p-2 bg-primary bg-opacity-10 text-primary rounded-3">
                            <i class="bi bi-box-seam-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Product Management</h3>
                            <p class="text-muted small mb-0">Manage, edit, and track your store inventory items</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 d-flex align-items-center p-3 mb-4" role="alert">
                            <div class="bg-success text-white rounded-circle p-1 me-3 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                <i class="bi bi-check-lg fs-6"></i>
                            </div>
                            <div class="flex-grow-1 text-dark fw-medium fs-7">
                                {{ session('success') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Main Products Table Card -->
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                    Total: {{ count($products) }} Products
                                </span>
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">Inventory Catalog</h5>
                            </div>
                            <a href="{{ url('/product/product-add') }}" class="btn btn-primary btn-sm fw-semibold px-3 py-2 rounded-3 shadow-sm d-flex align-items-center gap-1.5">
                                <i class="bi bi-plus-lg"></i>
                                <span>Add New Product</span>
                            </a>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0 custom-table">
                                    <thead class="bg-body-tertiary text-uppercase text-secondary tracking-wider" style="font-size: 0.72rem; letter-spacing: 0.6px;">
                                        <tr>
                                            <th class="text-center py-3 ps-3" style="width: 50px;">SL.</th>
                                            <th class="text-center py-3" style="width: 75px;">Image</th>
                                            <th class="py-3" style="min-width: 180px;">Product Name</th>
                                            <th class="text-center py-3">Type</th>
                                            <th class="text-center py-3">Category</th>
                                            <th class="text-center py-3">Sub Category</th>
                                            <th class="text-center py-3">Buying</th>
                                            <th class="text-center py-3">Regular</th>
                                            <th class="text-center py-3">Discount</th>
                                            <th class="text-center py-3">Stock</th>
                                            <th class="text-center py-3" style="width: 110px;">Status</th>
                                            <th class="text-end py-3 pe-4" style="width: 110px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        @forelse($products as $Product)
                                            <tr class="table-row-hover">
                                                <!-- Serial -->
                                                <td class="text-center fw-semibold text-secondary ps-3 fs-7">
                                                    {{ $loop->iteration }}
                                                </td>

                                                <!-- Image -->
                                                <td class="text-center">
                                                    <div class="product-img-container d-inline-block">
                                                        @if($Product->image)
                                                            <img src="{{ asset($Product->image) }}" 
                                                                 class="rounded-3 border border-light-subtle shadow-2xs object-fit-cover table-preview-img" 
                                                                 alt="{{ $Product->name }}">
                                                        @else
                                                            <div class="rounded-3 border border-light-subtle bg-light d-flex align-items-center justify-content-center text-muted table-preview-placeholder">
                                                                <i class="bi bi-image fs-6 opacity-50"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>

                                                <!-- Product Name -->
                                                <td class="py-3">
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold text-dark fs-7 text-truncate" style="max-width: 210px;" title="{{ $Product->name }}">
                                                            {{ $Product->name }}
                                                        </span>
                                                        @if($Product->sku_code)
                                                            <span class="text-muted fs-9">SKU: <strong class="text-secondary">{{ $Product->sku_code }}</strong></span>
                                                        @endif
                                                    </div>
                                                </td>

                                                <!-- Type Badge -->
                                                <td class="text-center">
                                                    @if($Product->product_type == 'Hot')
                                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                                                            🔥 Hot
                                                        </span>
                                                    @elseif($Product->product_type == 'New')
                                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                                                            ✨ New
                                                        </span>
                                                    @elseif($Product->product_type == 'Discount')
                                                        <span class="badge bg-warning-soft text-warning-emphasis border border-warning-subtle rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                                                            🏷️ Discount
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                                                            📦 Regular
                                                        </span>
                                                    @endif
                                                </td>

                                                <!-- Category -->
                                                <td class="text-center fs-8 fw-semibold text-secondary">
                                                    {{ $Product->cat_id }}
                                                </td>

                                                <!-- Sub Category -->
                                                <td class="text-center fs-8 text-muted">
                                                    {{ $Product->subcat_id ?? '—' }}
                                                </td>

                                                <!-- Buying Price -->
                                                <td class="text-center font-monospace fs-8 text-secondary">
                                                    ৳{{ number_format($Product->buying_price, 0) }}
                                                </td>

                                                <!-- Regular Price -->
                                                <td class="text-center font-monospace fs-7 fw-bold text-primary">
                                                    ৳{{ number_format($Product->regular_price, 0) }}
                                                </td>

                                                <!-- Discount Price -->
                                                <td class="text-center font-monospace fs-8 fw-bold text-danger">
                                                    {{ $Product->discount_price ? '৳'.number_format($Product->discount_price, 0) : '—' }}
                                                </td>

                                                <!-- Stock Quantity -->
                                                <td class="text-center">
                                                    @if($Product->qty > 5)
                                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                                                            {{ $Product->qty }} Pcs
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-1 fs-8 fw-semibold">
                                                            ⚠️ {{ $Product->qty }} Pcs
                                                        </span>
                                                    @endif
                                                </td>

                                                <!-- Status Toggle -->
                                                <td class="text-center">
                                                    @if($Product->status == 'active')
                                                        <a href="{{ url('/product/status-change/'.$Product->id) }}" 
                                                           class="btn btn-sm btn-status-active rounded-pill px-2.5 py-1 fw-semibold d-inline-flex align-items-center gap-1 text-decoration-none fs-8" 
                                                           title="Click to Deactivate">
                                                            <span class="status-dot bg-success"></span> Active
                                                        </a>
                                                    @else
                                                        <a href="{{ url('/product/status-change/'.$Product->id) }}" 
                                                           class="btn btn-sm btn-status-inactive rounded-pill px-2.5 py-1 fw-semibold d-inline-flex align-items-center gap-1 text-decoration-none fs-8" 
                                                           title="Click to Activate">
                                                            <span class="status-dot bg-secondary"></span> Inactive
                                                        </a>
                                                    @endif
                                                </td>

                                                <!-- Actions -->
                                                <td class="text-end pe-4">
                                                    <div class="d-inline-flex gap-1.5">
                                                        <a href="{{ url('/product/product-manage/post/edit/'.$Product->id) }}" 
                                                           class="btn-action-icon btn-edit text-primary rounded-2 d-flex align-items-center justify-content-center text-decoration-none" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Edit Product">
                                                            <i class="bi bi-pencil-square fs-6"></i>
                                                        </a>
                                                        <a href="{{ url('/product/product-manage/post/delete/'.$Product->id) }}" 
                                                           class="btn-action-icon btn-delete text-danger rounded-2 d-flex align-items-center justify-content-center text-decoration-none" 
                                                           onclick="return confirm('Are you sure you want to delete this product?')"
                                                           data-bs-toggle="tooltip" 
                                                           title="Delete Product">
                                                            <i class="bi bi-trash3-fill fs-6"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center py-5 text-muted">
                                                    <div class="empty-state-box py-4">
                                                        <div class="bg-light rounded-circle p-3 d-inline-flex mb-3">
                                                            <i class="bi bi-box-seam fs-1 text-secondary opacity-50"></i>
                                                        </div>
                                                        <h6 class="fw-semibold text-dark mb-1">No Products Found</h6>
                                                        <p class="text-muted small mb-0">Your catalog is currently empty. Click "Add New Product" to get started.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Card Footer / Pagination -->
                        <div class="card-footer bg-white border-top border-light-subtle py-3 px-4 d-flex justify-content-end">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                    <!-- End Main Products Table Card -->

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Consistent Admin Theme Styles */
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }
    .bg-warning-soft { background-color: rgba(245, 158, 11, 0.15) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    /* Product Preview Image */
    .table-preview-img, 
    .table-preview-placeholder {
        width: 44px;
        height: 44px;
        transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .table-row-hover:hover .table-preview-img {
        transform: scale(1.08);
    }

    /* Table Hover & Transitions */
    .custom-table tbody tr {
        transition: background-color 0.15s ease-in-out;
    }

    .custom-table tbody tr:hover {
        background-color: #f8fafc !important;
    }

    /* Status Buttons */
    .btn-status-active {
        background-color: rgba(16, 185, 129, 0.1);
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.25);
        transition: all 0.2s ease;
    }

    .btn-status-active:hover {
        background-color: rgba(16, 185, 129, 0.2);
        color: #047857;
    }

    .btn-status-inactive {
        background-color: rgba(100, 116, 139, 0.1);
        color: #475569;
        border: 1px solid rgba(100, 116, 139, 0.25);
        transition: all 0.2s ease;
    }

    .btn-status-inactive:hover {
        background-color: rgba(100, 116, 139, 0.2);
        color: #334155;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        display: inline-block;
    }

    /* Action Buttons */
    .btn-action-icon {
        width: 32px;
        height: 32px;
        border: 1px solid transparent;
        background-color: #f8fafc;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-edit:hover {
        background-color: rgba(37, 99, 235, 0.1) !important;
        border-color: rgba(37, 99, 235, 0.2);
        transform: translateY(-2px);
    }

    .btn-delete:hover {
        background-color: rgba(239, 68, 68, 0.1) !important;
        border-color: rgba(239, 68, 68, 0.2);
        transform: translateY(-2px);
    }

    .fs-7 { font-size: 0.84rem; }
    .fs-8 { font-size: 0.74rem; }
    .fs-9 { font-size: 0.68rem; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection