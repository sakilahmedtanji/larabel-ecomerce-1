@extends('Frontend.Include.master')

@section('content')

<main>

    {{-- =========================================================
         PRODUCT DETAILS
         ========================================================= --}}

    <section class="product-details-section py-3 py-md-4 py-lg-5">

        <div class="container">

            <div class="row g-3 g-md-4">

                {{-- =================================================
                     MAIN PRODUCT
                     ================================================= --}}

                <div class="col-12 col-lg-9">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-2 p-sm-3 p-md-4">

                            <div class="row g-3 g-md-4">

                                {{-- ================= PRODUCT IMAGE ================= --}}

                                <div class="col-12 col-md-7">

                                    <div
                                        class="product-images-slider-outer w-100"
                                        style="min-width:0;"
                                    >

                                        {{-- MAIN SLIDER --}}
                                        <div
                                            class="slider slider-content w-100"
                                            style="min-width:0;"
                                        >

                                            @foreach($product->galaryimage as $galary)

                                                <div class="px-1">

                                                    <div
                                                        class="bg-light rounded-3 overflow-hidden d-flex align-items-center justify-content-center w-100"
                                                    >

                                                        <img
                                                            src="{{ $galary->imagename }}"
                                                            alt="slider images"
                                                            class="img-fluid w-100 h-auto d-block"
                                                            style="object-fit:contain;"
                                                        >

                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>


                                        {{-- THUMB SLIDER --}}
                                        <div
                                            class="slider slider-thumb mt-2 mt-md-3 w-100"
                                            style="min-width:0;"
                                        >

                                            @foreach($product->galaryimage as $galary)

                                                <div class="px-1">

                                                    <div
                                                        class="border bg-light rounded-3 overflow-hidden"
                                                    >

                                                        <img
                                                            src="{{ $galary->imagename }}"
                                                            alt="slider images"
                                                            class="img-fluid w-100 h-auto d-block"
                                                            style="object-fit:contain;"
                                                        >

                                                    </div>

                                                </div>

                                            @endforeach

                                        </div>

                                    </div>

                                </div>


                                {{-- ================= PRODUCT INFO ================= --}}

                                <div class="col-12 col-md-5">

                                    <div class="product-details-content">

                                        {{-- PRODUCT NAME --}}
                                        <h3 class="product-name fw-bold text-dark mb-2 mb-md-3">
                                            {{ $product->name }}
                                        </h3>


                                        {{-- PRICE --}}
                                        <div class="product-price mb-3 mb-md-4">

                                            @if($product->discount_price != null)

                                                <div class="d-flex align-items-center flex-wrap gap-2">

                                                    <span class="fw-bold text-danger fs-3">
                                                        {{ $product->discount_price }} Tk.
                                                    </span>

                                                    <span class="text-muted">
                                                        <del>
                                                            {{ $product->regular_price }} Tk.
                                                        </del>
                                                    </span>

                                                </div>

                                            @else

                                                <span class="fw-bold text-danger fs-3">
                                                    {{ $product->regular_price }} Tk.
                                                </span>

                                            @endif

                                        </div>


                                        {{-- CART FORM --}}
                                        <form
                                            action="{{ url('/add-cart/'.$product->id) }}"
                                            method="POST"
                                        >

                                            @csrf


                                            {{-- ================= COLOR ================= --}}

                                            @if($product->color->count() > 0)

                                                <div class="product-details-select-items-wrap mb-3 mb-md-4">

                                                    <div class="mb-2">

                                                        <strong>
                                                            Color:
                                                        </strong>

                                                    </div>

                                                    <div class="d-flex flex-wrap gap-2">

                                                        @foreach ($product->color as $singleColor)

                                                            <div class="product-details-select-item-outer">

                                                                <input
                                                                    type="radio"
                                                                    name="color"
                                                                    id="color_{{ $singleColor->id }}"
                                                                    value="{{ $singleColor->color_name }}"
                                                                    class="category-item-radio"
                                                                    required
                                                                >

                                                                <label
                                                                    for="color_{{ $singleColor->id }}"
                                                                    class="category-item-label"
                                                                >
                                                                    {{ $singleColor->color_name }}
                                                                </label>

                                                            </div>

                                                        @endforeach

                                                    </div>

                                                </div>

                                            @endif


                                            {{-- ================= SIZE ================= --}}

                                            @if($product->size->count() > 0)

                                                <div class="product-details-select-items-wrap mb-3 mb-md-4">

                                                    <div class="mb-2">

                                                        <strong>
                                                            Size:
                                                        </strong>

                                                    </div>

                                                    <div class="d-flex flex-wrap gap-2">

                                                        @foreach ($product->size as $singleSize)

                                                            <div class="product-details-select-item-outer">

                                                                <input
                                                                    type="radio"
                                                                    name="size"
                                                                    id="size_{{ $singleSize->id }}"
                                                                    value="{{ $singleSize->size_name }}"
                                                                    class="category-item-radio"
                                                                    required
                                                                >

                                                                <label
                                                                    for="size_{{ $singleSize->id }}"
                                                                    class="category-item-label"
                                                                >
                                                                    {{ $singleSize->size_name }}
                                                                </label>

                                                            </div>

                                                        @endforeach

                                                    </div>

                                                </div>

                                            @endif


                                            {{-- ================= QUANTITY ================= --}}

                                            <div class="purchase-info-outer">

                                                <div
                                                    class="product-incremnt-decrement-outer"
                                                    style="display:block;"
                                                >

                                                    <div class="d-flex align-items-center gap-2">

                                                        <a
                                                            href="javascript:void(0)"
                                                            title="Decrement"
                                                            class="decrement-btn btn btn-outline-success rounded-circle d-flex align-items-center justify-content-center p-0 flex-shrink-0"
                                                            style="width:38px;height:38px;"
                                                        >
                                                            <i class="fas fa-minus"></i>
                                                        </a>


                                                        <input
                                                            type="number"
                                                            readonly
                                                            name="qty"
                                                            placeholder="Qty"
                                                            value="1"
                                                            min="1"
                                                            id="qty"
                                                            class="form-control text-center fw-bold border-success"
                                                            style="width:75px;height:50px;"
                                                        >


                                                        <a
                                                            href="javascript:void(0)"
                                                            title="Increment"
                                                            class="increment-btn btn btn-outline-success rounded-circle d-flex align-items-center justify-content-center p-0 flex-shrink-0"
                                                            style="width:38px;height:38px;"
                                                        >
                                                            <i class="fas fa-plus"></i>
                                                        </a>

                                                    </div>

                                                </div>


                                                {{-- ================= BUTTONS ================= --}}

                                                <div class="row g-2 mt-3">

                                                    <div class="col-12 col-sm-6">

                                                        <button
                                                            type="submit"
                                                            name="action"
                                                            value="addToCart"
                                                            id="addToCart"
                                                            class="cart-btn-inner btn btn-success w-100 fw-bold py-2"
                                                        >

                                                            <i class="fas fa-shopping-cart me-1"></i>

                                                            Add to Cart

                                                        </button>

                                                    </div>


                                                    <div class="col-12 col-sm-6">

                                                        <button
                                                            type="submit"
                                                            name="action"
                                                            value="buyNow"
                                                            id="buyNow"
                                                            class="cart-btn-inner btn btn-success w-100 fw-bold py-2"
                                                        >

                                                            <i class="fas fa-truck me-1"></i>

                                                            Quick Order

                                                        </button>

                                                    </div>

                                                </div>

                                            </div>

                                        </form>


                                        {{-- ================= HOTLINE ================= --}}

                                        <button
                                            type="button"
                                            class="product-details-hot-line btn btn-success w-100 mt-2 mt-md-3 py-2 fw-bold"
                                        >

                                            <i class="fas fa-phone-alt me-1"></i>

                                            For Call : 0123456854

                                        </button>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                 PRODUCT INFORMATION
                                 ================================================= --}}

                            <div class="product-details-info mt-4 mt-md-5">

                                <div class="card border rounded-4">

                                    <div class="card-body p-2 p-sm-3 p-md-4">

                                        <ul
                                            class="nav nav-pills nav-fill gap-1 gap-md-2 mb-3 mb-md-4"
                                            id="pills-tab"
                                            role="tablist"
                                        >

                                            {{-- DESCRIPTION --}}
                                            <li
                                                class="nav-item"
                                                role="presentation"
                                            >

                                                <button
                                                    class="nav-link active fw-semibold"
                                                    id="pills-description-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-description"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="pills-description"
                                                    aria-selected="true"
                                                >
                                                    Description
                                                </button>

                                            </li>


                                            {{-- REVIEW --}}
                                            <li
                                                class="nav-item"
                                                role="presentation"
                                            >

                                                <button
                                                    class="nav-link fw-semibold"
                                                    id="pills-review-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-review"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="pills-review"
                                                    aria-selected="false"
                                                >
                                                    Review
                                                </button>

                                            </li>


                                            {{-- POLICY --}}
                                            <li
                                                class="nav-item"
                                                role="presentation"
                                            >

                                                <button
                                                    class="nav-link fw-semibold"
                                                    id="pills-policy-tab"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#pills-policy"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="pills-policy"
                                                    aria-selected="false"
                                                >
                                                    Product Policy
                                                </button>

                                            </li>

                                        </ul>


                                        <div
                                            class="tab-content"
                                            id="pills-tabContent"
                                        >

                                            {{-- DESCRIPTION --}}
                                            <div
                                                class="tab-pane fade show active"
                                                id="pills-description"
                                                role="tabpanel"
                                                aria-labelledby="pills-description-tab"
                                            >

                                                <div class="bg-light rounded-3 p-3 p-md-4 text-muted">

                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                    Officiis minus, ut unde laudantium accusamus odio nam officia
                                                    aperiam excepturi quis nesciunt eveniet eligendi, corrupti
                                                    voluptatibus. Similique doloremque velit optio aliquam.

                                                </div>

                                            </div>


                                            {{-- REVIEW --}}
                                            <div
                                                class="tab-pane fade"
                                                id="pills-review"
                                                role="tabpanel"
                                                aria-labelledby="pills-review-tab"
                                            >

                                                <div class="border rounded-3 p-3 p-md-4">

                                                    <div class="d-flex gap-3">

                                                        <div class="flex-shrink-0">

                                                            <div
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                                                style="width:48px;height:48px;"
                                                            >

                                                                <i class="fas fa-user text-secondary"></i>

                                                            </div>

                                                        </div>


                                                        <div class="min-width-0">

                                                            <h5 class="review-author-name fw-bold mb-2">

                                                                Saidul Islam

                                                                <span class="badge bg-danger ms-1">
                                                                    Verified
                                                                </span>

                                                            </h5>


                                                            <p class="review-item-message text-muted mb-2">

                                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                                Officiis minus, ut unde laudantium accusamus odio nam officia
                                                                aperiam excepturi quis nesciunt eveniet eligendi.

                                                            </p>


                                                            <span class="review-item-rating-stars text-warning">

                                                                <i class="fa-star fas"></i>
                                                                <i class="fa-star fas"></i>
                                                                <i class="fa-star fas"></i>
                                                                <i class="fa-star fas"></i>
                                                                <i class="fa-star fas"></i>

                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            {{-- POLICY --}}
                                            <div
                                                class="tab-pane fade"
                                                id="pills-policy"
                                                role="tabpanel"
                                                aria-labelledby="pills-policy-tab"
                                            >

                                                <div class="bg-light rounded-3 p-3 p-md-4 text-muted">

                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                                    Officiis minus, ut unde laudantium accusamus odio nam officia
                                                    aperiam excepturi quis nesciunt eveniet eligendi.

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     CATEGORY SIDEBAR
                     ================================================= --}}

                <div class="col-12 col-lg-3">

                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                        <div class="card-header bg-success text-white border-0 p-3">

                            <h5 class="mb-0 fw-bold">

                                <i class="fas fa-th-large me-2"></i>

                                Category

                            </h5>

                        </div>


                        <div class="card-body p-2">

                            @foreach($detailscategory as $cat)

                                <a
                                    href="{{ url('/catagory-products/'.$cat->slug) }}"
                                    class="category-item-outer d-flex align-items-center gap-2 gap-sm-3 text-decoration-none text-dark p-2 rounded-3 mb-1"
                                >

                                    <img
                                        src="{{$cat->image}}"
                                        alt="category image"
                                        class="rounded-3 flex-shrink-0"
                                        style="width:55px;height:55px;object-fit:cover;"
                                    >

                                    <span class="fw-semibold text-truncate">
                                        {{ $cat->name }}
                                    </span>

                                </a>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =============================================================
         RELATED PRODUCTS
         ============================================================= --}}

    <section class="py-4 py-md-5 bg-light">

        <div class="container">

            <div class="mb-3 mb-md-4">

                <h2 class="fw-bold mb-1 text-dark h3">
                    Related Products
                </h2>

                <p class="text-muted mb-0">
                    You may also like these products
                </p>

            </div>


            <div class="row g-2 g-sm-3 g-md-4">

                @forelse ($related as $products)

                    <div class="col-6 col-md-4 col-lg-3">

                        <div class="card h-100 border-0 shadow-sm rounded-3 rounded-md-4 overflow-hidden">

                            {{-- PRODUCT IMAGE --}}
                            <div class="position-relative bg-white">

                                @if(!empty($products->product_type))

                                    <div
                                        class="position-absolute top-0 start-0 m-2"
                                        style="z-index:2;"
                                    >

                                        <span class="badge bg-danger text-uppercase rounded-pill px-2 px-sm-3 py-2">
                                            {{ $products->product_type }}
                                        </span>

                                    </div>

                                @endif


                                <a
                                    href="{{ url('/product-details/'.$products->slug) }}"
                                    class="d-block text-decoration-none"
                                >

                                    <img
                                        src="{{ asset($products->image) }}"
                                        alt="{{ $products->name }}"
                                        class="img-fluid w-100 d-block"
                                        style="aspect-ratio:1/1;object-fit:contain;"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.src='https://via.placeholder.com/300x300?text=No+Image';"
                                    >

                                </a>

                            </div>


                            {{-- PRODUCT INFO --}}
                            <div class="card-body p-2 p-sm-3 d-flex flex-column">

                                <a
                                    href="{{ url('/product-details/'.$products->slug) }}"
                                    class="text-decoration-none text-dark fw-bold mb-2"
                                    title="{{ $products->name }}"
                                >

                                    <div class="text-truncate">
                                        {{ $products->name }}
                                    </div>

                                </a>


                                <div class="mb-2 mb-sm-3">

                                    <div class="d-flex align-items-center gap-1 gap-sm-2 flex-wrap">

                                        <span class="text-danger fw-bold fs-6 fs-sm-5">

                                            ৳{{ $products->discount_price }}

                                        </span>


                                        @if($products->regular_price && $products->regular_price > $products->discount_price)

                                            <span class="text-muted small">

                                                <del>
                                                    ৳{{ $products->regular_price }}
                                                </del>

                                            </span>

                                        @endif

                                    </div>

                                </div>


                                <div class="mt-auto">

                                    <a
                                        href="{{ url('/add-cart/'.$products->id) }}"
                                        class="btn btn-primary w-100 fw-bold rounded-pill shadow-sm py-2"
                                    >

                                        <i class="bi bi-cart-plus me-1"></i>

                                        <span class="d-none d-sm-inline">
                                            Add to Cart
                                        </span>

                                        <span class="d-inline d-sm-none">
                                            Cart
                                        </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>


                @empty

                    <div class="col-12">

                        <div class="card border-0 shadow-sm rounded-4">

                            <div class="card-body text-center py-5">

                                <i
                                    class="bi bi-exclamation-circle text-warning display-4 d-block mb-3"
                                ></i>

                                <h5 class="mb-0 fw-bold">
                                    No Products Available right now!
                                </h5>

                            </div>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

</main>

@endsection