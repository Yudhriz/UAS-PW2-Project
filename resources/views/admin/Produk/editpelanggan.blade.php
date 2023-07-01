@extends('admin.layouts.appadmin')
@section('content')




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<br>
<br>
<h1>Form Input Pelanggan</h1>
<div class="col-8 ">
  <form method="POST" action="{{url('/admin/pelanggan/update')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @foreach ($pelanggan as $pe)
    <div class="form-group row">
    <input type="hidden" name="id" value="{{$pe->id}}">
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
          <input id="text" name="nama" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Alamat</label>
        <div class="col-8">
          <input id="text2" name="alamat" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">No Hp</label>
        <div class="col-8">
          <input id="text3" name="no_hp" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">email</label>
        <div class="col-8">
          <input id="email" name="email" type="email" class="form-control">
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