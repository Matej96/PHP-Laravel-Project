<header>
    <nav class="navbar navbar-expand-md navbar-light p-0">
        <div class="container-fluid">
            <div class="col-md-1 col-2 me-">
                <a href="landing_page.html">
                    <img class="navbar-brand  text-center" src={{ asset('images/wtech_logo.png') }}>
                </a>
            </div>
            <div class="button_class_mobil pe-2">
                <a href="shopping_cart_page.html">
                    <button class="btn btn-outline-success">
              <span class="bi bi-cart">
                <span class="d-none">Nákupný košík</span>
              </span>
                    </button>
                </a>
                <a href="{{ url('/login') }}">
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
                    <form class="d-flex me-4 formik">
                        <input class="form-control me-2 " type="search" placeholder="Vyhľadať tovar" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit"><i class="bi bi-search">
                                <span class="d-md-none"></span>
                            </i></button>
                    </form>
                </div>
                <ul class="nav navbar-nav me-auto navbar-nav-scroll">
                    <li class="nav-item woman-section">
                        <a class="nav-link" href="#">Dámske</a>
                    </li>
                    <li class="nav-item man-section">
                        <a class="nav-link">Pánske</a>
                    </li>
                    <li class="nav-item kids-section">
                        <a class="nav-link" href="#">Detské</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex me-4">
                <input class="form-control me-2 " type="search" placeholder="Vyhľadať tovar" aria-label="Search">
                <button class="btn btn-outline-success " type="submit"><i class="bi bi-search">
                        <span class="d-md-none"></span>
                    </i></button>
            </form>
            <div class="button_class">
                <a href="shopping_cart_page.html">
                    <button class="btn btn-outline-success">
              <span class="bi bi-cart">
                <span class="button_spans">Košík</span>
              </span>
                    </button>
                </a>
                <a href="#login">
                    <button class="btn btn-outline-success">
              <span class="bi bi-person">
                <span class="button_spans">Prihlásenie</span>
              </span>
                    </button>
                </a>
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
                        <li><a href="product_list_page.html">Mikiny</a></li>
                        <li><a href="product_list_page.html">Tričká</a></li>
                        <li><a href="product_list_page.html">Bundy</a></li>
                        <li><a href="product_list_page.html">Nohavice</a></li>
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
