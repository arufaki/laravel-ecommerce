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
                    <h1>CHECKOUT</h1>
                    <div class="cart-master">
                        @foreach ($recordCarts as $cart)
                            <div class="cart-wrapping">
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
                <div class="order-summary checkout-summary">
                    <div class="header-wrap delivery-head">
                        <h3 class="header-summary">Delivery Address</h3>
                        <span class="line-span"></span>
                    </div>
                    <div class="cart-master delivery-address">
                        <div class="cart-wrapping">
                            <div class="product-wishlist checkout-master">
                                <div class="detail-cart">
                                      <div class="product-details">
                                        <h3 class="product-title price">John Doe | (+62 823 8792 4582)</h3>
                                        <p class="size-chart">Jl. Yamagawa, Perum Mutiara Indah Blok G.24, Kec. Sarolangun, Kel. Kuvukiland, Kota Jamaica, Provinsi Osaka, 28829</p>
                                      </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="header-wrap">
                        <h3 class="header-summary shipping-head">Shipping Option</h3>
                        <span class="line-span"></span>
                    </div>
                    <div class="cart-master">
                        <div class="cart-wrapping shipping-option">
                            <div class="product-wishlist checkout-master">
                                <div class="detail-cart">
                                    <div class="product-details">
                                      <h3 class="product-title price">JNE Trucking</h3>
                                      <p class="size-chart">Receive in 2-3 days</p>
                                    </div>
                              </div>
                            </div>
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
                    <div class="subtotal checkout-subtotal">
                        <p>Subtotal</p>
                        <p class="price-title">$450</p>
                    </div>
                    <div class="subtotal checkout-subtotal">
                        <p>Shipping Fee</p>
                        <p class="price-title">$50</p>
                    </div>
                    <div class="subtotal delivery checkout-subtotal">
                        <p>Admin Fee</p>
                        <p class="price-title">$5</p>
                    </div>
                    <div class="total">
                        <p>Total</p>
                        <p class="price order-total">$505</p>
                    </div>
                    <button class="add-to-cart checkout-btn">
                        Create Order <img src="{{ url('fkhco/assets/svg/arrow.svg') }}" alt="arrow-icon" />
                    </button>
                </div>
            </div>
        </section>
    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
</body>

</html>
