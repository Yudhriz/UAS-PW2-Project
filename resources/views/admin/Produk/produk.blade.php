@extends('admin.layouts.appadmin')
@section('content')

<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
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
        <a class="btn btn-primary" href="{{url('/admin/produk/createproduk')}}">Tambah</a>
    </div>
    <div class="card-body table-responsive">
        <table id="datatablesSimple">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>nama</th>
                    <th>Kategori Produk id</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Harga Diskon</th>
                    <th>Stok</th>
                    <th>Foto Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($produk as $p)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->kategori_produk_id}}</td>
                    <td>{{$p->deskripsi}}</td>
                    <td>{{$p->harga}}</td>
                    <td>{{$p->harga_diskon}}</td>
                    <td>{{$p->stok}}</td>
                    <td>{{$p->foto_produk}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('/admin/produk/viewproduk/'.$p->id)}}">View</a>
                        <a class="btn btn-primary" href="{{url('/admin/produk/editproduk/'.$p->id)}}">Edit</a>
                        <a class="btn btn-primary" href="{{url('/admin/produk/delete/'.$p->id)}}" onclick="if(!confirm('Anda Yakin Hapus Data Produk?')) {return false}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection