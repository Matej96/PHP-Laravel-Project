@extends('layout.main')

@section('custom')
    <link rel="stylesheet" href="{{asset('css/style_main.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_delivery_page.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>

@endsection

@section('content')
    <div class="container-fluid data_container">
        <div class="row nadpis_row">
            <h4 class="mt-3 mb-3">Môj košík / Výber spôsob dopravy a platby / Fakturačne a dodacie údaje /
                <strong>Dokončenie objednávky</strong>
            </h4>
            <h2 class="mt-3 mb-3">Dokončenie objednávky</h2>
        </div>
        <div class="row obsah_row">
            <div>
                <h4>Názov a množstvo produktu:</h4>
                <span>Cena produktu:</span>
            </div>
            <div>
                <h4>2x Mikina Gant</h4>
                <span>141,06€</span>
            </div>
            <div>
                <h4>1x Prechodná bunda Nike</h4>
                <span>69,69€</span>
            </div>
            <div>
                <h4>1x Mikina Alpha Industries</h4>
                <span>39,90€</span>
            </div>
        </div>
        <hr style="height: 2px; background: black;">
        <div class="row obsah_row">
            <div>
                <h4>Platba kartou online</h4>
                <span>Zadarmo</span>
            </div>
            <div>
                <h4>Doručenie domov</h4>
                <span>Zadarmo</span>
            </div>
        </div>
        <hr style="height: 2px; background: black;">
        <div class="row obsah_row">
            <div>
                <h4>Cena dokopy</h4>
                <span>250,65€</span>
            </div>
        </div>
        <hr style="height: 2px; background: black;">
        <div class="row obsah_row">
            <div>
                <h4>Dátum doručenia</h4>
                <span>20.4 - 22.5 2023</span>
            </div>
        </div>
        <hr style="height: 2px; background: black;">
        <div class="row obsah_row">
            <ul class="col-6">
                <h4>Fakturačné údaje</h4>
                <li>Meno priezvisko: Peter Pan</li>
                <li>Telefón: +421 944 212 601</li>
                <li>Krajina: Slovensko</li>
                <li>Adresa: Skalité 862, 02314</li>
            </ul>
            <ul class="col-6">
                <h4>Dodacie ídaje</h4>
                <li>Meno priezvisko: Peter Pan</li>
                <li>Telefón: +421 944 212 601</li>
                <li>Krajina: Slovensko</li>
                <li>Adresa: Skalité 862, 02314</li>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-3 buttony">
            <div class="col-12 col-sm-5 first_btn">
                <button class="btn btn-primary px-3 data_button" type="submit"
                        onclick="window.location.href='order_shipping_payment_page.html'">
                    <i class="bi bi-backspace"></i> Naspäť k údajom
                </button>
            </div>
            <div class="col-12 col-sm-5 second_btn">
                <button class="btn btn-primary px-3 data_button" type="submit"
                        onclick="window.location.href='landing_page.html'">
                    <i class="bi bi-bag-check"></i> Dokončiť
                </button>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script src={{asset('js/navbar.js')}}"></script>
@endsection
