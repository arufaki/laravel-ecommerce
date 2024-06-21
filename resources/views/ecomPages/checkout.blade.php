<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/cart.css') }}" />
    <link rel="stylesheet" href="{{ url('fkhco/css/checkout.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        @include('ecomPages.component.header')
    </header>
    <main>
        <section id="product-cart">
            <div class="cart-wrapped container">
                <div class="products-cart checkout-wrap">
                    <h1 style="font-weight:800; font-size:32px">CHECKOUT</h1>
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
                                      <h3 class="product-title price expedition">Pilih Kurir</h3>
                                      <p class="size-chart estimate">Dengan Estimasi Pengiriman Tercepat</p>
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
                                                <h3 class="product-title price courier-name">{{$courier['name']}}</h3>
                                                <p class="size-chart select-estimate">Receive in {{$courier['estimate']}} days</p>
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
                                    <div class="product-wishlist checkout-master payment-gateway">
                                        <div class="detail-cart detail-payment">
                                            <div class="product-details payment-child">
                                                <h3 class="product-title price">Transfer Bank</h3>
                                                <button type="button" class="btn btn-secondary buttonBank" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Select Bank
                                                </button>
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
                            <input type="hidden" value="" name="expedition_input" id="expedition-input" required>

                            <button type="submit" class="add-to-cart checkout-btn">
                                Create Order <img src="{{ url('fkhco/assets/svg/arrow.svg') }}" alt="arrow-icon" />
                            </button>
                        </form>
                </div>
            </div>
        </section>


        <!-- Modal for bank payment -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Method</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="bank-available">
                            <img src="{{url('fkhco/assets/png/payment/bca.webp')}}" alt="bca" width="100" class="bank bca bankSelected">
                            <img src="{{url('fkhco/assets/png/payment/bri.webp')}}" alt="bca" width="120" class="bank bri">
                            <img src="{{url('fkhco/assets/png/payment/bni.webp')}}" alt="bca" width="100" class="bank bni">
                            <img src="{{url('fkhco/assets/png/payment/mandiri.webp')}}" alt="bca" width="100" class="bank mandiri">
                        </div>
                        <div class="noRekening">
                            <h2 class="accountHeader">Account Number : <span class="accountNumber"></span></h2>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ url('fkhco/js/checkout.js') }}"></script>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
</body>

</html>
