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
        <a class="btn btn-primary" href="{{url('/pesanan/createpesanan')}}">Create Pesanan</a>
    </div>
    <div class="card-body table-responsive">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pelanggan id</th>
                    <th>tgl_pesanan</th>
                    <th>produk_id</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($pesanan as $ps)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$ps->pelanggan_id}}</td>
                    <td>{{$ps->tgl_pesanan}}</td>
                    <td>{{$ps->produk_id}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('/pesanan/viewpesanan/'.$ps->id)}})}}">View</a>
                        <a class="btn btn-primary" href="{{url('/pesanan/editpesanan/'.$ps->id)}})}}">Edit</a>
                        <a class="btn btn-primary" href="{{url('/pesanan/delete/'.$ps->id)}})}}" onclick="if(!confirm('Anda Yakin Hapus Data Pesanan?')) {return false}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection