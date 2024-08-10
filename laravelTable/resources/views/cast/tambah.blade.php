@extends('layout/master')
@section('judul')
    Tambah Data
@endsection
@section('content')
<form method="POST" action="/cast">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    @csrf
    <div class="form-group">
      <label >Nama</label>
      <input type="text" name="nama" class="form-control" >
    </div>
    <div class="form-group">
        <label >umur</label>
        <input type="number" name="umur" class="form-control" >
      </div>
    <div class="form-group">
      <label >Bio</label>
      <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
@endsection

