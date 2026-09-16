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

    <div class="col-6 col-md-4 col-lg-3 mb-4">

        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

            {{-- Product Image --}}
            <div class="position-relative bg-light">

                <a href="{{ url('/product-details/'.$products->slug) }}"
                   class="d-flex align-items-center justify-content-center text-decoration-none">

                    <img src="{{ asset($products->image) }}"
                         alt="{{ $products->name }}"
                         class="img-fluid p-2"
                         style="height: 240px; width: 100%; object-fit: contain;"
                         loading="lazy">

                </a>

                {{-- Product Type --}}
                @if(!empty($products->product_type))

                    <span class="position-absolute top-0 start-0 m-2 badge rounded-pill bg-danger text-uppercase">
                        {{ $products->product_type }}
                    </span>

                @endif

            </div>


            {{-- Product Information --}}
            <div class="card-body p-3 d-flex flex-column">

                <a href="{{ url('/product-details/'.$products->slug) }}"
                   class="text-decoration-none text-dark fw-semibold mb-2">

                    {{ $products->name }}

                </a>


                {{-- Price --}}
                <div class="d-flex align-items-center gap-2 flex-wrap mb-3">

                     @if($products->discount_price != null)

                                <div class="d-flex align-items-center gap-2 flex-wrap">

                                    <span class="text-danger fw-bold fs-5">
                                        {{ $products->discount_price }} Tk.
                                    </span>

                                    <span class="text-muted text-decoration-line-through small">
                                        {{ $products->regular_price }} Tk.
                                    </span>

                                </div>

                                @else

                                <span class="text-danger fw-bold fs-5">
                                    {{ $products->regular_price }} Tk.
                                </span>

                                @endif

                </div>


                {{-- Add To Cart --}}
                <form action="{{ url('/add-cart/'.$products->id) }}"
                      method="POST"
                      class="mt-auto">

                    @csrf

                    <button type="submit"
                            class="btn btn-primary w-100 rounded-pill fw-bold">

                        <i class="bi bi-cart-plus me-1"></i>
                        Add to Cart

                    </button>

                </form>

            </div>

        </div>

    </div>

@empty

    <div class="col-12">
        <div class="alert alert-warning text-center py-4">
            <i class="bi bi-exclamation-circle fs-1 d-block mb-2"></i>

            <h5 class="mb-0">
                No Products Available right now!
            </h5>
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