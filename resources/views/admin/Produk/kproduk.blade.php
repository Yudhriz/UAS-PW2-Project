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
        @if (Auth::user()->role == 'admin')
        <a class="btn btn-primary" href="{{url('/admin/kproduk/createkproduk')}}">Create Kategori</a>
        @endif
    </div>
    <div class="card-body table-responsive">
        <table id="datatablesSimple">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
                @foreach($kategori_produk as $kp)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$kp->nama}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('/admin/kproduk/viewkproduk/'.$kp->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-secondary" href="{{url('/admin/kproduk/editkproduk/'.$kp->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{url('/admin/kproduk/delete/'.$kp->id)}}" onclick="if(!confirm('Anda Yakin Hapus Data Kategori Produk?')) {return false}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection