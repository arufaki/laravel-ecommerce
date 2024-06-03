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
        <nav class="container nav-border">
            <div class="nav-wrap">
                <h1 class="logos logo">FKH.CO</h1>
                <input type="text" placeholder="Search product..." class="search-wrap" />
                <div class="icons-wrap">
                    <a href={{ url('/cart') }} class="cart-btn obj-href">
                        <img src="{{ url('fkhco/assets/svg/shopping-cart.svg') }}" alt="cart-icon" />
                    </a>
                    <a href={{ Route('login') }} class="user-btn obj-href">
                        <img src="{{ url('fkhco/assets/svg/user.svg') }}" alt="user-icon" />
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="product-cart">
            <div class="cart-wrapped container">
                <div class="products-cart checkout-wrap">
                    <h1>CHECKOUT</h1>
                    <div class="cart-master">
                            <div class="cart-wrapping">
                                <div class="product-wishlist checkout-master">
                                    <div class="detail-cart">
                                        <div class="image images cover-bg">
                                            <img
                                              src="{{url('fkhco/assets/png/products/hoodie.png')}}"
                                              alt="product-image"
                                            />
                                          </div>
                                          <div class="product-details">
                                            <h3 class="product-title price">PULLOVER SWEAT HOODIE</h3>
                                            <p class="size-chart">Size: <span>L</span></p>
                                            <p class="price cart-price checkout-price">$120 x 2</p>
                                          </div>
                                    </div>
                                    <p class="subtotal-checkout">$240</p>
                                </div>
                            </div> 
                     
                    </div>
                </div>
                <div class="order-summary">
                    <h3>Order Summary</h3>
                    <div class="subtotal delivery">
                        <p>Subtotal</p>
                        <p class="price-title"></p>
                    </div>
                    {{-- <div class="delivery">
                        <p>Delivery Fee</p>
                        <p class="price-title">{{ 'Rp. ' . number_format($deliveryFee, 0, ',', '.') }}</p>
                    </div> --}}
                    <div class="total">
                        <p>Total</p>
                        <p class="price order-total"></p>
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
