<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FKH.CO</title>
    <link rel="stylesheet" href="{{ url('fkhco/css/cart.css') }}" />
    <link rel="stylesheet" href="{{ url('fkhco/css/checkout.css') }}" />
    <link rel="stylesheet" href="{{ url('fkhco/css/orders.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        @include('ecomPages.component.header')
    </header>
    <main>
        <section id="product-cart">
            <div class="cart-wrapped container">
                <div class="products-cart checkout-wrap">
                    <h1 style="font-weight:800; font-size:32px">YOUR ORDERS</h1>
                    <div class="swiper-checkout">
                        <div class="order-summary orders-user">
                            @php
                                $user = Auth()->user();
                                $getUserOrder = \DB::table('jual')
                                    ->where('id_user', $user->id)
                                    ->orderBy('id_penjualan', 'DESC')
                                    ->get();
                            @endphp
                            @foreach ($getUserOrder as $order)
                                <div class="order-wrap">
                                    <div class="order-info">
                                        <h6>ID Transaksi : {{ $order->no_bukti }}</h6>
                                        <p style="margin-bottom:5px">Tanggal Transaksi :
                                            <strong>{{ $order->tanggal }}</strong>
                                        </p>
                                        <p style="margin-bottom:5px">Ekspedisi :
                                            <strong>{{ $order->ekspedisi }}</strong>
                                        </p>
                                        <p style="margin-bottom:5px">Status :
                                            @if ($order->status == 'pending')
                                                Menunggu Konfirmasi
                                            @elseif($order->status == 'success')
                                                Pesanan Berhasil
                                            @elseif($order->status == 'rejected')
                                                Pesanan Ditolak
                                            @else
                                                Status Tidak Diketahui
                                            @endif
                                        </p>
                                    </div>
                                    @php
                                        $getMutasiJual = \DB::table('mutasi')
                                            ->leftJoin('tbstok', 'mutasi.id_stok', '=', 'tbstok.id_stok')
                                            ->where('no_bukti', $order->no_bukti)
                                            ->select('mutasi.*', 'tbstok.*')
                                            ->get();
                                    @endphp
                                    @foreach ($getMutasiJual as $mutasi)
                                        <div class="product-list">
                                            <div class="img-thumb">
                                                @php
                                                    $images = json_decode($mutasi->image);
                                                @endphp
                                                <img src="{{ asset('storage/foto-produk/' . $images[0]) }}"
                                                    alt="" width="100">
                                            </div>
                                            <div class="prod-info">
                                                <h6>{{ $mutasi->nama_stok }}</h6>
                                                <p>{{ $mutasi->qty }}x</p>
                                            </div>
                                            <p class="price-product">
                                                {{ 'Rp. ' . number_format($mutasi->harga_jual, 0, ',', '.') }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <footer>
        @include('ecomPages.component.footer')
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ url('fkhco/js/app.js') }}"></script>
</body>

</html>
