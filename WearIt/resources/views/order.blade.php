@extends('layout.main')

@section('custom')
    <link rel="stylesheet" href="{{asset('css/style_main.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_order_shipping_payment.css')}}">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div>
        {{$data['user']}}
    </div>
    <div class="container-fluid">
        <div class="row nadpis_row">
            <h4 class="mt-3 mb-3">Môj košík / Výber spôsob dopravy a platby / <strong>Fakturačne a dodacie údaje</strong> /
                Dokončenie objednávky</h4>
            <h2 class="mt-3 mb-3">Fakturačne a dodacie údaje</h2>
        </div>
        <div class="row fakturacne_row">
            <h3 class="mt-4 mb-4">Fakturačne údaje</h3>
            <div class="container-fluid">
                <ul class="row mb-3">
                    <li class="col-4">
                        <h5>Meno:</h5>
                        <input class="order_input" type="text" placeholder="Meno">
                    </li>
                    <li class="col-4">
                        <h5>Priezvisko:</h5>
                        <input class="order_input" type="text" placeholder="Priezvisko">
                    </li>
                    <li class="col-4">
                        <h5>Telefón:</h5>
                        <input class="order_input" type="text" placeholder="Telefon">
                    </li>
                </ul>
                <ul class="row mb-3">
                    <li class="col-4">
                        <h5>Adresa:</h5>
                        <input class="order_input" type="text" placeholder="Adresa">
                    </li>
                    <li class="col-4">
                        <h5>Krajina:</h5>
                        <input class="order_input" type="text" placeholder="Krajina">
                    </li>
                    <li class="col-4">
                        <h5>PSČ:</h5>
                        <input class="order_input" type="text" placeholder="PSC">
                    </li>
                </ul>
            </div>
            <div class="row mt-4 mb-4 checkbox_row">
                <div class="col-12 col-sm-6 checkbox_1">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Zapamätať fakturačné údaje
                        </label>
                    </div>
                </div>
                <div class="col-12 col-sm-6 checkbox_2">
                    <div class="form-check">
                        <input class="form-check-input" id="fakturacne_check" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Použiť za dodacie údaje fakturačné údaje
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row dodacie_row" id="dodacie">
            <h3 class="mt-4 mb-4">Dodacie údaje</h3>
            <div class="container-fluid">
                <ul class="row mb-3">
                    <li class="col-4">
                        <h5>Meno:</h5>
                        <input class="order_input" type="text" placeholder="Meno">
                    </li>
                    <li class="col-4">
                        <h5>Priezvisko:</h5>
                        <input class="order_input" type="text" placeholder="Priezvisko">
                    </li>
                    <li class="col-4">
                        <h5>Telefón:</h5>
                        <input class="order_input" type="text" placeholder="Telefon">
                    </li>
                </ul>
                <ul class="row mb-3">
                    <li class="col-4">
                        <h5>Adresa:</h5>
                        <input class="order_input" type="text" placeholder="Adresa">
                    </li>
                    <li class="col-4">
                        <h5>Krajina:</h5>
                        <input class="order_input" type="text" placeholder="Krajina">
                    </li>
                    <li class="col-4">
                        <h5>PSČ:</h5>
                        <input class="order_input" type="text" placeholder="PSC">
                    </li>
                </ul>
            </div>
            <div class="row mt-3 mb-5 div_check_btn">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Zapamätať dodacie údaje
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row buttony">
            <div class="col-12 col-sm-6">
                <button class="btn btn-primary px-3 order_button" type="submit"
                        onclick="window.location.href='transport_payment.html'">
                    <i class="bi bi-backspace"></i> Späť k doprave a platbe
                </button>
            </div>
            <div class="col-12 col-sm-6">
                <button class="btn btn-primary px-3 order_button" type="submit"
                        onclick="window.location.href='delivery_data_page.html'">
                    <i class="bi bi-bag-check"></i> Dokončenie objednávky
                </button>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/script_order_shipping_payment.js')}}"></script>
@endsection

