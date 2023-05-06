@extends('layout.main')

@section('custom')
    <link rel="stylesheet" href="{{asset('css/style_main.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_transport_payment.css')}}">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <form action="{{route('order')}}" method="POST">
        @csrf
        <input type="hidden" name="selected_payment" id="selected_payment" value="">
        <input type="hidden" name="selected_transport" id="selected_transport" value="">

        <div class="container-fluid data-container">
            <div class="row nadpis_row">
                <h4 class="mt-3 mb-3">Môj košík / <strong>Výber spôsob dopravy a platby</strong> / Fakturačne a dodacie
                    údaje /
                    Dokončenie objednávky</h4>
                <h2 class="mt-3 mb-3">Výber spôsob dopravy a platby</h2>
            </div>
            <div class="row payment_row">
                <h3 class="mt-3 mb-3 nadpis_unroll">Zvoľte spôsob platby</h3>
                @foreach($data['payments'] as $payment)
                    <div class="unroll-container" id="unroll-container-payment" data-payment-id="{{ $payment->id }}">
                        <div class="unroll-header">
                            <h4>{{$payment->type}}</h4>
                            <span><strong>
                            @if($payment->price == 0)
                                        {{'Zadarmo'}}
                                    @else
                                        {{$payment->price . ' €'}}
                                    @endif
                        </strong></span>
                        </div>
                        <div class="unroll-content">
                            <span>{{$payment->description}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row transport_row">
                <h3 class="mt-3 mb-3 nadpis_unroll">Zvoľte spôsob dopravy</h3>
                @foreach($data['transports'] as $transport)
                    <div class="unroll-container" id="unroll-container-transport" data-transport-id="{{ $transport->id }}">
                        <div class="unroll-header">
                            <h4>{{$transport->type}}</h4>
                            <span>
                            <strong>
                                @if($transport->price == 0)
                                    {{'Zadarmo'}}
                                @else
                                    {{$transport->price . ' €'}}
                                @endif
                            </strong>
                        </span>
                        </div>
                        <div class="unroll-content">
                            <span>{{$transport->description}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-3 buttony">
                <div class="col-12 col-sm-5 first_btn">
                    <button class="btn btn-primary px-3 data_button" id="back-to-cart" type="button">
                        <i class="bi bi-backspace"></i> Naspäť do košíka
                    </button>
                </div>
                <div class="col-12 col-sm-5 second_btn">
                    <button class="btn btn-primary px-3 data_button" type="submit"
                            onclick="window.location.href='order_shipping_payment_page.html'">
                        <i class="bi bi-bag-check"></i> Fakturačne a dodacie údaje
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('customJs')
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/script_trasnport_payment.js')}}"></script>
    <script>
        document.getElementById('back-to-cart').addEventListener('click', function() {
            window.location.href = '{{ route('cart') }}';
        });
    </script>
@endsection
