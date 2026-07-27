@extends('Frontend.Include.master')

@section('content')
    <main class="bg-light py-5">
        <section class="checkout-section">
            <div class="container">
                <form action="{{ url('/order/confirm/') }}" method="post" class="billing-address-form" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- ব্যাকএন্ডের জন্য হিডেন ইনপুট ফিল্ড (যাতে ডাটা কন্ট্রোলারে পৌঁছায়) -->
                    <input type="hidden" name="charge" id="hiddenDeliveryCharge" value="80">
                    <input type="hidden" name="grandTotal" id="hiddenGrandTotal" value="0">

                    <div class="row g-4">
                        
                        <!--বাম পাশ: বিলিং এবং শিপিং ডিটেইলস-->
                        <div class="col-lg-7">
                            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                                <h4 class="fw-bold text-dark mb-4 pb-3 border-bottom d-flex align-items-center">
                                    <span class="bg-light text-dark p-2 rounded-3 me-3 fs-6">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    Billing / Shipping Details
                                </h4>
                                
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-secondary small">Full Name *</label>
                                        <input type="text" name="name" class="form-control form-control-lg bg-light border-light rounded-3 fs-6 shadow-none" value="{{ auth()->check() ? auth()->user()->name : ''}}" placeholder="Enter Full Name" required />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold text-secondary small">Phone Number *</label>
                                        <input type="text" name="phone" class="form-control form-control-lg bg-light border-light rounded-3 fs-6 shadow-none" value="{{ auth()->check() ? auth()->user()->phone : ''}}" placeholder="017xxxxxxxx" required />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-semibold text-secondary small">Full Address *</label>
                                        <!-- Note: এখানে কন্ট্রোলারের বানান অনুযায়ী name="adress" অথবা ডাটাবেজ কলামের সাথে মিল রেখে চেক করুন -->
                                        <textarea rows="3" name="adress" class="form-control bg-light border-light rounded-3 fs-6 shadow-none" id="address" placeholder="House no, Road no, Area details..." required></textarea>
                                    </div>
                                    
                                    <!--ডেলিভারি এরিয়া সিলেকশন-->
                                    <div class="col-12 mt-4">
                                        <label class="form-label fw-bold text-dark mb-3">Select Delivery Area *</label>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <input type="radio" class="btn-check" name="area" id="inside_dhaka" value="80" checked autocomplete="off" onclick="insidedhaka()">
                                                <label class="btn btn-outline-dark w-100 p-3 text-start rounded-3 d-flex justify-content-between align-items-center" for="inside_dhaka">
                                                    <span class="fw-semibold"><i class="fas fa-truck me-2 text-secondary"></i> Inside Dhaka</span>
                                                    <strong class="fs-5">৳ 80</strong>
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" class="btn-check" name="area" id="outside_dhaka" value="150" autocomplete="off" onclick="outsidedhaka()">
                                                <label class="btn btn-outline-dark w-100 p-3 text-start rounded-3 d-flex justify-content-between align-items-center" for="outside_dhaka">
                                                    <span class="fw-semibold"><i class="fas fa-globe me-2 text-secondary"></i> Outside Dhaka</span>
                                                    <strong class="fs-5">৳ 150</strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--ডান পাশ: অর্ডার সামারি এবং পেমেন্ট-->
                        <div class="col-lg-5">
                            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-between">
                                @if($cartdetailsall->isEmpty())
                                    <div class="text-center py-5 my-auto">
                                        <div class="fs-1 text-muted mb-3">
                                            <i class="fas fa-shopping-basket"></i>
                                        </div>
                                        <h5 class="fw-bold text-dark mb-2">Your cart is empty!</h5>
                                        <p class="text-muted small px-4">There are no items in your order summary. Please add products to proceed.</p>
                                    </div>
                                @disableAuthentication
                                @else
                                    <div>
                                        <h4 class="fw-bold text-dark mb-4 pb-3 border-bottom d-flex align-items-center">
                                            <span class="bg-light text-dark p-2 rounded-3 me-3 fs-6">
                                                <i class="fas fa-shopping-basket"></i>
                                            </span>
                                            Order Summary
                                        </h4>
                                        
                                        <div class="cart-items-container">

                                             @php
                            $carttotal = 0;
                        @endphp
                                            @foreach ($cartdetailsall as $cart)
                                            @php
                                                $carttotal= $carttotal + $cart->price * $cart->qty;
                                            @endphp
                                            <div class="p-3 bg-light rounded-3 mb-4 border border-light cart-item-row" data-price="{{ $cart->price }}">
                                                <div class="row g-2 align-items-center">
                                                    <div class="col-auto">
                                                        <div class="bg-white p-1 rounded-3 border d-flex align-items-center justify-content-center shadow-sm" style="width: 75px; height: 75px;">
                                                            <img src="{{ $cart->product->image }}" alt="Image" class="img-fluid rounded-2" style="max-height: 100%; object-fit: contain;"/>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col px-2">
                                                        <h6 class="fw-bold text-dark mb-0 text-truncate" style="max-width: 150px;">{{ $cart->Product->name }}</h6>
                                                        <small class="text-muted d-block mb-2">Size:{{ $cart->size }} | Color:{{ $cart->color }}</small>
                                                        
                                                        <div class="input-group input-group-sm border rounded bg-white shadow-sm overflow-hidden" style="width: 100px; height: 32px;">
                                                            <button type="button" class="btn btn-light border-0 p-0 qty-decrement-btn d-flex align-items-center justify-content-center" style="width: 30px; height: 100%;"><i class="fas fa-minus fs-7 text-muted"></i></button>
                                                            <input type="number" name="qty[]" readonly class="form-control text-center border-0 p-0 fw-bold bg-white text-dark shadow-none qty-input" min="1" value="1" style="font-size: 14px; height: 100%;">
                                                            <button type="button" class="btn btn-light border-0 p-0 qty-increment-btn d-flex align-items-center justify-content-center" style="width: 30px; height: 100%;"><i class="fas fa-plus fs-7 text-muted"></i></button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-auto text-end d-flex flex-column justify-content-between align-items-end" style="height: 75px;">
                                                        <a href="{{ url('/Delete-cart/'.$cart->id) }}" class="text-muted text-decoration-none p-0 link-danger" title="Remove item">
                                                            <i class="fas fa-trash-alt small"></i>
                                                        </a>
                                                        <span class="fw-bold text-dark fs-6 single-item-total">৳ {{ $cart->price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!--প্রাইস ব্রেকডাউন-->
                                        <div class="p-3 bg-light rounded-3 border border-light mb-4">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="text-secondary small">Sub Total</span>
                                                <span class="fw-bold text-dark" id="toalprice">{{ $carttotal }}</span>
                                                <input type="hidden" id="totalprice" name="totalprice" value="{{ $carttotal }}">
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="text-secondary small">Delivery Charge</span>
                                                <span class="fw-bold text-dark" id="deliveryCharge">৳ 0</span>
                                            </div>
                                            <hr class="my-3 border-secondary opacity-25">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fw-bold text-dark fs-5">Grand Total</span>
                                                <span class="fw-bolder text-dark fs-4" id="grandTotal">৳ 0</span>
                                                <input type="hidden"  id="gratotalpriceinput" name="gratotalpriceinput">
                                            </div>
                                        </div>
                                        
                                        <!--পেমেন্ট মেথড-->
                                        <div class="mb-4">
                                            <label class="form-label fw-bold text-dark mb-2 fs-6">Select Payment Method</label>
                                            <div class="p-3 border border-dark rounded-3 bg-white d-flex align-items-center gap-3 shadow-sm">
                                                <input class="form-check-input border-dark p-2" type="radio" name="payment_type" id="cod" value="cod" checked>
                                                <label class="form-check-label fw-bold text-dark flex-grow-1" for="cod">
                                                    <i class="fas fa-money-bill-wave text-success me-2 fs-5"></i>Cash On Delivery (COD)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--সাবমিট বাটন-->
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-dark btn-lg w-100 rounded-3 py-3 fw-bold d-flex align-items-center justify-content-center gap-2 shadow-sm">
                                            Confirm Order <i class="fas fa-arrow-right small"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
    </main>

    <!--আপডেট করা ক্যালকুলেশন স্ক্রিপ্ট-->
   
@endsection
@push('script')
   <script>
     function outsidedhaka(){
        let totalprice = parseFloat(document.getElementById('totalprice').value);
        let grandTotal = totalprice+150;
        
        document.getElementById('deliveryCharge').innerHTML = "৳"+150;
        document.getElementById('grandTotal').innerHTML = "৳"+grandTotal;
        document.getElementById('gratotalpriceinput').value = grandTotal;

    }
    function insidedhaka(){
        let totalprice = parseFloat(document.getElementById('totalprice').value);
        let grandTotal = totalprice+80;
        
        document.getElementById('deliveryCharge').innerHTML = "৳"+80;
        document.getElementById('grandTotal').innerHTML = "৳"+grandTotal;
        document.getElementById('gratotalpriceinput').value = grandTotal;

    }
   </script>
@endpush