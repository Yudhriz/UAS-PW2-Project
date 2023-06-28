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
                <th>Tanggal</th>
                <td>{{ $ps->tanggal }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $ps->nama_pemesan }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $ps->alamat_pemesan }}</td>
            </tr>
            <tr>
                <th>No.HP</th>
                <td>{{ $ps->no_hp }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $ps->email }}</td>
            </tr>
            <tr>
                <th>Jumlah pesanan</th>
                <td>{{ $ps->jumlah_pesanan }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $ps->deskripsi }}</td>
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
