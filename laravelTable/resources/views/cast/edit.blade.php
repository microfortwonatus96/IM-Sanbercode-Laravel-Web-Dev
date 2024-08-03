@extends('layout/master')
@section('judul')
    Tambah Data
@endsection
@section('content')
<form method="POST" action="/cast/{{$cast->id}}">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @method('PUT')
    @csrf
    <div class="form-group">
      <label >Nama</label>
      <input type="text" value="{{$cast->nama}}" name="nama" class="form-control" >
    </div>
    <div class="form-group">
        <label >umur</label>
        <input type="number" value="{{$cast->umur}}" name="umur" class="form-control" >
      </div>
    <div class="form-group">
      <label >Bio</label>
      <textarea name="bio" class="form-control" cols="30" rows="10">{{$cast->bio}}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Edit</button>
  </form>
@endsection