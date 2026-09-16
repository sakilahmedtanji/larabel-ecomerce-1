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
                            <i class="bi bi-tags-fill fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Sub-Category Management</h3>
                            <p class="text-muted small mb-0">Manage and organize nested product categories</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub-Category List</li>
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

                    <!-- Main Sub-Category Table Card -->
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                    Total: {{ count($catagories) }} Items
                                </span>
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">All Sub-Categories</h5>
                            </div>
                            <a href="{{ url('/product/subcatagory-manage') }}" class="btn btn-primary btn-sm fw-semibold px-3 py-2 rounded-3 shadow-sm d-flex align-items-center gap-1.5">
                                <i class="bi bi-plus-lg"></i>
                                <span>Add New Sub-Category</span>
                            </a>
                        </div>
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0 custom-table">
                                    <thead class="bg-body-tertiary text-uppercase text-secondary tracking-wider" style="font-size: 0.72rem; letter-spacing: 0.6px;">
                                        <tr>
                                            <th class="text-center py-3 ps-3" style="width: 60px;">SL.</th>
                                            <th class="py-3" style="min-width: 200px;">Sub-Category Name</th>
                                            <th class="py-3" style="min-width: 200px;">Parent Category</th>
                                            <th class="text-end py-3 pe-4" style="width: 120px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top-0">
                                        @forelse($catagories as $category)
                                            <tr class="table-row-hover">
                                                <!-- Serial -->
                                                <td class="text-center fw-semibold text-secondary ps-3 fs-7">
                                                    {{ $loop->iteration }}
                                                </td>

                                                <!-- Sub-Category Name -->
                                                <td class="py-3">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="fw-bold text-dark fs-7">{{ $category->name }}</span>
                                                    </div>
                                                </td>

                                                <!-- Parent Category -->
                                                <td>
                                                    <span class="badge bg-light border border-light-subtle text-secondary px-2.5 py-1 rounded-pill fs-8 fw-semibold">
                                                        <i class="bi bi-folder2-open me-1 text-primary"></i>{{ $category->catagory->name ?? $category->name }}
                                                    </span>
                                                </td>

                                                <!-- Actions -->
                                                <td class="text-end pe-4">
                                                    <div class="d-inline-flex gap-1.5">
                                                        <a href="{{ url('/product/subcatagory-manage/post/edit/'.$category->id) }}" 
                                                           class="btn-action-icon btn-edit text-primary rounded-2 d-flex align-items-center justify-content-center text-decoration-none" 
                                                           data-bs-toggle="tooltip" 
                                                           title="Edit Sub-Category">
                                                            <i class="bi bi-pencil-square fs-6"></i>
                                                        </a>
                                                        <a href="{{ url('/product/subcatagory-manage/post/delete/'.$category->id) }}" 
                                                           class="btn-action-icon btn-delete text-danger rounded-2 d-flex align-items-center justify-content-center text-decoration-none" 
                                                           onclick="return confirm('Are you sure you want to delete this sub-category?')"
                                                           data-bs-toggle="tooltip" 
                                                           title="Delete Sub-Category">
                                                            <i class="bi bi-trash3-fill fs-6"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5 text-muted">
                                                    <div class="empty-state-box py-4">
                                                        <div class="bg-light rounded-circle p-3 d-inline-flex mb-3">
                                                            <i class="bi bi-tags fs-1 text-secondary opacity-50"></i>
                                                        </div>
                                                        <h6 class="fw-semibold text-dark mb-1">No Sub-Categories Found</h6>
                                                        <p class="text-muted small mb-0">There are currently no sub-categories created yet in the database.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Card Footer / Pagination -->
                        @if(method_exists($catagories, 'links'))
                            <div class="card-footer bg-white border-top border-light-subtle py-3 px-4 d-flex justify-content-end">
                                {!! $catagories->links() !!}
                            </div>
                        @endif
                    </div>
                    <!-- End Main Sub-Category Table Card -->

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Consistent Admin Theme Styles */
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    /* Table Hover & Transitions */
    .custom-table tbody tr {
        transition: background-color 0.15s ease-in-out;
    }

    .custom-table tbody tr:hover {
        background-color: #f8fafc !important;
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