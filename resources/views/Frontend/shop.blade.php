@extends('Frontend.Include.master')

@section('content')

<main>

    <section class="product-page-section py-4 py-md-5">
        <div class="container">

            <div class="row g-4">

                {{-- ==================== FILTER SIDEBAR ==================== --}}
                <div class="col-lg-3 col-md-4">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- Filter Header --}}
                        <div class="card-header bg-dark text-white border-0 p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0 fw-bold">
                                    <i class="fas fa-sliders-h me-2"></i>
                                    Filters
                                </h5>

                                <i class="fas fa-filter"></i>
                            </div>
                        </div>

                        <div class="card-body p-0">

                            {{-- Categories --}}
                            <div class="border-bottom">

                                <div class="d-flex align-items-center justify-content-between px-3 py-3">
                                    <span class="fw-bold text-dark">
                                        <i class="fas fa-th-large text-primary me-2"></i>
                                        Categories
                                    </span>

                                    <i class="fas fa-angle-down text-muted"></i>
                                </div>

                                <form
                                    class="px-3 pb-3"
                                    id="collapseOne"
                                    action=""
                                    method="GET"
                                >
                                    @csrf

                                    @foreach ($globalcategory as $category)

                                        <div class="form-check py-2">

                                            <input
                                                type="checkbox"
                                                onclick='categoryformsubmit()'
                                                value="{{ $category->id }}"
                                                id="cat_id"
                                                name="cat_id"
                                                class="form-check-input"
                                            >

                                            <label
                                                class="form-check-label text-muted"
                                                for="cat_id"
                                            >
                                                {{ $category->name }}
                                            </label>

                                        </div>

                                    @endforeach

                                </form>

                            </div>


                            {{-- Sub Categories --}}
                            <div>

                                <div class="d-flex align-items-center justify-content-between px-3 py-3">
                                    <span class="fw-bold text-dark">
                                        <i class="fas fa-list text-success me-2"></i>
                                        Sub Categories
                                    </span>

                                    <i class="fas fa-angle-down text-muted"></i>
                                </div>

                                <form
                                    class="px-3 pb-3"
                                    id="collapseTwo"
                                    action="{{ url('/product-shop ') }}"
                                    method="GET"
                                >
                                    @csrf

                                    @foreach ($globalsubcategory as $subcategory)

                                        <div class="form-check py-2">

                                            <input
                                                type="checkbox"
                                                value="{{ $subcategory->id }}"
                                                id="subcat_id"
                                                onclick='subcategoryformsubmit()'
                                                name="subcat_id"
                                                class="form-check-input"
                                            >

                                            <label
                                                class="form-check-label text-muted"
                                                for="subcat_id"
                                            >
                                                {{ $subcategory->name }}
                                            </label>

                                        </div>

                                    @endforeach

                                </form>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ==================== PRODUCTS ==================== --}}
                <div class="col-lg-9 col-md-8">

                    {{-- Products Header --}}
                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-body p-3 p-md-4">

                            <div class="d-flex align-items-center justify-content-between">

                                <div>
                                    <h3 class="h4 fw-bold text-dark mb-1">
                                        <i class="fas fa-store text-primary me-2"></i>
                                        Products
                                    </h3>

                                    <p class="text-muted small mb-0">
                                        Explore our available products
                                    </p>
                                </div>

                                <div class="text-end">

                                    <span class="text-muted small d-block mb-1">
                                        Total Products
                                    </span>

                                    <span class="badge bg-primary rounded-pill px-3 py-2">
                                        {{ $product->count() }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Product Grid --}}
                    <div class="row g-3 g-md-4">

                        @forelse ($product as $products)

                            <div class="col-6 col-xl-4 col-lg-4 col-sm-6">

                                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                                    {{-- ================= PRODUCT IMAGE ================= --}}
                                    <div class="position-relative bg-light">

                                        {{-- Product Type Badge --}}
                                        @if(!empty($products->product_type))

                                            <div
                                                class="position-absolute top-0 start-0 m-2"
                                                style="z-index: 2;"
                                            >
                                                <span class="badge bg-danger text-uppercase rounded-pill px-3 py-2">
                                                    {{ $products->product_type }}
                                                </span>
                                            </div>

                                        @endif


                                        {{-- Image Area --}}
                                        <a
                                            href="{{ url('/product-details/'.$products->slug) }}"
                                            class="d-block text-decoration-none"
                                        >

                                            <div
                                                class="ratio ratio-1x1 bg-light"
                                            >

                                                <img
                                                    src="{{ asset($products->image) }}"
                                                    alt="{{ $products->name }}"
                                                    class="img-fluid w-100 h-100"
                                                    style="object-fit: contain;"
                                                    loading="lazy"
                                                    onerror="this.onerror=null;this.src='https://via.placeholder.com/300x300?text=No+Image';"
                                                >

                                            </div>

                                        </a>

                                    </div>


                                    {{-- ================= PRODUCT INFO ================= --}}
                                    <div class="card-body p-3 d-flex flex-column">

                                        {{-- Product Name --}}
                                        <a
                                            href="{{ url('/product-details/'.$products->slug) }}"
                                            class="text-decoration-none text-dark fw-bold mb-2"
                                            title="{{ $products->name }}"
                                        >

                                            <div class="text-truncate">
                                                {{ $products->name }}
                                            </div>

                                        </a>


                                        {{-- Price --}}
                                        <div class="mb-3">

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


                                        {{-- Add to Cart --}}
                                         <form action="{{ url('/add-cart/'.$products->id) }}" method="POST" class="mt-auto">

                                @csrf

                                <button type="submit" class="btn btn-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm">

                                    <i class="fas fa-shopping-cart small"></i>
                                    Add to Cart

                                </button>

                                    </div>

                                </div>

                            </div>


                        @empty

                            {{-- Empty State --}}
                            <div class="col-12">

                                <div class="card border-0 shadow-sm rounded-4">

                                    <div class="card-body text-center py-5">

                                        <i class="bi bi-exclamation-circle text-warning display-4 d-block mb-3"></i>

                                        <h5 class="fw-bold text-dark mb-2">
                                            No Products Available right now!
                                        </h5>

                                        <p class="text-muted mb-0">
                                            Please try another category or sub category.
                                        </p>

                                    </div>

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


@push('script')

<script>

    function categoryformsubmit() {
        document.getElementById('collapseOne').submit();
    }

    function subcategoryformsubmit() {
        document.getElementById('collapseTwo').submit();
    }

</script>

@endpush