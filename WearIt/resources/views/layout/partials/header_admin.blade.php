<header>
    <nav class="navbar navbar-expand-md navbar-light p-0">
        <div class="container-fluid">
            <div class="col-md-1 col-2 me-">
                <a href="{{url('/admin')}}">
                    <img class="navbar-brand  text-center" src={{ asset('images/wtech_logo.png') }}>
                </a>
            </div>
            <div class="button_class_mobil pe-2">
                <a href="{{ route("admin_add_product", ['id' => null]) }}">
                    <button class="btn btn-outline-success">
              <span class="bi bi-plus-square">
                <span class="d-none">Pridať produkt</span>
              </span>
                    </button>
                </a>
                @auth
                    <form method="POST" action="{{ route('logout', ['id' => null]) }}">
                        @csrf
                        <button class="btn btn-outline-success">
                          <span class="bi bi-person">
                            <span class="button_spans">Odhlásenie</span>
                          </span>
                        </button>
                    </form>
                @endauth
            </div>
            <div class="button_class">
                <a href="{{ route("admin_add_product", ['id' => null]) }}">
                    <button class="btn btn-outline-success">
              <span class="bi bi-plus-square">
                <span class="button_spans">Pridať produkt</span>
              </span>
                    </button>
                </a>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-success">
                          <span class="bi bi-person">
                            <span class="button_spans">Odhlásenie</span>
                          </span>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>
</header>
