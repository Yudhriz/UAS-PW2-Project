@extends('admin.layouts.appadmin')
@section('content')
<form method="POST" action="{{url('/produk/produk')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>ID</td>
                <td>id</td>
            </tr>
            <tr>
                <td>Kode</td>
                <td>kode</td>
            </tr>
            <tr>
                <td>Nama Produk</td>
                <td>nama</td>
            </tr>
            <tr>
                <td>Harga jual</td>
                <td>harga_jual</td>
            </tr>
            <tr>
                <td>Harga beli</td>
                <td>harga_beli</td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>stok</td>
            </tr>
            <tr>
                <td>Min stok</td>
                <td>min_stok</td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>deskripsi</td>
            </tr>
            <tr>
                <td>Kategori produk id</td>
                <td>kategori_produk_id</td>
            </tr>
        </tbody>
    </table>
</form>
@endsection