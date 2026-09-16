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
                            <p class="text-muted small mb-0">Create and map sub-categories under primary groups</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/product/subcatagory-manage/post/store') }}" class="text-decoration-none">Sub-Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3 p-3 mb-4" role="alert">
                            <div class="d-flex align-items-start">
                                <div class="bg-danger text-white rounded-circle p-1 me-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 26px; height: 26px;">
                                    <i class="bi bi-exclamation-triangle-fill fs-7"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1 text-danger">Please fix the following errors:</h6>
                                    <ul class="mb-0 ps-3 fs-7">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Main Form Card -->
                    <div class="card shadow-xs border border-light-subtle rounded-4 overflow-hidden mb-4">
                        <div class="card-header bg-white border-bottom border-light-subtle py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-primary-soft text-primary rounded-pill px-2.5 py-1.5 fw-semibold" style="font-size: 0.75rem;">
                                    New Entry
                                </span>
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">Add New Sub-Category</h5>
                            </div>
                            <a href="{{ url('/product/subcatagory-manage/post/store') }}" class="btn btn-light btn-sm fw-semibold px-3 py-1.5 rounded-3 border d-flex align-items-center gap-1">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back to List</span>
                            </a>
                        </div>
                        
                        <form method="POST" action="{{ url('/product/subcatagory-manage/post') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                                <!-- 1. Parent Category Selection -->
                                <div class="mb-4">
                                    <label for="cat_id" class="form-label fw-semibold text-dark fs-7 mb-1">
                                        Select Parent Category <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text bg-light border-light-subtle text-secondary">
                                            <i class="bi bi-grid-fill fs-6"></i>
                                        </span>
                                        <select name="cat_id" id="cat_id" class="form-select fs-7 border-light-subtle shadow-none" required>
                                            <option value="" disabled selected>Choose Main Category...</option>
                                            @foreach ($catagory as $catagories)
                                                <option value="{{ $catagories->id }}" {{ old('cat_id') == $catagories->id ? 'selected' : '' }}>
                                                    {{ $catagories->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <small class="text-muted fs-8 mt-1.5 d-block">
                                        <i class="bi bi-info-circle me-1 text-primary"></i> Map this sub-category under a primary category group.
                                    </small>
                                    @error('cat_id') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <!-- 2. Sub-Category Name Input -->
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold text-dark fs-7 mb-1">
                                        Sub-Category Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text bg-light border-light-subtle text-secondary">
                                            <i class="bi bi-tag-fill fs-6"></i>
                                        </span>
                                        <input type="text" class="form-control fs-7 border-light-subtle shadow-none" 
                                               id="name" name="name" 
                                               value="{{ old('name') }}" 
                                               placeholder="e.g. Wireless Headphones, Smart Watches" required />
                                    </div>
                                    <small class="text-muted fs-8 mt-1.5 d-block">
                                        Provide a clear and descriptive name for this sub-category.
                                    </small>
                                    @error('name') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>
                                
                            </div>
                            
                            <!-- Card Footer Action Buttons -->
                            <div class="card-footer bg-light-subtle border-top border-light-subtle p-3 px-4 d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-light border px-4 fw-semibold rounded-3 text-secondary fs-7">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3 shadow-sm d-flex align-items-center gap-1.5 fs-7">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Save Sub-Category</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- End Main Form Card -->

                </div>
            </div>
        </div>
    </div>
</main>

<style>
    /* Consistent Micro-Styling System */
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    /* Custom Form Control States */
    .custom-input-group .form-control:focus,
    .custom-input-group .form-select:focus {
        border-color: #2563eb !important;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12) !important;
    }

    .fs-7 { font-size: 0.85rem; }
    .fs-8 { font-size: 0.74rem; }
</style>
@endsection