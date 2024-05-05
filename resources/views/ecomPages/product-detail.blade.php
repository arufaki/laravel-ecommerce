<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/product-detail.css') }}" />
</head>

<body>
    <header>
        <nav class="container">
            <div class="nav-wrap">
                <h1 class="logos logo">FKH.CO</h1>
                <input type="text" placeholder="Search product..." class="search-wrap" />
                <div class="icons-wrap">
                    <button class="cart-btn">
                        <img src="{{ url('fkhco/assets/svg/shopping-cart.svg') }}" alt="cart-icon" />
                    </button>
                    <button class="user-btn">
                        <img src="{{ url('fkhco/assets/svg/user.svg') }}" alt="user-icon" />
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section id="product">
            <div class="cart-wrap container">
                <div class="cart-wrapper">
                    <div class="product-image-wrap">
                        <div class="main-image">
                            <img src="{{ asset('storage/foto-produk/' . $extractImage[0]) }}" alt="product-image"
                                class="currentImg" />
                        </div>
                        <div class="child-image">
                            {{-- @foreach ($selectedProduct as $image)
                                @php
                                    dd(json_decode($image));
                                    $image = json_decode($image);
                                @endphp --}}
                            @foreach ($extractImage as $image)
                                <div class="image">
                                    <img src="{{ asset('storage/foto-produk/' . $image) }}" alt="product-image"
                                        class="thumb" />
                                </div>
                            @endforeach
                            {{-- @endforeach --}}
                            {{-- <div class="image">
                                <img src="{{ url('fkhco/assets/png/products/model.png') }}" alt=""
                                    class="thumb" />
                            </div>
                            <div class="image">
                                <img src="{{ url('fkhco/assets/png/products/real-hoodies.png') }}" alt="product-image"
                                    class="thumb" />
                            </div> --}}
                        </div>
                    </div>
                    <div class="product-description">
                        <div class="product-detail">
                            <h1>{{ $selectedProduct->nama_stok }}</h1>
                            <div class="rating product-rating">
                                <div class="stars">
                                    @for ($i = 0; $i < 5; $i++)
                                        <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                                    @endfor
                                </div>
                                <p class="rate">4.5/5</p>
                            </div>
                            <p class="price pricing-detail">
                                {{ 'Rp. ' . number_format($selectedProduct->harga_jual, 0, ',', '.') }}</p>
                            <p class="product-body">
                                {{ $selectedProduct->deskripsi_barang }}
                            </p>
                        </div>
                        <div class="product-size">
                            <p class="choose-size">Choose Size</p>
                            <div class="size-wrap">
                                <div class="size">
                                    <p>S</p>
                                </div>
                                <div class="size">
                                    <p>M</p>
                                </div>
                                <div class="size">
                                    <p>L</p>
                                </div>
                                <div class="size">
                                    <p>XL</p>
                                </div>
                                <div class="size">
                                    <p>XXL</p>
                                </div>
                            </div>
                        </div>

                        <div class="cart">
                            <div class="quantity">
                                <button>-</button>
                                <p>1</p>
                                <button>+</button>
                            </div>
                            <button class="add-to-cart">Add To Cart</button>
                        </div>
                    </div>
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
