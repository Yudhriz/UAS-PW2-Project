@extends('admin.layouts.appadmin')
@section('content')
<form method="POST" action="{{ url('/pesanan/show') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($pesanan as $ps)
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>No</th>
                <td>{{ $ps->id }}</td>
            </tr>
            <tr>
            <th>Pelanggan id</th>
                <td>{{ $ps->pelanggan_id}}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $ps->tgl_pesanan }}</td>
            </tr>
            <tr>
                <th>Produk-ID</th>
                <td>{{ $ps->produk_id }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</form>
@endsection
