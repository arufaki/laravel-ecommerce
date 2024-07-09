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
        @php
            $user = Auth()->user();
            $getUserOrder = \DB::table('jual')
                ->where('id_user', $user->id)
                ->orderBy('id_penjualan', 'DESC')
                ->get();
        @endphp
        <section id="product-cart">
            <div class="cart-wrapped container">
                <div class="products-cart checkout-wrap">
                    <h1 style="font-weight:800; font-size:32px">YOUR ORDERS</h1>
                    <div class="swiper-checkout">
                        <div class="order-summary orders-user">
                            @foreach ($getUserOrder as $order)
                                <div class="order-wrap">
                                    <h6>ID Transaksi : {{ $order->no_bukti }}</h6>
                                    <p style="margin-bottom:5px">Tanggal Transaksi :
                                        <strong>{{ $order->tanggal }}</strong>
                                    </p>
                                    <p style="margin-bottom:5px">Ekspedisi : <strong>{{ $order->ekspedisi }}</strong>
                                    </p>
                                    <p style="margin-bottom:5px">Status : {{ $order->status }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="order-summary checkout-summary detail-order">

                </div>
            </div>
        </section>


        <!-- Modal for bank payment -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Method</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="bank-available">
                            <img src="{{ url('fkhco/assets/png/payment/bca.webp') }}" alt="bca" width="100"
                                class="bank bca bankSelected">
                            <img src="{{ url('fkhco/assets/png/payment/bri.webp') }}" alt="bca" width="120"
                                class="bank bri">
                            <img src="{{ url('fkhco/assets/png/payment/bni.webp') }}" alt="bca" width="100"
                                class="bank bni">
                            <img src="{{ url('fkhco/assets/png/payment/mandiri.webp') }}" alt="bca" width="100"
                                class="bank mandiri">
                        </div>
                        <div class="noRekening">
                            <h2 class="accountHeader">Account Number : <span class="accountNumber"></span></h2>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

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
