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
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="col-md-6 col-12 first-half">
                <h5 class="my-4">{{$data['category']}}/Oblečenie</h5>
                <div style="--swiper-navigation-color: rgba(255,255,255,.80); --swiper-pagination-color: #fff"
                     class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @foreach($data['images'] as $image_path)
                            <div class="swiper-slide">
                                <img src="{{$image_path}}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($data['images'] as $image_path)
                            <div class="swiper-slide">
                                <img src="{{$image_path}}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12 second-half">
                <div class="content">
                    <hr style="height: 2px; background: black; margin-top: 6rem;">
                    <div class="row">
                        <h2 class="my-4 title-product">{{$data['product']->product_name}}</h2>
                        <h3 class="mt-3 mb-5 price-tag">Cena: {{$data['product']->price}} €</h3>
                        <h3 class="mt-3 mb-5 price-tag">Kategoria oblečenia: {{$data['category']}}</h3>
                        <h3 class="mt-3 mb-5 price-tag">Farba oblečenia: {{$data['color']}}</h3>
                    </div>
                    <hr style="height: 2px; background: black;">
                    <form id="add-to-cart-form" action="{{ route('cart_add', ['product_id' => $data['product']->id, '']) }}" method="POST" onsubmit="checkSizeAndSubmit();">
                        @csrf
                        <div class="row dropdowns">
                            <div class=" col-6 col-sm-3 dropdown">
                                <button class="btn btn-secondary dropdown-toggle px-4 py-2" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Velkost
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="row">
                                        <div class="col">
                                            @foreach($data['sizes'] as $size)
                                                <div class="form-check" name="size">
                                                    <input value="{{$size->id}}" class="form-check-input" type="radio" name="size" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        {{$size->size_name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row counter_row">
                            <div class="qty">
                                <div class="counter_div">
                                    <span class="minus bg-dark">-</span>
                                    <input type="text" id="quantity" class="count" name="quantity" value="1">
                                    <span class="plus bg-dark">+</span>
                                </div>
                                <button type="submit" class="col-7 ms-3 btn btn-outline-success add-cart">
                                    Pridať do košíka
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="mt-5 mb-4 h2-header">Popis</h2>
            <div class="p-description">
                <p class="mx-5 mt-3">
                    {{$data['product']->product_description}}
                </p>
            </div>
        </div>
    </div>
@endsection


@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/script_product.js')}}"></script>
    <script>
        function checkSizeAndSubmit() {
            let sizeSelected = $("input[name='size']:checked").length > 0;

            if (!sizeSelected) {
                alert("Prosím, vyberte veľkosť!");
            } else {
                $("#add-to-cart-form").submit();
            }
        }
    </script>
@endsection
