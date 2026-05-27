@extends('admin.master')

@section('maincontent')
<main class="app-main py-4">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold">Category Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                            <div class="icon-shape bg-primary-soft text-primary me-2 rounded-2 p-2">
                                <i class="bi bi-folder-plus fs-5"></i>
                            </div>
                            <h5 class="card-title mb-0 fw-semibold text-secondary">Add New Category</h5>
                        </div>
                        
                        <form method="POST" action="{{ url('/product/catagory-manage/post') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                        Category Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control shadow-none" id="name" name="name" 
                                           value="{{ old('name') }}" placeholder="e.g. Electronics, Clothing" required />
                                </div>

                                <div class="mb-2">
                                    <label class="form-label fw-medium text-secondary">
                                        Category Thumbnail/Banner <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="file" class="form-control shadow-none" name="image" id="inputGroupFile02" accept="image/*" required />
                                        <label class="input-group-text bg-secondary text-white" for="inputGroupFile02">
                                            <i class="bi bi-upload me-1"></i> Upload
                                        </label>
                                    </div>
                                    <small class="text-muted d-block mt-2">
                                        <i class="bi bi-info-circle me-1"></i> Use high-quality transparent PNG or square aspect ratio banners.
                                    </small>
                                </div>
                                
                            </div>
                            <div class="card-footer bg-light p-3 d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-light border fw-medium px-4">Reset</button>
                                <button type="submit" class="btn btn-primary fw-medium px-4 shadow-sm">
                                    <i class="bi bi-check-lg me-1"></i> Save Category
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