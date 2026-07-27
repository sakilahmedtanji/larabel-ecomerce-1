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
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-right: 10px;
            margin-top: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
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
                                    <i class="fas fa-edit me-2"></i> Edit Product: {{ $product->name }}
                                </h5>
                            </div>
                            
                            <form method="POST" action="{{ url('/product/product-manage/post/upate/'.$product->id) }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="card-body p-4">
                                    
                                    <div class="form-section-title">
                                        <i class="fas fa-info-circle me-1"></i> Primary Information
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="name" class="form-label"><b>Product Name <span class="text-danger">*</span></b></label>
                                            <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name" placeholder="Enter product name" />
                                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <label for="sku_code" class="form-label"><b>Product SKU Code <span class="text-muted">(Optional)</span></b></label>
                                            <input type="text" class="form-control" value="{{ $product->sku_code }}" id="sku_code" name="sku_code" placeholder="e.g. PROD-102" />
                                            @error('sku_code') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Select Category <span class="text-danger">*</span></b></label>
                                            <select name="cat_id" id="cat_id" class="form-select form-control">
                                                <option value="" disabled>Choose category...</option>
                                                @foreach ($catagories as $catagory)
                                                    <option value="{{ $catagory->id }}" {{ $catagory->id == $product->cat_id ? 'selected' : '' }}>
                                                        {{ $catagory->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('cat_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Select Sub Category <span class="text-muted">(Optional)</span></b></label>
                                            <select name="subcat_id" id="subcat_id" class="form-select form-control">
                                                <option value="" selected disabled>Choose sub category...</option>
                                                @foreach ($subcatagories as $subcatagory)
                                                    <option value="{{ $subcatagory->id }}" {{ $subcatagory->id == $product->subcat_id ? 'selected' : '' }}>
                                                        {{ $subcatagory->name }}
                                                    </option>
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
                                                <input type="number" value="{{ $product->regular_price }}" class="form-control" id="regular_price" name="regular_price" />
                                            </div>
                                            @error('regular_price') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <label for="discount_price" class="form-label"><b>Discount Price</b></label>
                                            <div class="input-group">
                                                <span class="input-group-text">৳</span>
                                                <input type="number" class="form-control" value="{{ $product->discount_price }}" id="discount_price" name="discount_price" />
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <label for="buying_price" class="form-label"><b>Buying Price <span class="text-danger">*</span></b></label>
                                            <div class="input-group">
                                                <span class="input-group-text">৳</span>
                                                <input type="number" value="{{ $product->buying_price }}" class="form-control" id="buying_price" name="buying_price" />
                                            </div>
                                            @error('buying_price') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <label for="qty" class="form-label"><b>Stock Quantity <span class="text-danger">*</span></b></label>
                                            <input type="number" value="{{ $product->qty }}" class="form-control" id="qty" name="qty" />
                                            @error('qty') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="product_type" class="form-label"><b>Product Tag/Type <span class="text-danger">*</span></b></label>
                                            <select name="product_type" id="product_type" class="form-select form-control">
                                                <option value="" disabled>Select Type...</option>
                                                <option value="Hot" {{ $product->product_type == 'Hot' ? 'selected' : '' }}>🔥 Hot product</option>
                                                <option value="Discount" {{ $product->product_type == 'Discount' ? 'selected' : '' }}>🏷️ Discount product</option>
                                                <option value="New" {{ $product->product_type == 'New' ? 'selected' : '' }}>✨ New product</option>
                                                <option value="Regular" {{ $product->product_type == 'Regular' ? 'selected' : '' }}>📦 Regular product</option>
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
                                                @if ($product->size->isNotEmpty())
                                                    @foreach ($product->size as $singlesize)
                                                        <div class="input-group mb-2 dynamic-field">
                                                            <input type="text" class="form-control" value="{{ $singlesize->size_name }}" name="product_size[]" />
                                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" name="product_size[]" placeholder="e.g. XL, M, 42" />
                                                    </div>
                                                @endif
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-custom mt-1" id="add_size">
                                                <i class="fas fa-plus me-1"></i> Add More Size
                                            </button>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Product Colour <span class="text-muted">(Optional)</span></b></label>
                                            <div id="colour_fields_container">
                                                @if ($product->color->isNotEmpty())
                                                    @foreach ($product->color as $singlecolour)
                                                        <div class="input-group mb-2 dynamic-field">
                                                            <input type="text" class="form-control" value="{{ $singlecolour->color_name }}" name="product_colour[]" />
                                                            <button type="button" class="btn btn-danger remove-field"><i class="fas fa-times"></i></button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" name="product_colour[]" placeholder="e.g. Red, Black" />
                                                    </div>
                                                @endif
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-custom mt-1" id="add_colour">
                                                <i class="fas fa-plus me-1"></i> Add More Colour
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-section-title mt-4">
                                        <i class="fas fa-images me-1"></i> Media & Images
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Main Thumbnail Image</b></label>
                                            <div class="input-group mb-2">
                                                <input type="file" class="form-control" name="image" id="main_image_input" accept="image/*" />
                                                <label class="input-group-text" for="main_image_input">Upload New</label>
                                            </div>
                                            <div id="main_image_preview_container">
                                                @if($product->image)
                                                    <div class="d-inline-block text-center me-2">
                                                        <span class="badge bg-secondary d-block mb-1">Current</span>
                                                        <img src="{{ asset($product->image) }}" class="preview-img mt-0" alt="Main">
                                                    </div>
                                                @endif
                                            </div>
                                            @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><b>Product Gallery Images</b></label>
                                            <div class="input-group mb-2">
                                                <input type="file" class="form-control" name="gallery_image[]" id="gallery_image_input" accept="image/*" multiple />
                                                <label class="input-group-text" for="gallery_image_input">Upload Multi</label>
                                            </div>
                                            
                                            <div id="gallery_preview_container" class="d-flex flex-wrap align-items-end">
                                                @if($product->galaryimage->isNotEmpty())
                                                    @foreach ($product->galaryimage as $singleimage)
                                                        <div class="d-inline-block text-center me-2 mt-2">
                                                            <img src="{{ asset($singleimage->imagename) }}" class="preview-img" alt="Gallery">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-section-title mt-4">
                                        <i class="fas fa-file-alt me-1"></i> Detailed Description
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label for="summernote" class="form-label"><b>Product Details</b></label>
                                            <textarea name="description" id="summernote" cols="30" rows="10" class="form-control">{{ $product->description }}</textarea>
                                            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="summernote_two" class="form-label"><b>Product Policy / Return Terms</b></label>
                                            <textarea name="product_policy" id="summernote_two" cols="30" rows="10" class="form-control">{{ $product->product_policy }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer bg-white p-4 d-flex justify-content-end">
                                    <a href="{{ url('/product/product-manage') }}" class="btn btn-light btn-custom me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-success btn-custom px-5 font-weight-bold">
                                        <i class="fas fa-check-circle me-2"></i> Update Product
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
                tabsize: 2,
                height: 200
            });
            $('#summernote_two').summernote({
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

            // Remove Dynamic Field Functionality (Works for both existing and new rows)
            $(document).on('click', '.remove-field', function() {
                $(this).closest('.dynamic-field').remove();
            });

            // --- Live New Image Preview Features ---
            
            // Main Image Preview Update
            $('#main_image_input').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Append new preview beneath or replace
                        var newPreview = `
                            <div class="d-inline-block text-center me-2">
                                <span class="badge bg-primary d-block mb-1">New Selected</span>
                                <img src="${e.target.result}" class="preview-img mt-0">
                            </div>`;
                        $('#main_image_preview_container').append(newPreview);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Gallery Images Multiple Preview Update
            $('#gallery_image_input').change(function() {
                if (this.files) {
                    var filesAmount = this.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var newGallery = `
                                <div class="d-inline-block text-center me-2 mt-2">
                                    <span class="badge bg-primary d-block mb-1">New</span>
                                    <img src="${e.target.result}" class="preview-img mt-0">
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