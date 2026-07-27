@extends('frontend.include.master')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .fw-black {
            font-weight: 900 !important;
        }

        .fw-extrabold {
            font-weight: 800 !important;
        }

        .fs-7 {
            font-size: 0.85rem !important;
        }

        .fs-8 {
            font-size: 0.75rem !important;
        }

        .transition-all {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* Swiper Slider Styling Customization */
        .swiper-main-container {
            width: 100%;
            height: auto;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            padding: 15px;
            border: 1px solid #dee2e6;
        }

        .swiper-slide-main img {
            max-height: 400px;
            width: 100%;
            object-fit: contain;
        }

        /* Thumbnail Slider Navigation */
        .swiper-thumb-container {
            margin-top: 12px;
            box-sizing: border-box;
        }

        .swiper-thumb-container .swiper-slide {
            width: 75px;
            height: 65px;
            opacity: 0.4;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .swiper-thumb-container .swiper-slide-thumb-active {
            opacity: 1;
        }

        .thumb-box-inner {
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 2px;
            background: #fff;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .swiper-slide-thumb-active .thumb-box-inner {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 2px rgba(220, 53, 69, 0.2);
        }

        /* Custom Navigation Buttons Positioning */
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 18px !important;
            font-weight: bold;
            color: #212529;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background: rgba(255, 255, 255, 0.8);
            width: 36px !important;
            height: 36px !important;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Category Hover Animation */
        .category-item-link:hover {
            background-color: #ffffff !important;
            border-color: #dee2e6 !important;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .category-item-link:hover .arrow-target {
            opacity: 1 !important;
            transform: translateX(-2px);
        }

        /* Interactive Hover Up effect for Call to Actions */
        .hover-up:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .text-nowrap {
            white-space: nowrap !important;
        }

        .btn:focus,
        .btn-link:focus {
            box-shadow: none !important;
            outline: none !important;
        }

        /* Pulse Animation for Quick Order Button */
        .pulse-animation {
            animation: pulse-glow 2.5s infinite;
        }

        @keyframes pulse-glow {
            0% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.5);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(220, 53, 69, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
            }
        }

        .product-details-info .nav-tabs .nav-link {
            color: #495057;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            margin-bottom: -1px;
        }

        .product-details-info .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #212529;
            border-color: #212529;
        }

        /* Fix Layout Breaking for Long Names/More Items */
        .product-options-container {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 24px;
        }

        .custom-swatch-wrapper,
        .custom-chip-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 6px;
        }

        .custom-swatch-option .btn,
        .custom-chip-option .btn {
            white-space: nowrap !important;
            min-width: 65px;
            text-align: center;
        }

        /* Review Section Custom Styling */
        .review-wrapper-box {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            background-color: #fff;
        }

        .review-user-img {
            width: 54px;
            height: 54px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .review-user-placeholder {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background-color: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            flex-shrink: 0;
        }
    </style>

    <main class="py-5 bg-light" style="background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);">
        <section class="product-details-section">
            <div class="container">
                
                {{-- মেইন সেফটি কন্ডিশন: প্রোডাক্ট থাকলে পেজ লোড হবে, না থাকলে এরর আসবে না --}}
                @if($product)
                <div class="row g-4">

                    <!-- Product Main Body -->
                    <div class="col-lg-9 col-md-12">
                        <div class="card border-0 shadow-sm p-4 bg-white rounded-4 mb-4">
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <div class="product-images-wrapper">
                                        <div class="product-images-slider-outer">

                                            <div class="swiper swiper-main-container">
                                                <div class="swiper-wrapper">
                                                    @if($product->galaryimage)
                                                        @foreach ($product->galaryimage as $image)
                                                            <div class="swiper-slide swiper-slide-main">
                                                                <img src="{{ asset($image->imagename) }}" alt="{{ $product->name }}">
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>

                                            <div class="swiper swiper-thumb-container">
                                                <div class="swiper-wrapper">
                                                    @if($product->galaryimage)
                                                        @foreach ($product->galaryimage as $image)
                                                            <div class="swiper-slide">
                                                                <div class="thumb-box-inner">
                                                                    <img src="{{ asset($image->imagename) }}" class="img-fluid" alt="thumbnail">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="product-details-content ps-md-3">

                                        <nav aria-label="breadcrumb" class="mb-3">
                                            <ol class="breadcrumb mb-0 px-0 bg-transparent text-uppercase tracking-wider fs-7">
                                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted fw-semibold">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted fw-semibold">{{ $product->cat_id }}</a></li>
                                                <li class="breadcrumb-item active text-danger fw-bold" aria-current="page">{{ $product->name }}</li>
                                            </ol>
                                        </nav>

                                        <h1 class="h2 fw-extrabold text-dark mb-2 tracking-tight">{{ $product->name }}</h1>

                                        <div class="d-flex align-items-center gap-2 mb-3">
                                            <div class="text-warning small">
                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="text-muted small fw-medium">({{ count($product->review) }} Customer Review)</span>
                                            <span class="text-success small fw-bold ms-2"><i class="fas fa-check-circle me-1"></i>In Stock</span>
                                        </div>

                                        <div class="d-flex align-items-baseline gap-3 bg-light p-3 rounded-3 mb-4 border border-dashed">
                                            <span class="fs-2 fw-black text-danger">{{ $product->discount_price }} Tk.</span>
                                            <span class="text-muted text-decoration-line-through fs-5">{{ $product->regular_price }} Tk.</span>
                                        </div>

                                        <form action="{{ url('/add-to-cart/'.$product->id) }}" method="POST" id="premiumPurchaseForm">
                                            @csrf

                                            <div class="product-options-container">
                                                <div class="color-block">
                                                    <label class="form-label fw-bold text-dark small text-uppercase tracking-wider">Color:</label>
                                                    <div class="custom-swatch-wrapper">
                                                        @foreach ($product->color as $item)
                                                            <div class="custom-swatch-option">
                                                                <input type="radio" name="color" id="color_{{ $loop->index }}" value="{{ $item->color_name }}" class="btn-check" {{ $loop->first ? 'checked' : '' }} autocomplete="off">
                                                                <label for="color_{{ $loop->index }}" class="btn btn-sm btn-outline-danger px-4 rounded-pill fw-semibold shadow-sm">{{ $item->color_name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="size-block">
                                                    <label class="form-label fw-bold text-dark small text-uppercase tracking-wider">Size:</label>
                                                    <div class="custom-chip-wrapper">
                                                        @foreach ($product->size as $item)
                                                            <div class="custom-chip-option">
                                                                <input type="radio" name="size" id="size_{{ $loop->index }}" value="{{ $item->size_name }}" class="btn-check" {{ $loop->first ? 'checked' : '' }} autocomplete="off">
                                                                <label for="size_{{ $loop->index }}" class="btn btn-sm btn-outline-dark px-4 rounded-pill fw-semibold shadow-sm">{{ $item->size_name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center gap-3 mb-4 w-100">
                                                <div class="d-flex align-items-center border border-2 rounded-pill bg-white px-2 shadow-sm" style="height: 52px; min-width: 130px; max-width: 140px;">
                                                    <button type="button" class="btn btn-link text-dark text-decoration-none px-2 py-0 border-0 m-0 decrement-btn shadow-none">
                                                        <i class="fas fa-minus fs-7"></i>
                                                    </button>
                                                    <input type="number" readonly name="qty" class="form-control text-center border-0 fw-bold p-0 bg-transparent fs-5 m-0" value="1" min="1" id="qty" style="box-shadow: none; max-width: 45px; pointer-events: none;">
                                                    <button type="button" class="btn btn-link text-dark text-decoration-none px-2 py-0 border-0 m-0 increment-btn shadow-none">
                                                        <i class="fas fa-plus fs-7"></i>
                                                    </button>
                                                </div>

                                                <div class="d-flex gap-2 flex-grow-1 align-items-center" style="min-width: 280px;">
                                                    <button type="submit" name="action" value="addToCart" id="addToCart" class="btn btn-outline-dark fw-bold rounded-pill shadow-sm hover-up text-uppercase fs-7 tracking-wider transition-all d-flex align-items-center justify-content-center gap-2 w-100 text-nowrap" style="height: 52px; flex: 1;">
                                                        <i class="fas fa-shopping-bag"></i>
                                                        <span>Add To Cart</span>
                                                    </button>

                                                    <button type="submit" name="action" value="buyNow" id="buyNow" class="btn btn-danger fw-bold rounded-pill shadow-md hover-up pulse-animation text-uppercase fs-7 tracking-wider transition-all d-flex align-items-center justify-content-center gap-2 w-100 text-nowrap" style="height: 52px; flex: 1;">
                                                        <i class="fas fa-bolt"></i>
                                                        <span>Quick Order</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        <a href="tel:01767799476" class="hotline-box border-0 text-start d-flex align-items-center justify-content-between p-3 rounded-4 shadow-sm text-decoration-none text-white transition-all mb-2" style="background: linear-gradient(135deg, #232526 0%, #414345 100%);">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-white bg-opacity-20 rounded-circle p-2 me-3">
                                                    <i class="fas fa-phone-alt text-white"></i>
                                                </div>
                                                <div>
                                                    <small class="text-white-50 d-block fs-8 text-uppercase tracking-wider">Quick Order Support</small>
                                                    <span class="fw-bold fs-6">Call : 01767799476</span>
                                                </div>
                                            </div>
                                            <i class="fas fa-arrow-right text-white-50"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Info Tabs -->
                            <div class="product-details-info mt-5">
                                <ul class="nav nav-tabs border-bottom gap-2" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active border-0 px-4 py-2.5 fw-bold rounded-top-4 text-uppercase tracking-wide fs-7" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link border-0 px-4 py-2.5 fw-bold rounded-top-4 text-uppercase tracking-wide fs-7" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review" aria-selected="false">Reviews ({{ count($product->review) }})</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link border-0 px-4 py-2.5 fw-bold rounded-top-4 text-uppercase tracking-wide fs-7" id="pills-policy-tab" data-bs-toggle="pill" data-bs-target="#pills-policy" type="button" role="tab" aria-controls="pills-policy" aria-selected="false">Product Policy</button>
                                    </li>
                                </ul>

                                <div class="tab-content border border-top-0 rounded-bottom-4 p-4 bg-white shadow-inner" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                        <p class="text-muted lh-lg mb-0 fs-6">{!! $product->description !!}</p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        @forelse($product->review as $review)
                                            <div class="review-wrapper-box d-flex align-items-start gap-3">
                                                @if ($review->image != null)
                                                    <img src="{{ asset($review->image) }}" class="review-user-img border" alt="Customer Image">
                                                @else
                                                    <div class="review-user-placeholder">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                                
                                                <div class="review-item-right flex-grow-1">
                                                    <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2">
                                                        <h5 class="review-author-name mb-0 fw-bold text-dark fs-6">
                                                            {{ $review->customer_name }}
                                                            <span class="badge bg-success ms-2 rounded-pill px-2 py-1 fs-8">
                                                                <i class="fas fa-check me-1"></i>Verified Buyer
                                                            </span>
                                                        </h5>
                                                        <span class="review-item-rating-stars text-warning small">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->ratting)
                                                                    <i class="fas fa-star"></i>
                                                                @else
                                                                    <i class="far fa-star text-muted opacity-50"></i>
                                                                @endif
                                                            @endfor
                                                        </span>
                                                    </div>
                                                    <p class="review-item-message text-muted small mb-0 lh-base">{{ $review->comment }}</p>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center py-4 text-muted">
                                                <i class="fas fa-comment-slash fs-3 mb-2 d-block opacity-50"></i>
                                                <p class="mb-0 small">No reviews yet for this product.</p>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="tab-pane fade" id="pills-policy" role="tabpanel" aria-labelledby="pills-policy-tab">
                                        <p class="text-muted lh-lg mb-0 fs-6">{!! $product->product_policy !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar: FIXED and SMOOTH Categories -->
                    <div class="col-lg-3 col-md-12">
                        <div class="card border-0 shadow-sm p-4 bg-white rounded-4 sticky-top" style="top: 24px; z-index: 10;">
                            <h4 class="h5 fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center justify-content-between">
                                <span>Browse Categories</span>
                                <i class="fas fa-th-large fs-7 text-muted"></i>
                            </h4>
                            
                            <div class="product-details-categories d-flex flex-column gap-2">
                                @foreach ($detailscategory as $item)
                                    <a href="{{ url('/product-details/' . $item->id) }}"
                                        class="category-item-link d-flex align-items-center gap-3 p-2 rounded-3 text-decoration-none text-dark bg-light transition-all border border-transparent">
                                        <img src="{{ asset($item->image) }}"
                                            class="rounded bg-white border object-fit-contain p-1 shadow-sm"
                                            alt="Category Image" style="width: 40px; height: 40px; flex-shrink: 0;">
                                        
                                        <span class="fw-semibold text-secondary small text-truncate" style="flex-grow: 1;">
                                            {{ $item->name }}
                                        </span>
                                        
                                        <i class="fas fa-chevron-right text-muted fs-8 opacity-0 arrow-target transition-all"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                @else
                    {{-- প্রোডাক্ট আইডি খুঁজে না পাওয়া গেলে সুন্দর একটি এলার্ট দেখাবে --}}
                    <div class="text-center py-5">
                        <div class="alert alert-warning py-4 shadow-sm rounded-4">
                            <i class="fas fa-exclamation-triangle fs-2 mb-2 d-block text-warning"></i>
                            <h4 class="fw-bold">Product Not Found!</h4>
                            <p class="text-muted mb-0">The product you are looking for might have been deleted or is currently unavailable.</p>
                            <a href="{{ url('/') }}" class="btn btn-dark rounded-pill mt-3 px-4 fw-bold">Back to Home</a>
                        </div>
                    </div>
                @endif
                
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiperThumbs = new Swiper(".swiper-thumb-container", {
                spaceBetween: 10,
                slidesPerView: "auto",
                freeMode: true,
                watchSlidesProgress: true,
            });

            var swiperMain = new Swiper(".swiper-main-container", {
                spaceBetween: 10,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiperThumbs,
                },
                grabCursor: true,
                autoHeight: false
            });
        });
    </script>
@endsection

@push('script')
    <script>
        let qtybutton = document.getElementById('qty');
        let plusbutton = document.querySelector('.increment-btn');
        let minusbutton = document.querySelector('.decrement-btn');

        if(plusbutton && minusbutton && qtybutton) {
            plusbutton.addEventListener('click', function() {
                if (parseInt(qtybutton.value) < 5) {
                    qtybutton.value = parseInt(qtybutton.value) + 1;
                }
            });
            minusbutton.addEventListener('click',function(){
                if(parseInt(qtybutton.value) > 1){
                    qtybutton.value = parseInt(qtybutton.value)-1;
                }
            });
        }
    </script>
@endpush