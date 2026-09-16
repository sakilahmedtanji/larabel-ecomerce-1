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
                            <i class="bi bi-grid-3x3-gap-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Category Management</h3>
                            <p class="text-muted small mb-0">Organize and manage your store's primary categories</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category List</li>
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

                    <!-- Main Table Card -->
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                    All Categories
                                </span>
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">Primary Categories List</h5>
                            </div>
                            <a href="{{ url('/product/catagory-manage') }}" class="btn btn-primary btn-sm fw-semibold px-3 py-2 rounded-3 shadow-sm d-flex align-items-center gap-1.5 transition-all">
                                <i class="bi bi-plus-lg"></i>
                                <span>Add New Category</span>
                            </a>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0 custom-table">
                                    <thead class="bg-body-tertiary text-uppercase text-secondary tracking-wider" style="font-size: 0.72rem; letter-spacing: 0.6px;">
                                        <tr>
                                            <th class="text-center py-3 ps-4" style="width: 80px;">SL. No.</th>
                                            <th class="py-3" style="width: 110px;">Preview</th>
                                            <th class="py-3">Category Name</th>
                                            <th class="text-end py-3 pe-4" style="width: 180px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        @forelse($catagories as $category)
                                            <tr class="table-row-hover">
                                                <td class="text-center fw-semibold text-secondary ps-4 fs-7">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <div class="category-img-container position-relative">
                                                        @if($category->image)
                                                            <img src="{{ asset($category->image) }}" 
                                                                 class="rounded-3 border border-light-subtle shadow-2xs object-fit-cover table-preview-img" 
                                                                 alt="{{ $category->name }}">
                                                        @else
                                                            <div class="rounded-3 border border-light-subtle bg-light d-flex align-items-center justify-content-center text-muted table-preview-placeholder">
                                                                <i class="bi bi-image fs-5 opacity-50"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-bold text-dark fs-6">{{ $category->name }}</span>
                                                        <span class="text-muted fs-8">Primary Category</span>
                                                    </div>
                                                </td>
                                                <td class="text-end pe-4">
                                                    <div class="d-inline-flex gap-1.5">
                                                        <a href="{{ url('/product/catagory-manage/post/edit/'.$category->id) }}" 
                                                           class="btn-action-icon btn-edit text-primary rounded-2 d-flex align-items-center justify-content-center text-decoration-none" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Edit Category">
                                                            <i class="bi bi-pencil-square fs-6"></i>
                                                        </a>
                                                        <a href="{{ url('/product/catagory-manage/post/delete/'.$category->id) }}" 
                                                           class="btn-action-icon btn-delete text-danger rounded-2 d-flex align-items-center justify-content-center text-decoration-none" 
                                                           onclick="return confirm('Are you sure you want to delete this category?')"
                                                           data-bs-toggle="tooltip" 
                                                           title="Delete Category">
                                                            <i class="bi bi-trash3-fill fs-6"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5 text-muted">
                                                    <div class="empty-state-box py-3">
                                                        <div class="bg-light rounded-circle p-3 d-inline-flex mb-3">
                                                            <i class="bi bi-folder-x fs-1 text-secondary opacity-50"></i>
                                                        </div>
                                                        <h6 class="fw-semibold text-dark mb-1">No Categories Found</h6>
                                                        <p class="text-muted small mb-0">No parent categories have been created yet in the database.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if(method_exists($catagories, 'links'))
                            <div class="card-footer bg-white border-top border-light-subtle py-3 px-4">
                                <div class="d-flex justify-content-end">
                                    {!! $catagories->links() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- End Main Table Card -->

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Consistent Micro-Styling System */
    .bg-primary-soft { 
        background-color: rgba(37, 99, 235, 0.1) !important; 
    }
    
    .shadow-xs { 
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; 
    }
    
    .shadow-2xs { 
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; 
    }

    /* Table Preview Images */
    .table-preview-img, 
    .table-preview-placeholder {
        width: 48px;
        height: 48px;
        transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .table-row-hover:hover .table-preview-img {
        transform: scale(1.06);
    }

    /* Table Row Transitions */
    .custom-table tbody tr {
        transition: background-color 0.15s ease-in-out;
    }

    .custom-table tbody tr:hover {
        background-color: #f8fafc !important;
    }

    /* Action Buttons with Uniform Styling */
    .btn-action-icon {
        width: 34px;
        height: 34px;
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
    .fs-8 { font-size: 0.72rem; }
</style>
@endsection