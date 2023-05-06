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
    <div id="message" class="alert alert-success alert-block" style="display: none">
        <strong>Produkt bol odstránený</strong>
    </div>
    @if (session('error'))
        <div id="error-message" class="alert alert-danger alert-block">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
    @if($products->count() == 0)
        <div class="alert alert-danger alert-block">
            <strong>Váš košík je prázdny!</strong>
        </div>
    @else
        <form action="{{ route('transport') }}" method="POST">
        @csrf
        <div class="container-fluid obsah_container">
            @foreach($products as $product)
                <div class="container-fluid mb-4 card_container">
                    <div class="row remove_btn_row">
                        <button type="button" class="btn btn-danger remove_button" data-id="{{ $product->product_variation_id.'-'.$product->cp_id }}" onclick="removeFromCart(event)">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                    </div>
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-2">
                                    <img src="{{ $product->image_url }}" alt="">
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
                                                        <input type="number" class="count" name="qty[{{ $product->product_variation_id }}]" value="{{ $product->amount }}" data-price="{{ $product->price }}">
                                                    <span class="plus bg-dark">+</span></div>
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

        <div class="container-fluid finish_div">
            <div class="row">
                <div class="col-12 col-md-6 all_price">
                    <h2>Cena: <span class="total-price">{{ $price }}</span>€</h2>
                </div>
                <div class="col-12 col-md-6 finish_btn">
                    <button class="btn btn-primary px-3 order_button" type="submit">
                        <i class="bi bi-bag-check"></i> Dokončenie objednávky
                    </button>
                </div>
            </div>
        </div>
    </form>
    @endif
@endsection

@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/script_shopping_cart.js')}}"></script>
    <script>
        function removeFromCart(event) {
            const button = event.target.closest('button');
            const productVariationId = button.dataset.id;
            const cardContainer = button.closest('.card_container');

            // Odoslanie AJAX požiadavky na odstránenie produktu z košíka
            fetch('{{ route('cart_delete') }}', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_variation_id: productVariationId
                })
            })
            .then(response => {
                if (response.ok) {
                    // Odstránenie položky z DOM
                    cardContainer.remove();

                    const messageElement = document.getElementById('message');
                    messageElement.style.display = 'block';

                    // Skrytie hlášky po 2,5 sekundách
                    setTimeout(() => {
                        messageElement.style.display = 'none';
                    }, 2500);
                } else {
                    console.error('Chyba pri odstraňovaní položky z košíka.');
                }
            })
            .catch(error => {
                console.error('Chyba pri odstraňovaní položky z košíka:', error);
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 2500);
            }
        });
    </script>
@endsection
