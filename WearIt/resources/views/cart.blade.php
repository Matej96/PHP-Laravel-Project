+@extends('layout.main')

@section('custom')
    <link rel="stylesheet" href="{{asset('css/style_main.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_shopping_cart_page.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>

@endsection

@section('content')
    <div class="container-fluid data_container">
        <div class="row nadpis_row">
            <h4 class="mt-3 mb-3"><strong>Môj košík</strong> / Výber spôsob dopravy a platby / Fakturačne a dodacie údaje /
                Dokončenie
            </h4>
            <h2 class="mt-3 mb-3">Môj košík</h2>
        </div>
    </div>
    <div class="container-fluid obsah_container">
        @foreach($products as $product)
            <div class="container-fluid mb-4 card_container">
                <div class="row remove_btn_row">
                    <button type="button" class="btn btn-danger remove_button">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <img src="images/product1.png" alt="">
                            </div>
                            <div class="col-10 mt-3">
                                <div class="row">
                                    <h4>Názov produktu: {{ $product->product_name }}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-12 velkost">
                                        <h5>Veľkosť: {{ $product->size_name }}</h5>
                                        <h5>Farba: {{ $product->color_name }}</h5>
                                    </div>
                                    <div class="col-12 col-md-5 cena">
                                        <h3>Cena: {{ $product->price }}€</h3>
                                    </div>
                                    <div class="col-3 col-md-7 qty">
                                        <div class="counter_btn">
                                            <div class="counter_div">
                                                <span class="minus bg-dark">-</span>
                                                <input type="number" class="count" name="qty" value="{{ $product->amount }}">
                                                <span class="plus bg-dark">+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{--    <div class="container-fluid obsah_container">--}}
    {{--        <div class="container-fluid mb-4 card_container">--}}
    {{--            <div class="row remove_btn_row">--}}
    {{--                <button type="button" class="btn btn-danger remove_button">--}}
    {{--                    <i class="bi bi-x-circle-fill"></i>--}}
    {{--                </button>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="container-fluid">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-12 col-md-2">--}}
    {{--                            <img src="images/product1.png" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-10 mt-3">--}}
    {{--                            <div class="row">--}}
    {{--                                <h4>Názov produktu: Mikina GANT</h4>--}}
    {{--                            </div>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-12 velkost">--}}
    {{--                                    <h5>Veľkosť: M</h5>--}}
    {{--                                    <h5>Farba: Červená</h5>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-12 col-md-5 cena">--}}
    {{--                                    <h3>Cena: 70,53€</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-3 col-md-7 qty">--}}
    {{--                                    <div class="counter_btn">--}}
    {{--                                        <div class="counter_div">--}}
    {{--                                            <span class="minus bg-dark">-</span>--}}
    {{--                                            <input type="number" class="count" name="qty" value="1">--}}
    {{--                                            <span class="plus bg-dark">+</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="container-fluid mb-4 card_container">--}}
    {{--            <div class="row remove_btn_row">--}}
    {{--                <button type="button" class="btn btn-danger remove_button">--}}
    {{--                    <i class="bi bi-x-circle-fill"></i>--}}
    {{--                </button>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="container-fluid">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-12 col-md-2">--}}
    {{--                            <img src="images/product2.png" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-10 mt-3">--}}
    {{--                            <div class="row">--}}
    {{--                                <h4>Názov produktu: Mikina Alpha Industries</h4>--}}
    {{--                            </div>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-12 velkost">--}}
    {{--                                    <h5>Veľkosť: L</h5>--}}
    {{--                                    <h5>Farba: Modrá</h5>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-12 col-md-5 cena">--}}
    {{--                                    <h3>Cena: 39,90€</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-3 col-md-7 qty">--}}
    {{--                                    <div class="counter_btn">--}}
    {{--                                        <div class="counter_div">--}}
    {{--                                            <span class="minus bg-dark">-</span>--}}
    {{--                                            <input type="number" class="count" name="qty" value="1">--}}
    {{--                                            <span class="plus bg-dark">+</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="container-fluid mb-4 card_container">--}}
    {{--            <div class="row remove_btn_row">--}}
    {{--                <button type="button" class="btn btn-danger remove_button">--}}
    {{--                    <i class="bi bi-x-circle-fill"></i>--}}
    {{--                </button>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="container-fluid">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-12 col-md-2">--}}
    {{--                            <img src="images/product4.png" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-10 mt-3">--}}
    {{--                            <div class="row">--}}
    {{--                                <h4>Názov produktu: Prechodná bunda Nike</h4>--}}
    {{--                            </div>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-12 velkost">--}}
    {{--                                    <h5>Veľkosť: S</h5>--}}
    {{--                                    <h5>Farba: Žltá</h5>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-12 col-md-5 cena">--}}
    {{--                                    <h3>Cena: 69,69€</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-3 col-md-7 qty">--}}
    {{--                                    <div class="counter_btn">--}}
    {{--                                        <div class="counter_div">--}}
    {{--                                            <span class="minus bg-dark">-</span>--}}
    {{--                                            <input type="number" class="count" name="qty" value="1">--}}
    {{--                                            <span class="plus bg-dark">+</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="container-fluid mb-4 card_container">--}}
    {{--            <div class="row remove_btn_row">--}}
    {{--                <button type="button" class="btn btn-danger remove_button">--}}
    {{--                    <i class="bi bi-x-circle-fill"></i>--}}
    {{--                </button>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="container-fluid">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-12 col-md-2">--}}
    {{--                            <img src="images/product5.png" alt="">--}}
    {{--                        </div>--}}
    {{--                        <div class="col-10 mt-3">--}}
    {{--                            <div class="row">--}}
    {{--                                <h4>Názov produktu: Šaty Izzie Raere</h4>--}}
    {{--                            </div>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-12 velkost">--}}
    {{--                                    <h5>Veľkosť: M</h5>--}}
    {{--                                    <h5>Farba: Čierna</h5>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-12 col-md-5 cena">--}}
    {{--                                    <h3>Cena: 75,56€</h3>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-3 col-md-7 qty">--}}
    {{--                                    <div class="counter_btn">--}}
    {{--                                        <div class="counter_div">--}}
    {{--                                            <span class="minus bg-dark">-</span>--}}
    {{--                                            <input type="number" class="count" name="qty" value="1">--}}
    {{--                                            <span class="plus bg-dark">+</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="container-fluid finish_div">
        <div class="row">
            <div class="col-12 col-md-6 all_price">
                <h2>Cena: 255,68€</h2>
            </div>
            <div class="col-12 col-md-6 finish_btn">
                <button class="btn btn-primary px-3 order_button" type="submit"
                        onclick="window.location.href='transport_payment.html'">
                    <i class="bi bi-bag-check"></i> Dokončenie objednávky
                </button>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/script_shopping_cart.js')}}"></script>
@endsection
