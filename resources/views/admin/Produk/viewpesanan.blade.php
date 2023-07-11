@extends('admin.layouts.appadmin')
@section('content')
<form method="POST" action="{{ url('/admin/pesanan/show') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($pesanan as $ps)
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>No</th>
                <td>{{ $ps->id }}</td>
            </tr>
            <tr>
                <th>Produk-ID</th>
                <td>{{ $ps->produk_id }}</td>
            </tr>
            <tr>
                <th>Tanggal pesan</th>
                <td>{{ $ps->tgl_pesanan }}</td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td>{{$ps->total_harga}}</td>
            </tr>
            <tr>
                <th>alamat</th>
                <td>{{ $ps->alamat}}</td>
            </tr>
            <tr>
                <th>jumlah pesan</th>
                <td>{{ $ps->jumlah}}</td>
            </tr>
            <tr>
                <th>user id</th>
                <td>{{ $ps->user_id}}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</form>
@endsection
