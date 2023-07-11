@extends('admin.layouts.appadmin')
@section('content')
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
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
                <a class="btn btn-primary" href="{{ url('/admin/pelanggan/createpelanggan') }}">Create Pelanggan</a>
            @endif
        </div>
        <div class="card-body table-responsive">
            <table id="datatablesSimple">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pesanan as $pe)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pe->user->name }}</td>
                                <td>{{ $pe->alamat }}</td>
                                <td>{{ $pe->user->email }}</td>
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ url('/admin/pelanggan/viewpelanggan/' . $pe->id) }}"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>
                                        <a class="btn btn-secondary"
                                            href="{{ url('/admin/pelanggan/editpelanggan/' . $pe->id) }}"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a class="btn btn-danger" href="{{ url('/admin/pelanggan/delete/' . $pe->id) }}"
                                            onclick="if(!confirm('Anda Yakin Hapus Data Pelanggan?')) {return false}"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
