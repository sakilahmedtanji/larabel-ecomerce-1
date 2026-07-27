@extends('admin.master')

@section('maincontent')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
        background: #ffffff;
    }
    .table th {
        font-weight: 600;
        letter-spacing: 0.5px;
        background-color: #1e293b !important;
        color: #ffffff !important;
        border: none;
    }
    .table td {
        color: #334155;
        font-size: 0.9rem;
        border-bottom: 1px solid #f1f5f9;
    }
    .table tbody tr:hover {
        background-color: #f8fafc !important;
        transition: background-color 0.2s ease;
    }
    .product-img {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        transition: transform 0.2s ease;
    }
    .product-img:hover {
        transform: scale(1.1);
    }
    .badge-type {
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 30px;
        font-weight: 500;
    }
    .btn-action {
        width: 32px;
        height: 32px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s ease;
    }
    .price-text {
        font-family: 'SF Pro Display', -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
    }
</style>

<main class="app-main py-4">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold" style="font-size: 1.6rem;">Product Management</h3>
                    <p class="text-muted small mb-0">Manage, edit, and track your store products easily.</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Dashboard</a></li>
                        <li class="breadcrumb-item active fw-medium" aria-current="page">Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 p-3 mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2 fs-5 text-success"></i>
                                <div class="fw-medium text-success">{{ session('success') }}</div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3.5 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary-subtle text-primary rounded-3 p-2 d-inline-flex align-items-center justify-content-center">
                                    <i class="bi bi-box-seam-fill fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.1rem;">All Products</h5>
                            </div>
                            <a href="{{ url('/product/product-add') }}" class="btn btn-primary fw-semibold px-4 py-2 shadow-sm border-0 d-flex align-items-center gap-2" style="border-radius: 8px;">
                                <i class="bi bi-plus-lg"></i> Add New Product
                            </a>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center py-3.5 px-3" style="width: 60px;">SL.</th>
                                            <th class="text-center py-3.5" style="width: 80px;">Image</th>
                                            <th class="py-3.5 px-3" style="min-width: 180px;">Product Name</th>
                                            <th class="text-center py-3.5">Type</th>
                                            <th class="text-center py-3.5">Category</th>
                                            <th class="text-center py-3.5">Sub Category</th>
                                            <th class="text-center py-3.5">Buying</th>
                                            <th class="text-center py-3.5">Regular</th>
                                            <th class="text-center py-3.5">Discount</th>
                                            <th class="text-center py-3.5">Stock</th>
                                            <th class="text-center py-3.5" style="width: 120px;">Status</th>
                                            <th class="text-center py-3.5" style="width: 130px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($products as $Product)
                                            <tr>
                                                <td class="text-center fw-medium text-secondary bg-light-subtle">
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td class="text-center">
                                                    @if($Product->image)
                                                        <img src="{{ asset($Product->image) }}" class="product-img border" alt="{{ $Product->name }}">
                                                    @else
                                                        <div class="bg-light rounded-3 border d-inline-flex align-items-center justify-content-center text-muted shadow-sm" style="width: 48px; height: 48px;">
                                                            <i class="bi bi-image fs-5"></i>
                                                        </div>
                                                    @endif
                                                </td>

                                                <td class="px-3">
                                                    <span class="fw-bold text-dark d-block text-truncate" style="max-width: 220px;" title="{{ $Product->name }}">
                                                        {{ $Product->name }}
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    @if($Product->product_type == 'Hot')
                                                        <span class="badge bg-danger-subtle text-danger badge-type">🔥 Hot</span>
                                                    @elseif($Product->product_type == 'New')
                                                        <span class="badge bg-success-subtle text-success badge-type">✨ New</span>
                                                    @elseif($Product->product_type == 'Discount')
                                                        <span class="badge bg-warning-subtle text-warning-emphasis badge-type">🏷️ Discount</span>
                                                    @else
                                                        <span class="badge bg-secondary-subtle text-secondary badge-type">📦 Regular</span>
                                                    @endif
                                                </td>

                                                <td class="text-center text-secondary fw-medium">{{ $Product->cat_id }}</td>
                                                <td class="text-center text-secondary fw-medium">{{ $Product->subcat_id ?? '—' }}</td>

                                                <td class="text-center fw-semibold text-dark price-text">৳{{ number_format($Product->buying_price, 0) }}</td>
                                                <td class="text-center fw-bold text-primary price-text">৳{{ number_format($Product->regular_price, 0) }}</td>
                                                <td class="text-center fw-bold text-danger price-text">
                                                    {{ $Product->discount_price ? '৳'.number_format($Product->discount_price, 0) : '—' }}
                                                </td>

                                                <td class="text-center">
                                                    @if($Product->qty > 5)
                                                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1.5 fw-semibold">
                                                            {{ $Product->qty }} Pcs
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1.5 fw-semibold animate-pulse">
                                                            ⚠️ {{ $Product->qty }} Pcs
                                                        </span>
                                                    @endif
                                                </td>
                                                
                                                <td class="text-center">
                                                    @if($Product->status == 'active')
                                                        <a href="{{ url('/product/status-change/'.$Product->id) }}" class="btn btn-sm btn-success rounded-pill px-3 py-1 fw-semibold border-0 shadow-sm" style="font-size: 0.75rem; letter-spacing: 0.3px;">
                                                            <i class="bi bi-circle-fill me-1 small"></i> Active
                                                        </a>
                                                    @else
                                                        <a href="{{ url('/product/status-change/'.$Product->id) }}" class="btn btn-sm btn-secondary rounded-pill px-3 py-1 fw-semibold border-0 shadow-sm" style="font-size: 0.75rem; letter-spacing: 0.3px;">
                                                            <i class="bi bi-circle-fill me-1 small"></i> Inactive
                                                        </a>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ url('/product/product-manage/post/edit/'.$Product->id) }}" 
                                                           class="btn btn-outline-primary btn-action" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Edit Product">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <a href="{{ url('/product/product-manage/post/delete/'.$Product->id) }}" 
                                                           class="btn btn-outline-danger btn-action" 
                                                           onclick="return confirm('Are you sure you want to delete this product?')"
                                                           data-bs-toggle="tooltip" 
                                                           title="Delete Product">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center py-5 text-muted bg-light-subtle">
                                                    <div class="py-4">
                                                        <i class="bi bi-folder-x fs-1 text-secondary opacity-50 mb-3 d-block"></i>
                                                        <h6 class="fw-semibold text-secondary">No Products Found</h6>
                                                        <p class="small text-muted mb-0">Your database is currently empty. Click "Add New Product" to start.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer bg-white border-0 py-3.5 d-flex justify-content-end">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Tooltip initialization for professional UX
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection