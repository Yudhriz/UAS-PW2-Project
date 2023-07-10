<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanks for Ordering - {{ Auth::user()->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        fieldset.scheduler-border {
            border: 1px groove #000 !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
            float: left;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
        }

        /*---------------------------------------------*/
        .how-itemcart1 {
            width: 120px;
            position: relative;
            margin-right: 20px;
            cursor: pointer;
        }

        .how-itemcart1 img {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Checkout Success</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="display-1"><i class="bi bi-check-circle-fill text-success"></i></h1>
                            <p class="lead mb-2">Thank you for your order!</p>
                            <br>
                            @foreach ($pesanan as $orders)
                                <fieldset class="scheduler-border col-12">
                                    <div class="how-itemcart1 mx-auto">
                                    <img src="{{ asset('home/images/' . $orders->produk->foto_produk) }}"
                                        alt="Produk">
                                    </div>
                                    <legend class="scheduler-border">No Order: 000{{ $orders->id }}</legend>
                                    <div class="control-group">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nama</th>
                                                <td>{{ $orders->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal</th>
                                                <td>{{ $orders->tgl_pesanan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Produk yang dibeli</th>
                                                <td>{{ $orders->produk->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Harga satuan</th>
                                                <td>Rp {{ number_format($orders->produk->harga, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{ $orders->alamat }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <th>No hp</th>
                                                <td></td>
                                            </tr> --}}
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $orders->user->email }}</td>
                                            </tr>

                                            <tr>
                                                <th>Jumlah</th>
                                                <td>{{ $orders->jumlah }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total Harga</th>
                                                <td>Rp {{ number_format($orders->total_harga, 0, ',', '.') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </fieldset>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
