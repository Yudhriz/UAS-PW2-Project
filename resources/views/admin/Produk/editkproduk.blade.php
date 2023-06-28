@extends('admin.layouts.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<br>
<h1>Form Input Kategori Produk</h1>
<div class="col-8">
<form method="POST" action="{{url('/admin/kproduk/update')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($kproduk as $kp)
    <div class="form-group row">
        <input type="hidden" name="id" value="{{$kp->id}}">
        <label for="text1" class="col-4 col-form-label">Nama Kategori produk</label>
        <div class="col-8">
            <input id="text1" name="nama" type="text" class="form-control" value="{{$kp->nama}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
@endforeach
@endsection
