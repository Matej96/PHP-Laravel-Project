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
    <form action="{{route('create_order', ['order' => $data['order']])}}" method="POST">
        @csrf
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
                @foreach($data['products'] as $product)
                    <div>
                        <h4>{{$product->amount}}x {{$product->product_name}}</h4>
                        <span>{{$product->price}}€</span>
                    </div>
                @endforeach
            </div>
            <hr style="height: 2px; background: black;">
            <div class="row obsah_row">
                <div>
                    <h4>{{$data['payment']->type}}</h4>
                    <span>{{$data['payment']->price}}€</span>
                </div>
                <div>
                    <h4>{{$data['transport']->type}}</h4>
                    <span>{{$data['transport']->price}}€</span>
                </div>
            </div>
            <hr style="height: 2px; background: black;">
            <div class="row obsah_row">
                <div>
                    <h4>Cena dokopy</h4>
                    <span>{{$data['price']}}</span>
                </div>
            </div>
            <hr style="height: 2px; background: black;">
            <div class="row obsah_row">
                <ul class="col-6">
                    <h4>Fakturačné údaje</h4>
                    <li>Meno priezvisko: {{$data['order']['first_name']}} {{$data['order']['last_name']}}</li>
                    <li>Telefón: {{$data['order']['phone_number']}}</li>
                    <li>Krajina: {{$data['order']['country']}}</li>
                    <li>Adresa: {{$data['order']['city']}} {{$data['order']['house_number']}}, {{$data['order']['prc']}}</li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-3 buttony">
                <div class="col-12 col-sm-5 first_btn">
                    <button class="btn btn-primary px-3 data_button" id="back-to-transport" type="button">
                        <i class="bi bi-backspace"></i> Naspäť k údajom
                    </button>
                </div>
                <div class="col-12 col-sm-5 second_btn">
                    <button class="btn btn-primary px-3 data_button" type="submit">
                        <i class="bi bi-bag-check"></i> Dokončiť
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script>
        document.getElementById('back-to-cart').addEventListener('click', function() {
            window.location.href = '{{ route('finish_order') }}';
        });
    </script>
@endsection
