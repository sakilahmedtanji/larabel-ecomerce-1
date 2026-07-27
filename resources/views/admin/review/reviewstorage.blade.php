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
        vertical-align: middle;
    }
    .table td {
        color: #334155;
        font-size: 0.9rem;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }
    .table tbody tr:hover {
        background-color: #f8fafc !important;
        transition: background-color 0.2s ease;
    }
    /* ইমেজ যেন টেবিল নষ্ট না করে তার জন্য ফিক্সড সাইজ */
    .product-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
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
</style>

<main class="app-main py-4">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold" style="font-size: 1.6rem;">Customer Review</h3>
                    <p class="text-muted small mb-0">Manage, edit, and track customer review.</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Dashboard</a></li>
                        <li class="breadcrumb-item active fw-medium" aria-current="page">Review List</li>
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
                                    <i class="bi bi-envelope-fill fs-5"></i>
                                </div>
                                <h5 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.1rem;">All Review</h5>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0" style="table-layout: fixed; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center py-3" style="width: 60px;">SL.</th>
                                            <th class="text-center py-3" style="width: 100px;">customer image</th>
                                            <th class="text-start py-3" style="width: 120px;">Pruduct id</th>
                                            <th class="text-start py-3" style="width: 140px;">customer</th>
                                            <th class="text-start py-3" style="width: 100px;">Ratting</th>
                                            <th class="text-start py-3" style="min-width: 250px;">comment</th>
                                            <th class="text-center py-3" style="width: 110px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($reviews as $review)
                                            <tr>
                                                <td class="text-center fw-medium text-secondary">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    @if($review->image)
                                                        <img src="{{ asset($review->image) }}" class="product-img border">
                                                    @else
                                                        <i class="fas fa-user"></i>
                                                    @endif
                                                </td>
                                                <td class="text-start">
                                                    <span class="fw-bold text-dark d-block text-truncate" title="{{ $review->product_id }}">
                                                        {{ $review->product_id }}
                                                    </span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="text-secondary d-block text-truncate" title="{{ $review->customer_name }}">
                                                        {{ $review->customer_name }}
                                                    </span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="text-secondary d-block text-truncate" title="{{ $review->ratting }}">
                                                        {{ $review->ratting }}
                                                    </span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="text-muted d-block text-truncate" title="{{ $review->comment }}">
                                                        {{ $review->comment }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ url('/review/edit/'.$review->id) }}" 
                                                           class="btn btn-outline-primary btn-action" 
                                                           data-bs-toggle="tooltip" 
                                                           title="View Message">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>
                                                        <a href="{{ url('/customer-review/delete/'.$review->id) }}" 
                                                           class="btn btn-outline-danger btn-action" 
                                                           onclick="return confirm('Are you sure you want to delete this message?')"
                                                           data-bs-toggle="tooltip" 
                                                           title="Delete Message">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-5 text-muted bg-light-subtle">
                                                    <div class="py-4">
                                                        <i class="bi bi-folder-x fs-1 text-secondary opacity-50 mb-3 d-block"></i>
                                                        <h6 class="fw-semibold text-secondary">No Messages Found</h6>
                                                        <p class="small text-muted mb-0">Your database is currently empty.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endsection