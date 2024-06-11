<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet"  href="{{ url('fkhco/css/products.css') }} "/>
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
      <section id="all-product" class="all-product-wrap">
        <div class="container category-products-wrapped">
          <div class="category-master">
            <div class="category-title">
              <h1 class="categoryTitle">Casual</h1>
              <div class="sort-by">
                <p>Sort category :</p>
                <select class="selectCategory">
                  <option class="option" value="Casual">Casual</option>
                  <option class="option" value="Formal">Formal</option>
                  <option class="option" value="Gym">Gym</option>
                </select>
              </div>
            </div>
            <div class="category-product">
              <div class="card">
                <div class="image-wrap">
                  <img
                    src="{{url("fkhco/assets/png/products/hoodie.png")}}"
                    alt="product-image"
                    loading="lazy"
                  />
                </div>
                <div class="product-details">
                  <p class="product-title">Gym Hoodie</p>
                  <div class="rating">
                    <div class="stars">
                      @for ($i = 0; $i < 5; $i++)
                        <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                      @endfor
                    </div>
                    <p class="rate">4.5/5</p>
                  </div>
                  <p class="price">$120</p>
                </div>
              </div>
              <div class="card">
                <div class="image-wrap">
                  <img
                    src="{{url("fkhco/assets/png/products/hoodie.png")}}"
                    alt="product-image"
                    loading="lazy"
                  />
                </div>
                <div class="product-details">
                  <p class="product-title">Formal Hoodie</p>
                  <div class="rating">
                    <div class="stars">
                      @for ($i = 0; $i < 5; $i++)
                        <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                      @endfor
                    </div>
                    <p class="rate">4.5/5</p>
                  </div>
                  <p class="price">$120</p>
                </div>
              </div>
              <div class="card">
                <div class="image-wrap">
                  <img
                    src="{{url("fkhco/assets/png/products/hoodie.png")}}"
                    alt="product-image"
                    loading="lazy"
                  />
                </div>
                <div class="product-details">
                  <p class="product-title">Casual Hoodie</p>
                  <div class="rating">
                    <div class="stars">
                      @for ($i = 0; $i < 5; $i++)
                        <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                      @endfor
                    </div>
                    <p class="rate">4.5/5</p>
                    </div>@php
                    $imageCover = json_decode($product->image);
                    @endphp
                    <div class="swiper-slide card">
                    <a href="{{ Route('ecomPages.product-detail',
                    $product->id_stok) }}">
                    <div class="image-wrap">
                    <img src="{{ asset('storage/foto-produk/' .
                    $imageCover[0]) }}" alt="product-image" loading="lazy" />
                    </div>
                    <div class="product-detail">
                    <p class="product-title">{{ $product->nama_stok
                    }}</p>
                    <div class="rating">
                    <div class="stars">
                    @for ($i = 0; $i < 5; $i++)
                    <img src="{{
                    url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                    @endfor
                    </div>
                    <p class="rate">4.5/5</p>
                    </div>
                                <p class="price">{{ 'Rp. ' .
number_format($product->harga_jual, 0, ',', '.') }}</p>
                            </div>
                            </a>
                        </div>
                  <p class="price">$120</p>
                </div>
              </div>
              <div class="card">
                <div class="image-wrap">
                  <img
                    src="{{url("fkhco/assets/png/products/hoodie.png")}}"
                    alt="product-image"
                    loading="lazy"
                  />
                </div>
                <div class="product-details">
                  <p class="product-title">Gym Hoodie</p>
                  <div class="rating">
                    <div class="stars">
                      @for ($i = 0; $i < 5; $i++)
                        <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                      @endfor
                    </div>
                    <p class="rate">4.5/5</p>
                  </div>
                  <p class="price">$120</p>
                </div>
              </div>
              <div class="card">
                <div class="image-wrap">
                  <img
                    src="{{url("fkhco/assets/png/products/hoodie.png")}}"
                    alt="product-image"
                    loading="lazy"
                  />
                </div>
                <div class="product-details">
                  <p class="product-title">Formal Hoodie</p>
                  <div class="rating">
                    <div class="stars">
                      @for ($i = 0; $i < 5; $i++)
                        <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                      @endfor
                    </div>
                    <p class="rate">4.5/5</p>
                  </div>
                  <p class="price">$120</p>
                </div>
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
    <script src="js/app.js"></script>
  </body>
</html>
