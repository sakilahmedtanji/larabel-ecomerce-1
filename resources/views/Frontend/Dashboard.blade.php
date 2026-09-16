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
                            @foreach($globalcategory as $categorys)
                            <li class="list-group-item header__category-list-item item-has-submenu p-3">
                                <a href="{{url('/catagory-products/'.$categorys->slug)}}" class="text-decoration-none text-dark d-flex align-items-center gap-2 fw-medium">
                                    <img src="{{$categorys->image}}" alt="category" style="width: 20px; height: 20px;">
                                    {{$categorys->name}}
                                </a>
                                <ul class="header__nav-item-category-submenu list-unstyled ps-3 mt-2 small">
                                    @foreach($categorys->subcatagory as $subcategory)
                                    <li class="header__category-submenu-item">
                                        <a href="{{url('/subcatagory-products/'.$subcategory->slug)}}" class="text-decoration-none text-muted">
                                            {{$subcategory->name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
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
                <a href="{{url('/catagory-products/'.$item->slug)}}" class="text-decoration-none text-center d-block bg-white p-3 rounded shadow-sm mx-1 border text-dark">
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

            {{-- Section Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h4 fw-bold mb-1 text-dark">
                        <i class="fas fa-fire text-danger me-2"></i>
                        Hot Products
                    </h2>
                    <p class="text-muted small mb-0">
                        Our most popular products
                    </p>
                </div>

                <a href="{{ url('/type-products/hot') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                    View All
                    <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>


            {{-- Products --}}
            <div class="row g-3 g-md-4">

                @foreach ($hotproducts as $product)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- Product Image --}}
                        <div class="position-relative bg-light">

                            <a href="{{ url('/product-details/'.$product->slug) }}" class="d-flex align-items-center justify-content-center text-decoration-none">

                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid p-2" style="height: 200px; width: 100%; object-fit: contain;">

                            </a>

                            {{-- Hot Badge --}}
                            <span class="position-absolute top-0 start-0 m-2 badge rounded-pill bg-danger">
                                <i class="fas fa-fire me-1"></i>
                                Hot
                            </span>

                            {{-- Discount Badge --}}
                            @if($product->discount_price != null && $product->regular_price > 0)

                            @php
                            $discount = round(
                            (($product->regular_price - $product->discount_price)
                            / $product->regular_price) * 100
                            );
                            @endphp

                            <span class="position-absolute top-0 end-0 m-2 badge rounded-pill bg-dark">
                                -{{ $discount }}%
                            </span>

                            @endif

                        </div>


                        {{-- Product Details --}}
                        <div class="card-body p-3 d-flex flex-column">

                            {{-- Product Name --}}
                            <a href="{{ url('/product-details/'.$product->slug) }}" class="text-decoration-none text-dark fw-semibold mb-2">

                                {{ $product->name }}

                            </a>


                            {{-- Price --}}
                            <div class="mb-3">

                                @if($product->discount_price != null)

                                <div class="d-flex align-items-center gap-2 flex-wrap">

                                    <span class="text-danger fw-bold fs-5">
                                        {{ $product->discount_price }} Tk.
                                    </span>

                                    <span class="text-muted text-decoration-line-through small">
                                        {{ $product->regular_price }} Tk.
                                    </span>

                                </div>

                                @else

                                <span class="text-danger fw-bold fs-5">
                                    {{ $product->regular_price }} Tk.
                                </span>

                                @endif

                            </div>


                            {{-- Add To Cart --}}
                            <form action="{{ url('/add-cart/'.$product->id) }}" method="POST" class="mt-auto">

                                @csrf

                                <button type="submit" class="btn btn-dark w-100 rounded-pill">

                                    <i class="fas fa-shopping-cart me-1"></i>
                                    Add to Cart

                                </button>

                            </form>

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

            {{-- Section Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h4 fw-bold mb-1 text-dark">
                        <i class="fas fa-star text-warning me-2"></i>
                        New Products
                    </h2>

                    <p class="text-muted small mb-0">
                        Latest products in our collection
                    </p>
                </div>

                <a href="/type-products/new" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                    View All
                    <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>


            {{-- Products --}}
            <div class="row g-3 g-md-4">

                @foreach ($newproducts as $item)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- Product Image --}}
                        <div class="position-relative bg-light">

                            <a href="{{ url('/product-details/'.$item->slug) }}" class="d-flex align-items-center justify-content-center text-decoration-none">

                                <img src="{{ $item->image }}" alt="Product Image" class="img-fluid p-2" style="height: 200px; width: 100%; object-fit: contain;">

                            </a>

                            {{-- Discount Badge --}}
                            <span class="position-absolute top-0 start-0 m-2 badge rounded-pill bg-warning text-dark">
                                <i class="fas fa-tag me-1"></i>
                                New
                            </span>

                        </div>


                        {{-- Product Details --}}
                        <div class="card-body p-3 d-flex flex-column bg-white">

                            {{-- Product Name --}}
                            <a href="{{ url('/product-details/'.$item->slug) }}" class="text-decoration-none text-dark fw-semibold mb-2">

                                {{ $item->name }}

                            </a>


                            {{-- Price --}}
                            <div class="d-flex align-items-baseline gap-2 flex-wrap mb-3">

                                

                                 @if($item->discount_price != null)

                                <div class="d-flex align-items-center gap-2 flex-wrap">

                                    <span class="text-danger fw-bold fs-5">
                                        {{ $item->discount_price }} Tk.
                                    </span>

                                    <span class="text-muted text-decoration-line-through small">
                                        {{ $item->regular_price }} Tk.
                                    </span>

                                </div>

                                @else

                                <span class="text-danger fw-bold fs-5">
                                    {{ $item->regular_price }} Tk.
                                </span>

                                @endif

                            </div>


                            {{-- Add To Cart --}}
                            <form action="{{ url('/add-cart/'.$item->id) }}" method="POST" class="mt-auto">

                                @csrf

                                <button type="submit" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">

                                    <i class="fas fa-shopping-cart small"></i>
                                    Add to Cart

                                </button>

                            </form>

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

            {{-- Section Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h4 fw-bold mb-1 text-dark">
                        <i class="fas fa-box text-secondary me-2"></i>
                        Regular Products
                    </h2>

                    <p class="text-muted small mb-0">
                        Explore our regular products
                    </p>
                </div>

                <a href="/type-products/regular" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                    View All
                    <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>


            {{-- Products --}}
            <div class="row g-3 g-md-4">

                @foreach ($regularproducts as $regularproduct)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- Product Image --}}
                        <div class="position-relative bg-light">

                            <a href="{{ url('/product-details/'.$regularproduct->slug) }}" class="d-flex align-items-center justify-content-center text-decoration-none">

                                <img src="{{ $regularproduct->image }}" alt="Product Image" class="img-fluid p-2" style="height: 200px; width: 100%; object-fit: contain;">

                            </a>

                            {{-- Product Type --}}
                            @if($regularproduct->product_type)

                            <span class="position-absolute top-0 start-0 m-2 badge rounded-pill bg-secondary">
                                {{ $regularproduct->product_type }}
                            </span>

                            @endif

                        </div>


                        {{-- Product Details --}}
                        <div class="card-body p-3 d-flex flex-column bg-white">

                            {{-- Product Name --}}
                            <a href="{{ url('/product-details/'.$regularproduct->slug) }}" class="text-decoration-none text-dark fw-semibold mb-2">

                                {{ $regularproduct->name }}

                            </a>


                            {{-- Price --}}
                            <div class="d-flex align-items-baseline gap-2 flex-wrap mb-3">

                                @if($regularproduct->discount_price != null)

                                <div class="d-flex align-items-center gap-2 flex-wrap">

                                    <span class="text-danger fw-bold fs-5">
                                        {{ $regularproduct->discount_price }} Tk.
                                    </span>

                                    <span class="text-muted text-decoration-line-through small">
                                        {{ $regularproduct->regular_price }} Tk.
                                    </span>

                                </div>

                                @else

                                <span class="text-danger fw-bold fs-5">
                                    {{ $regularproduct->regular_price }} Tk.
                                </span>

                                @endif

                            </div>


                            {{-- Add To Cart --}}
                            <form action="{{ url('/add-cart/'.$regularproduct->id) }}" method="POST" class="mt-auto">

                                @csrf

                                <button type="submit" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">

                                    <i class="fas fa-shopping-cart small"></i>
                                    Add to Cart

                                </button>

                            </form>

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

            {{-- Section Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="h4 fw-bold mb-1 text-dark">
                        <i class="fas fa-tags text-success me-2"></i>
                        Discount Products
                    </h2>

                    <p class="text-muted small mb-0">
                        Grab your favorite products at discounted prices
                    </p>
                </div>

                <a href="/type-products/discount/discount" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                    View All
                    <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>


            {{-- Products --}}
            <div class="row g-3 g-md-4">

                @foreach ($discountproducts as $item)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- Product Image --}}
                        <div class="position-relative bg-light">

                            <a href="{{ url('/product-details/'.$item->slug) }}" class="d-flex align-items-center justify-content-center text-decoration-none">

                                <img src="{{ $item->image }}" alt="Product Image" class="img-fluid p-2" style="height: 200px; width: 100%; object-fit: contain;">

                            </a>

                            {{-- Product Type --}}
                            @if($item->product_type)

                            <span class="position-absolute top-0 start-0 m-2 badge rounded-pill bg-success">
                                {{ $item->product_type }}
                            </span>

                            @endif

                            {{-- Discount Badge --}}
                            <span class="position-absolute top-0 end-0 m-2 badge rounded-pill bg-danger">
                                <i class="fas fa-percent"></i>
                            </span>

                        </div>


                        {{-- Product Details --}}
                        <div class="card-body p-3 d-flex flex-column bg-white">

                            {{-- Product Name --}}
                            <a href="{{ url('/product-details/'.$item->slug) }}" class="text-decoration-none text-dark fw-semibold mb-2">

                                {{ $item->name }}

                            </a>


                            {{-- Price --}}
                            <div class="d-flex align-items-baseline gap-2 flex-wrap mb-3">

                                @if($item->discount_price != null)

                                <div class="d-flex align-items-center gap-2 flex-wrap">

                                    <span class="text-danger fw-bold fs-5">
                                        {{ $item->discount_price }} Tk.
                                    </span>

                                    <span class="text-muted text-decoration-line-through small">
                                        {{ $item->regular_price }} Tk.
                                    </span>

                                </div>

                                @else

                                <span class="text-danger fw-bold fs-5">
                                    {{ $item->regular_price }} Tk.
                                </span>

                                @endif

                            </div>


                            {{-- Add To Cart --}}
                            <form action="{{ url('/add-cart/'.$item->id) }}" method="POST" class="mt-auto">

                                @csrf

                                <button type="submit" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">

                                    <i class="fas fa-shopping-cart small"></i>
                                    Add to Cart

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>
    </section>

</main>
@endsection
