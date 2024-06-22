<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/index.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>
    <header>
        @include('ecomPages.component.header')
    </header>
    <main>
        @php
            // dd($topSellingis);
        @endphp
        <section id="banner">
            <div class="banner-wrapper">
                <div class="body-banner container">
                    <h1 class="heading-title">FIND CLOTHES THAT MATCHES YOUR STYLE</h1>
                    <p>
                        Browse through our diverse range of meticulously crafted garments,
                        designed to bring out your individuality and cater to your sense
                        of style.
                    </p>
                    <a href={{url("/products")}} class="shop-btn shop-now">Shop Now</a>
                </div>
                <div class="banners">
                    <svg width="44" height="44" viewBox="0 0 76 76" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="star">
                        <path
                            d="M38 0C39.2901 20.4286 55.5712 36.71 76 38C55.5712 39.2901 39.2901 55.5712 38 76C36.71 55.5712 20.4286 39.2901 0 38C20.4286 36.71 36.71 20.4286 38 0Z"
                            fill="black" />
                    </svg>

                    <img src="{{ url('fkhco/assets/png/banner/couple.png') }}" alt="banner-img" class="banner-img"
                        loading="lazy" />
                    <svg width="76" height="76" viewBox="0 0 76 76" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="star1">
                        <path
                            d="M38 0C39.2901 20.4286 55.5712 36.71 76 38C55.5712 39.2901 39.2901 55.5712 38 76C36.71 55.5712 20.4286 39.2901 0 38C20.4286 36.71 36.71 20.4286 38 0Z"
                            fill="black" />
                    </svg>
                </div>
            </div>
        </section>
        <section id="brand">
            <div class="brand-wrapper container">
                <div class="brand-name">
                    <img src="{{ url('fkhco/assets/png/brand/versace.png') }}" alt="versace-logo" width="116"
                        loading="lazy" />
                    <img src="{{ url('fkhco/assets/png/brand/zara.png') }}" alt="zara-logo" width="63"
                        loading="lazy" />
                    <img src="{{ url('fkhco/assets/png/brand/gucci.png') }}" alt="gucci-logo" width="109"
                        loading="lazy" />
                    <img src="{{ url('fkhco/assets/png/brand/prada.png') }}" alt="prada-logo" width="127"
                        loading="lazy" />
                    <img src="{{ url('fkhco/assets/png/brand/calvin.png') }}" alt="calvin-logo" width="134"
                        loading="lazy" />
                    <img src="{{ url('fkhco/assets/png/brand/uniqlo.png') }}" alt="calvin-logo" width="105"
                        loading="lazy" />
                </div>
            </div>
        </section>
        <section id="new-arrival">
            <div class="new-arrival-wrap container">
                <h1>NEW ARRIVALS</h1>
                <div class="swiper">
                    <div class="swiper-wrapper cards">
                        @foreach ($newArrival as $product)
                            @php
                                $imageCover = json_decode($product->image);
                            @endphp
                            <div class="swiper-slide card">
                                <a href="{{ Route('ecomPages.product-detail', $product->id_stok) }}">
                                    <div class="image-wrap">
                                        <img src="{{ asset('storage/foto-produk/' . $imageCover[0]) }}"
                                            alt="product-image" loading="lazy" />
                                    </div>
                                    <div class="product-detail">
                                        <p class="product-title">{{ $product->nama_stok }}</p>
                                        <div class="rating">
                                            <div class="stars">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <img src="{{ url('fkhco/assets/svg/rating.svg') }}"
                                                        alt="rating" />
                                                @endfor
                                            </div>
                                            <p class="rate">4.5/5</p>
                                        </div>
                                        <p class="price">
                                            {{ 'Rp. ' . number_format($product->harga_jual, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="btn-wrap">
                    <button class="view-btn">View All</button>
                </div>
            </div>
        </section>
        <section id="top-selling">
            <div class="top-selling-wrap container">
                <h1>TOP SELLING</h1>
                <div class="swiper">
                    <div class="swiper-wrapper cards">
                        @foreach ($topSelling as $product)
                            @php
                                $imageCover = json_decode($product->image);
                            @endphp
                            <div class="swiper-slide card">
                                <a href="{{ Route('ecomPages.product-detail', $product->id_stok) }}">
                                <div class="image-wrap">
                                    <img src="{{ asset('storage/foto-produk/' . $imageCover[0]) }}" alt="product-image" loading="lazy" />
                                </div>
                                <div class="product-detail">
                                    <p class="product-title">{{ $product->nama_stok }}</p>
                                    <div class="rating">
                                        <div class="stars">
                                            @for ($i = 0; $i < 5; $i++)
                                                <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                                            @endfor
                                        </div>
                                        <p class="rate">4.5/5</p>
                                    </div>
                                    <p class="price">{{ 'Rp. ' . number_format($product->harga_jual, 0, ',', '.') }}</p>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="btn-wrap">
                    <button class="view-btn">View All</button>
                </div>
            </div>
        </section>
        <section id="category">
            <div class="category-wrap container">
                <h1>BROWSE BY CATEGORY</h1>
                <div class="category-cards">
                    <div class="category-card-wrap">
                        <h3>Casual</h3>
                        <img src="{{ url('fkhco/assets/png/models/casual.png') }}" alt="casual-category-image"
                            loading="lazy" />
                    </div>
                    <div class="category-card-wrap">
                        <h3>Formal</h3>
                        <img src="{{ url('fkhco/assets/png/models/formal.png') }}" alt="casual-category-image"
                            loading="lazy" />
                    </div>
                    <div class="category-card-wrap">
                        <h3>Gym</h3>
                        <img src="{{ url('fkhco/assets/png/models/gym.png') }}" alt="casual-category-image"
                            loading="lazy" />
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ url('fkhco/js/swiper.js') }}"></script>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
</body>

</html>
