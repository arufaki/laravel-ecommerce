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
        <nav class="container nav-border">
            <div class="nav-wrap">
                <h1 class="logos logo">FKH.CO</h1>
                <input type="text" placeholder="Search product..." class="search-wrap" />
                <div class="icons-wrap">
                    <a href={{ url('/cart') }} class="cart-btn obj-href">
                        <img src="{{ url('fkhco/assets/svg/shopping-cart.svg') }}" alt="cart-icon" />
                    </a>
                    <a href={{ Route('ecomPages.signin') }} class="user-btn obj-href">
                        <img src="{{ url('fkhco/assets/svg/user.svg') }}" alt="user-icon" />
                    </a>
                </div>
            </div>
        </nav>
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
                                        <button class="trash-btn">
                                            <img src="{{ url('fkhco/assets/svg/trash.svg') }}" alt="trash-icon" />
                                        </button>
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
                    <div class="subtotal">
                        <p>Subtotal</p>
                        <p class="price-title">$360</p>
                    </div>
                    <div class="delivery">
                        <p>Delivery Fee</p>
                        <p class="price-title">$50</p>
                    </div>
                    <div class="total">
                        <p>Total</p>
                        <p class="price order-total">$410</p>
                    </div>
                    <button class="add-to-cart checkout-btn">
                        Go to Checkout <img src="{{ url('fkhco/assets/svg/arrow.svg') }}" alt="arrow-icon" />
                    </button>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div id="subscribe">
            <div class="subscribe-wrap container">
                <div class="subscribe-content container">
                    <h1>STAY UPTO DATE ABOUT OUR LATEST OFFERS</h1>
                    <div class="subscribe-form">
                        <div class="subscribe-input-wrap">
                            <img src="{{ url('fkhco/assets/svg/mail.svg') }}" alt="mail-icon" />
                            <input type="text" placeholder="Enter your email address..." class="subscribe-input" />
                        </div>
                        <button class="subscribe-btn">Subscribe to Newsletter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer container">
            <div class="footer-content">
                <h1 class="footer-logo">FKH.CO</h1>
                <p class="footer-body">
                    We have clothes that suits your style and which you’re proud to
                    wear. From women to men.
                </p>
            </div>
            <h5>
                Created with ❤ by
                <a href="https://github.com/Arufaki" target="_blank" class="creator-name">Alfakih Anggi Subekti</a>
            </h5>
        </div>
    </footer>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
</body>

</html>
