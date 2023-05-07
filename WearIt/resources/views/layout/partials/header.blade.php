<header>
    <nav class="navbar navbar-expand-md navbar-light p-0">
        <div class="container-fluid">
            <div class="col-md-1 col-2 me-">
                <a href="{{url('/')}}">
                    <img class="navbar-brand  text-center" src={{ asset('images/wtech_logo.png') }}>
                </a>
            </div>
            <div class="button_class_mobil pe-2">
                <a href="{{ route("cart") }}">
                    <button class="btn btn-outline-success">
              <span class="bi bi-cart">
                <span class="d-none">Nákupný košík</span>
              </span>
                    </button>
                </a>
                <a href="#login">
                    <button class="btn btn-outline-success">
                      <span class="bi bi-person">
                        <span class="d-none">Prihlásenie</span>
                      </span>
                    </button>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <div id="ss" class="search_div">
                    <form method="get" action="{{route('search_list')}}" class="d-flex me-4 formik">
                        <input class="form-control me-2 " name="search" type="search" placeholder="Vyhľadať tovar" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit"><i class="bi bi-search">
                                <span class="d-md-none"></span>
                            </i></button>
                    </form>
                </div>
                <ul class="nav navbar-nav me-auto navbar-nav-scroll">
                    <li class="nav-item woman-section">
                        <a class="nav-link" href="{{ route('product_list.index', ['id' => 2]) }}">Dámske</a>
                    </li>
                    <li class="nav-item man-section">
                        <a class="nav-link" href="{{ route('product_list.index', ['id' => 1]) }}">Pánske</a>
                    </li>
                    <li class="nav-item kids-section">
                        <a class="nav-link" href="{{ route('product_list.index', ['id' => 3]) }}">Detské</a>
                    </li>
                </ul>
            </div>
            <form method="get" action="{{route('search_list')}}" class="d-flex me-4">
                <input class="form-control me-2 " name="search" type="search" placeholder="Vyhľadať tovar" aria-label="Search">
                <button class="btn btn-outline-success " type="submit"><i class="bi bi-search">
                        <span class="d-md-none"></span>
                    </i></button>
            </form>
            <div class="button_class">
                <a href="{{ route("cart") }}">
                    <button class="btn btn-outline-success">
                      <span class="bi bi-cart">
                        <span class="button_spans">Košík</span>
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
                @else
                    <a class="login_a">
                        <button class="btn btn-outline-success">
                          <span class="bi bi-person">
                            <span class="button_spans">Prihlásenie</span>
                          </span>
                        </button>
                    </a>
                @endauth
            </div>
            <div id="login" class="overlay login_overlay">
                <div class="wrapper wrapper_popup">
                    <a class="close">&times;</a>
                    <div class="column first_column">
                        <div class="signin">
                            <h1>Prihlásenie do účtu</h1>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $errors->first('email') }}</li>
                                    </ul>
                                </div>
                            @endif
                            <form  method="POST" action="{{ route('login') }}">
                                @csrf
                                <input type="email" placeholder="Emailová adresa" type="email" name="email" :value="old('email')" required />
                                <input type="password" placeholder="Heslo" type="password" name="password" required  >

                                <a href="#" class="login_forgot">Zabudli ste heslo ?</a>

                                <button class="col-7 ms-3 btn form-submit">
                                    <i class="bi bi-box-arrow-in-right"> Prihlásiť sa</i>
                                </button>


                            </form>

                            <span class="login_span">Nemáte ešte účet?
                                    <button id="signup" class="login_button">Zaregistrovať sa
                                    </button>
                            </span>

                        </div>
                        <div class="signup">
                            <h1>Vytvorte si účet</h1>
                            <form  method="POST" action="{{ route('register') }}">
                                @csrf

                                <input id="name" placeholder="Meno" type="text" name="name" :value="old('name')" required  />


                                <input id="email" placeholder="Email" type="email" name="email" :value="old('email')" required />


                                <input id="password" placeholder="Heslo" type="password" name="password" required  />


                                <input id="password_confirmation" placeholder="Opakovať heslo" type="password" name="password_confirmation" required />


                                <button class="col-7 ms-3 btn form-submit">
                                    <i class="bi bi-person-plus"> Vytvoriť účet</i>
                                </button>

                            </form>

                            <span class="login_span">Máte už vytvorený účet?
                                <button id="signin" class="login_button">Prihlásiť sa
                                </button>
                            </span>


                        </div>

                    </div>

                    <div class="column second_column">
                        <div class="signin">
                            <img class="brand" src="{{ asset('images/wtech_logo.png') }}">
                            <h3>Pohodlne nakupujte!</h3>
                        </div>
                        <div class="signup">
                            <img class="brand" src="{{ asset('images/wtech_logo.png') }}">
                            <h3>Vytvorenie účtu je zadarmo!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="overlay">
        <div id="womanSection" class="container-fluid woman-section">
            <div class="row">
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Oblečenie</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Tričká</a></li>
                        <li><a href="product_list_page.html">Nohavice</a></li>
                        <li><a href="product_list_page.html">Bundy</a></li>
                        <li><a href="product_list_page.html">Šaty</a></li>
                    </ul>
                </div>
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Topánky</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Tenisky</a></li>
                        <li><a href="product_list_page.html">Čižmy</a></li>
                        <li><a href="product_list_page.html">Športové</a></li>
                        <li><a href="product_list_page.html">Spoločenské</a></li>
                    </ul>
                </div>
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Doplnky</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Hodinky</a></li>
                        <li><a href="product_list_page.html">Šály</a></li>
                        <li><a href="product_list_page.html">Čiapky</a></li>
                        <li><a href="product_list_page.html">Okuliare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="manSection" class="container-fluid man-section">
            <div class="row">
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Oblečenie</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="{{ route('product_list.index', ['id' => 4]) }}">Mikiny</a></li>
                        <li><a href="{{ route('product_list.index', ['id' => 4]) }}">Nohavice</a></li>
                        <li><a href="product_list_page.html">Bundy</a></li>
                        <li><a href="product_list_page.html">Tričká</a></li>
                    </ul>
                </div>
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Topánky</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Tenisky</a></li>
                        <li><a href="product_list_page.html">Pracovné</a></li>
                        <li><a href="product_list_page.html">Športové</a></li>
                        <li><a href="product_list_page.html">Spoločenské</a></li>
                    </ul>
                </div>
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Doplnky</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Hodinky</a></li>
                        <li><a href="product_list_page.html">Šály</a></li>
                        <li><a href="product_list_page.html">Čiapky</a></li>
                        <li><a href="product_list_page.html">Okuliare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kidsSection" class="container-fluid kids-section">
            <div class="row">
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Oblečenie</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Bundy</a></li>
                        <li><a href="product_list_page.html">Šaty</a></li>
                        <li><a href="product_list_page.html">Tričká</a></li>
                        <li><a href="product_list_page.html">Nohavice</a></li>
                    </ul>
                </div>
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Topánky</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Tenisky</a></li>
                        <li><a href="product_list_page.html">Obuv na prvé kroky</a></li>
                        <li><a href="product_list_page.html">Športové</a></li>
                        <li><a href="product_list_page.html">Spoločenské</a></li>
                    </ul>
                </div>
                <div class="col-4 mt-3">
                    <ul class="multi-column-dropdown">
                        <span class="title-section">Doplnky</span>
                        <hr style="height: 2px;box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        <li><a href="product_list_page.html">Šiltovky</a></li>
                        <li><a href="product_list_page.html">Šály</a></li>
                        <li><a href="product_list_page.html">Čiapky</a></li>
                        <li><a href="product_list_page.html">Okuliare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</header>
