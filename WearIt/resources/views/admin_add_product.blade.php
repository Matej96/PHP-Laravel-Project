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

                    <form method="POST" action="{{ isset($product_id) ? route('add_product', $product_id) : route('add_product') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-outline mb-4">
                            <label class="form-label" for="productName">Názov produktu</label>
                            <input type="text" id="productName" name="productName" class="form-control border-dark" value="{{ $product ? $product->product_name : old('productName') }}"/>

                            @error('productName')
                        <div class="error">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="row">
                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="productPrice">Cena (€)</label>
                                    <input type="number" id="productPrice" name="productPrice" class="form-control border-dark number-input" value="{{ $product ? $product->price : old('productPrice') }}" min="0" step="0.01"/>
                                    @error('productPrice')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-outline mb-4" style="{{ $disableQuantity ? 'display:none;' : '' }}">
                                    <label class="form-label" for="productQuantity">Počet kusov</label>
                                    <input type="number" id="productQuantity" name="productQuantity" class="form-control border-dark number-input" value="{{ old('productQuantity') }}" min="0"  />
                                    @error('productQuantity')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="description">Popis</label>
                            <textarea class="form-control border-dark" id="description" name="description" rows="4">{{ $product ? $product->product_description : old('description') }}</textarea>
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
                            <div id="image-list" class="mt-3">
                                @if(isset($images))
                                    @foreach($images as $image)
                                        <div class="row align-items-center mb-2">
                                            <div class="col-2">
                                                <p id="image">{{ $image }}</p>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeImage(this)">Vymazať</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @if(isset($variations))
                                <div class="row">
                                @foreach($variations as $variation)
                                        @foreach($sizes as $size)
                                            @if($size->id == $variation->size_id)
                                                <div class="col-6 col-md-3 justify-content-center align-items-center">
                                                    <div class="form-outline mb-4">
                                                        <label class="form-label" for="productSizes2">Veľkosť:</label>
                                                        <input type="hidden" name="productSizes2[]" value="{{ $size->id }}">
                                                        <input type="text" id="productSizes2" name="productSizes2[]" class="form-control" value="{{ $size->size_name }}" disabled>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    <div class="col-6 col-md-3 justify-content-center align-items-center">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="productCount2">Počet:</label>
                                            <input type="number" id="productCount2" name="productCount2[]" class="form-control" value="{{ old('productCount2.'.$loop->index, (int)$variation->quantity) }}" min="0">
                                        </div>
                                        @error('productCount2')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                                </div>
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
                                            <option value="{{ $categories->id }}" {{ (old('categoryPicker') == $categories->id || ($product && $product->category_id == $categories->id)) ? 'selected' : '' }}>{{ $categories->category_name }}</option>
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
                                            <option value="{{ $color->id }}"
                                                    data-content="<span class='circle' style='background-color: {{$color->hex_value}}'></span>{{$color->color_name}}"
                                                {{ (old('colorPicker') == $color->id) || ($product && $product->color_id == $color->id) ? 'selected' : '' }}>
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('colorPicker')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="form-group mb-4" style="{{ $disableQuantity ? 'display:none;' : '' }}">
                                    <div class="col mb-2">
                                        <label for="sizePicker">Veľkosť</label>
                                    </div>
                                    <select class="selectpicker border-dark" data-size="10" id="sizePicker" name="sizePicker[]" title="Veľkosť" multiple aria-label="size 3 select example">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}" data-content="{{ $size->size_name }}" {{ (collect(old('sizePicker'))->contains($size->id)) ? 'selected':'' }}></option>
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
    <script>
        function removeImage(button) {
            if (!button) {
                console.error('Button is not defined.');
                return;
            }

            // get the parent element of the button (which should be the entire image row)
            const row = button.closest('.row');

            // check if row is defined
            if (!row) {
                console.error('Row is not defined.');
                return;
            }

            // get the URL of the image to remove
            const imageName = row.querySelector('#image').textContent.trim();

            // Odoslanie AJAX požiadavky na odstránenie produktu z košíka
            fetch('{{ route('image_delete') }}', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: imageName
                })
            })
                .then(response => {
                    if (response.ok) {
                        row.remove();
                        return response.json();
                    } else {
                        console.error('Chyba pri odstraňovaní položky z košíka.');
                    }
                })
                .then(data => {
                    // update image URLs with new filenames
                    const images = document.querySelectorAll('#image-list .row #image');
                    for (let i = 0; i < images.length; i++) {
                        const newFilename = data.filenames[i];
                        images[i].textContent = newFilename;
                    }
                })
                .catch(error => {
                    console.error('Chyba pri odstraňovaní položky z košíka:', error);
                });
        }
    </script>

@endsection
