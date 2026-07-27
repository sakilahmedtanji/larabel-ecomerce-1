@extends('frontend.include.master')

@section('content')
    <main class="bg-light py-4">
        
        <!-- Home Slider Section -->
        <section class="home-slider-section mb-4">
            <div class="container">
                <div class="row g-3">
                    <!-- ক্যাটাগরি মেনু -->
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="card border-0 shadow-sm">
                            <ul class="list-group list-group-flush header__category-list rounded">
                                <li class="list-group-item header__category-list-item item-has-submenu p-3">
                                    <a href="{{url('/catagory-products')}}" class="text-decoration-none text-dark d-flex align-items-center gap-2 fw-medium">
                                        <img src="{{asset('frontend/assets/images/product.png')}}" alt="category" style="width: 20px; height: 20px;">
                                        Test Category
                                    </a>
                                    <ul class="header__nav-item-category-submenu list-unstyled ps-3 mt-2 small">
                                        <li class="header__category-submenu-item">
                                            <a href="{{url('/subcatagory-products')}}" class="text-decoration-none text-muted">
                                                Test Subcategory
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- মেইন স্লাইডার ব্যানার -->
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="home__slider-items-wrapper rounded overflow-hidden shadow-sm">
                            <div class="home__slider-item-outer">
                                <img src="{{asset('frontend/assets/images/slider.jpg')}}" alt="image" class="img-fluid w-100 h-100 object-cover" style="min-height: 250px; max-height: 400px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Slider Section -->
        <section class="categoris-slider-section mb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0 fw-bold text-dark">Categories</h2>
                </div>
                <div class="categoris-items-wrapper owl-carousel">
                    @foreach ($category as $item)
                        @php
                            // slug সরিয়ে id দিয়ে প্রোডাক্ট সংখ্যা কাউন্ট করা হলো
                            $loops = App\Models\Product::where('cat_id', $item->id)->count();
                        @endphp
                        <a href="{{url('/category-products/'.$item->slug)}}" class="text-decoration-none text-center d-block bg-white p-3 rounded shadow-sm mx-1 border text-dark">
                            <img src="{{ $item->image }}" alt="category" class="mx-auto mb-2 rounded-circle" style="width: 70px; height: 70px; object-fit: cover;" />
                            <h6 class="mb-1 text-truncate fw-bold">{{ $item->name }}</h6>
                            <span class="text-muted small d-block">{{ $loops }} items</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Banner Section -->
        <section class="banner-section mb-5">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="ratio ratio-21x9 rounded overflow-hidden shadow-sm">
                            <img src="{{asset('frontend/assets/images/banner.jpeg')}}" alt="banner image" class="img-fluid w-100 h-100 object-fit-cover" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="ratio ratio-21x9 rounded overflow-hidden shadow-sm">
                            <img src="{{asset('frontend/assets/images/banner.jpeg')}}" alt="banner image" class="img-fluid w-100 h-100 object-fit-cover" />
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="ratio ratio-21x9 rounded overflow-hidden shadow-sm">
                            <img src="{{asset('frontend/assets/images/banner.jpeg')}}" alt="banner image" class="img-fluid w-100 h-100 object-fit-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hot Products Section -->
        <section class="product-section mb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0 fw-bold text-dark">Hot Products</h2>
                    <a href="{{url('/type-products')}}" class="btn btn-sm btn-outline-dark px-3 rounded-pill">View All</a>
                </div>
                <div class="row g-3">
                    @foreach ($hotproducts as $product)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded overflow-hidden position-relative group">
                                <div class="position-relative overflow-hidden bg-white" style="height: 200px;">
                                    <a href="{{url('/product-details/'.$product->slug)}}" class="d-block w-100 h-100">
                                        <img src="{{ $product->image }}" alt="Product Image" class="w-100 h-100" style="object-fit: contain;" />
                                    </a>
                                    <span class="position-absolute top-2 start-2 badge bg-danger text-white px-2 py-1" style="font-size: 11px;">Hot</span>
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between bg-white border-top">
                                    <div>
                                        <a href="{{url('/product-details/'.$product->slug)}}" class="text-decoration-none text-dark d-block text-truncate fw-bold mb-1" style="font-size: 15px;">
                                            {{ $product->name }}
                                        </a>
                                        <div class="d-flex align-items-baseline gap-2 mb-3">
                                            <span class="text-danger fw-bold fs-5">{{ $product->discount_price ?? '300' }} Tk.</span>
                                            <span class="text-muted text-decoration-line-through small">{{ $product->regular_price ?? '400' }} Tk.</span>
                                        </div>
                                    </div>
                                    <a href="{{ url('/add-cart/'.$product->id) }}" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">
                                        <i class="fas fa-shopping-cart small"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- New Products Section -->
        <section class="product-section mb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0 fw-bold text-dark">New Products</h2>
                    <a href="/type-products" class="btn btn-sm btn-outline-dark px-3 rounded-pill">View All</a>
                </div>
                <div class="row g-3">
                    @foreach ($newproducts as $item)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded overflow-hidden position-relative">
                                <div class="position-relative overflow-hidden bg-white" style="height: 200px;">
                                    <a href="{{url('/product-details/'.$item->slug)}}" class="d-block w-100 h-100">
                                        <img src="{{$item->image}}" alt="Product Image" class="w-100 h-100" style="object-fit: contain;" />
                                    </a>
                                    <span class="position-absolute top-2 start-2 badge bg-warning text-dark px-2 py-1" style="font-size: 11px;">Discount</span>
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between bg-white border-top">
                                    <div>
                                        <a href="{{url('/product-details/'.$item->slug)}}" class="text-decoration-none text-dark d-block text-truncate fw-bold mb-1" style="font-size: 15px;">
                                            {{ $item->name }}
                                        </a>
                                        <div class="d-flex align-items-baseline gap-2 mb-3">
                                            <span class="text-danger fw-bold fs-5">{{ $item->discount_price ?? '300' }} Tk.</span>
                                            <span class="text-muted text-decoration-line-through small">{{ $item->regular_price ?? '400' }} Tk.</span>
                                        </div>
                                    </div>
                                    <a href="{{ url('/add-cart/'.$item->id) }}" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">
                                        <i class="fas fa-shopping-cart small"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Regular Products Section -->
        <section class="product-section mb-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0 fw-bold text-dark">Regular Products</h2>
                    <a href="/type-products" class="btn btn-sm btn-outline-dark px-3 rounded-pill">View All</a>
                </div>
                <div class="row g-3">
                    @foreach ($regularproducts as $regularproduct)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded overflow-hidden position-relative">
                                <div class="position-relative overflow-hidden bg-white" style="height: 200px;">
                                    <a href="{{url('/product-details/'.$regularproduct->slug)}}" class="d-block w-100 h-100">
                                        <img src="{{ $regularproduct->image }}" alt="Product Image" class="w-100 h-100" style="object-fit: contain;" />
                                    </a>
                                    @if($regularproduct->product_type)
                                        <span class="position-absolute top-2 start-2 badge bg-secondary text-white px-2 py-1" style="font-size: 11px;">{{ $regularproduct->product_type }}</span>
                                    @endif
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between bg-white border-top">
                                    <div>
                                        <a href="{{url('/product-details/'.$regularproduct->slug)}}" class="text-decoration-none text-dark d-block text-truncate fw-bold mb-1" style="font-size: 15px;">
                                            {{ $regularproduct->name }}
                                        </a>
                                        <div class="d-flex align-items-baseline gap-2 mb-3">
                                            <span class="text-danger fw-bold fs-5">{{ $regularproduct->discount_price }} Tk.</span>
                                            @if($regularproduct->regular_price)
                                                <span class="text-muted text-decoration-line-through small">{{ $regularproduct->regular_price }} Tk.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ url('/add-cart/'.$regularproduct->id) }}" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">
                                        <i class="fas fa-shopping-cart small"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Discount Products Section -->
        <section class="product-section mb-4">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h4 mb-0 fw-bold text-dark">Discount Products</h2>
                    <a href="/type-products" class="btn btn-sm btn-outline-dark px-3 rounded-pill">View All</a>
                </div>
                <div class="row g-3">
                    @foreach ($discountproducts as $item)
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded overflow-hidden position-relative">
                                <div class="position-relative overflow-hidden bg-white" style="height: 200px;">
                                    <a href="{{url('/product-details/'.$item->slug)}}" class="d-block w-100 h-100">
                                        <img src="{{ $item->image }}" alt="Product Image" class="w-100 h-100" style="object-fit: contain;" />
                                    </a>
                                    @if($item->product_type)
                                        <span class="position-absolute top-2 start-2 badge bg-success text-white px-2 py-1" style="font-size: 11px;">{{ $item->product_type }}</span>
                                    @endif
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between bg-white border-top">
                                    <div>
                                        <a href="{{url('/product-details/'.$item->slug)}}" class="text-decoration-none text-dark d-block text-truncate fw-bold mb-1" style="font-size: 15px;">
                                            {{ $item->name }}
                                        </a>
                                        <div class="d-flex align-items-baseline gap-2 mb-3">
                                            <span class="text-danger fw-bold fs-5">{{ $item->discount_price }} Tk.</span>
                                            @if($item->regular_price)
                                                <span class="text-muted text-decoration-line-through small">{{ $item->regular_price }} Tk.</span>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ url('/add-cart/'.$item->id) }}" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">
                                        <i class="fas fa-shopping-cart small"></i> Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
@endsection