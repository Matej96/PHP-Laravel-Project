@extends('layout.main')

@section('custom')
    <link href="{{ asset('css/style_main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style_landing_page.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    @if (session('success'))
        <div id="error-message" class="alert alert-success alert-block">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <section class="main">
        <section class="slider_container">
            <h2>Akcie</h2>
            <div class="container">
                <div class="swiper card_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src={{ asset('images/product1.png') }}>
                                </a>
                            </div>
                            <div class="content">
                                <h3>Mikina GANT</h3>
                                <h3>Cena: 70,53 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src={{ asset('images/product2.png') }}>
                                </a>
                            </div>
                            <div class="content">
                                <h3>Mikina Alpha Industries</h3>
                                <h3>Cena: 39,90 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src={{ asset('images/product3.png') }}>
                                </a>
                            </div>
                            <div class="content">
                                <h3>Tenisky Air Max 90 Nike</h3>
                                <h3>Cena: 130,90 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src={{ asset('images/product4.png') }}>
                                </a>
                            </div>
                            <div class="content">
                                <h3>Prechodná bunda Nike</h3>
                                <h3>Cena: 69,69 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src={{ asset('images/product5.png') }}>
                                </a>
                            </div>
                            <div class="content">
                                <h3>Šaty Izzie Raere</h3>
                                <h3>Cena: 75,56 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src={{ asset('images/product6.png') }}>
                                </a>
                            </div>
                            <div class="content">
                                <h3>Kabelka Tommy Hilfiger</h3>
                                <h3>Cena: 120,20 €</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <section class="slider_container">
            <h2>Novinky</h2>
            <div class="container">
                <div class="swiper card_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product6.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Kabelka Tommy Hilfiger</h3>
                                <h3>Cena: 120,20 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product5.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Šaty Izzie Raere</h3>
                                <h3>Cena: 75,56 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product4.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Prechodná bunda Nike</h3>
                                <h3>Cena: 69,69 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product3.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Tenisky Air Max 90 Nike</h3>
                                <h3>Cena: 130,90 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product2.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Mikina Alpha Industries</h3>
                                <h3>Cena: 39,90 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product1.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Mikina GANT</h3>
                                <h3>Cena: 70,53 €</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <section class="slider_container">
            <h2>Populárne</h2>
            <div class="container">
                <div class="swiper card_slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product4.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Prechodná bunda Nike</h3>
                                <h3>Cena: 69,69 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product3.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Tenisky Air Max 90 Nike</h3>
                                <h3>Cena: 130,90 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product5.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Šaty Izzie Raere</h3>
                                <h3>Cena: 75,56 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product6.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Kabelka Tommy Hilfiger</h3>
                                <h3>Cena: 120,20 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product2.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Mikina Alpha Industries</h3>
                                <h3>Cena: 39,90 €</h3>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="product_page.html">
                                    <img src="images/product1.png">
                                </a>
                            </div>
                            <div class="content">
                                <h3>Mikina GANT</h3>
                                <h3>Cena: 70,53 €</h3>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src={{asset('js/navbar.js')}}></script>

    <script>
        var swiper = new Swiper(".card_slider", {
            spaceBetween: 30,
            Infinity: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            },

        });
    </script>
@endsection


