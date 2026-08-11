@extends('frontend.include.master')

@section('content')
    <main>
        <section class="product-page-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!-- Header Section -->
                            <div class="col-md-12 mb-4">
                                <div class="product-page-header-wrapper d-flex justify-content-between align-items-center p-3 rounded shadow-sm bg-white">
                                    <div class="left-side-box">
                                        <h4 class="title mb-0 fw-bold text-dark">
                                            Products
                                        </h4>
                                    </div>
                                    <div class="right-side-box">
                                        <h4 class="product-qty mb-0 fs-6 text-muted">
                                            Total Products: 
                                            <span class="number badge bg-primary fs-6 ms-1">{{ $product->count() }}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Loop -->
                            @forelse ($product as $products)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                    <div class="product__item-outer h-100 card border-0 shadow-sm rounded-3 overflow-hidden position-relative">
                                        
                                        <!-- Product Badge -->
                                        @if(!empty($products->product_type))
                                            <div class="product__type-badge-outer position-absolute top-0 start-0 m-2 z-index-1">
                                                <span class="product__type-badge-inner badge bg-danger text-uppercase px-2 py-1">
                                                    {{ $products->product_type }}
                                                </span>
                                            </div>
                                        @endif

                                        <!-- Product Image -->
                                        <div class="product__item-image-outer position-relative overflow-hidden text-center bg-light">
                                            <a href="{{ url('/product-details/'.$products->slug) }}" class="product__item-image-inner d-block">
                                                <img src="{{ asset($products->image) }}" 
                                                     alt="{{ $products->name }}" 
                                                     class="img-fluid w-100 object-fit-cover" 
                                                     style="height: 240px;"
                                                     loading="lazy"
                                                     onerror="this.onerror=null;this.src='https://via.placeholder.com/300x300?text=No+Image';" />
                                            </a>
                                            
                                            <!-- Add to Cart Button -->
                                            <div class="product__item-add-cart-btn-outer position-absolute bottom-0 start-0 end-0 p-2">
                                                <a href="{{ url('/add-cart/'.$products->id) }}" class="product__item-add-cart-btn-inner btn btn-primary btn-sm w-100 fw-bold shadow-sm">
                                                    <i class="bi bi-cart-plus me-1"></i> Add to Cart
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Product Info -->
                                        <div class="product__item-info-outer card-body d-flex flex-column justify-content-between p-3">
                                            <a href="{{ url('/product-details/'.$products->slug) }}" class="product__item-name text-decoration-none text-dark fw-bold mb-2 text-truncate" title="{{ $products->name }}">
                                                {{ $products->name }}
                                            </a>

                                            <!-- Price Section -->
                                            <div class="product__item-price-outer d-flex align-items-center gap-2">
                                                <div class="product__item-regular-price fw-bold text-primary fs-5">
                                                    <span>৳{{ $products->discount_price }}</span>
                                                </div>
                                                
                                                @if($products->regular_price && $products->regular_price > $products->discount_price)
                                                    <div class="product__item-discount-price text-muted text-decoration-line-through small">
                                                        <del>৳{{ $products->regular_price }}</del>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <!-- Empty State -->
                                <div class="col-12 py-5 text-center">
                                    <div class="alert alert-warning py-4 shadow-sm" role="alert">
                                        <i class="bi bi-exclamation-circle fs-1 d-block mb-2"></i>
                                        <h5 class="mb-0">No Products Available right now!</h5>
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </section>     
    </main>
@endsection