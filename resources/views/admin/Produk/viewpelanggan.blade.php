@extends('admin.layouts.appadmin')
@section('content')
<form method="POST" action="{{ url('/admin/pelanggan/show') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($pelanggan as $pe)
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>Nama</th>
                <td>{{ $pe->nama }}</td>
            </tr>
            <tr>
            <th>alamat</th>
                <td>{{ $pe->alamat}}</td>
            </tr>
            <tr>
                <th>no hp</th>
                <td>{{ $pe->no_hp }}</td>
            </tr>
            <tr>
                <th>email</th>
                <td>{{ $pe->email }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
</form>
@endsection
