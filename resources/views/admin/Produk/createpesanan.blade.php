@extends('admin.layouts.appadmin')
@section('content')




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<br>
<h1 >Form Input Pesanan</h1>
<div class="col-8 ">
<form method="POST" action="{{url('/pesanan/store')}}" enctype="multipart/form-data" >
{{ csrf_field() }}
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">tanggal</label> 
    <div class="col-8">
      <input id="text1" name="tanggal" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama Pemesan</label> 
    <div class="col-8">
      <input id="text" name="nama_pemesan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Alamat Pemesan</label> 
    <div class="col-8">
      <input id="text2" name="alamat_pemesan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">No</label> 
    <div class="col-8">
      <input id="text3" name="no_hp" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text4" name="email" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">jumlah pesanan</label> 
    <div class="col-8">
      <input id="text4" name="jumlah_pesanan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="textarea" class="col-4 col-form-label">Deskripsi</label> 
    <div class="col-8">
      <textarea id="textarea" name="deskripsi" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Produk ID</label> 
    <div class="col-8">
      <select id="select" name="produk_id" class="custom-select">
      @foreach ($kategori_produk as $d) 
      <option value="{{$d->id}}">{{$d->nama}}</option>
        @endforeach
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</form>
@endsection
