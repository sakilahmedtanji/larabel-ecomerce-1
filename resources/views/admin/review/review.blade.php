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
                            <i class="bi bi-star-half fs-4"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold fs-4 text-dark">Review Management</h3>
                            <p class="text-muted small mb-0">Create and publish customer feedback & ratings</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/review/storage') }}" class="text-decoration-none">Reviews</a></li>
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
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">Add Customer Review</h5>
                            </div>
                            <a href="{{ url('/review/storage') }}" class="btn btn-light btn-sm fw-semibold px-3 py-1.5 rounded-3 border d-flex align-items-center gap-1">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back to Reviews</span>
                            </a>
                        </div>
                        
                        <form method="POST" action="{{ url('/review/store') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                                <!-- 1. Product Selection -->
                                <div class="mb-4">
                                    <label for="product_id" class="form-label fw-semibold text-dark fs-7 mb-1">
                                        Select Product <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text bg-light border-light-subtle text-secondary">
                                            <i class="bi bi-box-seam fs-6"></i>
                                        </span>
                                        <select name="product_id" id="product_id" class="form-select fs-7 border-light-subtle shadow-none" required>
                                            <option value="" disabled selected>Choose Product...</option>
                                            @foreach ($reviews as $review)
                                                <option value="{{ $review->id }}" {{ old('product_id') == $review->id ? 'selected' : '' }}>
                                                    {{ $review->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('product_id') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <!-- 2. Customer Name & Rating (2-column layout) -->
                                <div class="row g-3 mb-4">
                                    <div class="col-md-7 col-12">
                                        <label for="customer_name" class="form-label fw-semibold text-dark fs-7 mb-1">
                                            Customer Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                <i class="bi bi-person-fill fs-6"></i>
                                            </span>
                                            <input type="text" class="form-control fs-7 border-light-subtle shadow-none" 
                                                   id="customer_name" name="customer_name" 
                                                   value="{{ old('customer_name') }}" 
                                                   placeholder="e.g. Tanvir Hossain" required />
                                        </div>
                                        @error('customer_name') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="col-md-5 col-12">
                                        <label for="ratting" class="form-label fw-semibold text-dark fs-7 mb-1">
                                            Rating Score <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group custom-input-group">
                                            <span class="input-group-text bg-light border-light-subtle text-warning">
                                                <i class="bi bi-star-fill fs-6"></i>
                                            </span>
                                            <select name="ratting" id="ratting" class="form-select fs-7 border-light-subtle shadow-none" required>
                                                <option value="" disabled selected>Select Rating...</option>
                                                <option value="5" {{ old('ratting') == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Star - Excellent)</option>
                                                <option value="4" {{ old('ratting') == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Star - Good)</option>
                                                <option value="3" {{ old('ratting') == '3' ? 'selected' : '' }}>⭐⭐⭐ (3 Star - Average)</option>
                                                <option value="2" {{ old('ratting') == '2' ? 'selected' : '' }}>⭐⭐ (2 Star - Poor)</option>
                                                <option value="1" {{ old('ratting') == '1' ? 'selected' : '' }}>⭐ (1 Star - Terrible)</option>
                                            </select>
                                        </div>
                                        @error('ratting') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <!-- 3. Review Comment Textarea -->
                                <div class="mb-4">
                                    <label for="comment" class="form-label fw-semibold text-dark fs-7 mb-1">
                                        Customer Comment / Feedback <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group custom-input-group">
                                        <span class="input-group-text bg-light border-light-subtle text-secondary align-items-start pt-2.5">
                                            <i class="bi bi-chat-quote-fill fs-6"></i>
                                        </span>
                                        <textarea class="form-control fs-7 border-light-subtle shadow-none" 
                                                  id="comment" name="comment" rows="4" 
                                                  placeholder="Write what the customer shared about this product..." required>{{ old('comment') }}</textarea>
                                    </div>
                                    @error('comment') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <!-- 4. Review Image & Preview -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold text-dark fs-7 mb-1">
                                        Review Photo / Attachment <span class="text-muted fw-normal">(Optional)</span>
                                    </label>
                                    
                                    <div class="row align-items-center g-3">
                                        <div class="col-auto">
                                            <div class="preview-box border border-light-subtle rounded-3 bg-light d-flex align-items-center justify-content-center overflow-hidden position-relative shadow-2xs" 
                                                 style="width: 80px; height: 80px;">
                                                <img id="reviewImagePreview" src="#" alt="Preview" class="d-none w-100 h-100 object-fit-cover" />
                                                <div id="reviewPlaceholder" class="text-center text-muted p-2">
                                                    <i class="bi bi-image fs-3 text-secondary opacity-50"></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="input-group custom-input-group">
                                                <input type="file" class="form-control fs-7 border-light-subtle shadow-none" 
                                                       name="image" id="main_image_input" accept="image/*" />
                                            </div>
                                            <small class="text-muted d-block mt-1.5 fs-8">
                                                <i class="bi bi-info-circle me-1 text-primary"></i> Upload proof photo or customer review image (PNG, JPG, WebP).
                                            </small>
                                        </div>
                                    </div>
                                    @error('image') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                </div>
                                
                            </div>
                            
                            <!-- Card Footer Action Buttons -->
                            <div class="card-footer bg-light-subtle border-top border-light-subtle p-3 px-4 d-flex justify-content-end gap-2">
                                <button type="reset" id="resetBtn" class="btn btn-light border px-4 fw-semibold rounded-3 text-secondary fs-7">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3 shadow-sm d-flex align-items-center gap-1.5 fs-7">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Save Review</span>
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

    .preview-box {
        transition: all 0.2s ease;
    }

    .preview-box:hover {
        border-color: #2563eb !important;
    }

    .fs-7 { font-size: 0.85rem; }
    .fs-8 { font-size: 0.74rem; }
</style>

<script>
    // Live Image Preview Script
    document.getElementById('main_image_input').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('reviewImagePreview');
        const placeholder = document.getElementById('reviewPlaceholder');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                preview.src = event.target.result;
                preview.classList.remove('d-none');
                placeholder.classList.add('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('d-none');
            placeholder.classList.remove('d-none');
        }
    });

    // Reset Button Event
    document.getElementById('resetBtn').addEventListener('click', function() {
        document.getElementById('reviewImagePreview').classList.add('d-none');
        document.getElementById('reviewPlaceholder').classList.remove('d-none');
    });
</script>
@endsection