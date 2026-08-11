<header class="header-section">
    <div class="container">
        <div class="header-top-wrapper">
            <a href="{{ url('/') }}" class="brand-logo-outer">
                <img src="{{ optional($allsettings)->logo }}" alt="Logo">
            </a>
            <div class="search-form-outer">
                <form action="{{ url('/search-products') }}" method="GET" class="form-group search-form">
                    @csrf
                    <input type="text" name="search" class="form-control" placeholder="Search for items...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="header-top-right-outer">
                <div class="res-search">
                    <i class="fas fa-search"></i>
                </div>
                <div class="header-top-right-item">
                    @if (Auth::user() && Auth::user()->role == 'customer')
                        <a href="{{ url('/customer/login') }}" class="header-top-right-item-link">
                            <span class="icon-outer">
                                <i class="fas fa-user"></i>
                            </span>
                            Dashboard
                        </a>
                    @else
                        <a href="{{ url('/customer/login') }}" class="header-top-right-item-link">
                            <span class="icon-outer">
                                <i class="fas fa-user"></i>
                            </span>
                            Login
                        </a>
                    @endif
                </div>
                <div class="header-top-right-item dropdown">
                    <div class="header-top-right-item-link">
                        <span class="icon-outer">
                            <i class="fas fa-cart-plus"></i>
                            <span class="count-number">{{ $productcount }}</span>
                        </span>
                        Cart
                    </div>
                    <div class="cart-items-wrapper">
                        @php
                            $carttotal = 0;
                        @endphp
                        @foreach ($cartdetailsall as $user)
                         
                        @php
                            /**
                             * প্রোডাক্ট যদি ডেটাবেজে না থাকে (Delete) অথবা প্রোডাক্টের স্ট্যাটাস যদি ইনঅ্যাক্টিভ (Inactive) হয়, 
                             * তবে হিসাবের সময় প্রাইস ০ ধরবে যাতে গ্র্যান্ড টোটালে ইনঅ্যাক্টিভ প্রোডাক্টের দাম যোগ না হয়।
                             */
                            $isProductAvailable = $user->product && ($user->product->status == 'active' || $user->product->status == 1);
                            
                            $currentPrice = $isProductAvailable ? $user->price : 0;
                            $carttotal = $carttotal + ($currentPrice * $user->qty);
                        @endphp
                            <div class="cart-items-outer">
                            <div class="cart-item-outer">
                                <a href="#" class="cart-product-image">
                                    {{-- প্রোডাক্ট ডিলিট বা ইনঅ্যাক্টিভ থাকলে ডিফল্ট ইমেজ শো করবে --}}
                                    <img src="{{ $isProductAvailable ? $user->product->image : asset('frontend/assets/images/product.png') }}" alt="product">
                                </a>
                                <div class="cart-product-name-price">
                                    {{-- প্রোডাক্ট ডিলিট বা ইনঅ্যাক্টিভ থাকলে 'Product Unavailable' লেখা আসবে --}}
                                    <a href="{{ $isProductAvailable ? url('/product-details/'.$user->product->slug) : '#' }}" class="product-name">
                                        {{ $isProductAvailable ? $user->product->name : 'Product Unavailable' }}
                                    </a>
                                    <span class="product-price">
                                        ৳{{ $user->price }} X {{ $user->qty }}
                                    </span>
                                </div>
                                <div class="cart-item-delete">
                                    <a href="{{ url('/Delete-cart/'.$user->id) }}" class="delete-btn">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="shopping-cart-footer">
                            <div class="shopping-cart-total">
                                <h4>
                                    Total <span>৳ {{ $carttotal }}</span>
                                </h4>
                            </div>
                            <div class="shopping-cart-button">
                                <a href="{{ url('/view-cart') }}" class="view-cart-link">View cart</a>
                                <a href="{{ url('/check-out') }}" class="checkout-link">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom-wrapper">
        <div class="container">
            <div class="header__bottom-outer">
                <div class="header__category-outer">
                    <div class="header__category-items-wrapper">
                        <div class="header__category-icon-outer">
                            <span>Categories</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="header__category-items-outer">
                            <ul class="header__category-list">
                                @foreach($globalcategory as $category)
                                <li class="header__category-list-item item-has-submenu">
                                    <a href="{{ url('/catagory-products/'.$category->slug) }}" class="header__category-list-item-link">
                                        <img src="{{ $category->image }}" alt="category">
                                        {{$category->name}}
                                    </a>
                                    <ul class="header__nav-item-category-submenu">
                                        @foreach($category->subcatagory as $subcategory)
                                        <li class="header__category-submenu-item">
                                            <a href="{{ url('/subcatagory-products/'.$subcategory->slug) }}"
                                                class="header__category-submenu-item-link">
                                                
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
                </div>
                <div class="nav-toggle-btn">
                    <div class="btn-inner"></div>
                </div>
                <div class="header__dynamic-page-wrapper">
                    <ul class="dynamic-page-list">
                        <li class="dynamic-page-list-item">
                            <a href="{{ url('/') }}" class="dynamic-page-list-item-link">
                                Home
                            </a>
                        </li>
                        <li class="dynamic-page-list-item">
                            <a href="{{ url('/product-shop') }}" class="dynamic-page-list-item-link">
                                Shop
                            </a>
                        </li>
                        <li class="dynamic-page-list-item">
                            <a href="{{ url('/refund-policy') }}" class="dynamic-page-list-item-link">
                                Return Process
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>