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
        <section id="product">
            <div class="cart-wrap container">
                <div class="cart-wrapper">
                    <div class="product-image-wrap">
                        <div class="main-image">
                            <img src="{{ asset('storage/foto-produk/' . $extractImage[0]) }}" alt="product-image"
                                class="currentImg" />
                        </div>
                        <div class="child-image">

                            @foreach ($extractImage as $image)
                                <div class="image">
                                    <img src="{{ asset('storage/foto-produk/' . $image) }}" alt="product-image"
                                        class="thumb" />
                                </div>
                            @endforeach

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
                            <p style="padding-bottom: 10px;">in stock {{$selectedProduct->saldo_awal}} {{$selectedProduct->nama_satuan}}</p>
                            <p class="price pricing-detail">
                                {{ 'Rp. ' . number_format($selectedProduct->harga_jual, 0, ',', '.') }}</p>
                            <p class="product-body">
                                {{ $selectedProduct->deskripsi_barang }}
                            </p>
                        </div>
                        <form action="{{ url('cart')  }}" method="POST" id="cart-form">
                            @csrf
                            <div class="product-size">
                                <input type="hidden" name="id_stok" value="{{$selectedProduct->id_stok}}">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ Auth::user() !== null ? Auth::user()->id : '' }}">
                                <p class="choose-size">Choose Size</p>
                                <div class="size-wrap">
                                    <div class="size">
                                        <input type="radio" id="ukuran" name="ukuran" value="s" checked />
                                        <p>S</p>
                                    </div>
                                    <div class="size">
                                        <input type="radio" id="ukuran" name="ukuran" value="m" />
                                        <p>M</p>
                                    </div>
                                    <div class="size">
                                        <input type="radio" id="ukuran" name="ukuran" value="l" />
                                        <p>L</p>
                                    </div>
                                    <div class="size">
                                        <input type="radio" id="ukuran" name="ukuran" value="xl" />
                                        <p>XL</p>
                                    </div>
                                    <div class="size">
                                        <input type="radio" id="ukuran" name="ukuran" value="xxl" />
                                        <p>XXL</p>
                                    </div>      
                                </div>
                            </div>

                            <div class="cart">
                                <div class="quantity">
                                    <span id="decrease" class="counter">-</span>
                                    <input type="number" class="qty" name="qty" id="qty" value="1" max="{{$selectedProduct->saldo_awal}}" required   />
                                    <span id="increase" class="counter">+</span>
                                </div>
                                <button class="add-to-cart" type="submit">Add To Cart</button>
                            </div>
                        </form>
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
