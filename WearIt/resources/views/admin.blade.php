@extends('layout.main_admin')

@section('custom')
    <link href="{{ asset('css/style_main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style_admin_main_page.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<section class="admin_section">
    <div class="row card_row">
        @foreach($data['products'] as $product)
            <div class="card col-lg-3 col-md-4 col-sm-6">
                <div class="card-header">
                    <div class="row">
                        <div class="text-end">
                            <button class="btn btn-warning btn-outline-dark btn-sm"
                                    onclick="window.location.href='admin_add_product_page.html'">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <form action="{{ route('remove.data', ['id' => $product->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger btn-outline-dark btn-sm remove_button">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="img_box">
                    <a href="{{route('product_page', ['id' => $product->id])}}">
                        <img src="{{asset($product->product_image)}}" class="card-img"/>
                    </a>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{$product->product_name}}</h5>
                    <h5 class="card-text">Cena: {{$product->price}} €</h5>
                </div>
            </div>
        @endforeach
            <div >
                {{ $data['products']->links('vendor.pagination.bootstrap-4') }}
            </div>
    </div>
  </section>
@endsection

@section('customJs')

@endsection
