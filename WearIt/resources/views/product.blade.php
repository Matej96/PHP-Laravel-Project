@extends('layout.main')

@section('custom')
    <link href="{{ asset('css/style_main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style_product_page.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-12 first-half">
                <h5 class="my-4">Pánske/Oblečenie/Mikiny</h5>
                <div style="--swiper-navigation-color: rgba(255,255,255,.80); --swiper-pagination-color: #fff"
                     class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="images/product1.png" />
                        </div>
                        <div class="swiper-slide">
                            <img src="images/product1_2.png" />
                        </div>
                        <div class="swiper-slide">
                            <img src="images/product1_3.png" />
                        </div>
                        <div class="swiper-slide">
                            <img src="images/product1_4.png" />
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="images/product1.png" />
                        </div>
                        <div class="swiper-slide">
                            <img src="images/product1_2.png" />
                        </div>
                        <div class="swiper-slide">
                            <img src="images/product1_3.png" />
                        </div>
                        <div class="swiper-slide">
                            <img src="images/product1_4.png" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12 second-half">
                <div class="content">
                    <hr style="height: 2px; background: black; margin-top: 6rem;">
                    <div class="row">
                        <h2 class="my-4 title-product">GANT</h2>
                        <h3 class="mt-3 mb-5 price-tag">Cena: 70,53 €</h3>
                        <h3 class="mt-3 mb-5 price-tag">Typ oblečenia: Mikina</h3>
                    </div>
                    <hr style="height: 2px; background: black;">
                    <div class="row dropdowns">
                        <div class=" col-6 col-sm-3 dropdown">
                            <button class="btn btn-secondary dropdown-toggle px-4 py-2" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Velkost
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                XXXL
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                XXL
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                XL
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                L
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                M
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                S
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                XS
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                XXS
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 dropdown">
                            <button class="btn btn-secondary dropdown-toggle px-4 py-2" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Farba
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:red"></div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:blue"></div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:black"></div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:grey"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:coral"></div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:chocolate"></div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:darkolivegreen"></div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                <div class="color" style="background-color:salmon"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row counter_row">
                        <div class="qty mt-5">
                            <div class="counter_div">
                                <span class="minus bg-dark">-</span>
                                <input type="number" class="count" name="qty" value="1">
                                <span class="plus bg-dark">+</span>
                            </div>
                            <button class="col-7 ms-3 btn btn-outline-success add-cart">
                                <i class="bi bi-cart-plus">Pridat do kosika</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="mt-5 mb-4 h2-header">Popis</h2>
            <div class="p-description">
                <p class="mx-5 mt-3">Mikina značky GANT je vyrobená z kvalitného a mäkkého materiálu, ktorý zaručuje pohodlné
                    a príjemné nosenie.
                    Jej strih je moderný a nadčasový, s dlhými rukávmi a okrúhlym výstrihom. Vpred je vybavená praktickým
                    zipsom, ktorý umožňuje regulovať teplotu a pohodlie v závislosti od počasia.
                    <br>
                    <br>
                    Na hrudi má mikina nápis GANT, ktorý je symbolom značky a zaručuje vysokú kvalitu a štýl.
                    Je k dispozícii v rôznych farbách, ktoré sa ľahko kombinujú s rôznymi kúskami oblečenia.
                    Táto mikina je ideálnym doplnkom pre každodenné použitie a vhodná pre ľudí, ktorí ocenia vysokú kvalitu a
                    eleganciu.
                </p>
            </div>
            <h2 class="mt-5 mb-4 h2-header">Detaily</h2>
            <div class="row mb-5 details">
                <div class="col-md-6 pt-3 p-description">
                    <ul>
                        <li>Potlač loga</li>
                        <li>Teplákovina</li>
                        <li>S kapucňou</li>
                    </ul>
                </div>
                <div class="col-md-6 pt-3 p-description">
                    <ul>
                        <li>Rovný strih</li>
                        <li>Výšivka znaku</li>
                        <li>Klokanie vrecka</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/script_product.js')}}"></script>
@endsection
