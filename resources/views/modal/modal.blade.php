<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suntronic Store - {{ $produk->nama }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('home/images/icons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('home/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('home/images/icons/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ asset('home/images/icons/site.webmanifest') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('home/fonts/iconic/css/material-design-iconic-font.min.css') }}">
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-7">
                        <div class="card-image">
                            <!-- Product image -->
                            <img src="{{ asset('home/images/' . $produk->foto_produk) }}" alt="IMG-PRODUCT"
                                style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div class="card-content">
                            <h4 class="card-title">{{ $produk->nama }}</h4>
                            <p class="card-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <p class="card-description">{{ $produk->deskripsi }}</p>

                            <!-- Size options -->
                            {{-- <div class="card-option">
                                <label for="size">Size</label>
                                <select id="size" class="card-select form-control">
                                    <option>Choose an option</option>
                                    <option>Size S</option>
                                    <option>Size M</option>
                                    <option>Size L</option>
                                    <option>Size XL</option>
                                </select>
                            </div>

                            <!-- Color options -->
                            <div class="card-option">
                                <label for="color">Color</label>
                                <select id="color" class="card-select form-control">
                                    <option>Choose an option</option>
                                    <option>Red</option>
                                    <option>Blue</option>
                                    <option>White</option>
                                    <option>Grey</option>
                                </select>
                            </div> --}}


                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                <div class="card-option mb-3">
                                    <!-- Quantity -->
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="quantity-input form-control" name="jumlah"
                                        value="1">
                                </div>
                                <!-- Add to cart button -->
                                <button class="card-btn btn btn-primary mb-2" type="submit">Add to cart</button>
                            </form>

                            <!-- Share buttons -->
                            <div class="card-share">
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100 me-2"
                                    data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100 mx-1 data-tooltip="Facebook""><i
                                        class="fa fa-facebook"></i></a>
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100 mx-1 data-tooltip="Twitter""><i
                                        class="fa fa-twitter"></i></a>
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100 mx-1 data-tooltip="Google
                                    Plus""><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('home/vendor/sweetalert/sweetalert.min.js') }}"></script>
</body>

</html>
