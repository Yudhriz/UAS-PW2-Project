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
        <a class="btn btn-primary" href="{{url('produk/createpesanan')}}">Create Pesanan</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>tanggal</th>
                    <th>Nama_pemesan</th>
                    <th>alamat_pemesan</th>
                    <th>no_hp</th>
                    <th>email</th>
                    <th>jumlah_pesanan</th>
                    <th>deskripsi</th>
                    <th>produk_id</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>no</td>
                    <td>tanggal</td>
                    <td>nama_pemesan</td>
                    <td>alamat_pemesan</td>
                    <td>no_hp</td>
                    <td>email</td>
                    <td>jumlah_pesanan</td>
                    <td>deskripsi</td>
                    <td>produk_id</td>
                    <td>
                        <a class="btn btn-primary"href= "{{url('/pesanan/show/')}}">View</a>
                        <a class="btn btn-primary" href="{{url('/pesanan/edit/')}}">Edit</a>
                        <a class="btn btn-primary" href="{{url('/pesanan/delete/')}}" onclick="if(!confirm('Anda Yakin Hapus Data Produk?')) {return false}">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection