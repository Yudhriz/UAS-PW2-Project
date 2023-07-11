@extends('admin.layouts.appadmin')
@section('content')




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<br>
<h1>Form Input Pesanan</h1>
<div class="col-8 ">
  <form method="POST" action="{{url('/admin/pesanan/update')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($pesanan as $ps)
    <input type="hidden" name="id" value="{{$ps->id}}">
    <div class="form-group row">
      <label for="select" class="col-4 col-form-label">Produk ID</label>
      <div class="col-8">
        <select id="select" name="produk_id" class="custom-select">
          @foreach ($produk as $d)
          <option value="{{$d->id}}">{{$d->nama}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="text1" class="col-4 col-form-label">tanggal Pesan</label>
      <div class="col-8">
        <input id="text1" name="tgl_pesanan" type="date" class="form-control" value="{{$ps->tgl_pesanan}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="text2" class="col-4 col-form-label">Total Harga</label>
      <div class="col-8">
        <input id="text2" name="total_harga" type="text" class="form-control" value="{{$ps->total_harga}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="text3" class="col-4 col-form-label">Alamat</label>
      <div class="col-8">
        <input id="text2" name="alamat" type="text" class="form-control" value="{{$ps->alamat}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="text4" class="col-4 col-form-label">Jumlah</label>
      <div class="col-8">
        <input id="text4" name="jumlah" type="text" class="form-control" value="{{$ps->jumlah}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="select" class="col-4 col-form-label">User ID</label>
      <div class="col-8">
        <select id="select" name="user_id" class="custom-select">
          @foreach ($pesanan as $p)
          <option value="{{$p->user_id}}">{{$p->user_id}}</option>
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
@endforeach
@endsection