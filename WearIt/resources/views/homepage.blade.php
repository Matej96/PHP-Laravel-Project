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
                        @foreach($data['sales'] as $sale)
                            <div class="swiper-slide">
                                <div class="img_box">
                                    <a href="{{route('product_page', ['id' => $sale->id])}}">
                                        <img src="{{ $sale->image_url }}">
                                    </a>
                                </div>
                                <div class="content">
                                    <h3>{{$sale->product_name}}</h3>
                                    <h3>Cena: {{$sale->price}} €</h3>
                                </div>
                            </div>
                        @endforeach
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
                        @foreach($data['new'] as $new)
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="{{route('product_page', ['id' => $new->id])}}">
                                    <img src="{{ $new->image_url }}">
                                </a>
                            </div>
                            <div class="content">
                                <h3>{{$new->product_name}}</h3>
                                <h3>Cena: {{$new->price}} €</h3>
                            </div>
                        </div>
                        @endforeach
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
                        @foreach($data['popular'] as $popular)
                        <div class="swiper-slide">
                            <div class="img_box">
                                <a href="{{route('product_page', ['id' => $popular->id])}}">
                                    <img src="{{ $popular->image_url }}">
                                </a>
                            </div>
                            <div class="content">
                                <h3>{{$popular->product_name}}</h3>
                                <h3>Cena: {{$popular->price}} €</h3>
                            </div>
                        </div>
                        @endforeach
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


