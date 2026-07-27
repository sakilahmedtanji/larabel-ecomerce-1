@extends('admin.master')
@section('maincontent')
    <main class="app-main py-4">
    <div class="app-content-header mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark fw-bold">Review Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Review</a></li>
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
                            <h5 class="card-title mb-0 fw-semibold text-secondary">Create Review</h5>
                        </div>
                        
                        <form method="POST" action="{{ url('/review/store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                                <div class="mb-4">
                                    <label for="product_id" class="form-label fw-medium text-secondary">
                                        Select Product <span class="text-danger">*</span>
                                    </label>
                                    <select name="product_id" id="product_id" class="form-select shadow-none" required>
                                        <option value="" disabled selected>Choose Product...</option>
                                        @foreach ($reviews as $review)
                                            <option value="{{ $review->id }}" {{ old('product_id') == $review->id ? 'selected' : '' }}>
                                                {{ $review->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                   
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                        Customer Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control shadow-none" id="customer_name" name="customer_name" 
                                           value="{{ old('customer_name') }}" placeholder="e.g." required />
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                         Comment <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control shadow-none" id="comment" name="comment" 
                                           value="{{ old('comment') }}" placeholder="e.g." required />
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label fw-medium text-secondary">
                                         Ratting <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control shadow-none" id="ratting" name="ratting" 
                                           value="{{ old('ratting') }}" placeholder="e.g." required />
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label fw-medium text-secondary">
                                         Image 
                                    </label>
                                    <input type="file" class="form-control" name="image" id="main_image_input" accept="image/*" />
                                </div>


                                
                            </div>
                            <div class="card-footer bg-light p-3 d-flex justify-content-end gap-2">
                                <button type="reset" class="btn btn-light border fw-medium px-4">Reset</button>
                                <button type="submit" class="btn btn-primary fw-medium px-4 shadow-sm">
                                    <i class="bi bi-plus-lg me-1"></i> Save Review
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