@extends('frontend.include.master')

@section('content')
    <main class="bg-light py-5">
        <section class="cart-products-section">
            <div class="container">
                <a href="{{ url('/') }}" class="btn btn-outline-dark rounded-pill px-4 mb-4 continue-shopping-btn">
                    <i class="fas fa-long-arrow-alt-left me-2"></i>
                    Continue Shopping
                </a>
                
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-white p-3">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr class="text-uppercase fs-7 tracking-wider text-muted">
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Remove</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartdetailsall as $user)
                                    @php
                                        // প্রোডাক্ট ডিলিট বা ইনঅ্যাক্টিভ আছে কি না চেক করার মেইন লজিক
                                        $isProductAvailable = $user->product && ($user->product->status == 'active' || $user->product->status == 1);
                                    @endphp
                                    <tr>
                                        <td class="cart-product-image-outer">
                                            @if($isProductAvailable)
                                                <img src="{{ asset($user->product->image) }}" class="rounded object-fit-contain border" height="70" width="100" alt="product">
                                            @else
                                                <img src="{{ asset('frontend/assets/images/product.png') }}" class="rounded object-fit-contain border opacity-50" height="70" width="100" alt="unavailable">
                                            @endif
                                        </td>
                                        <td class="cart-product-name-outer fw-bold text-dark">
                                            @if($isProductAvailable)
                                                <a href="{{ url('/product-details/'.$user->product->slug) }}" class="text-decoration-none text-dark">
                                                    {{ $user->product->name }}
                                                </a>
                                            @else
                                                <span class="text-danger"><i class="fas fa-exclamation-circle me-1"></i>Product Unavailable</span>
                                            @endif
                                        </td>
                                        <td class="cart-product-price-outer fw-semibold">
                                            ৳ {{ $user->price }}
                                        </td>
                                        <td class="qty-increment-decrement-outer">
                                            <input type="number" class="form-control text-center bg-light border fw-bold rounded-3" style="max-width: 80px;" name="qty" readonly value="{{ $user->qty }}" min="1" />
                                        </td>
                                        <td>
                                            <a href="{{ url('/Delete-cart/'.$user->id) }}" class="btn btn-sm btn-outline-danger rounded-pill px-3 remove-product">
                                                <i class="fas fa-trash-alt me-1"></i> Remove
                                            </a>
                                        </td>
                                        <td class="cart-product-total-outer fw-bold text-danger fs-5">
                                            ৳ {{ $user->qty * $user->price }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ url('/check-out') }}" class="btn btn-dark btn-lg rounded-pill px-5 py-3 fw-bold shadow-sm process-checkout-btn">
                        Proceed To CheckOut
                        <i class="fas fa-sign-out-alt ms-2"></i>
                    </a>
                </div>
            </div>
        </section>
    </main>
@endsection