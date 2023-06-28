@extends('admin.layouts.appadmin')
@section('content')
<form method="POST" action="{{url('/kproduk/show')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>ID</td>
                <td>kode</td>
            </tr>
            <tr>
                <td>Nama Kategori Produk</td>
                <td>nama kategori produk</td>
            </tr>
        </tbody>
    </table>
</form>
@endsection
