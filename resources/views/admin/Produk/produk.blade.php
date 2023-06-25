@extends('admin.layouts.appadmin')
@section('content')

<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more
        information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <!-- <i class="fas fa-table me-1"></i> -->
        <a class="btn btn-primary" href="{{url('admin/produk/create')}}">Tambah</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga_Jual</th>
                    <th>Harga_Beli</th>
                    <th>Stok</th>
                    <th>Min_Stok</th>
                    <th>Kategori_Produk_ID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>no</td>
                    <td>kode</td>
                    <td>nama</td>
                    <td>harga_jual</td>
                    <td>harga_beli</td>
                    <td>stok</td>
                    <td>min_stok</td>
                    <td>deskripsi</td>
                    <td>kategori_produk_id</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('/produk/viewproduk/')}}">View</a>
                        <a class="btn btn-primary" href="{{url('/produk/edit/')}}">Edit</a>
                        <a class="btn btn-primary" href="{{url('/produk/delete/')}}" onclick="if(!confirm('Anda Yakin Hapus Data Produk?')) {return false}">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection