@extends('layouts.appfront')
@section('content')
    <br>
    <br>
    <br>
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Shoping Cart
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        @if ($cart)
                            <form action="{{ route('cart.update') }}" method="POST">
                                <div class="wrap-table-shopping-cart">
                                    <table class="table-shopping-cart">
                                        <tr class="table_head">
                                            <th class="column-1">Product</th>
                                            <th class="column-2">Name</th>
                                            <th class="column-3">Price</th>
                                            <th class="column-4">Quantity</th>
                                            <th class="column-5">Total</th>
                                        </tr>

                                        @php
                                            $total = 0;
                                        @endphp

                                        @foreach ($cart as $c)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ asset('home/images/' . $c->produk->foto_produk) }}"
                                                            alt="IMG">
                                                    </div>
                                                </td>
                                                <td class="column-2">{{ $c->produk->nama }}</td>
                                                <td class="column-3">Rp {{ number_format($c->produk->harga, 0, ',', '.') }}
                                                </td>
                                                <td class="column-4">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>
                                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                            name="quantity[{{ $c->id }}]"
                                                            value="{{ $c->jumlah }}">

                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="column-5">Rp
                                                    @php
                                                        $sementaratotal = $c->jumlah * $c->produk->harga;
                                                        $ppn = 0.025;
                                                        $subtotal = $sementaratotal + $sementaratotal * $ppn;

                                                        $total += $subtotal;
                                                    @endphp

                                                    {{ number_format($subtotal, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr class="table_row">
                                            <td colspan="4" class="text-right">Total:</td>
                                            <td class="column-5">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </table>

                                </div>

                                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                    <div class="flex-w flex-m m-r-20 m-tb-5">
                                        <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5"
                                            type="text" name="coupon" placeholder="Coupon Code">

                                        <div
                                            class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                            Apply coupon
                                        </div>
                                    </div>

                                    <button
                                        class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                        type="submit">
                                        Update Cart
                                    </button>
                                    @csrf
                            </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <form action="{{ route('orders.add') }}" method="POST">
                        @csrf
                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    Isilah data-data dibawah ini untuk pengirim selanjutnya. Sekedar informasi biaya
                                    shipping sudah termasuk ongkir dan ppn.
                                </p>

                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        Isi data dibawah ini!!
                                    </span>

                                    @foreach ($cart as $c)
                                        <div class="bor7 bg0 m-b-11">
                                            <p>Produk: {{ $c->produk->nama }}</p>
                                        </div>

                                        <input type="hidden" name="total_harga[]" value="{{ $subtotal }}">

                                        <div class="bor8 bg0 m-b-12">
                                            <input id="tgl_pesanan" class="stext-111 cl8 plh3 size-111 p-lr-15"
                                                type="date" name="tgl_pesanan[]" placeholder="Date"
                                                value="{{ date('Y-m-d') }}">
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text"
                                                name="alamat[]" placeholder="Address / Alamat">
                                        </div>

                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select class="js-select2" name="user_id[]">
                                                <option disabled selected>Select an account...</option>
                                                <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->name }}
                                                </option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                        <input type="hidden" name="produk_id[]" value="{{ $c->produk_id }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    Rp {{ number_format($total, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                            type="submit">
                            Proceed to Checkout
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
