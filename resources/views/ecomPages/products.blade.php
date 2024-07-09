<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/products.css') }} " />
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
                        <h1 class="categoryTitle">Products</h1>
                        <div class="sort-by">
                            <div class="sort-by-brand sort-wrap">
                                <p>Filter by Brand :</p>
                                <select id="selectBrand">
                                    @php
                                        $dataBrand = \DB::table('brand')->get();
                                    @endphp
                                    <option selected value="allBrand">All Brand</option>
                                    @foreach ($dataBrand as $record)
                                        <option class="option" value="{{ $record->nama_brand }}">
                                            {{ $record->nama_brand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sort-by-category sort-wrap">
                                <p>Filter by Category :</p>
                                <select id="selectCategory">
                                    @php
                                        $dataKategori = \DB::table('tbkategori')->get();
                                    @endphp
                                    <option selected value="allCategory">All Category</option>
                                    @foreach ($dataKategori as $record)
                                        <option class="option" value="{{ $record->nama_kategori }}">
                                            {{ $record->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (count($products) > 0)
                        <ul class="cards">
                            @if ($isSearch)
                                @foreach ($products as $product)
                                    <li class="card" data-category="{{ $product->nama_kategori }}"
                                        data-brand="{{ $product->nama_brand }}">
                                        @php
                                            $imageCover = json_decode($product->image);
                                        @endphp
                                        <a href="{{ Route('ecomPages.product-detail', $product->id_stok) }}"
                                            class="card-product-master"></a>
                                        <div class="card-image">
                                            <img src="{{ asset('storage/foto-produk/' . $imageCover[0]) }}"
                                                alt="product-image" loading="lazy" />
                                        </div>
                                        <div class="product-details">
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
                                    </li>
                                @endforeach
                            @else
                                @foreach ($products as $product)
                                    <li class="card" data-category="{{ $product->nama_kategori }}"
                                        data-brand="{{ $product->nama_brand }}">
                                        @php
                                            $imageCover = json_decode($product->image);
                                        @endphp
                                        <a href="{{ Route('ecomPages.product-detail', $product->id_stok) }}"
                                            class="card-product-master"></a>
                                        <div class="card-image">
                                            <img src="{{ asset('storage/foto-produk/' . $imageCover[0]) }}"
                                                alt="product-image" loading="lazy" />
                                        </div>
                                        <div class="product-details">
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
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    @else
                        <p>product Not Found!</p>
                    @endif
                </div>
            </div>
        </section>
    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
    <script src="{{ url('fkhco/js/products.js') }}"></script>
</body>

</html>
