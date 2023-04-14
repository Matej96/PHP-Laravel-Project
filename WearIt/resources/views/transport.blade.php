@extends('layout.main')

@section('custom')
    <link rel="stylesheet" href="{{asset('css/style_main.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_transport_payment.css')}}">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="container-fluid data-container">
        <div class="row nadpis_row">
            <h4 class="mt-3 mb-3">Môj košík / <strong>Výber spôsob dopravy a platby</strong> / Fakturačne a dodacie
                údaje /
                Dokončenie objednávky</h4>
            <h2 class="mt-3 mb-3">Výber spôsob dopravy a platby</h2>
        </div>
        <div class="row payment_row">
            <h3 class="mt-3 mb-3 nadpis_unroll">Zvoľte spôsob platby</h3>
            <div class="unroll-container" id="unroll-container-payment">
                <div class="unroll-header">
                    <h4>Platobnou kartou online</h4>
                    <span"><strong>Zadarmo</strong></span>
                </div>
                <div class="unroll-content">
                        <span>Platba kartou - platba je realizovaná bez poplatkov, vysoká úroveň zabezpečenia, skrátenie
                            dodacej lehoty zákazníkovi, k dispozícii 24 hodín denne po celý rok.</span>
                </div>
            </div>
            <div class="unroll-container" id="unroll-container-payment">
                <div class="unroll-header">
                    <h4>Bankovým prevodom</h4>
                    <span"><strong>Zadarmo</strong></span>
                </div>
                <div class="unroll-content">
                        <span>Objednávka sa začne vybavovať až po tom, čo bude platba prevedená na náš účet. Banka Vám
                            peniaze odráta z účtu okamžite, kým ju však banka prevedie k nám, môže trvať 1 deň.</span>
                </div>
            </div>
            <div class="unroll-container" id="unroll-container-payment">
                <div class="unroll-header">
                    <h4>Dobierkou pri prevziatí balíčku</h4>
                    <span><strong>Zadarmo</strong></span>
                </div>
                <div class="unroll-content">
                        <span>Dobierku platíte v hotovosti pri doručení tovaru kuriérom. Dobierku môžete platiť v
                            hotovosti alebo kartou. </span>
                </div>
            </div>
        </div>
        <div class="row transport_row">
            <h3 class="mt-3 mb-3 nadpis_unroll">Zvoľte spôsob dopravy</h3>
            <div class="unroll-container" id="unroll-container-transport">
                <div class="unroll-header">
                    <h4>Doručenie domov</h4>
                    <span"><strong>5,96€</strong></span>
                </div>
                <div class="unroll-content">
                        <span>Tovar je zasielaný balíkom prostredníctvom kuriérskej služby s doručením 48 hodín po
                            odoslaní. Výhoda výberu dopravy kuriérom je v tom, že Vám tovar bude zaslaný priamo na Vašu
                            adresu a kuriér vám prinesie práve na vašu adresu doručenia. Nemusíte už nikam chodiť pre
                            balík</span>
                </div>
            </div>
            <div class="unroll-container" id="unroll-container-transport">
                <div class="unroll-header">
                    <h4>Výdajné miesto pre osobný odber zásielky</h4>
                    <span"><strong>Zadarmo</strong></span>
                </div>
                <div class="unroll-content">
                        <span>Možnosť osobného odberu Vám umožňuje prísť si tovar vyzdvihnúť do našej predajne v Čadci
                            na ulici Palaričková 69. Výhodou osobného odberu je možnosť skontrolovať si objednaný tovar
                            ihneď, prípadne konzultovať tovar s personálom.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-3 buttony">
            <div class="col-12 col-sm-5 first_btn">
                <button class="btn btn-primary px-3 data_button" type="submit"
                        onclick="window.location.href='shopping_cart_page.html'">
                    <i class="bi bi-backspace"></i> Naspäť do košíka
            </div>
            <div class="col-12 col-sm-5 second_btn">
                <button class="btn btn-primary px-3 data_button" type="submit"
                        onclick="window.location.href='order_shipping_payment_page.html'">
                    <i class="bi bi-bag-check"></i> Fakturačne a dodacie údaje
                </button>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/script_trasnport_payment.js')}}"></script>
@endsection
