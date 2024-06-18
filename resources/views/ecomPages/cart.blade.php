<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/cart.css') }}" />
</head>

<body>
    <header>
        @include('ecomPages.component.header')
    </header>
    <main>
        <section id="product-cart">
            <div class="cart-wrapped container">
                <div class="products-cart">
                    <h1>YOUR CART</h1>
                    <div class="cart-master">
                        
                        @foreach($recordCarts as $cart)
                            <div class="cart-wrapping">
                                <div class="product-wishlist">
                                    <div class="detail-cart">
                                        <div class="image images">
                                            @php
                                                $imageExtract = json_decode($cart->image);
                                            @endphp
                                            <img src="{{ asset('storage/foto-produk/' . $imageExtract[0]) }}"
                                                alt="product-image" />
                                        </div>
                                        <div class="product-details">
                                            <h3 class="product-title price">{{$cart->nama_stok}}</h3>
                                            <p class="size-chart">Size: <span>{{strtoupper($cart->ukuran)}}</span></p>
                                            <p class="price cart-price">{{ 'Rp. ' . number_format($cart->harga_jual, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="btn-feat">
                                        <form action="{{ Route('cart.destroy', $cart->id_cart) }}"
                                            method="POST" onsubmit="return confirm('Yakin Ingin Menghapus ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="trash-btn">
                                                <img src="{{ url('fkhco/assets/svg/trash.svg') }}" alt="trash-icon" />
                                            </button>
                                        </form>
                                        
                                        <form action="{{Route("cart.update", $cart->id_cart)}}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="id_cart" value="{{$cart->id_cart}}">
                                            <div class="quantity qty">
                                                <button id="decrease" name="action" value="decrease" class="counter" type="submit">-</button>
                                                <input type="number" class="qty" name="qty" id="qty" value="{{$cart->qty}}" max="100" required />
                                                <button id="increase" name="action" value="increase" class="counter" type="submit">+</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                    </div>
                </div>
                <div class="order-summary">
                    <h3>Order Summary</h3>
                    <div class="subtotal delivery">
                        <p>Subtotal</p>
                        <p class="price-title">{{ 'Rp. ' . number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                    {{-- <div class="delivery">
                        <p>Delivery Fee</p>
                        <p class="price-title">{{ 'Rp. ' . number_format($deliveryFee, 0, ',', '.') }}</p>
                    </div> --}}
                    <div class="total">
                        <p>Total</p>
                        <p class="price order-total">{{ 'Rp. ' . number_format($total, 0, ',', '.') }}</p>
                    </div>
                    <a href="{{url('/checkout')}}" class="add-to-cart checkout-btn">
                        Go to Checkout <img src="{{ url('fkhco/assets/svg/arrow.svg') }}" alt="arrow-icon" />
                    </a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="{{ url('fkhco/js/cart.js') }}"></script>
    <script src="{{ url('fkhco/js/app.js') }}"></script>

</body>

</html>
