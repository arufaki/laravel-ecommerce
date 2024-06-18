<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/cart.css') }}" />
    <link rel="stylesheet" href="{{ url('fkhco/css/checkout.css') }}" />
</head>

<body>
    <header>
        @include('ecomPages.component.header')
    </header>
    <main>
        <section id="product-cart">
            <div class="cart-wrapped container">
                <div class="products-cart checkout-wrap">
                    <h1 class="fw-bold">CHECKOUT</h1>
                    <div class="swiper-checkout">
                        <div class="swiper-wrapper cart-master checkout-card">
                            @foreach ($recordCarts as $cart)
                                <div class="swiper-slide cart-wrapping">
                                    <div class="product-wishlist checkout-master">
                                        <div class="detail-cart">
                                            <div class="image images cover-bg">
                                                @php
                                                    $imageExtract = json_decode($cart->image);
                                                @endphp
                                                 <img src="{{ asset('storage/foto-produk/' . $imageExtract[0]) }}"
                                                 alt="product-image" />
                                            </div>
                                            <div class="product-details">
                                                <h3 class="product-title price">{{$cart->nama_stok}}</h3>
                                                <p class="size-chart">Size: <span>{{strtoupper($cart->ukuran)}}</span></p>
                                                <p class="price cart-price checkout-price">{{ 'Rp. ' . number_format($cart->harga_jual, 0, ',', '.') }} x {{$cart->qty}}</p>
                                            </div>
                                        </div>
                                        <p class="subtotal-checkout">{{ 'Rp. ' . number_format($cart->harga_jual * $cart->qty, 0, ',', '.') }}</p>
                                    </div>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="order-summary checkout-summary">
                    <div class="header-wrap delivery-head">
                        <h3 class="header-summary">Delivery Address</h3>
                        <span class="line-span"></span>
                    </div>
                    <div class="cart-master delivery-address">
                        <div class="cart-wrapping">
                            <div class="product-wishlist checkout-master">
                                <div class="detail-cart">
                                      @foreach ($userAddress as $userData)
                                        <div class="product-details">
                                            <h3 class="product-title price">{{$userData->name}} | ({{$userData->nohp}})</h3>
                                            <p class="size-chart">{{$userData->alamat_pelanggan}}</p>
                                        </div>
                                      @endforeach
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="header-wrap">
                        <h3 class="header-summary shipping-head">Shipping Option</h3>
                        <span class="line-span"></span>
                    </div>  
                    <div class="cart-master ship-master">
                        <div class="cart-wrapping shipping-option shipping-master">
                            <div class="product-wishlist checkout-master checkout-wrapper">
                                <div class="detail-cart">
                                    <div class="product-details">
                                      <h3 class="product-title price">JNE</h3>
                                      <p class="size-chart">Receive in 2-3 days</p>
                                    </div>
                                </div>
                                <div class="arrow-down">
                                    <span class="arrow arrow-left"></span>
                                    <span class="arrow arrow-right"></span>
                                </div>
                            </div>
                        </div> 
                        <form action="{{ url('checkout')  }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="cart-wrapping shipping-option shipping-select">
                                @php
                                    $courierArr = ['expedition' => [
                                        ['name' => 'JNE', 'estimate' => '2-3'], 
                                        ['name' => 'SiCepat', 'estimate' => '2-4'], 
                                        ['name' => 'J&T Kargo', 'estimate' => '5-6']
                                    ]];
                                    
                                @endphp
                                @foreach ($courierArr['expedition'] as $courier)
                                <div class="product-wishlist checkout-master courier">
                                    <div class="detail-cart">
                                        <div class="product-details">
                                        <h3 class="product-title price">{{$courier['name']}}</h3>
                                        <p class="size-chart">Receive in {{$courier['estimate']}} days</p>
                                        </div>
                                </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                            <div class="header-wrap">
                                <h3 class="header-summary payment-head">Payment Method</h3>
                                <span class="line-span"></span>
                            </div>
                            <div class="cart-master">
                                <div class="cart-wrapping payment-method">
                                    <div class="product-wishlist checkout-master">
                                        <div class="detail-cart">
                                            <div class="product-details">
                                            <h3 class="product-title price">BANK Virtual Account</h3>
                                            </div>
                                    </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="header-wrap">
                                <h3 class="header-summary payment-head">Upload Proof of Payment</h3>
                                <span class="line-span"></span>
                            </div>
                            <div class="cart-master">
                                <div class="cart-wrapping payment-method">
                                    <div class="product-wishlist checkout-master">
                                        <div class="detail-cart">
                                            <div class="product-details">
                                            <input type="file" class="form-control proof" id="image" name="image" required>
                                            </div>
                                    </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="subtotal checkout-subtotal">
                                <p>Subtotal</p>
                                <p class="price-title">{{ 'Rp. ' . number_format($subtotal, 0, ',', '.') }}</p>
                            </div>
                            <div class="subtotal delivery checkout-subtotal">
                                <p>Shipping Fee</p>
                                <p class="price-title">{{ 'Rp. ' . number_format($deliveryFee, 0, ',', '.') }}</p>
                            </div>
                            
                            <div class="total">
                                <p>Total</p>
                                <p class="price order-total">{{ 'Rp. ' . number_format($subtotal + $deliveryFee, 0, ',', '.') }}</p>
                            </div>
                            <input type="hidden" name="total" value="{{$subtotal + $deliveryFee}}">

                            <button type="submit" class="add-to-cart checkout-btn">
                                Create Order <img src="{{ url('fkhco/assets/svg/arrow.svg') }}" alt="arrow-icon" />
                            </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="{{ url('fkhco/js/checkout.js') }}"></script>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
</body>

</html>
