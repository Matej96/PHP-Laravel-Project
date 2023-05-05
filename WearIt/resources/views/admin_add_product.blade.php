@extends('layout.main_admin')

@section('custom')
    <link href="{{ asset('css/style_main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style_admin_app_product_page.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
          referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/f87ddda31a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <section class="admin_section">
        <div class="row col-12">
            <h2 class="main_title col-12">Pridanie nového produktu</h2>
            <div class="container col-lg-6 col-md-8">
                <div class="card-body bg-light">

                    <form method="POST" action="{{ route('add_product') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-outline mb-4">
                            <label class="form-label" for="productName">Názov produktu</label>
                            <input type="text" id="productName" name="productName" class="form-control border-dark" value="{{ old('productName') }}"/>
                        @error('productName')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="row">
                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="productPrice">Cena (€)</label>
                                    <input type="number" id="productPrice" name="productPrice" class="form-control border-dark number-input" value="{{ old('productPrice') }}" min="0" step="0.01"/>
                                    @error('productPrice')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="productQuantity">Počet kusov</label>
                                    <input type="number" id="productQuantity" name="productQuantity" class="form-control border-dark number-input" value="{{ old('productQuantity') }}" min="0"/>
                                    @error('productQuantity')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="description">Popis</label>
                            <textarea class="form-control border-dark" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Vloženie fotiek</label>
                            <input class="form-control border-dark" type="file" id="formFileMultiple" name="formFileMultiple[]" multiple>
                            @error('formFileMultiple')
                            <div class="error">{{ $message }}</div>
                            @enderror
                            @if ($errors->has('formFileMultiple.*'))
                                <div class="error">{{ $errors->first('formFileMultiple.*') }}</div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-group mb-4">
                                    <div class="col mb-2">
                                        <label for="categoryPicker">Kategória produktu</label>
                                    </div>
                                    <select class="selectpicker border-dark" id="categoryPicker" name="categoryPicker" title="Kategória" aria-label="size 3 select example" >
                                        @foreach($categories as $categories)
                                            <option value="{{ $categories->id }}" data-content="{{ $categories->category_name }}" {{ old('categoryPicker') == $categories->id ? 'selected' : '' }}></option>
                                        @endforeach
                                    </select>
                                    @error('categoryPicker')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-group mb-4">
                                    <div class="col mb-2">
                                        <label for="categoryPicker">Podkategória produktu</label>
                                    </div>
                                    <select class="selectpicker border-dark" data-size="10" id="subCategoryPicker" title="Podkategória" aria-label="size 3 select example" disabled>
                                        <option value="jacket" data-content="Bundy"></option>
                                        <option value="dress" data-content="Šaty"></option>
                                        <option value="shirt" data-content="Tričká"></option>
                                        <option value="trousers" data-content="Nohavice"></option>
                                        <option value="sneakers" data-content="Tenisky"></option>
                                        <option value="boots" data-content="Čižmy"></option>
                                        <option value="sport_sneakers" data-content="Športová obuv"></option>
                                        <option value="formal_shoes" data-content="Spoločenská obuv"></option>
                                        <option value="cap" data-content="Šiltovky"></option>
                                        <option value="scarf" data-content="Šály"></option>
                                        <option value="hat" data-content="Čiapky"></option>
                                        <option value="glasses" data-content="Okuliare"></option>
                                        <option value="working_shoes" data-content="Pracovné"></option>
                                        <option value="sweatshirt" data-content="Mikiny"></option>
                                        <option value="watches" data-content="Hodinky"></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-group mb-4">
                                    <div class="col mb-2">
                                        <label for="colorPicker">Farba</label>
                                    </div>
                                    <select class="selectpicker border-dark" id="colorPicker" name="colorPicker" title="Farba" aria-label="size 3 select example">
                                        @foreach($colors as $color)
                                            <option value="{{$color->id}}" data-content="<span class='circle' style='background-color: {{$color->hex_value}}'></span>{{$color->color_name}}"
                                                {{ old('colorPicker') == $color->id ? 'selected' : '' }}>
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('colorPicker')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-group mb-4">
                                    <div class="col mb-2">
                                        <label for="sizePicker">Veľkosť</label>
                                    </div>
                                    <select class="selectpicker border-dark" data-size="10" id="sizePicker" name="sizePicker[]" title="Veľkosť" multiple aria-label="size 3 select example">
                                        @foreach($sizes as $sizes)
                                            <option value="{{ $sizes->id }}" data-content="{{ $sizes->size_name }}" {{ (collect(old('sizePicker'))->contains($sizes->id)) ? 'selected':'' }}></option>
                                        @endforeach
                                    </select>
                                    @error('sizePicker')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex justify-content-center">
                            <button type="submit" name="add_product_button" class="btn btn-primary btn-block mb-4 add_button">Pridať Produkt</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        });
    </script>

@endsection
