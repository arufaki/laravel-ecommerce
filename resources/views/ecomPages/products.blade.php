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
        @include('ecomPages.component.header')
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
              @foreach ($newProduct as $product)
                @php
                  $imageCover = json_decode($product->image);
                @endphp
                <a href="{{ Route('ecomPages.product-detail', $product->id_stok) }}">
                  <div class="card">
                    <div class="image-wrap">
                      <img src="{{ asset('storage/foto-produk/' .$imageCover[0]) }}" alt="product-image" loading="lazy" />
                    </div>
                    <div class="product-details">
                      <p class="product-title">{{ $product->nama_stok}}</p>
                      <div class="rating">
                        <div class="stars">
                          @for ($i = 0; $i < 5; $i++)
                            <img src="{{ url('fkhco/assets/svg/rating.svg') }}" alt="rating" />
                          @endfor
                        </div>
                        <p class="rate">4.5/5</p>
                      </div>
                      <p class="price">{{ 'Rp. ' .number_format($product->harga_jual, 0, ',', '.') }}</p>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer>
      @include('ecomPages.component.footer')
  </footer>
    <script src="js/app.js"></script>
  </body>
</html>
