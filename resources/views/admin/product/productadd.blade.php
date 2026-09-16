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
                            <p class="text-muted small mb-0">Create, configure, and publish a new store product</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0 bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/product/product-manage/post/store') }}" class="text-decoration-none">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                <div class="col-12">
                    
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
                                <h5 class="card-title mb-0 fw-bold text-dark fs-6">Add New Product Details</h5>
                            </div>
                            <a href="{{ url('/product/product-manage/post/store') }}" class="btn btn-light btn-sm fw-semibold px-3 py-1.5 rounded-3 border d-flex align-items-center gap-1">
                                <i class="bi bi-arrow-left"></i>
                                <span>Back to Products</span>
                            </a>
                        </div>
                        
                        <form method="POST" action="{{ url('/product/product-manage/post') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            
                            <div class="card-body p-4">
                                
                                <!-- 1. Primary Information Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-primary-soft text-primary rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-info-circle-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Primary Information</h6>
                                            <small class="text-muted fs-8">General information and categorization of the product</small>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6 col-12">
                                            <label for="name" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Product Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                    <i class="bi bi-box-seam fs-6"></i>
                                                </span>
                                                <input type="text" class="form-control fs-7 border-light-subtle shadow-none" 
                                                       value="{{ old('name') }}" id="name" name="name" 
                                                       placeholder="Enter product title" required />
                                            </div>
                                            @error('name') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label for="sku_code" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                SKU Code <span class="text-muted fw-normal">(Optional)</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                    <i class="bi bi-upc-scan fs-6"></i>
                                                </span>
                                                <input type="text" class="form-control fs-7 border-light-subtle shadow-none" 
                                                       value="{{ old('sku_code') }}" id="sku_code" name="sku_code" 
                                                       placeholder="e.g. PROD-102" />
                                            </div>
                                            @error('sku_code') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label for="cat_id" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Category <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                    <i class="bi bi-grid-fill fs-6"></i>
                                                </span>
                                                <select name="cat_id" id="cat_id" class="form-select fs-7 border-light-subtle shadow-none" required>
                                                    <option value="" selected disabled>Choose category...</option>
                                                    @foreach ($catagories as $catagory)
                                                        <option value="{{ $catagory->id }}" {{ old('cat_id') == $catagory->id ? 'selected' : '' }}>
                                                            {{ $catagory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('cat_id') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label for="subcat_id" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Sub Category <span class="text-muted fw-normal">(Optional)</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                    <i class="bi bi-tags-fill fs-6"></i>
                                                </span>
                                                <select name="subcat_id" id="subcat_id" class="form-select fs-7 border-light-subtle shadow-none">
                                                    <option value="" selected disabled>Choose sub category...</option>
                                                    @foreach ($subcatagories as $subcatagory)
                                                        <option value="{{ $subcatagory->id }}" {{ old('subcat_id') == $subcatagory->id ? 'selected' : '' }}>
                                                            {{ $subcatagory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('subcat_id') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 2. Pricing & Inventory Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-success-soft text-success rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cash-stack fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Pricing & Inventory</h6>
                                            <small class="text-muted fs-8">Set product costs, discounts, and initial stock level</small>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <label for="regular_price" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Regular Price <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle fw-bold text-secondary">৳</span>
                                                <input type="number" step="any" value="{{ old('regular_price') }}" 
                                                       class="form-control fs-7 border-light-subtle shadow-none" id="regular_price" name="regular_price" placeholder="0.00" required />
                                            </div>
                                            @error('regular_price') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-xl-3 col-md-6 col-12">
                                            <label for="discount_price" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Discount Price <span class="text-muted fw-normal">(Optional)</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle fw-bold text-secondary">৳</span>
                                                <input type="number" step="any" class="form-control fs-7 border-light-subtle shadow-none" 
                                                       value="{{ old('discount_price') }}" id="discount_price" name="discount_price" placeholder="0.00" />
                                            </div>
                                            @error('discount_price') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-xl-3 col-md-6 col-12">
                                            <label for="buying_price" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Buying Price <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle fw-bold text-secondary">৳</span>
                                                <input type="number" step="any" value="{{ old('buying_price') }}" 
                                                       class="form-control fs-7 border-light-subtle shadow-none" id="buying_price" name="buying_price" placeholder="0.00" required />
                                            </div>
                                            @error('buying_price') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-xl-3 col-md-6 col-12">
                                            <label for="qty" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Stock Quantity <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                    <i class="bi bi-stack fs-6"></i>
                                                </span>
                                                <input type="number" value="{{ old('qty') }}" 
                                                       class="form-control fs-7 border-light-subtle shadow-none" id="qty" name="qty" placeholder="e.g. 50" required />
                                            </div>
                                            @error('qty') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 col-12 mt-2">
                                            <label for="product_type" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Product Tag / Badge <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group custom-input-group">
                                                <span class="input-group-text bg-light border-light-subtle text-secondary">
                                                    <i class="bi bi-bookmark-star-fill fs-6"></i>
                                                </span>
                                                <select name="product_type" id="product_type" class="form-select fs-7 border-light-subtle shadow-none" required>
                                                    <option value="" selected disabled>Select Type...</option>
                                                    <option value="Hot" {{ old('product_type') == 'Hot' ? 'selected' : '' }}>🔥 Hot Product</option>
                                                    <option value="Discount" {{ old('product_type') == 'Discount' ? 'selected' : '' }}>🏷️ Discount Product</option>
                                                    <option value="New" {{ old('product_type') == 'New' ? 'selected' : '' }}>✨ New Product</option>
                                                    <option value="Regular" {{ old('product_type') == 'Regular' ? 'selected' : '' }}>📦 Regular Product</option>
                                                </select>
                                            </div>
                                            @error('product_type') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 3. Attributes (Size & Color) Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-info-soft text-info-emphasis rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-sliders fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Product Attributes</h6>
                                            <small class="text-muted fs-8">Configure available size and colour variations</small>
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        <!-- Product Size -->
                                        <div class="col-md-6 col-12">
                                            <label class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Available Sizes <span class="text-muted fw-normal">(Optional)</span>
                                            </label>
                                            <div id="size_fields_container" class="d-flex flex-column gap-2">
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-light border-light-subtle text-secondary fs-8">Size</span>
                                                    <input type="text" class="form-control fs-7 border-light-subtle shadow-none" name="product_size[]" placeholder="e.g. XL, M, 42" />
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-light border btn-sm fw-semibold text-primary rounded-3 mt-2 d-inline-flex align-items-center gap-1" id="add_size">
                                                <i class="bi bi-plus-circle"></i> Add More Size
                                            </button>
                                        </div>

                                        <!-- Product Colour -->
                                        <div class="col-md-6 col-12">
                                            <label class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Available Colours <span class="text-muted fw-normal">(Optional)</span>
                                            </label>
                                            <div id="colour_fields_container" class="d-flex flex-column gap-2">
                                                <div class="input-group custom-input-group">
                                                    <span class="input-group-text bg-light border-light-subtle text-secondary fs-8">Color</span>
                                                    <input type="text" class="form-control fs-7 border-light-subtle shadow-none" name="product_colour[]" placeholder="e.g. Red, Matte Black" />
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-light border btn-sm fw-semibold text-primary rounded-3 mt-2 d-inline-flex align-items-center gap-1" id="add_colour">
                                                <i class="bi bi-plus-circle"></i> Add More Colour
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 4. Media & Images Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-secondary-soft text-secondary rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-images fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Media & Images</h6>
                                            <small class="text-muted fs-8">Upload main thumbnail and multi-angle gallery photos</small>
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        <!-- Main Thumbnail -->
                                        <div class="col-md-6 col-12">
                                            <label class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Main Thumbnail Image <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group custom-input-group mb-2">
                                                <input type="file" class="form-control fs-7 border-light-subtle shadow-none" 
                                                       name="image" id="main_image_input" accept="image/*" required />
                                            </div>
                                            <small class="text-muted fs-8 d-block mb-3">
                                                <i class="bi bi-info-circle me-1 text-primary"></i> Recommended: Square PNG or WebP format (Max 2MB).
                                            </small>

                                            <!-- Thumbnail Container -->
                                            <div id="main_image_preview_container" class="d-flex flex-wrap align-items-center gap-2 mt-2"></div>
                                            @error('image') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Gallery Images -->
                                        <div class="col-md-6 col-12">
                                            <label class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Product Gallery Images <span class="text-muted fw-normal">(Optional)</span>
                                            </label>
                                            <div class="input-group custom-input-group mb-2">
                                                <input type="file" class="form-control fs-7 border-light-subtle shadow-none" 
                                                       name="gallery_image[]" id="gallery_image_input" accept="image/*" multiple />
                                            </div>
                                            <small class="text-muted fs-8 d-block mb-3">
                                                <i class="bi bi-info-circle me-1 text-primary"></i> Hold Ctrl/Cmd to select multiple images.
                                            </small>

                                            <!-- Gallery Container -->
                                            <div id="gallery_preview_container" class="d-flex flex-wrap align-items-center gap-2 mt-2"></div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4 border-light-subtle">

                                <!-- 5. Detailed Description Section -->
                                <div class="section-divider mb-4">
                                    <div class="d-flex align-items-center gap-2 mb-3">
                                        <div class="section-icon-box bg-primary-soft text-primary rounded-2 d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-richtext-fill fs-6"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold text-dark fs-6">Detailed Description & Policy</h6>
                                            <small class="text-muted fs-8">Write comprehensive specs and return terms</small>
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-12">
                                            <label for="summernote" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Product Full Description
                                            </label>
                                            <textarea name="description" id="summernote" cols="30" rows="8" class="form-control border-light-subtle">{{ old('description') }}</textarea>
                                            @error('description') <span class="text-danger fs-8 mt-1 d-block">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="summernote_two" class="form-label fw-semibold text-dark fs-7 mb-1">
                                                Product Policy & Return Terms
                                            </label>
                                            <textarea name="product_policy" id="summernote_two" cols="30" rows="6" class="form-control border-light-subtle">{{ old('product_policy') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Card Footer Action Buttons -->
                            <div class="card-footer bg-light-subtle border-top border-light-subtle p-3 px-4 d-flex justify-content-end gap-2">
                                <button type="reset" id="resetBtn" class="btn btn-light border px-4 fw-semibold rounded-3 text-secondary fs-7">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3 shadow-sm d-flex align-items-center gap-1.5 fs-7">
                                    <i class="bi bi-check-circle-fill"></i>
                                    <span>Save Product</span>
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
    .bg-success-soft { background-color: rgba(16, 185, 129, 0.1) !important; }
    .bg-info-soft { background-color: rgba(6, 182, 212, 0.12) !important; }
    .bg-secondary-soft { background-color: rgba(100, 116, 139, 0.1) !important; }

    .shadow-xs { box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04) !important; }
    .shadow-2xs { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important; }

    .section-icon-box {
        width: 32px;
        height: 32px;
    }

    /* Input Styling */
    .custom-input-group .form-control:focus,
    .custom-input-group .form-select:focus {
        border-color: #2563eb !important;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12) !important;
    }

    /* Preview Image Box */
    .preview-img-box {
        width: 78px;
        height: 78px;
        background-color: #f8fafc;
        transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .preview-img-box:hover {
        transform: scale(1.04);
        border-color: #2563eb !important;
    }

    .fs-7 { font-size: 0.85rem; }
    .fs-8 { font-size: 0.74rem; }
    .fs-9 { font-size: 0.68rem; }
</style>
@endsection

@push('java')
    <script>
        $(document).ready(function() {
            // Summernote Editors Initialization
            if ($('#summernote').length) {
                $('#summernote').summernote({
                    placeholder: 'Write gorgeous and detailed product description here...',
                    tabsize: 2,
                    height: 220
                });
            }
            if ($('#summernote_two').length) {
                $('#summernote_two').summernote({
                    placeholder: 'Write return policy, warranty info, and shipping terms...',
                    tabsize: 2,
                    height: 160
                });
            }

            // Dynamic Product Size Fields
            $('#add_size').click(function() {
                var sizeField = `
                    <div class="input-group custom-input-group dynamic-field mt-1">
                        <span class="input-group-text bg-light border-light-subtle text-secondary fs-8">Size</span>
                        <input type="text" class="form-control fs-7 border-light-subtle shadow-none" name="product_size[]" placeholder="Another size" />
                        <button type="button" class="btn btn-outline-danger remove-field px-3"><i class="bi bi-x-lg fs-7"></i></button>
                    </div>`;
                $('#size_fields_container').append(sizeField);
            });

            // Dynamic Product Colour Fields
            $('#add_colour').click(function() {
                var colourField = `
                    <div class="input-group custom-input-group dynamic-field mt-1">
                        <span class="input-group-text bg-light border-light-subtle text-secondary fs-8">Color</span>
                        <input type="text" class="form-control fs-7 border-light-subtle shadow-none" name="product_colour[]" placeholder="Another colour" />
                        <button type="button" class="btn btn-outline-danger remove-field px-3"><i class="bi bi-x-lg fs-7"></i></button>
                    </div>`;
                $('#colour_fields_container').append(colourField);
            });

            // Remove Dynamic Field
            $(document).on('click', '.remove-field', function() {
                $(this).closest('.dynamic-field').remove();
            });

            // Reset Button Clears Previews
            $('#resetBtn').click(function() {
                $('#main_image_preview_container').html('');
                $('#gallery_preview_container').html('');
                if ($('#summernote').length) $('#summernote').summernote('reset');
                if ($('#summernote_two').length) $('#summernote_two').summernote('reset');
            });

            // --- Live Image Previews ---

            // Main Image Preview
            $('#main_image_input').change(function() {
                $('#main_image_preview_container').html('');
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var newPreview = `
                            <div class="image-preview-badge position-relative text-center">
                                <span class="badge bg-primary-soft text-primary border border-primary-subtle rounded-pill px-2 py-0.5 mb-1 d-inline-block fs-9">Main Thumbnail</span>
                                <div class="preview-img-box rounded-3 border border-primary border-opacity-50 overflow-hidden shadow-sm">
                                    <img src="${e.target.result}" class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>`;
                        $('#main_image_preview_container').html(newPreview);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Gallery Images Multiple Preview
            $('#gallery_image_input').change(function() {
                $('#gallery_preview_container').html('');
                if (this.files) {
                    var filesAmount = this.files.length;
                    for (var i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var newGallery = `
                                <div class="image-preview-badge position-relative text-center">
                                    <span class="badge bg-primary-soft text-primary border border-primary-subtle rounded-pill px-2 py-0.5 mb-1 d-inline-block fs-9">Gallery</span>
                                    <div class="preview-img-box rounded-3 border border-primary border-opacity-50 overflow-hidden shadow-sm">
                                        <img src="${e.target.result}" class="w-100 h-100 object-fit-cover">
                                    </div>
                                </div>`;
                            $('#gallery_preview_container').append(newGallery);
                        }
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            });
        });
    </script>
@endpush