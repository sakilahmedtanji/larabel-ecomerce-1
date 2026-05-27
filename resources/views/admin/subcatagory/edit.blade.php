@extends('admin.master')

@section('maincontent')
<main class="app-main py-4">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold">Sub-Category Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Sub-Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center">
                            <div class="icon-shape bg-warning-soft text-warning me-2 rounded-2 p-2">
                                <i class="bi bi-pencil-square fs-5"></i>
                            </div>
                            <h5 class="card-title mb-0 fw-semibold text-secondary">Edit Sub-Category</h5>
                        </div>
                        
                        <form method="POST" action="{{ url('/product/subcatagory-manage/post/upate/'.$subcatagory->id) }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                                <div class="mb-4">
                                    <label for="cat_id" class="form-label fw-medium text-secondary">
                                        Select Parent Category <span class="text-danger">*</span>
                                    </label>
                                    <select name="cat_id" id="cat_id" class="form-select shadow-none" required>
                                        <option value="" disabled>Choose Main Category...</option>
                                        @foreach ($catagory as $catagories)
                                            <option value="{{ $catagories->id }}" {{ $subcatagory->cat_id == $catagories->id ? 'selected' : '' }}>
                                                {{ $catagories->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted mt-1 d-block">Choose the main category under which this sub-category belongs.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                        Sub-Category Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control shadow-none" id="name" name="name" 
                                           value="{{ old('name', $subcatagory->name) }}" placeholder="e.g. T-Shirts" required />
                                </div>
                                
                            </div>
                            <div class="card-footer bg-light p-3 d-flex justify-content-end gap-2">
                                <a href="{{ url()->previous() }}" class="btn btn-light border fw-medium px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary fw-medium px-4 shadow-sm">
                                    <i class="bi bi-save me-1"></i> Update Sub-Category
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </main>
@endsection