@extends('layout.main')

@section('custom')
    <link rel="stylesheet" href="{{asset('css/style_main.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_product_list.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css"
          integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
            integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <section class="main_section">
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-2" id="sticky-sidebar">
                    <div class="sticky-top">
                        <div class="nav flex-column">
                            <p style="height: 70px;"></p>
                            <div class="aside_div">
                                <div class="unroll-container" id="unroll-container-1">
                                    <div class="unroll-header">
                                        <h2>Dámske</h2>
                                    </div>
                                    <div class="unroll-content">
                                        <h3>Oblečenie</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Bundy</li>
                                            <li>Šaty</li>
                                            <li>Tričká</li>
                                            <li>Nohavice</li>
                                        </ul>
                                        <h3>Topánky</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Tenisky</li>
                                            <li>Čižmy</li>
                                            <li>Športové</li>
                                            <li>Spoločenské</li>
                                        </ul>
                                        <h3>Doplnky</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Hodinky</li>
                                            <li>Šály</li>
                                            <li>Čiapky</li>
                                            <li>Okuliare</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="unroll-container" id="unroll-container-2">
                                    <div class="unroll-header">
                                        <h2>Pánske</h2>
                                    </div>
                                    <div class="unroll-content">
                                        <h3>Oblečenie</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Mikiny</li>
                                            <li>Tričká</li>
                                            <li>Bundy</li>
                                            <li>Nohavice</li>
                                        </ul>
                                        <h3>Topánky</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Tenisky</li>
                                            <li>Pracovné</li>
                                            <li>Športové</li>
                                            <li>Spoločenské</li>
                                        </ul>
                                        <h3>Doplnky</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Hodinky</li>
                                            <li>Šály</li>
                                            <li>Čiapky</li>
                                            <li>Okuliare</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="unroll-container" id="unroll-container-3">
                                    <div class="unroll-header">
                                        <h2>Detské</h2>
                                    </div>
                                    <div class="unroll-content">
                                        <h3>Oblečenie</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Bundy</li>
                                            <li>Šaty</li>
                                            <li>Tričká</li>
                                            <li>Nohavice</li>
                                        </ul>
                                        <h3>Topánky</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Tenisky</li>
                                            <li>Obuv na prvé kroky</li>
                                            <li>Športové</li>
                                            <li>Spoločenské</li>
                                        </ul>
                                        <h3>Doplnky</h3>
                                        <hr style="height: 2px; background: black;">
                                        <ul>
                                            <li>Šiltovky</li>
                                            <li>Šály</li>
                                            <li>Čiapky</li>
                                            <li>Okuliare</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col" id="main">
                    <div class="container-fluid main_container">
                        <div class="row nadpis_row">
                            <div class="col nadpis_col">
                                <h2 class="col-3 col-lg-4">Bundy</h2>
                                <h5 class="col-3 col-lg-4">Pánske/Oblečenie</h5>
                                <hr style="height: 2px; background: white;">
                            </div>
                        </div>
                        <div class="row filter_row">
                            <div class="col-6 col-md-3 dropdown_div">
                                <div class="form-group mb-4">
                                    <select class="selectpicker border-dark" id="colorPicker" title="Farba" multiple
                                            aria-label="size 3 select example">
                                        <option value="red" data-content="<span class='circle red'></span>Červená"></option>
                                        <option value="green" data-content="<span class='circle green'></span>Zelená"></option>
                                        <option value="blue" data-content="<span class='circle blue'></span>Modrá"></option>
                                        <option value="purple" data-content="<span class='circle purple'></span>Fialová"></option>
                                        <option value="pink" data-content="<span class='circle pink'></span>Ružová"></option>
                                        <option value="aqua" data-content="<span class='circle aqua'></span>Tyrkysová"></option>
                                        <option value="orange" data-content="<span class='circle orange'></span>Hnedá"></option>
                                        <option value="black" data-content="<span class='circle black'></span>Čierna"></option>
                                        <option value="white" data-content="<span class='circle white'></span>Biela"></option>
                                        <option value="other" data-content="<span class='circle other'></span>Iná"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 col-md-3 dropdown_div">
                                <div class="form-group mb-4">
                                    <select class="selectpicker border-dark" data-size="10" id="sizePicker" title="Veľkosť" multiple
                                            aria-label="size 3 select example">
                                        <option value="4XS" data-content="4XS"></option>
                                        <option value="XXXS" data-content="XXXS"></option>
                                        <option value="XXS" data-content="XXS"></option>
                                        <option value="XS" data-content="XS"></option>
                                        <option value="S" data-content="S"></option>
                                        <option value="L" data-content="L"></option>
                                        <option value="XL" data-content="XL"></option>
                                        <option value="XXL" data-content="XXL"></option>
                                        <option value="XXXL" data-content="XXXL"></option>
                                        <option value="4XL" data-content="4XL"></option>
                                        <option value="5XL" data-content="5XL"></option>
                                        <option value="6XL" data-content="6XL"></option>
                                        <option value="7XL" data-content="7XL"></option>
                                        <option value="8XL" data-content="8XL"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 dropdown_div">
                                <div class="form-group mb-4">

                                    <select class="selectpicker border-dark" data-size="10" title="Zoradiť"
                                            aria-label="size 3 select example">
                                        <option value="cheapest" data-content="Od najlacnejšieho"></option>
                                        <option value="most_expensive" data-content="Od najdrahšieho"></option>
                                        <option value="most_recet" data-content="Najnovšie"></option>
                                        <option value="oldest" data-content="Najstaršie"></option>
                                        <option value="alphabetically" data-content="Podľa abecedy"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 dropdown_div">
                                <div class="dropdown filter_dropdown mb-4">
                                    <button class="btn btn-secondary dropdown-toggle " type="button" id="price-dropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="label price_name">
                                            <p>Cena</p>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="price-dropdown">
                                        <div class="form-group">
                                            <label for="min-price">Od:</label>
                                            <input type="number" id="min-price" name="min-price" class="form-control" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="max-price">Do:</label>
                                            <input type="number" id="max-price" name="max-price" class="form-control" min="0">
                                        </div>
                                        <div class="apply-button">
                                            <button type="submit" class="btn btn-primary">Potvrdiť</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="height: 2px; background: white; padding-left: 3%; padding-right: 3%;">
                        </div>
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="grid-container">
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product7.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Calvin Klein Jeans</h3>
                                                <h3>Cena: 94,53 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product8.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Champion</h3>
                                                <h3>Cena: 39,93 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product9.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Nike Sportswear</h3>
                                                <h3>Cena: 55,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product10.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Alpha Industries</h3>
                                                <h3>Cena: 46,32 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product11.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Champion</h3>
                                                <h3>Cena: 55,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product12.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Tommy Hilfiger</h3>
                                                <h3>Cena: 87,43 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product13.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Calvin Klein Jeans</h3>
                                                <h3>Cena: 84,90 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product14.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina GANT</h3>
                                                <h3>Cena: 75,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
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
                                </div>
                                <div class="swiper-slide">
                                    <div class="grid-container">
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product7.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Calvin Klein Jeans</h3>
                                                <h3>Cena: 94,53 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product8.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Champion</h3>
                                                <h3>Cena: 39,93 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product9.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Nike Sportswear</h3>
                                                <h3>Cena: 55,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product10.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Alpha Industries</h3>
                                                <h3>Cena: 46,32 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product11.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Champion</h3>
                                                <h3>Cena: 55,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product12.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Tommy Hilfiger</h3>
                                                <h3>Cena: 87,43 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product13.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Calvin Klein Jeans</h3>
                                                <h3>Cena: 84,90 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product14.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina GANT</h3>
                                                <h3>Cena: 75,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
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
                                </div>
                                <div class="swiper-slide">
                                    <div class="grid-container">
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product7.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Calvin Klein Jeans</h3>
                                                <h3>Cena: 94,53 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product8.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Champion</h3>
                                                <h3>Cena: 39,93 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product9.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Nike Sportswear</h3>
                                                <h3>Cena: 55,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product10.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Alpha Industries</h3>
                                                <h3>Cena: 46,32 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product11.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Champion</h3>
                                                <h3>Cena: 55,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product12.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Tommy Hilfiger</h3>
                                                <h3>Cena: 87,43 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product13.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina Calvin Klein Jeans</h3>
                                                <h3>Cena: 84,90 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <div class="img_box">
                                                <a href="product_page.html">
                                                    <img src="images/product14.png">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3>Mikina GANT</h3>
                                                <h3>Cena: 75,92 €</h3>
                                            </div>
                                        </div>
                                        <div class="grid-item">
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
                                </div>
                            </div>
                            <div class="swiper-pagination mt-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{asset('js/script_product_list_page.js')}}"></script>
    <script src="{{asset('js/navbar.js')}}"></script>
@endsection
