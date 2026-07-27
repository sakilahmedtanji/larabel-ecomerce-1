@extends('admin.master')

@section('maincontent')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .form-section-title {
            font-size: 1.1rem;
            color: #4e73df;
            border-bottom: 2px solid #e3e6f0;
            padding-bottom: 5px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .preview-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-right: 10px;
            margin-top: 10px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .btn-custom {
            border-radius: 8px;
        }
    </style>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="card-title mb-0 font-weight-bold text-primary">
                                    <i class="fas fa-box-open me-2"></i> Add New Product
                                </h5>
                            </div>
                            
                            <form method="POST" action="{{ url('/product/product-manage/post') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="card-body p-4">
                                    
                                    <div class="form-section-title">
                                        <i class="fas fa-info-circle me-1"></i> Primary Information
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="name" class="form-label"><b>Product Name <span class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Enter product name" />
                                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="sku_code" class="form-label"><b>Product SKU Code <span class="text-muted">(Optional)</span></b></label>
                                            <input type="text" class="form-control" value="{{ old('sku_code') }}" id="sku_code" name="sku_code" placeholder="e.g. PROD-102" />
                                            @error('sku_code') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Select Category <span class="text-danger">*</span></b></label>
                                            <select name="cat_id" id="cat_id" class="form-select form-control">
                                                <option value="" selected disabled>Choose category...</option>
                                                @foreach ($catagories as $catagory)
                                                    <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('cat_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Select Sub Category <span class="text-muted">(Optional)</span></b></label>
                                            <select name="subcat_id" id="subcat_id" class="form-select form-control">
                                                <option value="" selected disabled>Choose sub category...</option>
                                                @foreach ($subcatagories as $subcatagory)
                                                    <option value="{{ $subcatagory->id }}">{{ $subcatagory->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcat_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-section-title mt-4">
                                        <i class="fas fa-tags me-1"></i> Pricing & Inventory
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <label for="regular_price" class="form-label"><b>Regular Price <span class="text-danger">*</span></b></label>
                                            <div class="input-group">
                                                <span class="input-group-text">৳</span>
                                                <input type="number" value="{{ old('regular_price') }}" class="form-control" id="regular_price" name="regular_price" placeholder="0.00" />
                                            </div>
                                            @error('regular_price') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <label for="discount_price" class="form-label"><b>Discount Price</b></label>
                                            <div class="input-group">
                                                <span class="input-group-text">৳</span>
                                                <input type="number" class="form-control" value="{{ old('discount_price') }}" id="discount_price" name="discount_price" placeholder="0.00" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <label for="buying_price" class="form-label"><b>Buying Price <span class="text-danger">*</span></b></label>
                                            <div class="input-group">
                                                <span class="input-group-text">৳</span>
                                                <input type="number" value="{{ old('buying_price') }}" class="form-control" id="buying_price" name="buying_price" placeholder="0.00" />
                                            </div>
                                            @error('buying_price') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <label for="qty" class="form-label"><b>Stock Quantity <span class="text-danger">*</span></b></label>
                                            <input type="number" value="{{ old('qty') }}" class="form-control" id="qty" name="qty" placeholder="e.g. 50" />
                                            @error('qty') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="product_type" class="form-label"><b>Product Tag/Type <span class="text-danger">*</span></b></label>
                                            <select name="product_type" id="product_type" class="form-select form-control">
                                                <option value="" selected disabled>Select Type...</option>
                                                <option value="Hot">🔥 Hot product</option>
                                                <option value="Discount">🏷️ Discount product</option>
                                                <option value="New">✨ New product</option>
                                                <option value="Regular">📦 Regular product</option>
                                            </select>
                                            @error('product_type') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-section-title mt-4">
                                        <i class="fas fa-sliders-h me-1"></i> Product Attributes
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Product Size <span class="text-muted">(Optional)</span></b></label>
                                            <div id="size_fields_container">
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="product_size[]" placeholder="e.g. XL, M, 42" />
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-custom mt-1" id="add_size">
                                                <i class="fas fa-plus me-1"></i> Add Size
                                            </button>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Product Colour <span class="text-muted">(Optional)</span></b></label>
                                            <div id="colour_fields_container">
                                                <div class="input-group mb-2">
                                                    <input type="text" class="form-control" name="product_colour[]" placeholder="e.g. Red, Black" />
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-custom mt-1" id="add_colour">
                                                <i class="fas fa-plus me-1"></i> Add Colour
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-section-title mt-4">
                                        <i class="fas fa-images me-1"></i> Media & Images
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Main Thumbnail Image <span class="text-danger">*</span></b></label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="image" id="main_image_input" accept="image/*" />
                                            </div>
                                            <div id="main_image_preview_container"></div>
                                            @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Product Gallery Images</b></label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="gallery_image[]" id="gallery_image_input" accept="image/*" multiple />
                                            </div>
                                            <div id="gallery_preview_container" class="d-flex flex-wrap"></div>
                                        </div>
                                    </div>

                                    <div class="form-section-title mt-4">
                                        <i class="fas fa-file-alt me-1"></i> Detailed Description
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label for="summernote" class="form-label"><b>Product Details</b></label>
                                            <textarea name="description" id="summernote" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                                            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="summernote_two" class="form-label"><b>Product Policy / Return Terms</b></label>
                                            <textarea name="product_policy" id="summernote_two" cols="30" rows="10" class="form-control">{{ old('product_policy') }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer bg-white p-4 d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light btn-custom me-2 px-4">Reset</button>
                                    <button type="submit" class="btn btn-primary btn-custom px-5 font-weight-bold">
                                        <i class="fas fa-save me-2"></i> Save Product
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

@push('java')
    <script>
        $(document).ready(function() {
            // Summernote Editors Initialization
            $('#summernote').summernote({
                placeholder: 'Write gorgeous description here...',
                tabsize: 2,
                height: 200
            });
            $('#summernote_two').summernote({
                placeholder: 'Write dynamic product policies here...',
                tabsize: 2,
                height: 150
            });

            // Dynamic Product Size Fields
            $('#add_size').click(function() {
                var sizeField = `
                    <div class="input-group mb-2 dynamic-field">
                        <input type="text" class="form-control" name="product_size[]" placeholder="Another size" />
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>`;
                $('#size_fields_container').append(sizeField);
            });

            // Dynamic Product Colour Fields
            $('#add_colour').click(function() {
                var colourField = `
                    <div class="input-group mb-2 dynamic-field">
                        <input type="text" class="form-control" name="product_colour[]" placeholder="Another colour" />
                        <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                    </div>`;
                $('#colour_fields_container').append(colourField);
            });

            // Remove Dynamic Field Functionality
            $(document).on('click', '.remove-field', function() {
                $(this).closest('.dynamic-field').remove();
            });

            // --- Live Image Preview Features ---
            
            // Main Image Preview
            $('#main_image_input').change(function() {
                $('#main_image_preview_container').html('');
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#main_image_preview_container').html('<img src="' + e.target.result + '" class="preview-img">');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Gallery Images Multiple Preview
            $('#gallery_image_input').change(function() {
                $('#gallery_preview_container').html('');
                if (this.files) {
                    var filesAmount = this.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#gallery_preview_container').append('<img src="' + e.target.result + '" class="preview-img">');
                        }
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            });
        });
    </script>
@endpush