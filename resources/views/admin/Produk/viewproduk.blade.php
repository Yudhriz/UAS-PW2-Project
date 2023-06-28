@extends('admin.layouts.appadmin')
@section('content')
<form method="POST" action="{{url('/produk/show')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($produk as $p)
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>no</td>
                <td>{{$p->id}}</td>
            </tr>
            <tr>
                <td>nama</td>
                <td>{{$p->nama}}</td>
            </tr>
            <tr>
                <td>Kategori Produk id</td>
                <td>{{$p->kategori_produk_id}}</td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>{{$p->deskripsi}}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>{{$p->harga}}</td>
            </tr>
            <tr>
                <td>Harga Diskon</td>
                <td>{{$p->harga_diskon}}</td>
            </tr>
            <tr>
                <td>stok</td>
                <td>{{$p->stok}}</td>
            </tr>
            <tr>
                <td>Foto Produk</td>
                <td>{{$p->foto_produk}}</td>
            </tr>
        </tbody>
    </table>
</form>
@endforeach
@endsection